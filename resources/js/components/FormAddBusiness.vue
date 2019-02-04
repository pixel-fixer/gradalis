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

        <div v-show="step === 1">
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
                                               class="input is-size-875"
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
                                                        class="label label_req"><span>{{steps[1].form.addresses.list[index].numberHouse.title}}</span></label>
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
                                                        class="label label_req"><span>{{steps[1].form.addresses.list[index].housingHouse.title}}</span></label>
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
                                                        class="label label_req"><span>{{steps[1].form.addresses.list[index].numberOffice.title}}</span></label>
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
                                                        class="label label_req"><span>{{steps[1].form.addresses.list[index].index.title}}</span></label>
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
                                            &times;<span class="is-size-875 is-hidden-tablet">Удалить этот адрес</span>
                                        </button>
                                        <button class="button is-info is-outlined button-add"
                                                v-tooltip="'Добавить еще один адрес'"
                                                @click="addAddress">
                                            +<span class="is-size-875 is-hidden-tablet">Добавить еще один адрес</span>
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
                                       class="input is-size-875"
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
                                       class="input is-size-875"
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
                                       class="input is-size-875"
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

                    <div class="column is-12">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[1].form.descriptionBusiness.title}}</span></label>
                            <div class="control has-icons-right has-icons-right_1">
                                <textarea class="textarea is-size-875" v-model="steps[1].form.descriptionBusiness.value"
                                          :placeholder="steps[1].form.descriptionBusiness.placeholder"></textarea>
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.descriptionBusiness.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[1].form.yearFoundationBusiness.title}}</span></label>
                            <div class="control has-icons-right has-icons-right_1 has-icons-left has-icons-left_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[1].form.yearFoundationBusiness.value"
                                       :placeholder="steps[1].form.yearFoundationBusiness.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.yearFoundationBusiness.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                                <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_calendar.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.reasonSale.title}}</span></label>
                            <div class="control has-icons-right has-icons-right_1">
                                <input type="text"
                                       class="input is-size-875"
                                       v-model="steps[1].form.reasonSale.value"
                                       :placeholder="steps[1].form.reasonSale.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[1].form.reasonSale.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-12">
                        <upload-photo-business></upload-photo-business>
                    </div>

                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.nameVideoReview.title}}</span></label>
                            <div class="control">
                                <input type="text"
                                       class="input is-size-875"
                                       v-model="steps[1].form.nameVideoReview.value"
                                       :placeholder="steps[1].form.nameVideoReview.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[1].form.nameVideoReview.title}}</span></label>
                            <div class="control">
                                <input type="text"
                                       class="input is-size-875"
                                       v-model="steps[1].form.linkVideoReview.value"
                                       :placeholder="steps[1].form.linkVideoReview.placeholder"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="field">
                            <div class="control">
                                <label class="checkbox is-info is-size-875" v-model="steps[1].form.accept.value">
                                    <input type="checkbox" name="remember">
                                    <span>Принимаю <a href="#" class="has-text-info is-link">условия данного раздела</a> и <a
                                        href="#" class="has-text-info is-link">договора о неразглашении (NDA)</a></span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="step__footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="buttons">
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                        @click="toggleStep(2)">
                                    <span>Шаг 2: Указать финансовые показатели</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3">
                                    <span class="has-text-decoration-underline">Отменить</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 2">
            <div class="box step">
                <div class="step__header">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_object_finance.svg" alt=""
                                     class="svg"><span>{{steps[2].title}}</span>
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
                                        <progress class="progress is-success is-small" value="10" max="100"></progress>
                                        <div class="has-text-success has-text-weight-bold percent">9.50%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns is-multiline">
                    <div class="column is-6">
                        <label class="label label_req"><span>{{steps[2].form.priceShares.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[2].form.priceShares.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.priceShares.value"
                                       :placeholder="steps[2].form.priceShares.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[2].form.priceShares.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6 is-paddingless"></div>
                    <div class="column is-6 ">
                        <label
                            class="label label_req"><span>{{steps[2].form.netAverageAnnualProfit.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[2].form.netAverageAnnualProfit.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.netAverageAnnualProfit.value"
                                       :placeholder="steps[2].form.netAverageAnnualProfit.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[2].form.netAverageAnnualProfit.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6 ">
                        <label
                            class="label label_req"><span>{{steps[2].form.netAverageQuarterlyProfit.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[2].form.netAverageQuarterlyProfit.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.netAverageQuarterlyProfit.value"
                                       :placeholder="steps[2].form.netAverageQuarterlyProfit.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[2].form.netAverageQuarterlyProfit.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6 ">
                        <label
                            class="label label_req"><span>{{steps[2].form.averageAnnualTurnover.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                    {{steps[2].form.averageAnnualTurnover.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.averageAnnualTurnover.value"
                                       :placeholder="steps[2].form.averageAnnualTurnover.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[2].form.averageAnnualTurnover.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6 ">
                        <label
                            class="label label_req"><span>{{steps[2].form.averageQuarterlyTurnover.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                 {{steps[2].form.averageQuarterlyTurnover.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.averageQuarterlyTurnover.value"
                                       :placeholder="steps[2].form.averageQuarterlyTurnover.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[2].form.averageQuarterlyTurnover.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6 ">
                        <label class="label label_req"><span>{{steps[2].form.costBusinessPerYear.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[2].form.costBusinessPerYear.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.costBusinessPerYear.value"
                                       :placeholder="steps[2].form.costBusinessPerYear.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[2].form.costBusinessPerYear.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-6 ">
                        <label
                            class="label label_req"><span>{{steps[2].form.costBusinessPerQuarter.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                  {{steps[2].form.costBusinessPerQuarter.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[2].form.costBusinessPerQuarter.value"
                                       :placeholder="steps[2].form.costBusinessPerQuarter.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[2].form.costBusinessPerQuarter.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-12">
                        <label class="label is-size-6"><span>{{steps[2].labelReturnInvestment}}</span></label>
                        <div class="columns is-multiline">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[2].form.positiveScenario.title}}</span></label>

                                    <div class="field has-addons">
                                        <p class="control">
                                            <span class="button is-static is-size-875">
                                              {{steps[2].form.positiveScenario.prevTxt}}
                                            </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_2">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[2].form.positiveScenario.value"
                                                   :placeholder="steps[2].form.positiveScenario.placeholder"
                                            >
                                            <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[2].form.positiveScenario.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                <div class="icon buttons-control-input-number">
                                                    <div class="plus" @click="steps[2].form.positiveScenario.value++">
                                                        <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                                    </div>
                                                    <div class="minus" @click="steps[2].form.positiveScenario.value--">
                                                        <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[2].form.negativeScenario.title}}</span></label>

                                    <div class="field has-addons">
                                        <p class="control">
                                            <span class="button is-static is-size-875">
                                              {{steps[2].form.negativeScenario.prevTxt}}
                                            </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_2">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[2].form.negativeScenario.value"
                                                   :placeholder="steps[2].form.negativeScenario.placeholder"
                                            >
                                            <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[2].form.negativeScenario.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                <div class="icon buttons-control-input-number">
                                                    <div class="plus" @click="steps[2].form.negativeScenario.value++">
                                                        <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                                    </div>
                                                    <div class="minus" @click="steps[2].form.negativeScenario.value--">
                                                        <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step__footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="buttons">
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                        @click="toggleStep(3)">
                                    <span>Шаг 3: Информация о недвижимости</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3" @click="toggleStep(1)">
                                    <span class="has-text-decoration-underline">Вернуться назад</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 3">
            <div class="box step px-0">
                <div class="px-1-5">
                    <div class="step__header">
                        <div class="columns is-multiline">
                            <div class="column is-6">
                                <h3><img src="/svg/icons/ic_object_building.svg" alt=""
                                         class="svg"><span>{{steps[3].title}}</span>
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
                                            <progress class="progress is-success is-small" value="16"
                                                      max="100"></progress>
                                            <div class="has-text-success has-text-weight-bold percent">15.35%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <div class="add-business__objects-list">
                            <div class="add-business__objects-item px-1-5"
                                 v-for="(item, index) in steps[3].form.objects">
                                <h3 class="mb-1">Объект №1</h3>
                                <div class="columns is-multiline address-wrap">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].categoryProperty.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].categoryProperty.selected"
                                                    :deselect-label="steps[3].form.objects[index].categoryProperty.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].categoryProperty.placeholder"
                                                    :options="steps[3].form.objects[index].categoryProperty.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].categoryProperty.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].categoryProperty.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].typeProperty.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].typeProperty.selected"
                                                    :deselect-label="steps[3].form.objects[index].typeProperty.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].typeProperty.placeholder"
                                                    :options="steps[3].form.objects[index].typeProperty.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].typeProperty.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].typeProperty.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <label
                                            class="label label_req"><span>{{steps[3].form.objects[index].numberSquareMeters.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[3].form.objects[index].numberSquareMeters.prevTxt}}
                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[3].form.objects[index].numberSquareMeters.value"
                                                       :placeholder="steps[3].form.objects[index].numberSquareMeters.placeholder"
                                                >
                                                <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[3].form.objects[index].numberSquareMeters.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column is-12">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].priceSquareMeters.title}}</span></label>
                                                <div class="columns is-multiline">
                                                    <div class="column is-6">
                                                        <div class="field has-addons">
                                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[3].form.objects[index].priceSquareMeters.prevTxt}}
                                                </span>
                                                            </p>
                                                            <div
                                                                class="control is-expanded has-icons-right has-icons-right_1">
                                                                <input type="number"
                                                                       class="input is-size-875"
                                                                       v-model="steps[3].form.objects[index].priceSquareMeters.value"
                                                                       :placeholder="steps[3].form.objects[index].priceSquareMeters.placeholder"
                                                                >
                                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[3].form.objects[index].priceSquareMeters.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column is-6">
                                                        <div class="field mt-2-5">
                                                            <div class="control">
                                                                <label class="checkbox is-info is-size-875 h3"
                                                                       v-model="steps[3].form.objects[index].priceIncludingVAT.value">
                                                                    <input type="checkbox">
                                                                    <span>{{steps[3].form.objects[index].priceIncludingVAT.title}}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-3">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].titleDocuments.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].titleDocuments.selected"
                                                    :deselect-label="steps[3].form.objects[index].titleDocuments.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].titleDocuments.placeholder"
                                                    :options="steps[3].form.objects[index].titleDocuments.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].titleDocuments.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].titleDocuments.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-3">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].restrictionsOperation.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].restrictionsOperation.selected"
                                                    :deselect-label="steps[3].form.objects[index].restrictionsOperation.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].restrictionsOperation.placeholder"
                                                    :options="steps[3].form.objects[index].restrictionsOperation.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].restrictionsOperation.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].restrictionsOperation.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label"><span>{{steps[3].form.objects[index].listRestrictionsOperation.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].listRestrictionsOperation.selected"
                                                    :deselect-label="steps[3].form.objects[index].listRestrictionsOperation.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :multiple="true"
                                                    :class="'multiselect_multiple'"
                                                    :placeholder="steps[3].form.objects[index].listRestrictionsOperation.placeholder"
                                                    :options="steps[3].form.objects[index].listRestrictionsOperation.options"
                                                    :searchable="true"
                                                    :close-on-select="false"
                                                    :allow-empty="true"
                                                    :selectLabel="steps[3].form.objects[index].listRestrictionsOperation.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].listRestrictionsOperation.selectedLabel">
                                                    <span slot="noResult">{{steps[3].form.objects[index].listRestrictionsOperation.noResult}}</span>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-3">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].refRegisterEstate.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].refRegisterEstate.selected"
                                                    :deselect-label="steps[3].form.objects[index].refRegisterEstate.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].refRegisterEstate.placeholder"
                                                    :options="steps[3].form.objects[index].refRegisterEstate.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].refRegisterEstate.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].refRegisterEstate.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-3">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].technicalPropertyPlan.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].technicalPropertyPlan.selected"
                                                    :deselect-label="steps[3].form.objects[index].technicalPropertyPlan.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].technicalPropertyPlan.placeholder"
                                                    :options="steps[3].form.objects[index].technicalPropertyPlan.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].technicalPropertyPlan.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].technicalPropertyPlan.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].coordinationRedevelopment.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].coordinationRedevelopment.selected"
                                                    :deselect-label="steps[3].form.objects[index].coordinationRedevelopment.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].coordinationRedevelopment.placeholder"
                                                    :options="steps[3].form.objects[index].coordinationRedevelopment.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].coordinationRedevelopment.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].coordinationRedevelopment.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].availabilityMortgage.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].availabilityMortgage.selected"
                                                    :deselect-label="steps[3].form.objects[index].availabilityMortgage.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].availabilityMortgage.placeholder"
                                                    :options="steps[3].form.objects[index].availabilityMortgage.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].availabilityMortgage.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].availabilityMortgage.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].totalAmountMortgage.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].totalAmountMortgage.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].totalAmountMortgage.value"
                                                               :placeholder="steps[3].form.objects[index].totalAmountMortgage.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].totalAmountMortgage.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].repaidAmountMortgage.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].repaidAmountMortgage.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].repaidAmountMortgage.value"
                                                               :placeholder="steps[3].form.objects[index].repaidAmountMortgage.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].repaidAmountMortgage.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].balanceMortgage.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].balanceMortgage.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].balanceMortgage.value"
                                                               :placeholder="steps[3].form.objects[index].balanceMortgage.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].balanceMortgage.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].monthlyPaymentMortgage.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].monthlyPaymentMortgage.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].monthlyPaymentMortgage.value"
                                                               :placeholder="steps[3].form.objects[index].monthlyPaymentMortgage.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].monthlyPaymentMortgage.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].finalPaymentMortgageDate.title}}</span></label>
                                            <div
                                                class="control has-icons-right has-icons-right_1 has-icons-left has-icons-left_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[3].form.objects[index].finalPaymentMortgageDate.value"
                                                       :placeholder="steps[3].form.objects[index].finalPaymentMortgageDate.placeholder"
                                                >
                                                <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[3].form.objects[index].finalPaymentMortgageDate.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                                </div>
                                                <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_calendar.svg" class="svg" alt="">
                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].availabilityLoanSecuredObject.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].availabilityLoanSecuredObject.selected"
                                                    :deselect-label="steps[3].form.objects[index].availabilityLoanSecuredObject.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].availabilityLoanSecuredObject.placeholder"
                                                    :options="steps[3].form.objects[index].availabilityLoanSecuredObject.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].availabilityLoanSecuredObject.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].availabilityLoanSecuredObject.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].totalAmountCredit.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].totalAmountCredit.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].totalAmountCredit.value"
                                                               :placeholder="steps[3].form.objects[index].totalAmountCredit.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].totalAmountCredit.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].repaidAmountCredit.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].repaidAmountCredit.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].repaidAmountCredit.value"
                                                               :placeholder="steps[3].form.objects[index].repaidAmountCredit.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].repaidAmountCredit.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].balanceCredit.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].balanceCredit.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].balanceCredit.value"
                                                               :placeholder="steps[3].form.objects[index].balanceCredit.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].balanceCredit.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="column is-6">
                                                <label class="label label_req"><span>{{steps[3].form.objects[index].monthlyPaymentCredit.title}}</span></label>
                                                <div class="field has-addons">
                                                    <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].monthlyPaymentCredit.prevTxt}}
                                        </span>
                                                    </p>
                                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].monthlyPaymentCredit.value"
                                                               :placeholder="steps[3].form.objects[index].monthlyPaymentCredit.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].monthlyPaymentCredit.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column is-6">
                                                <div class="field">
                                                    <label
                                                        class="label label_req"><span>{{steps[3].form.objects[index].finalPaymentCreditDate.title}}</span></label>
                                                    <div
                                                        class="control has-icons-right has-icons-right_1 has-icons-left has-icons-left_1">
                                                        <input type="number"
                                                               class="input is-size-875"
                                                               v-model="steps[3].form.objects[index].finalPaymentCreditDate.value"
                                                               :placeholder="steps[3].form.objects[index].finalPaymentCreditDate.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[3].form.objects[index].finalPaymentCreditDate.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                                        </div>
                                                        <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_calendar.svg" class="svg" alt="">
                                  </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-6">
                                                <div class="field">
                                                    <label
                                                        class="label label_req"><span>{{steps[3].form.objects[index].purposeCredit.title}}</span></label>
                                                    <div class="control">
                                                        <multiselect
                                                            v-model="steps[3].form.objects[index].purposeCredit.selected"
                                                            :deselect-label="steps[3].form.objects[index].purposeCredit.deselectLabel"
                                                            track-by="name"
                                                            label="name"
                                                            openDirection="bottom"
                                                            :placeholder="steps[3].form.objects[index].purposeCredit.placeholder"
                                                            :options="steps[3].form.objects[index].purposeCredit.options"
                                                            :searchable="true"
                                                            :allow-empty="false"
                                                            :selectLabel="steps[3].form.objects[index].purposeCredit.selectLabel"
                                                            :selectedLabel="steps[3].form.objects[index].purposeCredit.selectedLabel">
                                                            <template slot="singleLabel" slot-scope="{ option }">{{
                                                                option.name
                                                                }}
                                                            </template>
                                                        </multiselect>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].jointPropertyEstate.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].jointPropertyEstate.selected"
                                                    :deselect-label="steps[3].form.objects[index].jointPropertyEstate.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].jointPropertyEstate.placeholder"
                                                    :options="steps[3].form.objects[index].jointPropertyEstate.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].jointPropertyEstate.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].jointPropertyEstate.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].typeRelationshipCoowners.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[3].form.objects[index].typeRelationshipCoowners.selected"
                                                    :deselect-label="steps[3].form.objects[index].typeRelationshipCoowners.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[3].form.objects[index].typeRelationshipCoowners.placeholder"
                                                    :options="steps[3].form.objects[index].typeRelationshipCoowners.options"
                                                    :searchable="true"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[3].form.objects[index].typeRelationshipCoowners.selectLabel"
                                                    :selectedLabel="steps[3].form.objects[index].typeRelationshipCoowners.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <label
                                            class="label label_req"><span>{{steps[3].form.objects[index].monthlyUtilityCosts.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].monthlyUtilityCosts.prevTxt}}
                                        </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[3].form.objects[index].monthlyUtilityCosts.value"
                                                       :placeholder="steps[3].form.objects[index].monthlyUtilityCosts.placeholder"
                                                >
                                                <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].monthlyUtilityCosts.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <template>
                                        <!--Если аренда-->
                                        <div class="column is-6">
                                            <div class="field">
                                                <label
                                                    class="label label_req"><span>{{steps[3].form.objects[index].presenceChanging.title}}</span></label>
                                                <div class="control">
                                                    <multiselect
                                                        v-model="steps[3].form.objects[index].presenceChanging.selected"
                                                        :deselect-label="steps[3].form.objects[index].presenceChanging.deselectLabel"
                                                        track-by="name"
                                                        label="name"
                                                        openDirection="bottom"
                                                        :placeholder="steps[3].form.objects[index].presenceChanging.placeholder"
                                                        :options="steps[3].form.objects[index].presenceChanging.options"
                                                        :searchable="true"
                                                        :allow-empty="false"
                                                        :selectLabel="steps[3].form.objects[index].presenceChanging.selectLabel"
                                                        :selectedLabel="steps[3].form.objects[index].presenceChanging.selectedLabel">
                                                        <template slot="singleLabel" slot-scope="{ option }">{{
                                                            option.name }}
                                                        </template>
                                                    </multiselect>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].costChanging.title}}</span></label>
                                            <div class="field has-addons">
                                                <p class="control">
                                        <span class="button is-static is-size-875">
                                           {{steps[3].form.objects[index].costChanging.prevTxt}}
                                        </span>
                                                </p>
                                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                                    <input type="number"
                                                           class="input is-size-875"
                                                           v-model="steps[3].form.objects[index].costChanging.value"
                                                           :placeholder="steps[3].form.objects[index].costChanging.placeholder"
                                                    >
                                                    <div class="icons is-right">
                                          <span class="icon is-small"
                                                v-tooltip="steps[3].form.objects[index].costChanging.tooltip">
                                            <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                          </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label
                                                    class="label label_req"><span>{{steps[3].form.objects[index].leaseTermTo.title}}</span></label>
                                                <div
                                                    class="control has-icons-right has-icons-right_1 has-icons-left has-icons-left_1">
                                                    <input type="number"
                                                           class="input is-size-875"
                                                           v-model="steps[3].form.objects[index].leaseTermTo.value"
                                                           :placeholder="steps[3].form.objects[index].leaseTermTo.placeholder"
                                                    >
                                                    <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[3].form.objects[index].leaseTermTo.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                                    </div>
                                                    <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_calendar.svg" class="svg" alt="">
                                  </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[3].form.objects[index].houseBookNumber.title}}</span></label>
                                            <div class="control has-icons-right has-icons-right_1">
                                                <input type="text"
                                                       class="input is-size-875"
                                                       v-model="steps[3].form.objects[index].houseBookNumber.value"
                                                       :placeholder="steps[3].form.objects[index].houseBookNumber.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[3].form.objects[index].houseBookNumber.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-6">
                                        <button class="button is-warning is-outlined button-remove">
                                            &times;<span class="is-size-875">Удалить объект</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-1-5 mb-1">
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <button class="button is-info is-outlined button-add">
                                        +<span class="is-size-875">Добавить еще один объект</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-1-5">
                    <div class="step__footer">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <div class="buttons">
                                    <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                            @click="toggleStep(3)">
                                        <span>Шаг 4: Бизнес процессы</span>
                                        <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                    </button>
                                    <button class="button is-clear is-clear_close is-size-875 h-3"
                                            @click="toggleStep(1)">
                                        <span class="has-text-decoration-underline">Вернуться назад</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 4">
            <div class="box step">
                <div class="step__header">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_process.svg" alt="" class="svg"><span>{{steps[4].title}}</span>
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
                                        <progress class="progress is-success is-small" value="22" max="100"></progress>
                                        <div class="has-text-success has-text-weight-bold percent">22.07%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns is-multiline">
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[4].form.transferWorkSchemes.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[4].form.transferWorkSchemes.selected"
                                             :deselect-label="steps[4].form.transferWorkSchemes.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[4].form.transferWorkSchemes.placeholder"
                                             :options="steps[4].form.transferWorkSchemes.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[4].form.transferWorkSchemes.selectLabel"
                                             :selectedLabel="steps[4].form.transferWorkSchemes.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label class="label label_req"><span>{{steps[4].form.monthTeach.title}}</span></label>

                            <div class="field has-addons">
                                <p class="control">
                                            <span class="button is-static is-size-875">
                                              {{steps[4].form.monthTeach.prevTxt}}
                                            </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_2">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[4].form.monthTeach.value"
                                           :placeholder="steps[4].form.monthTeach.placeholder"
                                    >
                                    <div class="icons is-right">
                                              <span class="icon is-small" v-tooltip="steps[4].form.monthTeach.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        <div class="icon buttons-control-input-number">
                                            <div class="plus" @click="steps[4].form.monthTeach.value++">
                                                <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                            </div>
                                            <div class="minus" @click="steps[4].form.monthTeach.value--">
                                                <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[4].form.readyTrainingMaterials.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[4].form.readyTrainingMaterials.selected"
                                             :deselect-label="steps[4].form.readyTrainingMaterials.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[4].form.readyTrainingMaterials.placeholder"
                                             :options="steps[4].form.readyTrainingMaterials.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[4].form.readyTrainingMaterials.selectLabel"
                                             :selectedLabel="steps[4].form.readyTrainingMaterials.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label"><span>{{steps[4].form.typeTrainingMaterials.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="steps[4].form.typeTrainingMaterials.selected"
                                    :deselect-label="steps[4].form.typeTrainingMaterials.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :multiple="true"
                                    :class="'multiselect_multiple'"
                                    :placeholder="steps[4].form.typeTrainingMaterials.placeholder"
                                    :options="steps[4].form.typeTrainingMaterials.options"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :allow-empty="true"
                                    :selectLabel="steps[4].form.typeTrainingMaterials.selectLabel"
                                    :selectedLabel="steps[4].form.typeTrainingMaterials.selectedLabel">
                                    <span slot="noResult">{{steps[4].form.typeTrainingMaterials.noResult}}</span>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[4].form.transferCustomerBase.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[4].form.transferCustomerBase.selected"
                                             :deselect-label="steps[4].form.transferCustomerBase.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[4].form.transferCustomerBase.placeholder"
                                             :options="steps[4].form.transferCustomerBase.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[4].form.transferCustomerBase.selectLabel"
                                             :selectedLabel="steps[4].form.transferCustomerBase.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label"><span>{{steps[4].form.typeTransferCustomerBase.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="steps[4].form.typeTransferCustomerBase.selected"
                                    :deselect-label="steps[4].form.typeTransferCustomerBase.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :multiple="true"
                                    :class="'multiselect_multiple'"
                                    :placeholder="steps[4].form.typeTransferCustomerBase.placeholder"
                                    :options="steps[4].form.typeTransferCustomerBase.options"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :allow-empty="true"
                                    :selectLabel="steps[4].form.typeTransferCustomerBase.selectLabel"
                                    :selectedLabel="steps[4].form.typeTransferCustomerBase.selectedLabel">
                                    <span slot="noResult">{{steps[4].form.typeTransferCustomerBase.noResult}}</span>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[4].form.haveContractors.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[4].form.haveContractors.selected"
                                             :deselect-label="steps[4].form.haveContractors.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[4].form.haveContractors.placeholder"
                                             :options="steps[4].form.haveContractors.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[4].form.haveContractors.selectLabel"
                                             :selectedLabel="steps[4].form.haveContractors.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>

                    <template>
                        <div class="column is-12 pb-0">
                            <h3>{{steps[4].form.contractors.title}}</h3>
                        </div>
                        <div class="column is-12">
                            <div class="columns is-multiline address-wrap"
                                 v-for="(item, index) in steps[4].form.contractors.list">
                                <div class="column is-3">
                                    <div class="field">
                                        <label
                                            class="label label_req"><span>{{steps[4].form.contractors.list[index].direction.title}}</span></label>
                                        <div class="control">
                                            <multiselect
                                                v-model="steps[4].form.contractors.list[index].direction.selected"
                                                :deselect-label="steps[4].form.contractors.list[index].direction.deselectLabel"
                                                track-by="name"
                                                label="name"
                                                openDirection="bottom"
                                                :placeholder="steps[4].form.contractors.list[index].direction.placeholder"
                                                :options="steps[4].form.contractors.list[index].direction.options"
                                                :searchable="true"
                                                :allow-empty="false"
                                                :selectLabel="steps[4].form.contractors.list[index].direction.selectLabel"
                                                :selectedLabel="steps[4].form.contractors.list[index].direction.selectedLabel">
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                                </template>
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label class="label label_req"><span>{{steps[4].form.contractors.list[index].name.title}}</span></label>
                                        <div class="control has-icons-right has-icons-right_1">
                                            <input type="text"
                                                   class="input is-size-875"
                                                   v-model="steps[4].form.contractors.list[index].name.value"
                                                   :placeholder="steps[4].form.contractors.list[index].name.placeholder"
                                            >
                                            <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[4].form.contractors.list[index].name.tooltip">
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
                                                <div class="column is-6">
                                                    <div class="field">
                                                        <label class="label label_req"><span>{{steps[4].form.contractors.list[index].phone.title}}</span></label>
                                                        <div class="control has-icons-right has-icons-right_1">
                                                            <input type="text"
                                                                   class="input is-size-875"
                                                                   v-model="steps[4].form.contractors.list[index].phone.value"
                                                                   :placeholder="steps[4].form.contractors.list[index].phone.placeholder"
                                                            >
                                                            <div class="icons is-right">
                                                              <span class="icon is-small"
                                                                    v-tooltip="steps[4].form.contractors.list[index].phone.tooltip">
                                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                              </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="column is-6">
                                                    <div class="field">
                                                        <label class="label label_req"><span>{{steps[4].form.contractors.list[index].mail.title}}</span></label>
                                                        <div class="control has-icons-right has-icons-right_1">
                                                            <input type="text"
                                                                   class="input is-size-875"
                                                                   v-model="steps[4].form.contractors.list[index].mail.value"
                                                                   :placeholder="steps[4].form.contractors.list[index].mail.placeholder"
                                                            >
                                                            <div class="icons is-right">
                                                                  <span class="icon is-small"
                                                                        v-tooltip="steps[4].form.contractors.list[index].mail.tooltip">
                                                                    <img src="/svg/icons/ic_help.svg" class="svg"
                                                                         alt="">
                                                                  </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-narrow">
                                            <button class="button is-warning is-outlined button-remove"
                                                    v-tooltip="'Удалить этого контрагента'"
                                                    @click="removeContractors(index)">
                                                &times;<span class="is-size-875 is-hidden-tablet">Удалить этого контрагента</span>
                                            </button>
                                            <button class="button is-info is-outlined button-add"
                                                    v-tooltip="'Добавить контрагента'"
                                                    @click="addContractors">
                                                +<span class="is-size-875 is-hidden-tablet">Добавить контрагента</span>
                                            </button>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </template>

                    <template>
                        <div class="column is-12 pb-0">
                            <h3>{{steps[4].form.staff.title}}</h3>
                        </div>
                        <div class="column is-12">
                            <div class="columns is-multiline address-wrap"
                                 v-for="(item, index) in steps[4].form.staff.list">
                                <div class="column is-3">
                                    <div class="field">
                                        <label
                                            class="label label_req"><span>{{steps[4].form.staff.list[index].post.title}}</span></label>
                                        <div class="control">
                                            <multiselect
                                                v-model="steps[4].form.staff.list[index].post.selected"
                                                :deselect-label="steps[4].form.staff.list[index].post.deselectLabel"
                                                track-by="name"
                                                label="name"
                                                openDirection="bottom"
                                                :placeholder="steps[4].form.staff.list[index].post.placeholder"
                                                :options="steps[4].form.staff.list[index].post.options"
                                                :searchable="true"
                                                :allow-empty="false"
                                                :selectLabel="steps[4].form.staff.list[index].post.selectLabel"
                                                :selectedLabel="steps[4].form.staff.list[index].post.selectedLabel">
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                                </template>
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label
                                            class="label label_req"><span>{{steps[4].form.staff.list[index].termsContractDismissal.title}}</span></label>
                                        <div class="control">
                                            <multiselect
                                                v-model="steps[4].form.staff.list[index].termsContractDismissal.selected"
                                                :deselect-label="steps[4].form.staff.list[index].termsContractDismissal.deselectLabel"
                                                track-by="name"
                                                label="name"
                                                openDirection="bottom"
                                                :placeholder="steps[4].form.staff.list[index].termsContractDismissal.placeholder"
                                                :options="steps[4].form.staff.list[index].termsContractDismissal.options"
                                                :searchable="true"
                                                :allow-empty="false"
                                                :selectLabel="steps[4].form.staff.list[index].termsContractDismissal.selectLabel"
                                                :selectedLabel="steps[4].form.staff.list[index].termsContractDismissal.selectedLabel">
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                                </template>
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <div class="columns is-multiline">
                                        <div class="column">
                                            <div class="columns is-multiline">
                                                <div class="column is-6">
                                                    <div class="field">
                                                        <label class="label label_req"><span>{{steps[4].form.staff.list[index].monthlyWages.title}}</span></label>

                                                        <div class="field has-addons">
                                                            <p class="control">
                                                                <span class="button is-static is-size-875">
                                                                  {{steps[4].form.staff.list[index].monthlyWages.prevTxt}}
                                                                </span>
                                                            </p>
                                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                                <input type="number"
                                                                       class="input is-size-875"
                                                                       v-model="steps[4].form.staff.list[index].monthlyWages.value"
                                                                       :placeholder="steps[4].form.staff.list[index].monthlyWages.placeholder"
                                                                >
                                                                <div class="icons is-right">
                                                                  <span class="icon is-small" v-tooltip="steps[4].form.staff.list[index].monthlyWages.tooltip">
                                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                                  </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="column is-6">
                                                    <div class="field">
                                                        <label class="label label_req"><span>{{steps[4].form.staff.list[index].taxAmountPerMonth.title}}</span></label>

                                                        <div class="field has-addons">
                                                            <p class="control">
                                                                <span class="button is-static is-size-875">
                                                                  {{steps[4].form.staff.list[index].taxAmountPerMonth.prevTxt}}
                                                                </span>
                                                            </p>
                                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                                <input type="number"
                                                                       class="input is-size-875"
                                                                       v-model="steps[4].form.staff.list[index].taxAmountPerMonth.value"
                                                                       :placeholder="steps[4].form.staff.list[index].taxAmountPerMonth.placeholder"
                                                                >
                                                                <div class="icons is-right">
                                                                  <span class="icon is-small" v-tooltip="steps[4].form.staff.list[index].taxAmountPerMonth.tooltip">
                                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                                  </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-narrow">
                                            <button class="button is-warning is-outlined button-remove"
                                                    v-tooltip="'Удалить этого сотрудника'"
                                                    @click="removeStaff(index)">
                                                &times;<span class="is-size-875 is-hidden-tablet">Удалить этого сотрудника</span>
                                            </button>
                                            <button class="button is-info is-outlined button-add"
                                                    v-tooltip="'Добавить сотрудника'"
                                                    @click="addStaff">
                                                +<span class="is-size-875 is-hidden-tablet">Добавить сотрудника</span>
                                            </button>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[4].form.willStaffLeave.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[4].form.willStaffLeave.selected"
                                                 :deselect-label="steps[4].form.willStaffLeave.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[4].form.willStaffLeave.placeholder"
                                                 :options="steps[4].form.willStaffLeave.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[4].form.willStaffLeave.selectLabel"
                                                 :selectedLabel="steps[4].form.willStaffLeave.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template>
                        <div class="column is-12 pb-0">
                            <h3>{{steps[4].form.certificates.title}}</h3>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[4].form.havePurchasedServices.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[4].form.havePurchasedServices.selected"
                                                 :deselect-label="steps[4].form.havePurchasedServices.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[4].form.havePurchasedServices.placeholder"
                                                 :options="steps[4].form.havePurchasedServices.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[4].form.havePurchasedServices.selectLabel"
                                                 :selectedLabel="steps[4].form.havePurchasedServices.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[4].form.neededLicenses.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[4].form.neededLicenses.selected"
                                                 :deselect-label="steps[4].form.neededLicenses.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[4].form.neededLicenses.placeholder"
                                                 :options="steps[4].form.neededLicenses.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[4].form.neededLicenses.selectLabel"
                                                 :selectedLabel="steps[4].form.neededLicenses.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="columns is-multiline address-wrap"
                                 v-for="(item, index) in steps[4].form.certificates.list">
                                <div class="column is-3">
                                    <div class="field">
                                        <label
                                            class="label label_req"><span>{{steps[4].form.certificates.list[index].document.title}}</span></label>
                                        <div class="control">
                                            <multiselect v-model="steps[4].form.certificates.list[index].document.selected"
                                                         :deselect-label="steps[4].form.certificates.list[index].document.deselectLabel"
                                                         track-by="name"
                                                         label="name"
                                                         openDirection="bottom"
                                                         :placeholder="steps[4].form.certificates.list[index].document.placeholder"
                                                         :options="steps[4].form.certificates.list[index].document.options"
                                                         :searchable="false"
                                                         :allow-empty="false"
                                                         :selectLabel="steps[4].form.certificates.list[index].document.selectLabel"
                                                         :selectedLabel="steps[4].form.certificates.list[index].document.selectedLabel">
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-3">
                                    <div class="field">
                                        <label
                                            class="label label_req"><span>{{steps[4].form.certificates.list[index].type.title}}</span></label>
                                        <div class="control">
                                            <multiselect v-model="steps[4].form.certificates.list[index].type.selected"
                                                         :deselect-label="steps[4].form.certificates.list[index].type.deselectLabel"
                                                         track-by="name"
                                                         label="name"
                                                         openDirection="bottom"
                                                         :placeholder="steps[4].form.certificates.list[index].type.placeholder"
                                                         :options="steps[4].form.certificates.list[index].type.options"
                                                         :searchable="false"
                                                         :allow-empty="false"
                                                         :selectLabel="steps[4].form.certificates.list[index].type.selectLabel"
                                                         :selectedLabel="steps[4].form.certificates.list[index].type.selectedLabel">
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <div class="columns is-multiline">
                                        <div class="column">
                                            <div class="columns is-multiline">
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label class="label label_req"><span>{{steps[4].form.certificates.list[index].licensePeriod.title}}</span></label>
                                                        <div class="control has-icons-left has-icons-left_1">
                                                            <flat-pickr
                                                                class="input is-size-875"
                                                                v-model="steps[4].form.certificates.list[index].licensePeriod.value"
                                                                :placeholder="steps[4].form.certificates.list[index].licensePeriod.placeholder"
                                                                :config="steps[4].form.certificates.list[index].licensePeriod.config"
                                                            >

                                                            </flat-pickr>
                                                            <div class="icons is-left">
                                                              <span class="icon is-small">
                                                                <img src="/svg/icons/ic_calendar.svg" class="svg" alt="">
                                                              </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-narrow">
                                            <button class="button is-warning is-outlined button-remove"
                                                    v-tooltip="'Удалить'"
                                                    @click="removeCertificates(index)">
                                                &times;<span class="is-size-875 is-hidden-tablet">Удалить</span>
                                            </button>
                                            <button class="button is-info is-outlined button-add"
                                                    v-tooltip="'Добавить'"
                                                    @click="addCertificates">
                                                +<span class="is-size-875 is-hidden-tablet">Добавить</span>
                                            </button>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </template>
                </div>

                <div class="step__footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="buttons">
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                        @click="toggleStep(2)">
                                    <span>Шаг 5: Материальные Активы</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3">
                                    <span class="has-text-decoration-underline">Вернуться назад</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 5">
            <div class="box">
                Step 5 Content
            </div>
        </div>
        <div v-show="step === 6">
            <div class="box">
                Step 6 Content
            </div>
        </div>
        <div v-show="step === 7">
            <div class="box">
                Step 7 Content
            </div>
        </div>
        <div v-show="step === 8">
            <div class="box">
                Step 8 Content
            </div>
        </div>

        <!-- Stepper Controls -->
        <!--<button type="button" @click="$refs.stepper.previous()">Previous</button>-->
        <!--<button type="button" @click="$refs.stepper.next()">Next</button>-->
        <!--<button type="button" @click="$refs.stepper.reset()">Reset</button>-->
    </div>
</template>

<script>
    import {VStepper} from 'vue-stepper-component';
    import Multiselect from 'vue-multiselect';
    import vueSlider from 'vue-slider-component';
    import flatPickr from 'vue-flatpickr-component';
    import {Russian} from "flatpickr/dist/l10n/ru.js"
    import 'flatpickr/dist/flatpickr.css';

    flatpickr.localize(Russian);


    export default {
        name: "form-add-bussines",
        components: {
            VStepper, Multiselect, vueSlider, flatPickr
        },
        data() {
            return {
                // steps: 3,
                step: 4,
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
                            descriptionBusiness: {
                                title: 'Описание бизнеса',
                                placeholder: 'Опишите продаваемый бизнес',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            yearFoundationBusiness: {
                                title: 'Год основания бизнеса',
                                placeholder: '2007',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            reasonSale: {
                                title: 'Причина продажи',
                                placeholder: 'Опишите причину продажи',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            nameVideoReview: {
                                title: 'Название видеообзора',
                                placeholder: 'Укажите название видеообзора',
                                value: '',
                            },
                            linkVideoReview: {
                                title: 'Видеобзор бизнеса',
                                placeholder: 'http://',
                                value: '',
                            },
                            accept: {
                                // title: 'Видеобзор бизнеса',
                                value: false,
                            },
                        }
                    },
                    2: {
                        title: "Финансовые показатели",
                        active: false,
                        success: false,
                        form: {
                            priceShares: {
                                title: 'Цена долей или акций',
                                placeholder: '100 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            netAverageAnnualProfit: {
                                title: 'Чистая средняя годовая прибыль',
                                placeholder: '1 000 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            netAverageQuarterlyProfit: {
                                title: 'Чистая средняя квартальная прибыль',
                                placeholder: '50 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            averageAnnualTurnover: {
                                title: 'Средний годовой оборот',
                                placeholder: '10 000 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            averageQuarterlyTurnover: {
                                title: 'Средний квартальный оборот',
                                placeholder: '500 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            costBusinessPerYear: {
                                title: 'Затраты на коммерческую деятельность в год',
                                placeholder: '25 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            costBusinessPerQuarter: {
                                title: 'Затраты на коммерческую деятельность в квартал',
                                placeholder: '100 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            positiveScenario: {
                                title: 'Позитивный сценарий',
                                placeholder: '12',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'Месяцев'
                            },
                            negativeScenario: {
                                title: 'Негативный сценарий',
                                placeholder: '36',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'Месяцев'
                            },
                        },
                        labelReturnInvestment: 'Окупаемость вложенных средств'
                    },
                    3: {
                        title: "Недвижимость",
                        active: false,
                        success: false,
                        form: {
                            objects: [
                                {
                                    categoryProperty: {
                                        selected: null,
                                        title: 'Тип собственности объекта',
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
                                    typeProperty: {
                                        selected: null,
                                        title: 'Тип недвижимости',
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
                                    numberSquareMeters: {
                                        title: 'Количество кв. метров',
                                        placeholder: '12',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'кв.м.',
                                    },
                                    priceSquareMeters: {
                                        title: 'Цена за кв. метр',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    priceIncludingVAT: {
                                        title: 'Цена с учетом НДС',
                                        value: false,
                                    },
                                    titleDocuments: {
                                        selected: null,
                                        title: 'Правоустанавливающие документы',
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
                                    restrictionsOperation: {
                                        selected: null,
                                        title: 'Огрничения по эксплуатции',
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
                                    listRestrictionsOperation: {
                                        selected: null,
                                        title: 'Укажите ограничения',
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
                                        ],
                                        noResult: 'Ничего не найдено'
                                    },
                                    refRegisterEstate: {
                                        selected: null,
                                        title: 'Справка из регистра недв. и зданий',
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
                                    technicalPropertyPlan: {
                                        selected: null,
                                        title: 'Технический план недвижимости',
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
                                    coordinationRedevelopment: {
                                        selected: null,
                                        title: 'Согласование перепланировок',
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
                                    availabilityMortgage: {
                                        selected: null,
                                        title: 'Наличие ипотеки по объекту',
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
                                    totalAmountMortgage: {
                                        title: 'Общая сумма ипотеки',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    repaidAmountMortgage: {
                                        title: 'Погашенная сумма',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    balanceMortgage: {
                                        title: 'Остаток суммы ипотеки',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    monthlyPaymentMortgage: {
                                        title: 'Ежемесячный платёж',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    finalPaymentMortgageDate: {
                                        title: 'Окончательный срок выплаты',
                                        placeholder: '25 марта 2020',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    availabilityLoanSecuredObject: {
                                        selected: null,
                                        title: 'Наличие кредита под залог объекта',
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
                                    totalAmountCredit: {
                                        title: 'Общая сумма кредита',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    repaidAmountCredit: {
                                        title: 'Погашенная сумма',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    balanceCredit: {
                                        title: 'Остаток суммы кредита',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    monthlyPaymentCredit: {
                                        title: 'Ежемесячный платёж',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    finalPaymentCreditDate: {
                                        title: 'Окончательный срок выплаты',
                                        placeholder: '25 марта 2020',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    purposeCredit: {
                                        selected: null,
                                        title: 'Назначение кредита',
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
                                    jointPropertyEstate: {
                                        selected: null,
                                        title: 'Совместная собственность недвижимости',
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
                                    typeRelationshipCoowners: {
                                        selected: null,
                                        title: 'Тип взаимоотношений сообственников',
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
                                    monthlyUtilityCosts: {
                                        title: 'Ежемесячные расходы на комуннальные платежи',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    houseBookNumber: {
                                        title: 'Номер домовой книги',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                    },

                                    presenceChanging: {
                                        selected: null,
                                        title: 'Наличие чейнджа',
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
                                    costChanging: {
                                        title: 'Стоимость чейнджа',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    leaseTermTo: {
                                        title: 'Срок аренды до',
                                        placeholder: '25 марта 2020',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                },
                            ],
                        }
                    },
                    4:
                        {
                            title: "Бизнес-процессы",
                            active:
                                false,
                            success:
                                false,
                            form: {
                                transferWorkSchemes: {
                                    selected: null,
                                    title: 'Передаете ли схемы работы?',
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
                                monthTeach: {
                                    title: 'Сколько времени будете обучать?',
                                    placeholder: '1',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: 'Месяцев'
                                },
                                readyTrainingMaterials: {
                                    selected: null,
                                    title: 'Готовы ли обучающие материалы?',
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
                                typeTrainingMaterials: {
                                    selected: null,
                                    title: 'Тип обучающих материалов',
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
                                    ],
                                    noResult: 'Ничего не найдено'
                                },
                                transferCustomerBase: {
                                    selected: null,
                                    title: 'Передаёте базы клиентов?',
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
                                typeTransferCustomerBase: {
                                    selected: null,
                                    title: 'Тип передачи базы',
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
                                    ],
                                    noResult: 'Ничего не найдено'
                                },
                                haveContractors: {
                                    selected: null,
                                    title: 'Есть ли контрагенты?',
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
                                contractors: {
                                    title: 'Контрагенты',
                                    list: [
                                        {
                                            direction: {
                                                selected: null,
                                                title: 'Направление контрагента',
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
                                                ],
                                                noResult: 'Ничего не найдено'
                                            },
                                            name: {
                                                title: 'Название юридического лица',
                                                placeholder: 'Укажите название',
                                                value: '',
                                                tooltip: 'tooltip text'
                                            },
                                            phone: {
                                                title: 'Телефон',
                                                placeholder: '+48 456 566-09-23',
                                                value: '',
                                                tooltip: 'tooltip text'
                                            },
                                            mail: {
                                                title: 'Почта',
                                                placeholder: 'agent@mail.com',
                                                value: '',
                                                tooltip: 'tooltip text'
                                            },
                                        },
                                    ]
                                },
                                staff: {
                                    title: 'Персонал',
                                    list: [
                                        {
                                            post: {
                                                selected: null,
                                                title: 'Должность',
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
                                                ],
                                                noResult: 'Ничего не найдено'
                                            },
                                            termsContractDismissal: {
                                                selected: null,
                                                title: 'Условия договора об увольнении',
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
                                                ],
                                                noResult: 'Ничего не найдено'
                                            },
                                            monthlyWages: {
                                                title: 'Месячная заработная плата',
                                                placeholder: '1000',
                                                value: '',
                                                tooltip: 'tooltip text',
                                                prevTxt: 'zł'
                                            },
                                            taxAmountPerMonth: {
                                                title: 'Сумма налогов, в месяц',
                                                placeholder: '1000',
                                                value: '',
                                                tooltip: 'tooltip text',
                                                prevTxt: 'zł'
                                            },
                                        },
                                    ]
                                },
                                willStaffLeave: {
                                    selected: null,
                                    title: 'Уйдет ли персонал за собственником?',
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
                                certificates: {
                                    title: 'Услуги и сертификаты',
                                    list: [
                                        {
                                            document: {
                                                selected: null,
                                                title: 'Укажите документ',
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
                                                ],
                                                noResult: 'Ничего не найдено'
                                            },
                                            type: {
                                                selected: null,
                                                title: 'Укажите тип',
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
                                                ],
                                                noResult: 'Ничего не найдено'
                                            },
                                            licensePeriod: {
                                                title: 'Срок действия лицензии',
                                                placeholder: '25.02.2020',
                                                value: '',
                                                config: {
                                                    altFormat: 'd.m.Y',
                                                    altInput: true,
                                                    dateFormat: 'Y-m-d'
                                                }
                                            },
                                        },
                                    ]
                                },
                                havePurchasedServices: {
                                    selected: null,
                                    title: 'Есть ли выкупленные долгосрочные услуги?',
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
                                neededLicenses: {
                                    selected: null,
                                    title: 'Нужны ли сертификаты, лицензии, разрешения по виду деятельности?',
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
                            }
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
            },
            addContractors() {
                // Добавление котрагента
            },
            removeContractors(index) {
                // Удаление контрагента
            },
            addStaff() {
                // Добавление сотрудника
            },
            removeStaff(index) {
                // Удаление сотрудника
            },
            addCertificates() {
                // Добавление документа
            },
            removeCertificates(index) {
                // Удаление документа
            },
        }
    }
</script>

<style scoped>

</style>
