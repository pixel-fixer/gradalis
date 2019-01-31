<template>
    <div class="stepper">
        <!--<v-stepper ref="stepper" :steps="steps" v-model="step">-->
        <!--<template>-->
        <!--<template slot="step-1-index" slot-scope="scope">-->
        <!--<div class="step-index"><span v-tooltip="'Основная информация'">{{ scope.displayIndex }}</span></div>-->
        <!--</template>-->
        <!--<template slot="step-1"> step 1 title</template>-->
        <!--</template>-->
        <!--<template>-->
        <!--<template slot="step-2-index" slot-scope="scope">-->
        <!--<div class="step-index"> {{ scope.displayIndex }}</div>-->
        <!--</template>-->
        <!--<template slot="step-2"> step 2 title</template>-->
        <!--</template>-->
        <!--<template>-->
        <!--<template slot="step-3-index" slot-scope="scope">-->
        <!--<div class="step-index"> {{ scope.displayIndex }}</div>-->
        <!--</template>-->
        <!--<template slot="step-3"> step 2 title</template>-->
        <!--</template>-->


        <!--</v-stepper>-->


        <div class="stepper__nav is-hidden-mobile">
            <template v-for="(item, index) in steps">
                <div class="stepper__nav__item" :class="{ 'is-active' : item.active, 'is-ok' : item.success }">
                    <div class="stepper__nav__item__button" v-tooltip="item.title" @click="toggleStep(index)">
                        {{index}}
                    </div>
                    <div class="stepper__nav__item__title">{{item.title}}</div>
                </div>
            </template>
        </div>

        <div class="stepper__nav stepper__nav_mobile is-hidden-tablet">
            <div class="stepper__nav__item is-active">
                <div class="stepper__nav__item__button">
                    {{step}}/8
                </div>
                <div class="stepper__nav__item__title">{{steps[step].title}}</div>
            </div>
        </div>

        <template v-if="step === 1">
            <div class="box step">
                <div class="step__header">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_info.svg" alt="" class="svg"><span>{{steps[1].title}}</span>
                            </h3>
                        </div>
                        <div class="column is-6">
                            <div class="add-business__progress is-flex">
                                <figure>
                                    <img src="/svg/icons/ic_crown.svg" alt="" class="svg">
                                </figure>
                                <div class="add-business__progress__info">
                                    <div class="is-size-875">Успех на продажу бизнеса</div>
                                    <div class="progress-wrap is-flex">
                                        <progress class="progress is-success is-small" value="4" max="100"></progress>
                                        <div class="has-text-success has-text-weight-bold percent">4.00%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.theme.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[1].form.theme.selected"
                                             :deselect-label="steps[1].form.theme.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[1].form.theme.placeholder"
                                             :options="steps[1].form.theme.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="steps[1].form.theme.selectLabel"
                                             :selectedLabel="steps[1].form.theme.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.country.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[1].form.country.selected"
                                             :deselect-label="steps[1].form.country.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[1].form.country.placeholder"
                                             :options="steps[1].form.country.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="steps[1].form.country.selectLabel"
                                             :selectedLabel="steps[1].form.country.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.region.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[1].form.region.selected"
                                             :deselect-label="steps[1].form.region.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[1].form.region.placeholder"
                                             :options="steps[1].form.region.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="steps[1].form.region.selectLabel"
                                             :selectedLabel="steps[1].form.region.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.city.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[1].form.city.selected"
                                             :deselect-label="steps[1].form.city.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[1].form.city.placeholder"
                                             :options="steps[1].form.city.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="steps[1].form.city.selectLabel"
                                             :selectedLabel="steps[1].form.city.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>

                    <div class="column is-12">
                        <div class="columns is-multiline address-wrap"
                             v-for="(item, index) in steps[1].form.addresses.list">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[1].form.addresses.list[index].address.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875" name="input_ir"
                                               v-model="steps[1].form.addresses.list[index].address.value"
                                               :placeholder="steps[1].form.addresses.list[index].address.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.addresses.tooltipAddress">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="columns is-multiline">
                                    <div class="column">
                                        <div class="columns is-multiline">
                                            <div class="column is-3">
                                                <div class="field">
                                                    <label
                                                        class="label label_req no-wrap"><span>{{steps[1].form.addresses.list[index].numberHouse.title}}</span></label>
                                                    <div class="control">
                                                        <input type="text"
                                                               class="input is-size-875"
                                                               v-model="steps[1].form.addresses.list[index].numberHouse.value"
                                                               :placeholder="steps[1].form.addresses.list[index].numberHouse.placeholder"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-3">
                                                <div class="field">
                                                    <label
                                                        class="label label_req no-wrap"><span>{{steps[1].form.addresses.list[index].housingHouse.title}}</span></label>
                                                    <div class="control">
                                                        <input type="text"
                                                               class="input is-size-875"
                                                               v-model="steps[1].form.addresses.list[index].housingHouse.value"
                                                               :placeholder="steps[1].form.addresses.list[index].housingHouse.placeholder"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-3">
                                                <div class="field">
                                                    <label
                                                        class="label label_req no-wrap"><span>{{steps[1].form.addresses.list[index].numberOffice.title}}</span></label>
                                                    <div class="control">
                                                        <input type="text"
                                                               class="input is-size-875"
                                                               v-model="steps[1].form.addresses.list[index].numberOffice.value"
                                                               :placeholder="steps[1].form.addresses.list[index].numberOffice.placeholder"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-3">
                                                <div class="field">
                                                    <label
                                                        class="label label_req no-wrap"><span>{{steps[1].form.addresses.list[index].index.title}}</span></label>
                                                    <div class="control">
                                                        <input type="text"
                                                               class="input is-size-875"
                                                               v-model="steps[1].form.addresses.list[index].index.value"
                                                               :placeholder="steps[1].form.addresses.list[index].index.placeholder"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-narrow">
                                        <button class="button is-warning is-outlined button-remove"
                                                v-tooltip="'Удалить этот адрес'"
                                                @click="removeAddress(index)">
                                            &times;
                                        </button>
                                        <button class="button is-info is-outlined button-add"
                                                v-tooltip="'Добавить еще один адрес'"
                                                @click="addAddress">
                                            +
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.nameLegalEntity.title}}</span></label>
                            <div class="control has-icons-right has-icons-right_1">
                                <input type="text"
                                       class="input is-size-875" name="input_ir"
                                       v-model="steps[1].form.nameLegalEntity.value"
                                       :placeholder="steps[1].form.nameLegalEntity.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.nameLegalEntity.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.nameBusiness.title}}</span></label>
                            <div class="control has-icons-right has-icons-right_1">
                                <input type="text"
                                       class="input is-size-875" name="input_ir"
                                       v-model="steps[1].form.nameBusiness.value"
                                       :placeholder="steps[1].form.nameBusiness.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.nameBusiness.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.partBusiness.title}}</span></label>
                            <div class="control is-size-875">
                                <label class="radio h3" v-for="(item, index) in steps[1].form.partBusiness.list">
                                    <input type="radio"
                                           :name="steps[1].form.partBusiness.name"
                                           :value="steps[1].form.partBusiness.list[index].value"
                                           v-model="steps[1].form.partBusiness.value">
                                    <span>{{steps[1].form.partBusiness.list[index].title}}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.numberShares.title}}</span></label>
                            <div class="control has-icons-right has-icons-right_2">
                                <input type="text"
                                       class="input is-size-875" name="input_ir"
                                       v-model="steps[1].form.numberShares.value"
                                       :placeholder="steps[1].form.numberShares.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.numberShares.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    <span class="icon is-small" v-tooltip="steps[1].form.numberShares.tooltipLock">
                                    <img src="/svg/icons/ic_lock.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-if="step === 2">
            <div class="box">
                Step 2 Content
            </div>
        </template>
        <template v-if="step === 3">
            <div class="box">
                Step 3 Content
            </div>
        </template>
        <template v-if="step === 4">
            <div class="box">
                Step 4 Content
            </div>
        </template>
        <template v-if="step === 5">
            <div class="box">
                Step 5 Content
            </div>
        </template>
        <template v-if="step === 6">
            <div class="box">
                Step 6 Content
            </div>
        </template>
        <template v-if="step === 7">
            <div class="box">
                Step 7 Content
            </div>
        </template>
        <template v-if="step === 8">
            <div class="box">
                Step 8 Content
            </div>
        </template>

        <!-- Stepper Controls -->
        <!--<button type="button" @click="$refs.stepper.previous()">Previous</button>-->
        <!--<button type="button" @click="$refs.stepper.next()">Next</button>-->
        <!--<button type="button" @click="$refs.stepper.reset()">Reset</button>-->
    </div>
