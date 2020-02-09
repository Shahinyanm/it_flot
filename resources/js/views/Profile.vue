<template>
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-marginless is-centered">
                    <div class="column is-5">
                        <div class="card">
                            <header class="card-header">
                                <h2 class="subtitle is-4 card-header-title">Profile</h2>
                            </header>

                            <div class="card-content">
                                <section>
                                    <b-field label="Simple">
                                        <b-select placeholder="Select a category" v-model="category">
                                            <option
                                                :key="category.id"
                                                :value="category.id"
                                                v-for="category in categories">
                                                {{ category.type }}
                                            </option>
                                        </b-select>
                                    </b-field>

                                    <b-field>
                                        <b-input placeholder="Title" type="name" v-model="title"></b-input>
                                    </b-field>

                                    <b-field>
                                        <b-input maxlength="100"
                                                 minlength="10"
                                                 placeholder="Maxlength automatically counts characters"
                                                 type="textarea"
                                                 v-model="description">
                                        </b-input>
                                    </b-field>
                                    <b-button @click="save" type="is-primary">Save</b-button>

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
    export default {
        name: 'Profile',
        data() {
            return {
                title: '',
                description: '',
                category:'',
                categories: []
            }
        },
        mounted(){
            this.getCategories();
            console.log()
        },
        created(){

            },
        methods: {
            save() {
                const app = this;
                let formData =
                axios
                .post('/posts',{
                        title: app.title,
                        description: app.description,
                        category:app.category,
                        user: this.$auth.user().id
                })
                .then(response => {
                    if (response.status === 201){
                        this.$router.push({name: 'home'})

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
        }
    }
</script>

