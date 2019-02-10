<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label">{{label}}</label>
            <div :class="{iconRight:'has-icons-right has-icons-right_1',iconLeft:'has-icons-left has-icons-left_1'}"
                 class="control">
                <textarea type="text"
                          class="textarea is-size-875"
                          v-model="inputValue"
                          @input="inputChange"
                          :placeholder="placeholder">
                </textarea>
                <slot v-if="iconLeft" name="icon-left">
                    <div class="icons is-left">
                          <span class="icon is-small">
                            <img src="/svg/icons/ic_search.svg" class="svg" alt="">
                          </span>
                    </div>
                </slot>
                <slot v-if="iconRight" name="icon-right">
                    <div class="icons is-right">
                          <span class="icon is-small" v-tooltip="steps[1].form.nameLegalEntity.tooltip">
                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                          </span>
                    </div>
                </slot>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "GGTextInput",
        props: {
            iconLeft: {default: false},
            iconRight: {default: false},
            size: {default: 'is-3'},
            value: '',
            label: '',
            placeholder: {default: 'Поиск'}
        },
        data(){
          return{
              inputValue:null
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
            inputChange() {
                this.$emit('input', this.inputValue);
            }
        }
    }
</script>

<style scoped>

</style>
