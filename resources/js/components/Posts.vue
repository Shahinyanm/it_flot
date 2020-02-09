<template>
    <section>


        <b-field :label="$t('main.categories')">
            <b-select placeholder="Select a category"  @change.native="choseCategory($event)">
                <option
                    :key="category.id"
                    :value="category.slug"
                    v-for="category in categories">
                    {{ category[$i18n.locale].type }}
                </option>
            </b-select>
        </b-field>
        <b-field group-multiline grouped>
            <div class="control">
                <b-switch v-model="showDetailIcon">{{$t('main.show_detail_icon')}}</b-switch>
            </div>
        </b-field>

        <b-table
            :data="posts_lists"
            :opened-detailed="defaultOpenedDetails"
            :show-detail-icon="showDetailIcon"
            @details-open="(row, index) => $buefy.toast.open(` ${row.title}`)"
            aria-current-label="Current page"
            aria-next-label="Next page"
            aria-page-label="Page"
            aria-previous-label="Previous page"
            detail-key="id"
            detailed
            paginated
            per-page="5"
            ref="table">

            <template slot-scope="props">
                <b-table-column :label="$t('main.id')" field="id" numeric width="40">
                    {{ props.row.id }}
                </b-table-column>

                <b-table-column :label="$t('main.title')" field="title" sortable>
                    <template v-if="showDetailIcon">
                        {{ props.row[$i18n.locale].title }}
                    </template>
                    <template v-else>
                        <a @click="toggle(props.row)">
                            {{ props.row[$i18n.locale].title }}
                        </a>
                    </template>
                </b-table-column>

                <b-table-column :label="$t('main.category')" field="category" sortable>
                    {{ props.row[$i18n.locale].category }}
                </b-table-column>
                <b-table-column :label="$t('main.user')" field="user" sortable>
                    {{ props.row.user }}
                </b-table-column>

                <b-table-column :label="$t('main.actions')" v-if="$auth.user().id === props.row.user_id">
                    <button class="button is-small is-danger" @click.prevent="onDelete(props.row)">
                        <b-icon icon="delete" size="is-small"></b-icon>
                    </button>
                </b-table-column>

            </template>

            <template slot="detail" slot-scope="props">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                {{ props.row[$i18n.locale].description }}
                            </p>
                        </div>
                    </div>
                </article>
            </template>
        </b-table>

    </section>
</template>

<script>
    export default {
        props: ['user'],
        data () {
            return {
                posts_list: [],
                defaultOpenedDetails: [],
                showDetailIcon: true,
                locale: this.$i18n.locale,
                categories:[],
            }
        },
        mounted () {
            this.getPosts()
            this.getCategories()
        },
        methods: {
            toggle (row) {
                this.$refs.table.toggleDetails(row)
            },
            getPosts () {
                const app = this
                axios.get('/posts').then(response => {
                    let data = {}

                    $.each(response.data.data, function (ket, item) {
                        app.posts_list.push({
                            id: item.id,
                            en: {
                                title: item.title_en,
                                description: item.description_en,
                                category: item.category_en,
                            },
                            ru: {
                                title: item.title_ru,
                                description: item.description_ru,
                                category: item.category_ru,
                            },
                            category: item.category,
                            user: item.user,
                            user_id: item.user_id,
                        })
                    })
                })
            },
            getCategories(){
                axios
                .get('/categories')
                .then(response => {
                    this.categories = response.data.data
                })
            },
            choseCategory(category){
                this.$router.push(`/home/${category.slug}`)
            },
            onDelete(item) {
                axios.delete(`/posts/${item.id}`).then(response => {
                    this.$buefy.toast.open(this.$t('main.deleted'));
                    this.posts_list.find(item).remove;
                });
            }
        },
        computed: {
            posts_lists () {
                return this.user ? this.posts_list.filter(x => x.user_id == this.user) : this.posts_list
            },

        },
    }
</script>
