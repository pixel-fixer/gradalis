<template>
    <div >
        <button v-if="show" class="btn btn-default btn-icon bg-primary" @click="saleObject">
            <slot>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-11v2h1a3 3 0 0 1 0 6h-1v1a1 1 0 0 1-2 0v-1H8a1 1 0 0 1 0-2h3v-2h-1a3 3 0 0 1 0-6h1V6a1 1 0 0 1 2 0v1h3a1 1 0 0 1 0 2h-3zm-2 0h-1a1 1 0 1 0 0 2h1V9zm2 6h1a1 1 0 0 0 0-2h-1v2z"/></svg>
            </slot>
        </button>

        <button v-if="soldout" class="btn btn-disabled btn-default btn-icon bg-success">
            <slot>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.62 10H20a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H8.5c-1.2 0-2.3-.72-2.74-1.79l-3.5-7-.03-.06A3 3 0 0 1 5 9h5V4c0-1.1.9-2 2-2h1.62l4 8zM16 11.24L12.38 4H12v7H5a1 1 0 0 0-.93 1.36l3.5 7.02a1 1 0 0 0 .93.62H16v-8.76zm2 .76v8h2v-8h-2z"/></svg>
            </slot>
        </button>

        <button v-if="rejected" class="btn btn-disabled btn-default btn-icon bg-danger">
            <slot>
                <svg xmlns="http://www.w3.org/2000/svg"  class="fill-current text-white" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M4.93 19.07A10 10 0 1 1 19.07 4.93 10 10 0 0 1 4.93 19.07zm1.41-1.41A8 8 0 1 0 17.66 6.34 8 8 0 0 0 6.34 17.66zM13.41 12l1.42 1.41a1 1 0 1 1-1.42 1.42L12 13.4l-1.41 1.42a1 1 0 1 1-1.42-1.42L10.6 12l-1.42-1.41a1 1 0 1 1 1.42-1.42L12 10.6l1.41-1.42a1 1 0 1 1 1.42 1.42L13.4 12z"/></svg>
            </slot>
        </button>
    </div>
</template>

<script>

    export default {
        props: ['id', 'resource','status'],
        data() {
            return {
                info: null
            };
        },
        methods: {
            saleObject(lang) {
                axios.get('/nova-vendor/objects/sale', {params:{id: this.id, resource: this.resource}})
                    .then(
                        responce => {
                            window.$('#objects-table').DataTable().ajax.reload( null, false );
                        }
                    )
            }
        },
        computed:{
            show(){
                if(this.status === "Одобрен"){
                    return true;
                }
                return false;
            },
            rejected(){
                if(this.status === "Отклонен"){
                    return true;
                }
                return false;
            },
            soldout(){
                if(this.status === "Продан"){
                    return true;
                }
                return false;
            }
        }
    }
</script>
