<template>
    <div>
        <div>{{$t('main.posts_with_filter')}}</div>
        <Posts :home="true"></Posts>
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

