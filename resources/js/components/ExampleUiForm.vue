<template>
    <div>
        <form @submit.prevent="submit" v-if="show" class="form form-filter-objects">
            <div class="columns is-multiline">
                <div class="column is-3">
                    <div class="field">
                        <label class="label label_req"><span>Input</span></label>
                        <div class="control">
                            <input id="input" type="text"
                                   class="input is-size-875" name="input"
                                   :value="form.input.value"
                                   :placeholder="form.input.placeholder"
                            >
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Input Icon Left</span></label>
                        <div class="control has-icons-left has-icons-left_1">
                            <input id="input_2" type="text"
                                   class="input is-size-875" name="input_2"
                                   :value="form.input.value"
                                   :placeholder="form.input.placeholder"
                            >
                            <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_search.svg" class="svg" alt="">
                                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Input disabled</span></label>
                        <div class="control">
                            <input id="input_disabled" type="text" disabled
                                   class="input is-size-875" name="input_disabled"
                                   :value="form.input.value"
                                   :placeholder="form.input.placeholder"
                            >
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Input error</span></label>
                        <div class="control">
                            <input id="input_error" type="text"
                                   class="input is-size-875 is-danger has-text-danger" name="input_error"
                                   value="Error data"
                                   :placeholder="form.input.placeholder"
                            >
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label label_req"><span>Input Validation</span></label>
                        <div class="control">
                            <input id="input_validation"
                                   :class="{ 'is-danger has-text-danger': $v.form.name.value.$error }"
                                   type="text"
                                   class="input is-size-875" name="input_validation"
                                   v-model.trim="$v.form.name.value.$model"
                                   :placeholder="form.name.placeholder"
                                   v-tooltip="{
                                        content: errorMessageName($v.form.name.value),
                                        classes: 'is-warning',
                                        show: $v.form.name.value.$error,
                                        trigger: 'manual',
                                        placement: 'top-end',
                                        popoverArrowClass: 'right'
                                   }"
                            >
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Input 1 Icon Right</span></label>
                        <div class="control has-icons-right has-icons-right_1">
                            <input id="input_ir" type="text"
                                   class="input is-size-875" name="input_ir"
                                   :value="form.input.value"
                                   :placeholder="form.input.placeholder"
                            >
                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="'Tooltip 1'">
                                    <img src="/svg/icons/ic_globe.svg" class="svg" alt="">
                                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Input 2 Icons Right</span></label>
                        <div class="control has-icons-right has-icons-right_2">
                            <input id="input_ir2" type="text"
                                   class="input is-size-875" name="input_ir2"
                                   :value="form.input.value"
                                   :placeholder="form.input.placeholder"
                            >
                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="'Tooltip 1'">
                                    <img src="/svg/icons/ic_globe.svg" class="svg" alt="">
                                  </span>
                                <span class="icon is-small" v-tooltip="'Tooltip 2'">
                                    <img src="/svg/icons/ic_home.svg" class="svg" alt="">
                                  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns is-multiline">
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Select</span></label>
                        <div class="control">
                            <multiselect v-model="form.select.selected"
                                         :deselect-label="form.select.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         openDirection="bottom"
                                         :placeholder="form.select.placeholder"
                                         :options="form.select.options"
                                         :searchable="true"
                                         :allow-empty="false"
                                         :selectLabel="form.select.selectLabel"
                                         :selectedLabel="form.select.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Multi Select</span></label>
                        <div class="control">
                            <multiselect v-model="form.multiselect.selected"
                                         :deselect-label="form.multiselect.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         openDirection="bottom"
                                         :multiple="true"
                                         :class="'multiselect_multiple'"
                                         :placeholder="form.multiselect.placeholder"
                                         :options="form.multiselect.options"
                                         :searchable="true"
                                         :close-on-select="false"
                                         :allow-empty="true"
                                         :selectLabel="form.multiselect.selectLabel"
                                         :selectedLabel="form.multiselect.selectedLabel">
                                <span slot="noResult">Ничего не найдено</span>
                            </multiselect>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="columns is-multiline">
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Range From To</span></label>
                        <div class="field has-addons has-slider">
                            <p class="control control-text-left control-text-left_3em">
                                <input type="number" class="input is-size-875" v-model="form.rangeFromTo[0]">
                                <span class="text is-left is-size-875">от €</span>
                            </p>
                            <p class="control control-text-left control-text-left_3em">
                                <input type="number" class="input is-size-875" v-model="form.rangeFromTo[1]">
                                <span class="text is-left is-size-875">до €</span>
                            </p>
                        </div>
                        <vue-slider v-model="form.rangeFromTo"
                                    :tooltip="optionSliderRangeFromTo.tooltip"
                                    :min="optionSliderRangeFromTo.min"
                                    :max="optionSliderRangeFromTo.max">

                        </vue-slider>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Range From</span></label>
                        <div class="field has-slider">
                            <div class="control control-text-left control-text-left_3em">
                                <input id="inputRangeFrom" type="text"
                                       class="input is-size-875" name="inputRangeFrom"
                                       :value="form.rangeFrom"
                                >
                                <span class="text is-left is-size-875">от €</span>
                            </div>
                        </div>
                        <vue-slider v-model="form.rangeFrom"
                                    :tooltip="optionSliderRangeFrom.tooltip"
                                    :min="optionSliderRangeFrom.min"
                                    :max="optionSliderRangeFrom.max">

                        </vue-slider>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Dropdown Range From To</span></label>
                        <div class="dropdown is-flex is-full">
                            <div class="dropdown-trigger">
                                <div class="input inputbox-val is-size-875" aria-haspopup="true"
                                     aria-controls="example-dropdown">
                                    <span v-show="form.rangeFromTo2.empty">Default text</span>
                                    <span v-show="!form.rangeFromTo2.empty" class="has-text-basic">{{'от €'+form.rangeFromTo2.value[0]+ ' до €' + form.rangeFromTo2.value[1]}}</span>

                                    <div class="multiselect__select"></div>
                                </div>

                            </div>
                            <div class="dropdown-menu" id="example-dropdown" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-item">
                                        <label class="label"><span>Range From To</span></label>
                                        <div class="field has-addons has-slider">
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.rangeFromTo2.value[0]">
                                                <span class="text is-left is-size-875">от €</span>
                                            </p>
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.rangeFromTo2.value[1]"
                                                >
                                                <span class="text is-left is-size-875">до €</span>
                                            </p>
                                        </div>
                                        <vue-slider v-model="form.rangeFromTo2.value"
                                                    :tooltip="optionSliderRangeFromTo2.tooltip"
                                                    :min="optionSliderRangeFromTo2.min"
                                                    :max="optionSliderRangeFromTo2.max">

                                        </vue-slider>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.rangeFromTo2.value = form.rangeFromTo2.valueUnto05">до
                                                €500 тыс.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.rangeFromTo2.value = form.rangeFromTo2.valueUnto1">до €1
                                                млн.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.rangeFromTo2.value = form.rangeFromTo2.valueUnto2">до €2
                                                млн.
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-size-875 is-info h-3 has-text-weight-bold is-flex-1"
                                                 @click="form.rangeFromTo2.empty = false">
                                                Применить
                                            </div>
                                            <div class="button is-clear is-clear_close is-size-875 h-3"
                                                 @click="form.rangeFromTo2.empty = true">
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
                <div class="column is-3">
                    <div class="field">
                        <label class="label"><span>Dropdown Range From</span></label>
                        <div class="dropdown is-flex is-full">
                            <div class="dropdown-trigger">
                                <div class="input inputbox-val is-size-875" aria-haspopup="true"
                                     aria-controls="example-dropdown-2">
                                    <span v-show="form.rangeFromDropdown.empty">Default text</span>
                                    <span v-show="!form.rangeFromDropdown.empty" class="has-text-basic">{{'от €'+form.rangeFromDropdown.value}}</span>

                                    <div class="multiselect__select"></div>
                                </div>

                            </div>
                            <div class="dropdown-menu" id="example-dropdown-2" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-item">
                                        <label class="label"><span>Range From</span></label>
                                        <div class="field has-slider">
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.rangeFromDropdown.value">
                                                <span class="text is-left is-size-875">от €</span>
                                            </p>
                                        </div>
                                        <vue-slider v-model="form.rangeFromDropdown.value"
                                                    :tooltip="optionSliderRangeFromDropdown.tooltip"
                                                    :min="optionSliderRangeFromDropdown.min"
                                                    :max="optionSliderRangeFromDropdown.max">

                                        </vue-slider>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.rangeFromDropdown.value = form.rangeFromDropdown.valueFrom01">от
                                                €100 тыс.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.rangeFromDropdown.value = form.rangeFromDropdown.valueFrom02">от
                                                €200 тыс.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.rangeFromDropdown.value = form.rangeFromDropdown.valueFrom05">от
                                                €500 тыс.
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-size-875 is-info h-3 has-text-weight-bold is-flex-1"
                                                 @click="form.rangeFromDropdown.empty = false">
                                                Применить
                                            </div>
                                            <div class="button is-clear is-clear_close is-size-875 h-3"
                                                 @click="form.rangeFromDropdown.empty = true">
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
            </div>
        </form>
    </div>
