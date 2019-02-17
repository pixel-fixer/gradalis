<template>
    <div :class="size" class="column">
        <div class="field mt-2-5">
            <div class="control">
                <label class="checkbox is-info is-size-875 h3">
                    <input type="checkbox" v-model="inputValue" @change="inputChange">
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
        data() {
            return {
                inputValue: null,
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.inputValue);
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    this.inputValue = value;
                }
            }
        }
    }
</script>

<style scoped>

</style>
