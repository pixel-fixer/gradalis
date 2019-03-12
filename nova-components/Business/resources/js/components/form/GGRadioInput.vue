<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label label_req"><span>{{label}}</span></label>
            <div class="control is-size-875">
                <label class="radio h3" v-for="(item, index) in list">
                    <input type="radio"
                           :name="name"
                           :value="item.value"
                           v-model="inputValue">
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
