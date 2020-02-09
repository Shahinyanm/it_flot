<template>
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-marginless is-centered">
                        <div class="column is-5">
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="subtitle is-4 card-header-title">{{ $t('main.profile') }}</h2>
                                </header>

                                <div class="card-content">
                                    <section>
                                        <b-field :label="$t('main.categories')">
                                            <b-select placeholder="Select a category" v-model="category">
                                                <option
                                                    :key="category.id"
                                                    :value="category.id"
                                                    v-for="category in categories">
                                                    {{ category[$i18n.locale].type }}
                                                </option>
                                            </b-select>
                                        </b-field>

                                        <b-field>
                                            <b-input :placeholder="$t('main.title_en')" type="name" v-model="title_en"></b-input>
                                        </b-field>

                                        <b-field>
                                            <b-input :placeholder="$t('main.title_ru')" type="name" v-model="title_ru"></b-input>
                                        </b-field>

                                        <b-field>
                                            <b-input maxlength="100"
                                                     minlength="10"
                                                     :placeholder="$t('main.description_en')"
                                                     type="textarea"
                                                     v-model="description_en">
                                            </b-input>
                                        </b-field>
                                        <b-field>
                                            <b-input maxlength="100"
                                                     minlength="10"
                                                     :placeholder="$t('main.description_ru')"
                                                     type="textarea"
                                                     v-model="description_ru">
                                            </b-input>
                                        </b-field>
                                        <b-button @click="save" type="is-primary">{{ $t('main.save') }}</b-button>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>

<script>
    const ModalForm = {
        props: ['email', 'password'],

    }

    export default {
        components: {
            ModalForm
        },

        data() {
            return {
                langs: ['ru', 'en'],
                title_ru: '',
                title_en: '',
                description_ru: '',
                description_en: '',
                category:'',
                categories: [],
            }
        },
        methods:{
            save() {
                const app = this;
                        axios
                    .post('/posts',{
                        title_en: app.title_en,
                        title_ru: app.title_ru,
                        description_en: app.description_en,
                        description_ru: app.description_ru,
                        category:app.category,
                        user: this.$auth.user().id,
                    })
                    .then(response => {
                        if (response.status === 201){
                            this.$emit('close')
                            this.$router.push({name: 'home'});
                        }
                    })
            },
            getCategories(){
                axios
                .get('/categories')
                .then(response => {
                    this.categories = response.data.data
                })
            },
        },
        mounted(){
            this.getCategories();
        },
    }
</script>
