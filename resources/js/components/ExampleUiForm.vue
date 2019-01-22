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
        </form>
    </div>
</template>

<script>
    import {required, minLength} from 'vuelidate/lib/validators'
    import Multiselect from 'vue-multiselect'

    export default {
        name: "ExampleUiForm",
        components: {Multiselect},
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
                    }
                },
                name: "",

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
