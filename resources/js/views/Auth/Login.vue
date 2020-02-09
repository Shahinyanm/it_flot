<template>
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-marginless is-centered">
                    <div class="column is-5">
                        <div class="card">
                            <header class="card-header">
                                <h2 class="subtitle is-4 card-header-title">{{$t('main.login')}}</h2>
                            </header>

                            <div class="card-content">
                                <form action="#" class="login-form" method="POST">
                                    <section>
                                        <b-field :label="$t('main.email')">
                                            <b-input maxlength="30"
                                                     type="email"
                                                     v-model="email">
                                            </b-input>
                                        </b-field>
                                        <b-field :label="$t('main.password')">
                                            <b-input type="password"
                                                     v-model="password"
                                                     password-reveal></b-input>
                                        </b-field>


                                        <b-button type="is-primary" @click="login">{{$t('main.login')}}</b-button>

                                    </section>
                                </form>
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
        data() {
            return {
                email: null,
                password: null,
                has_error: false
            }
        },
        mounted() {
            //
        },
        methods: {
            login() {
                // get the redirect object
                const app = this
                this.$auth.login({
                    params: {
                        email: app.email,
                        password: app.password
                    },
                    success: function() {
                        this.$router.push({name: 'home'})
                    },
                    error: function() {
                        app.has_error = true
                    },
                    rememberMe: true,
                    fetchUser: true
                })
            }
        }
    }
</script>

<style scoped>

</style>
