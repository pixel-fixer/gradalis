<template>
    <div class="column is-3">
        <div class="field">
            <label class="label">{{label}}</label>
            <div class="dropdown is-flex is-full">
                <div class="dropdown-trigger">
                    <div class="input inputbox-val is-size-875" aria-haspopup="true"
                         aria-controls="dropdown-profit">
                        <span v-show="empty">{{placeholder}}</span>
                        <span v-show="!empty" class="has-text-basic">{{'от '+setValue[0]+ ' до ' + setValue[1]}}</span>

                        <div class="multiselect__select"></div>
                    </div>

                </div>
                <div class="dropdown-menu" id="dropdown-profit" role="menu">
                    <div class="dropdown-content">
                        <div class="dropdown-item">
                            <label class="label"><span>{{label}}</span></label>
                            <div class="field has-addons has-slider">
                                <p class="control control-text-left control-text-left_3em">
                                    <input type="number" class="input is-size-875"
                                           v-model="setValue[0]">
                                    <span class="text is-left is-size-875">от </span>
                                </p>
                                <p class="control control-text-left control-text-left_3em">
                                    <input type="number" class="input is-size-875"
                                           v-model="setValue[1]"
                                    >
                                    <span class="text is-left is-size-875">до </span>
                                </p>
                            </div>
                            <vue-slider v-model="setValue"
                                        :tooltip="optionSlider.tooltip"
                                        :min="optionSlider.min"
                                        :max="optionSlider.max">

                            </vue-slider>
                        </div>
                        <hr class="dropdown-divider">
                        <div class="dropdown-item">
                            <div class="buttons">
                                <div v-for="addItem in addValues" class="button is-light-cyan is-size-875"
                                     @click="setValue = addItem.value">{{addItem.text}}</div>
                            </div>
                        </div>
                        <hr class="dropdown-divider">
                        <div class="dropdown-item">
                            <div class="buttons">
                                <div class="button is-size-875 is-info h-3 has-text-weight-bold is-flex-1"
                                     @click="rangeChange">
                                    Применить
                                </div>
                                <div class="button is-clear is-clear_close is-size-875 h-3"
                                     @click="empty = true">
                                    <span class="icon-close">×</span>
                                    <span class="has-text-decoration-underline">Очистить</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueSlider from 'vue-slider-component';
    export default {
        components: {VueSlider},
        name: "GGRangeSlider",
        props: {
            min:{default: 0},
            max:{default: 50000000},

            value:null,
            adds:{},
            label: '',
            placeholder: '',
        },
        data() {
            return {
                setValue: [
                    this.min,
                    this.max
                ],
                addValues: this.adds,
                optionSlider: {
                    tooltip: false,
                    min: this.min,
                    max: this.max
                },
                empty:{default: true}
            }
        },
        methods: {
            rangeChange(e) {
                this.empty = false;
                // e.target.closest('.dropdown').classList.remove("is-active");
                // console.log(e.target.closest('.dropdown'));
                this.$emit('input', this.setValue);
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    if(value === null){
                        this.empty = true;
                    }else{
                        this.setValue = value;
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
