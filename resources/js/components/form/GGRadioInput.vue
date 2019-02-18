<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label label_req"><span>{{label}}</span></label>
            <div class="control is-size-875">
                <label class="radio h3" v-for="(item, index) in list">
                    <input type="radio"
                           :name="name"
                           :value="item.value"
                           v-model="inputValue"
                           @click="inputChange">
                    <span>{{item.title}}</span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "GGRadioInput",
        props: {
            list: null,
            name: '',
            size: {default: 'is-6'},
            value: {default: null},

            label: '',
            placeholder: {default: 'Поиск'}
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
