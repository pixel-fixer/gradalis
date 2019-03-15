<template>
    <div>
        <heading class="mb-6">Business</heading>

        <card class="bg-90 flex flex-col items-center justify-center" style="min-height: 300px">
            <form-add-business></form-add-business>
        </card>
    </div>
</template>

<script>
    import FormAddBusiness from './FormAddBusiness'

    export default {
        components: {
            FormAddBusiness
        },
        mounted() {
            //
        },
    }
</script>

<style>
    /* Scoped Styles */
</style>
