<template>

    <div class="main" id="layout-app">
        <div class="header">
            <div class="container">
                <b-navbar>
                    <template slot="brand">
                        <b-navbar-item :to="{ path: '/' }" tag="router-link">
                            <img
                                src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                            >
                        </b-navbar-item>
                    </template>
                    <template slot="start">
                        <b-navbar-item tag="router-link" :to="{name: 'home'}">
                            <p>{{ $t('main.home') }}</p>
                        </b-navbar-item>
                    </template>

                    <template slot="end">
                        <b-navbar-item tag="div">
                            <div class="buttons">
                                <router-link v-if="!$auth.check()" :to="{ name: 'register' }" class="button is-primary"> <strong>{{ $t('main.register') }}</strong></router-link>
                                <router-link  v-if="!$auth.check()" :to="{ name: 'login' }" class="button is-light">{{ $t('main.login') }}</router-link>
                                <router-link  v-if="$auth.check()" :to="{ name: 'profile' }" class="button is-light">{{ $t('main.profile') }}</router-link>
                                <b-button v-if="$auth.check()" type="is-danger" @click.prevent="$auth.logout()">{{ $t('main.logout') }}</b-button>
                                <Locale @changedLanguage="updateTable"></Locale>
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
    import Locale from "./Locale"
    export default {
        components:{Locale},
        methods:{
            updateTable(){

            }
        }
    }
</script>
