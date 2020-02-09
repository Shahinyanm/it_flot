<template>
    <div>
        <b-button  type="is-danger" @click="showModal" style="float:right">{{ $t('main.add_post') }}</b-button>

        <Posts :user="$auth.user().id" ></Posts>

    </div>
</template>

<script>
    import Posts from '../components/Posts'
    import AddPost from '../components/AddPost'

    export default {
        name: 'Profile',
        components: {Posts, AddPost},

        data() {
            return {

                showForm:false,
            }
        },

        created(){

            },
        methods: {
            showModal(){
                    this.$buefy.modal.open({
                        parent: this,
                        component: AddPost,
                        // hasModalCard: true,
                        // customClass: 'custom-class custom-class-2',
                        trapFocus: true
                    })

            },


        }
    }
</script>

