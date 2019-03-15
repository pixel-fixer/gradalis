<template>
    <div v-if="errors" style="color: red;font-size: 12px;" class="form-errors">
        <p v-for="field in errors" class="form-errors__field">
            <span v-for="err in field" class="form-errors__field__error">{{err}} </span>
        </p>
    </div>
</template>

<script>
    export default{
        props: ['errors']
    }
</script>