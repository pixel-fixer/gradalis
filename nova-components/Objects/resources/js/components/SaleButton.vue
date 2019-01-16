<template>
    <div>
        <button class="btn btn-default btn-icon bg-primary" @click="saleObject">
            <slot>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-11v2h1a3 3 0 0 1 0 6h-1v1a1 1 0 0 1-2 0v-1H8a1 1 0 0 1 0-2h3v-2h-1a3 3 0 0 1 0-6h1V6a1 1 0 0 1 2 0v1h3a1 1 0 0 1 0 2h-3zm-2 0h-1a1 1 0 1 0 0 2h1V9zm2 6h1a1 1 0 0 0 0-2h-1v2z"/></svg>
            </slot>
        </button>
    </div>
</template>

<script>

    export default {
        props: ['id', 'resource'],
        data() {
            return {
                info: null
            };
        },
        methods: {
            saleObject(lang) {
                console.log();
                axios.get('/nova-vendor/objects/sale', {params:{id: this.id, resource: this.resource}})
                    .then(
                        responce => {
                            window.$('#objects-table').DataTable().ajax.reload( null, false );
                        }
                    )
            }
        },
    }
</script>
