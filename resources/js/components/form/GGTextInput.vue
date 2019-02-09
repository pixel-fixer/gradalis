<template>
    <div class="column is-3">
        <div class="field">
            <label class="label">{{label}}</label>
            <div class="control has-icons-left has-icons-left_1">
                <input type="text"
                       class="input is-size-875"
                       v-model="value"
                       @input="inputChange"
                       :placeholder="placeholder">
                <div class="icons is-left">
                      <span class="icon is-small">
                        <img src="/svg/icons/ic_search.svg" class="svg" alt="">
                      </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GGTextInput",
        props: {
            value: '',
            label:'',
            placeholder: {default: 'Поиск'}
        },
        methods: {
            inputChange() {
                this.$emit('input', this.value);
            }
        }
    }
</script>

<style scoped>

</style>
