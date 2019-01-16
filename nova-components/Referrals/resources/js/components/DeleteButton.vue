<template>
    <button @click="deleteUser">
        <slot>'<button class="btn btn-danger" data-url=""><i class="fa fa-trash"></i></button> &nbsp;</slot>
    </button>
</template>

<script>
    export default{
        props: ['id', 'type'],
        methods: {
            deleteUser() {
                alert(`I am ${this.name}!`)
            }
        },
    }
</script>