</template>

<script>
    import {required, minLength} from 'vuelidate/lib/validators'
    import Multiselect from 'vue-multiselect'
    import vueSlider from 'vue-slider-component';

    export default {
        name: "ExampleUiForm",
        components: {Multiselect, vueSlider},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],
                modalCategoryShow: false,
                form: {
                    select: {
                        selected: null,
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Москва'},
                            {id: '2', name: 'Белгород'},
                            {id: '3', name: 'Воронеж'},
                            {id: '4', name: 'Казань'},
                            {id: '5', name: 'Варшава'},
                            {id: '6', name: 'Краков'},
                        ]
                    },
                    multiselect: {
                        selected: null,
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Москва'},
                            {id: '2', name: 'Белгород'},
                            {id: '3', name: 'Воронеж'},
                            {id: '4', name: 'Казань'},
                            {id: '5', name: 'Варшава'},
                            {id: '6', name: 'Краков'},
                        ]
                    },

                    input: {
                        placeholder: 'Placeholder',
                        value: '',
                    },
                    name: {
                        placeholder: 'Placeholder',
                        value: '',
                        messages: {
                            errorRequired: 'Это поле обязательно',
                            errorMinLength: 'Минимум 4 символа',
                        }
                    },

                    rangeFromTo: [
                        1000,
                        5000
                    ],

                    rangeFromTo2: {
                        value: [
                            10000,
                            500000
                        ],
                        valueUnto05: [
                            0,
                            500000
                        ],
                        valueUnto1: [
                            0,
                            1000000
                        ],
                        valueUnto2: [
                            0,
                            2000000
                        ],
                        empty: true
                    },
                    rangeFrom: 0,
                    rangeFromDropdown: {
                        value: 0,
                        valueFrom01: 100000,
                        valueFrom02: 200000,
                        valueFrom05: 500000,
                        empty: true
                    },
                },
                name: "",
                optionSliderRangeFromTo: {
                    tooltip: false,
                    min: 0,
                    max: 20000
                },
                optionSliderRangeFromTo2: {
                    tooltip: false,
                    min: 0,
                    max: 2000000
                },
                optionSliderRangeFrom: {
                    tooltip: false,
                    min: 0,
                    max: 200000
                },
                optionSliderRangeFromDropdown: {
                    tooltip: false,
                    min: 0,
                    max: 1000000
                },
                show: true,
            }
        },
        validations: {
            form: {
                name: {
                    value: {
                        required,
                        minLength: minLength(4)
                    }
                }
            }

        },
        methods: {
            submit() {
                console.log('submit!');
            },
            errorMessageName(error) {
                if (!error.minLength) {
                    return 'Минимальная длинна 4 символа';
                } else if (!error.required) {
                    return 'Поле обязательно';
                }
                ;
            }
        },
        computed: {
            // messages: function () {
            //     return {
            //         errorName: function () {
            //             if (this.$v.form.name.value.$error && !this.$v.form.name.value.required) {
            //                 return 'required';
            //             } else if (this.$v.form.name.value.$error && !this.$v.form.name.value.minLength) {
            //                 return 'minLength';
            //             }
            //         }
            //     };
            // },
            // modalCategoryActive:
        }
    }
</script>

<style scoped>

</style>
