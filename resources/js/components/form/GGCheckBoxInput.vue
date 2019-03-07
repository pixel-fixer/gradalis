<template>
    <div :class="size" class="column is-flex has-align-items-end">
        <div class="field">
            <div class="control">
                <label class="checkbox is-info is-size-875 h3">
                    <input type="checkbox" v-model="inputValue">
                    <span>{{label}}</span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "GGCheckBoxInput",
        props: {
            size: {default: 'is-6'},
            value: {default: null},
            label: '',
        },
        computed: {
            inputValue: {
                get: function () {
                    return this.value
                },
                set: function (value) {
                    this.$emit('input', value);
                },
            }
        },
    }
</script>

<style scoped>

</style>
