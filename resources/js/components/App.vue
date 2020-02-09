<template>

    <div class="main" id="layout-app">
        <div class="header">
            <div class="container">
                <b-navbar>
                    <template slot="brand">
                        <b-navbar-item :to="{ path: '/' }" tag="router-link">
                            <img
                                alt="Lightweight UI components for Vue.js based on Bulma"
                                src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                            >
                        </b-navbar-item>
                    </template>
                    <template slot="start">
                        <b-navbar-item tag="router-link" :to="{name: 'home'}">
                            Home
                        </b-navbar-item>
                    </template>

                    <template slot="end">
                        <b-navbar-item tag="div">
                            <div class="buttons">
                                <router-link v-if="!$auth.check()" :to="{ name: 'register' }" class="button is-primary"> <strong>Sign up</strong></router-link>
                                <router-link  v-if="!$auth.check()" :to="{ name: 'login' }" class="button is-light">Log in</router-link>
                                <router-link  v-if="$auth.check()" :to="{ name: 'profile' }" class="button is-light">Profile</router-link>
                                <b-button v-if="$auth.check()" type="is-danger" @click.prevent="$auth.logout()">Log out</b-button>

                            </div>
                        </b-navbar-item>
                    </template>
                </b-navbar>
            </div>
        </div>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