</template>

<script>
    import {VStepper} from 'vue-stepper-component'
    import Multiselect from 'vue-multiselect'
    import vueSlider from 'vue-slider-component';

    export default {
        name: "form-add-bussines",
        components: {
            VStepper, Multiselect, vueSlider
        },
        data() {
            return {
                // steps: 3,
                step: 1,
                steps: {
                    1: {
                        title: "Основная информация",
                        active: true,
                        success: false,
                        form: {
                            theme: {
                                selected: null,
                                title: 'Тематика безнеса',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: [
                                    {id: '1', name: 'Item 1'},
                                    {id: '2', name: 'Item 2'},
                                    {id: '3', name: 'Item 3'},
                                    {id: '4', name: 'Item 4'},
                                    {id: '5', name: 'Item 5'},
                                    {id: '6', name: 'Item 6'},
                                ]
                            },
                            country: {
                                selected: null,
                                title: 'Страна',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: [
                                    {id: '1', name: 'Item 1'},
                                    {id: '2', name: 'Item 2'},
                                    {id: '3', name: 'Item 3'},
                                    {id: '4', name: 'Item 4'},
                                    {id: '5', name: 'Item 5'},
                                    {id: '6', name: 'Item 6'},
                                ]
                            },
                            region: {
                                selected: null,
                                title: 'Регион',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: [
                                    {id: '1', name: 'Item 1'},
                                    {id: '2', name: 'Item 2'},
                                    {id: '3', name: 'Item 3'},
                                    {id: '4', name: 'Item 4'},
                                    {id: '5', name: 'Item 5'},
                                    {id: '6', name: 'Item 6'},
                                ]
                            },
                            city: {
                                selected: null,
                                title: 'Город',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: [
                                    {id: '1', name: 'Item 1'},
                                    {id: '2', name: 'Item 2'},
                                    {id: '3', name: 'Item 3'},
                                    {id: '4', name: 'Item 4'},
                                    {id: '5', name: 'Item 5'},
                                    {id: '6', name: 'Item 6'},
                                ]
                            },
                            addresses: {
                                tooltipAddress: "Tooltip text",
                                list: [
                                    {
                                        address: {
                                            title: 'Адрес бизнеса',
                                            placeholder: 'Укажите адрес',
                                            value: '',
                                        },
                                        numberHouse: {
                                            title: 'Номер дома',
                                            placeholder: '№',
                                            value: '',
                                        },
                                        housingHouse: {
                                            title: 'Корпус дома',
                                            placeholder: 'Корпус',
                                            value: '',
                                        },
                                        numberOffice: {
                                            title: 'Номер офиса',
                                            placeholder: '№',
                                            value: '',
                                        },
                                        index: {
                                            title: 'Индекс',
                                            placeholder: '01001',
                                            value: '',
                                        }
                                    },
                                ],
                            },
                            nameLegalEntity: {
                                title: 'Название юр.лица',
                                placeholder: 'Укажите название',
                                value: '',
                                tooltip: 'tooltip text'
                            },
                            nameBusiness: {
                                title: 'Название бизнеса',
                                placeholder: 'Укажите название',
                                value: '',
                                tooltip: 'tooltip text'
                            },
                            partBusiness: {
                                title: 'Продается весь бизнес?',
                                name: 'partBusiness',
                                value: 'part',
                                list: [
                                    {
                                        title: 'Весь бизнес',
                                        value: 'all'
                                    },
                                    {
                                        title: 'Доля компании',
                                        value: 'part'
                                    },
                                    {
                                        title: 'Акции компании',
                                        value: 'stock'
                                    }
                                ]
                            },
                            numberShares: {
                                title: 'Количество долей или акций',
                                placeholder: '75%',
                                value: '',
                                tooltip: 'tooltip text',
                                tooltipLock: 'tooltip lock',

                            },
                        }
                    },
                    2:
                        {
                            title: "Финансовые показатели",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                    3:
                        {
                            title: "Недвижимость",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                    4:
                        {
                            title: "Бизнес-процессы",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                    5:
                        {
                            title: "Материальные активы",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                    6:
                        {
                            title: "Нематериальные активы",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                    7:
                        {
                            title: "Целевая аудитория",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                    8:
                        {
                            title: "Юридическое состояние",
                            active:
                                false,
                            success:
                                false
                        }
                    ,
                }
            }
        },
        methods: {
            submit() {
                console.log('submit!');
            },
            toggleStep(index) {
                let vm = this;

                Object.keys(this.steps).forEach(function (item) {
                    // console.log(item); // key
                    // console.log(vm.steps[item]); // value
                    vm.steps[item].active = false;
                });

                // console.log(index);
                this.step = parseInt(index, 10);

                this.steps[index].active = true;
            },
            addAddress() {
                this.steps[1].form.addresses.list.push({
                    address: {
                        title: 'Адрес бизнеса',
                        placeholder: 'Укажите адрес',
                        value: '',
                    },
                    numberHouse: {
                        title: 'Номер дома',
                        placeholder: '№',
                        value: '',
                    },
                    housingHouse: {
                        title: 'Корпус дома',
                        placeholder: 'Корпус',
                        value: '',
                    },
                    numberOffice: {
                        title: 'Номер офиса',
                        placeholder: '№',
                        value: '',
                    },
                    index: {
                        title: 'Индекс',
                        placeholder: '01001',
                        value: '',
                    }
                });
            },
            removeAddress(index) {
                this.steps[1].form.addresses.list.splice(index, 1);
            }
        }
    }
</script>

<style scoped>

</style>
