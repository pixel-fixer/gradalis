<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label" :class="{ 'label_req': required }"><span>{{label}}</span></label>
            <div :class="{'has-icons-right has-icons-right_1':iconRight,'has-icons-left has-icons-left_1':iconLeft}"
                 class="control">
                <flat-pickr
                    class="input is-size-875"
                    v-model="inputValue"
                    :placeholder="placeholder"
                    :config="config"
                ></flat-pickr>
                <div v-if="iconLeft" class="icons is-left">
                      <span class="icon is-small">
                        <img :src="iconLeft" class="svg" alt="">
                      </span>
                </div>

                <div v-if="iconRight" class="icons is-right">
                      <span class="icon is-small" v-tooltip="steps[1].form.nameLegalEntity.tooltip">
                        <img :src="iconRight" class="svg" alt="">
                      </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import flatPickr from 'vue-flatpickr-component';
    export default {
        name: "GGDateInput",
        components:{flatPickr},
        props: {
            iconLeft: {default: '/svg/icons/ic_calendar.svg'},
            iconRight: {default: null},
            size: {default: 'is-6'},
            value: {default:null},
            label: '',
            config:{
                default: function () {
                    return {
                        altFormat: 'd.m.Y',
                        altInput: true,
                        dateFormat: 'Y-m-d'
                    }
                }
            },
            placeholder: {default: 'Поиск'},
            required: {default: false},
        },
        data(){
          return{

          }
        },
        computed:{
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
