<template>
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-marginless is-centered">
                    <div class="column is-5">
                        <div class="card">
                            <header class="card-header">
                                <h2 class="subtitle is-4 card-header-title">Sign Up</h2>
                            </header>

                            <div class="card-content">
                                <form  action="#" class="login-form" method="POST">
                                    <section>
                                        <b-field label="Name">
                                            <b-input v-model="name" ></b-input>
                                        </b-field>
                                        <b-field label="Email">
<!--                                                 message="This email is invalid"-->
<!--                                                 type="is-danger"-->
                                            <b-input v-model="email" maxlength="30"
                                                     type="email"
                                                     value="">
                                            </b-input>
                                        </b-field>
                                        <b-field label="Password">
                                            <b-input v-model="password" password-reveal type="password"></b-input>
                                        </b-field>
                                        <b-field label="Password Confirmation">
                                            <b-input password-reveal type="password" v-model="password_confirmation"></b-input>
                                        </b-field>


                                        <b-button type="is-primary" @click="register">Sign Up</b-button>

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
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                has_error: false,
                error: '',
                errors: {},
                success: false
            }
        },
        methods: {
            register() {
                const app = this
                this.$auth.register({
                    data: {
                        name:app.name,
                        email: app.email,
                        password: app.password,
                        password_confirmation: app.password_confirmation
                    },
                    success: function () {
                        app.success = true
                        this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
                    },
                    error: function (res) {
                        console.log(res.response.data.errors)
                        app.has_error = true
                        app.error = res.response.data.error
                        app.errors = res.response.data.errors || {}
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
