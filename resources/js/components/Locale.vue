<template>
    <div class="locale-changer">

        <b-select  :placeholder="$t('main.language')"  v-model="$i18n.locale" icon="earth" @change.native="changeLanguage($i18n.locale)">
            <option v-for="(lang, i) in langs" :key="`Lang${i}`" :value="lang"> {{ lang }} </option>
        </b-select>
    </div>
</template>

<script>
    export default {
        name: 'locale-changer',
        data () {
            return { langs: ['ru', 'en'] }
        },
        methods:{
            changeLanguage(locale) {
                axios.get(`/setLocale/${locale}`).then(response => {
                  this.$emit('changedLanguage');
                })
            }
        }
    }
</script>
