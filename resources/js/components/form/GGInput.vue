<template>
    <div :class="size" class="column">
        <label class="label" :class="{ 'label_req': required }"><span>{{label}}</span></label>
        <div :class="{'has-addons':prevText}" class="field">

            <p v-if="prevText" class="control">
                <span class="button is-static is-size-875">
                   {{prevText}}
                </span>
            </p>
            <div
                :class="{'is-expanded':prevText,'has-icons-right has-icons-right_1':iconRight,'has-icons-left has-icons-left_1':iconLeft}"
                class="control">

                <input :type="type"
                       class="input is-size-875"
                       v-model="inputValue"
                       @input="inputChange"
                       v-on:keydown="keyMonitor"
                       :required="required ? true: false"
                       :placeholder="placeholder">

                <div v-if="iconLeft" class="icons is-left">
                  <span class="icon is-small">
                    <img :src="iconLeft" class="svg" alt="">
                  </span>
                </div>

                <div v-if="iconRight" class="icons is-right">
                  <span class="icon is-small" v-tooltip="tooltip">
                    <img :src="iconRight" class="svg" alt="">
                  </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "GGInput",
        props: {
            type: {default: 'text'},
            iconLeft: {default: null},
            iconRight: {default: null},
            prevText: {default: null},
            size: {default: 'is-3'},
            tooltip: {default: null},
            value: '',
            label: '',
            placeholder: {default: 'Поиск'},
            required: {default: false},
        },
        data() {
            return {
                inputValue: null
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    this.inputValue = value;
                }
            }
        },
        methods: {
            keyMonitor(event) {
                if (this.type === 'number') {
                    if (event.keyCode == 69 || event.keyCode == 189 || event.keyCode == 188 || event.keyCode == 190 || event.keyCode == 187)
                        event.preventDefault();
                }
            },

            inputChange() {
                this.$emit('input', this.inputValue);
            }
        }
    }
</script>

<style scoped>

</style>
