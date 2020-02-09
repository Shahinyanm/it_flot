<template>
    <div>
        <div>{{$t('main.home')}}</div>
        <Posts></Posts>
    </div>
</template>

<script>
    import Posts from '../components/Posts'

    export default {
        name: 'Home',
        components: {Posts},

    }
</script>

<style scoped>

</style>

