<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label label_req"><span>{{label}}</span></label>
            <div class="control is-size-875">
                <label class="radio h3" v-for="(item, index) in list">
                    <input type="radio"
                           :name="name"
                           :value="list[index].value"
                           v-model="value">
                    <span>{{list[index].title}}</span>
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
            value: '',
            label: '',
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
