<template>
    <section>

        <b-field group-multiline grouped>
            <div class="control">
                <b-switch v-model="showDetailIcon">Show detail icon</b-switch>
            </div>
        </b-field>

        <b-table
            :data="posts_list"
            :opened-detailed="defaultOpenedDetails"
            :show-detail-icon="showDetailIcon"
            @details-open="(row, index) => $buefy.toast.open(`Expanded ${row.title}`)"
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
                <b-table-column field="id" label="ID" numeric width="40">
                    {{ props.row.id }}
                </b-table-column>

                <b-table-column field="title" label="Title" sortable>
                    <template v-if="showDetailIcon">
                        {{ props.row.title }}
                    </template>
                    <template v-else>
                        <a @click="toggle(props.row)">
                            {{ props.row.title }}
                        </a>
                    </template>
                </b-table-column>

                <b-table-column field="category" label="Category" sortable>
                    {{ props.row.category }}
                </b-table-column>
                <b-table-column field="user" label="User" sortable>
                    {{ props.row.user }}
                </b-table-column>

            </template>

            <template slot="detail" slot-scope="props">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <p>
                                {{ props.row.description }}
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
        data () {
            return {
                posts_list:[],
                defaultOpenedDetails: [],
                showDetailIcon: true,
            }
        },
        mounted () {
            this.getPosts()
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
                            title: item.title,
                            description: item.description,
                            category: item.category,
                            user: item.user
                        })
                    })
                })
            },
        }
    }
</script>
