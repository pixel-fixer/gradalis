<template>
    <button
       @click="reserve"
       class="button is-success is-outlined is-fullwidth has-text-weight-bold is-size-875">{{trans('strings.reserve')}}
    </button>
</template>

<script>

    export default {
        name:'ReserveButton',
        props: {
            id:{type:Number,default:null},
            url:{type:String,default:null}
        },
        components: {

        },
        data() {
            return {
                reserved:false
            }
        },
        methods: {
            reserve(){
                axios.post(this.url,{id:this.id})
                    .then(response =>{
                        //this.reserved = true
                        this.$swal({ type: 'success', title: 'Объект успешно забронирован'});
                    });
            }
        },
    }
</script>

<style scoped>

</style>
