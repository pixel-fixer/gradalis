<template>
    <div v-if="errors" style="color: red;font-size: 12px;">
        <p v-for="field in errors">
            <span v-for="err in field">{{err}} </span>
        </p>
    </div>
</template>

<script>
    export default{
        props: ['errors']
    }
</script>