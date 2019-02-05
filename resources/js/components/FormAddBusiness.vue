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
                        <div class="columns is-multiline list-wrap"
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
                                <input type="url"
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
                                <div class="columns is-multiline list-wrap">
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
                                                <flat-pickr
                                                    class="input is-size-875"
                                                    v-model="steps[3].form.objects[index].finalPaymentMortgageDate.value"
                                                    :placeholder="steps[3].form.objects[index].finalPaymentMortgageDate.placeholder"
                                                    :config="steps[3].form.objects[index].finalPaymentMortgageDate.config"
                                                >

                                                </flat-pickr>
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
                                                        <flat-pickr
                                                            class="input is-size-875"
                                                            v-model="steps[3].form.objects[index].finalPaymentCreditDate.value"
                                                            :placeholder="steps[3].form.objects[index].finalPaymentCreditDate.placeholder"
                                                            :config="steps[3].form.objects[index].finalPaymentCreditDate.config"
                                                        >

                                                        </flat-pickr>
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
                                                    <flat-pickr
                                                        class="input is-size-875"
                                                        v-model="steps[3].form.objects[index].leaseTermTo.value"
                                                        :placeholder="steps[3].form.objects[index].leaseTermTo.placeholder"
                                                        :config="steps[3].form.objects[index].leaseTermTo.config"
                                                    >

                                                    </flat-pickr>
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
                                            @click="toggleStep(4)">
                                        <span>Шаг 4: Бизнес процессы</span>
                                        <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                    </button>
                                    <button class="button is-clear is-clear_close is-size-875 h-3"
                                            @click="toggleStep(2)">
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
                                class="label label_req"><span>{{steps[4].form.typeTransferCustomerBase.title}}</span></label>
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
                            <div class="columns is-multiline list-wrap"
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
                            <div class="columns is-multiline list-wrap"
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
                                                            <div
                                                                class="control is-expanded has-icons-right has-icons-right_1">
                                                                <input type="number"
                                                                       class="input is-size-875"
                                                                       v-model="steps[4].form.staff.list[index].monthlyWages.value"
                                                                       :placeholder="steps[4].form.staff.list[index].monthlyWages.placeholder"
                                                                >
                                                                <div class="icons is-right">
                                                                  <span class="icon is-small"
                                                                        v-tooltip="steps[4].form.staff.list[index].monthlyWages.tooltip">
                                                                    <img src="/svg/icons/ic_help.svg" class="svg"
                                                                         alt="">
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
                                                            <div
                                                                class="control is-expanded has-icons-right has-icons-right_1">
                                                                <input type="number"
                                                                       class="input is-size-875"
                                                                       v-model="steps[4].form.staff.list[index].taxAmountPerMonth.value"
                                                                       :placeholder="steps[4].form.staff.list[index].taxAmountPerMonth.placeholder"
                                                                >
                                                                <div class="icons is-right">
                                                                  <span class="icon is-small"
                                                                        v-tooltip="steps[4].form.staff.list[index].taxAmountPerMonth.tooltip">
                                                                    <img src="/svg/icons/ic_help.svg" class="svg"
                                                                         alt="">
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
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
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
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
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
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="columns is-multiline list-wrap"
                                 v-for="(item, index) in steps[4].form.certificates.list">
                                <div class="column is-3">
                                    <div class="field">
                                        <label
                                            class="label label_req"><span>{{steps[4].form.certificates.list[index].document.title}}</span></label>
                                        <div class="control">
                                            <multiselect
                                                v-model="steps[4].form.certificates.list[index].document.selected"
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
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                                </template>
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
                                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                                </template>
                                            </multiselect>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <div class="columns is-multiline">
                                        <div class="column">
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
                                                                <img src="/svg/icons/ic_calendar.svg" class="svg"
                                                                     alt="">
                                                              </span>
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
                                        @click="toggleStep(5)">
                                    <span>Шаг 5: Материальные Активы</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3"
                                        @click="toggleStep(3)">
                                    <span class="has-text-decoration-underline">Вернуться назад</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 5">
            <div class="box step">
                <div class="step__header">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_money.svg" alt=""
                                     class="svg"><span>{{steps[5].title}}</span>
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
                                        <progress class="progress is-success is-small" value="31" max="100"></progress>
                                        <div class="has-text-success has-text-weight-bold percent">31.40%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.techDocEquipmentCD.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.techDocEquipmentCD.selected"
                                             :deselect-label="steps[5].form.techDocEquipmentCD.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.techDocEquipmentCD.placeholder"
                                             :options="steps[5].form.techDocEquipmentCD.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.techDocEquipmentCD.selectLabel"
                                             :selectedLabel="steps[5].form.techDocEquipmentCD.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.techDocEquipment.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.techDocEquipment.selected"
                                             :deselect-label="steps[5].form.techDocEquipment.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.techDocEquipment.placeholder"
                                             :options="steps[5].form.techDocEquipment.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.techDocEquipment.selectLabel"
                                             :selectedLabel="steps[5].form.techDocEquipment.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.conditionProperty.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.conditionProperty.selected"
                                             :deselect-label="steps[5].form.conditionProperty.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.conditionProperty.placeholder"
                                             :options="steps[5].form.conditionProperty.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.conditionProperty.selectLabel"
                                             :selectedLabel="steps[5].form.conditionProperty.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.conditionEquipment.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.conditionEquipment.selected"
                                             :deselect-label="steps[5].form.conditionEquipment.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.conditionEquipment.placeholder"
                                             :options="steps[5].form.conditionEquipment.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.conditionEquipment.selectLabel"
                                             :selectedLabel="steps[5].form.conditionEquipment.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.pledgeEquipment.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.pledgeEquipment.selected"
                                             :deselect-label="steps[5].form.pledgeEquipment.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.pledgeEquipment.placeholder"
                                             :options="steps[5].form.pledgeEquipment.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.pledgeEquipment.selectLabel"
                                             :selectedLabel="steps[5].form.pledgeEquipment.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <label class="label label_req"><span>{{steps[5].form.totalAmountCredit.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[5].form.totalAmountCredit.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[5].form.totalAmountCredit.value"
                                       :placeholder="steps[5].form.totalAmountCredit.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[5].form.totalAmountCredit.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-3">
                        <label class="label label_req"><span>{{steps[5].form.repaidAmountCredit.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[5].form.repaidAmountCredit.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[5].form.repaidAmountCredit.value"
                                       :placeholder="steps[5].form.repaidAmountCredit.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[5].form.repaidAmountCredit.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-3">
                        <label class="label label_req"><span>{{steps[5].form.balanceCredit.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[5].form.balanceCredit.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[5].form.balanceCredit.value"
                                       :placeholder="steps[5].form.balanceCredit.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[5].form.balanceCredit.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-3">
                        <label class="label label_req"><span>{{steps[5].form.monthlyPaymentCredit.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[5].form.monthlyPaymentCredit.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[5].form.monthlyPaymentCredit.value"
                                       :placeholder="steps[5].form.monthlyPaymentCredit.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[5].form.monthlyPaymentCredit.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.finalPaymentCreditDate.title}}</span></label>
                            <div class="control has-icons-left has-icons-left_1">
                                <flat-pickr
                                    class="input is-size-875"
                                    v-model="steps[5].form.finalPaymentCreditDate.value"
                                    :placeholder="steps[5].form.finalPaymentCreditDate.placeholder"
                                    :config="steps[5].form.finalPaymentCreditDate.config"
                                >

                                </flat-pickr>
                                <div class="icons is-left">
                                     <span class="icon is-small">
                                          <img src="/svg/icons/ic_calendar.svg" class="svg"
                                               alt="">
                                     </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.purposeCredit.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.purposeCredit.selected"
                                             :deselect-label="steps[5].form.purposeCredit.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.purposeCredit.placeholder"
                                             :options="steps[5].form.purposeCredit.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.purposeCredit.selectLabel"
                                             :selectedLabel="steps[5].form.purposeCredit.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.listTransferredProperty.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="steps[5].form.listTransferredProperty.selected"
                                    :deselect-label="steps[5].form.listTransferredProperty.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :multiple="true"
                                    :class="'multiselect_multiple'"
                                    :placeholder="steps[5].form.listTransferredProperty.placeholder"
                                    :options="steps[5].form.listTransferredProperty.options"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :allow-empty="true"
                                    :selectLabel="steps[5].form.listTransferredProperty.selectLabel"
                                    :selectedLabel="steps[5].form.listTransferredProperty.selectedLabel">
                                    <span slot="noResult">{{steps[5].form.listTransferredProperty.noResult}}</span>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[5].form.deductionsDepreciation.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[5].form.deductionsDepreciation.selected"
                                             :deselect-label="steps[5].form.deductionsDepreciation.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[5].form.deductionsDepreciation.placeholder"
                                             :options="steps[5].form.deductionsDepreciation.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[5].form.deductionsDepreciation.selectLabel"
                                             :selectedLabel="steps[5].form.deductionsDepreciation.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <label
                            class="label label_req"><span>{{steps[5].form.amountDeductionsProfits.title}}</span></label>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[5].form.amountDeductionsProfits.prevTxt}}
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="number"
                                       class="input is-size-875"
                                       v-model="steps[5].form.amountDeductionsProfits.value"
                                       :placeholder="steps[5].form.amountDeductionsProfits.placeholder"
                                >
                                <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[5].form.amountDeductionsProfits.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
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
                                        @click="toggleStep(6)">
                                    <span>Шаг 6: Нематериальные Активы</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3" @click="toggleStep(4)">
                                    <span class="has-text-decoration-underline">Вернуться назад</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 6">
            <div class="box step px-0">
                <div class="px-1-5">
                    <div class="step__header">
                        <div class="columns is-multiline">
                            <div class="column is-6">
                                <h3><img src="/svg/icons/ic_globe.svg" alt=""
                                         class="svg"><span>{{steps[6].title}}</span>
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
                                            <progress class="progress is-success is-small" value="42"
                                                      max="100"></progress>
                                            <div class="has-text-success has-text-weight-bold percent">41.68%</div>
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
                                    class="label label_req"><span>{{steps[6].form.saleSite.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[6].form.saleSite.selected"
                                                 :deselect-label="steps[6].form.saleSite.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[6].form.saleSite.placeholder"
                                                 :options="steps[6].form.saleSite.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[6].form.saleSite.selectLabel"
                                                 :selectedLabel="steps[6].form.saleSite.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.yearCreationSite.title}}</span></label>
                                <div class="control has-icons-left has-icons-left_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[6].form.yearCreationSite.value"
                                           :placeholder="steps[6].form.yearCreationSite.placeholder"
                                    >
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
                                    class="label label_req"><span>{{steps[6].form.cms.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[6].form.cms.selected"
                                                 :deselect-label="steps[6].form.cms.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[6].form.cms.placeholder"
                                                 :options="steps[6].form.cms.options"
                                                 :searchable="true"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[6].form.cms.selectLabel"
                                                 :selectedLabel="steps[6].form.cms.selectedLabel">
                                        <span slot="noResult">{{steps[6].form.cms.noResult}}</span>
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.themeSite.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[6].form.themeSite.selected"
                                                 :deselect-label="steps[6].form.themeSite.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[6].form.themeSite.placeholder"
                                                 :options="steps[6].form.themeSite.options"
                                                 :searchable="true"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[6].form.themeSite.selectLabel"
                                                 :selectedLabel="steps[6].form.themeSite.selectedLabel">
                                        <span slot="noResult">{{steps[6].form.themeSite.noResult}}</span>
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.salePhone.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[6].form.salePhone.selected"
                                                 :deselect-label="steps[6].form.salePhone.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[6].form.salePhone.placeholder"
                                                 :options="steps[6].form.salePhone.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[6].form.salePhone.selectLabel"
                                                 :selectedLabel="steps[6].form.salePhone.selectedLabel">
                                        <span slot="noResult">{{steps[6].form.salePhone.noResult}}</span>
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label class="label label_req"><span>{{steps[6].form.phone.title}}</span></label>
                                <div class="control has-icons-right has-icons-right_1">
                                    <input type="text"
                                           class="input is-size-875"
                                           v-model="steps[6].form.phone.value"
                                           :placeholder="steps[6].form.phone.placeholder"
                                    >
                                    <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.phone.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.intellectualProperty.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[6].form.intellectualProperty.selected"
                                                 :deselect-label="steps[6].form.intellectualProperty.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[6].form.intellectualProperty.placeholder"
                                                 :options="steps[6].form.intellectualProperty.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[6].form.intellectualProperty.selectLabel"
                                                 :selectedLabel="steps[6].form.intellectualProperty.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.intellectualPropertyList.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[6].form.intellectualPropertyList.selected"
                                        :deselect-label="steps[6].form.intellectualPropertyList.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[6].form.intellectualPropertyList.placeholder"
                                        :options="steps[6].form.intellectualPropertyList.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[6].form.intellectualPropertyList.selectLabel"
                                        :selectedLabel="steps[6].form.intellectualPropertyList.selectedLabel">
                                        <span slot="noResult">{{steps[6].form.intellectualPropertyList.noResult}}</span>
                                    </multiselect>
                                </div>
                            </div>
                        </div>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Трафик и SEO</h3>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.visitorsPerDay.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875"
                                               v-model="steps[6].form.visitorsPerDay.value"
                                               :placeholder="steps[6].form.visitorsPerDay.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.visitorsPerDay.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.viewsPerDay.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875"
                                               v-model="steps[6].form.viewsPerDay.value"
                                               :placeholder="steps[6].form.viewsPerDay.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.viewsPerDay.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.natureTraffic.title}}</span></label>
                                    <div class="control">
                                        <multiselect v-model="steps[6].form.natureTraffic.selected"
                                                     :deselect-label="steps[6].form.natureTraffic.deselectLabel"
                                                     track-by="name"
                                                     label="name"
                                                     openDirection="bottom"
                                                     :placeholder="steps[6].form.natureTraffic.placeholder"
                                                     :options="steps[6].form.natureTraffic.options"
                                                     :searchable="true"
                                                     :allow-empty="false"
                                                     :selectLabel="steps[6].form.natureTraffic.selectLabel"
                                                     :selectedLabel="steps[6].form.natureTraffic.selectedLabel">
                                            <span slot="noResult">{{steps[6].form.natureTraffic.noResult}}</span>
                                            <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                            </template>
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.sourcesTraffic.title}}</span></label>
                                    <div class="control">
                                        <multiselect
                                            v-model="steps[6].form.sourcesTraffic.selected"
                                            :deselect-label="steps[6].form.sourcesTraffic.deselectLabel"
                                            track-by="name"
                                            label="name"
                                            openDirection="bottom"
                                            :multiple="true"
                                            :class="'multiselect_multiple'"
                                            :placeholder="steps[6].form.sourcesTraffic.placeholder"
                                            :options="steps[6].form.sourcesTraffic.options"
                                            :searchable="true"
                                            :close-on-select="false"
                                            :allow-empty="true"
                                            :selectLabel="steps[6].form.sourcesTraffic.selectLabel"
                                            :selectedLabel="steps[6].form.sourcesTraffic.selectedLabel">
                                            <span slot="noResult">{{steps[6].form.sourcesTraffic.noResult}}</span>
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="columns is-multiline">
                                    <div class="column is-narrow">
                                        <button class="button is-info button-integrate-analitics"
                                                v-tooltip="'Интеграция с Google Analytics'">
                                            <img src="/svg/icons/ic_analytics.svg" alt="" class="svg">
                                        </button>
                                    </div>
                                    <div class="column">
                                        <div class="columns is-multiline">
                                            <div class="column is-6">
                                                <div class="field">
                                                    <label class="label label_req"><span>{{steps[6].form.sourceGoogle.title}}</span></label>
                                                    <div class="control has-icons-right has-icons-right_1">
                                                        <input type="text"
                                                               class="input is-size-875"
                                                               v-model="steps[6].form.sourceGoogle.value"
                                                               :placeholder="steps[6].form.sourceGoogle.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.sourceGoogle.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-6">
                                                <div class="field">
                                                    <label class="label label_req"><span>{{steps[6].form.sourceYandex.title}}</span></label>
                                                    <div class="control has-icons-right has-icons-right_1">
                                                        <input type="text"
                                                               class="input is-size-875"
                                                               v-model="steps[6].form.sourceYandex.value"
                                                               :placeholder="steps[6].form.sourceYandex.placeholder"
                                                        >
                                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.sourceYandex.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[6].form.additionalInformationTraffic.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875"
                                               v-model="steps[6].form.additionalInformationTraffic.value"
                                               :placeholder="steps[6].form.additionalInformationTraffic.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.additionalInformationTraffic.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Доходы сайта</h3>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.haveIncomeSite.title}}</span></label>
                                    <div class="control">
                                        <multiselect v-model="steps[6].form.haveIncomeSite.selected"
                                                     :deselect-label="steps[6].form.haveIncomeSite.deselectLabel"
                                                     track-by="name"
                                                     label="name"
                                                     openDirection="bottom"
                                                     :placeholder="steps[6].form.haveIncomeSite.placeholder"
                                                     :options="steps[6].form.haveIncomeSite.options"
                                                     :searchable="false"
                                                     :allow-empty="false"
                                                     :selectLabel="steps[6].form.haveIncomeSite.selectLabel"
                                                     :selectedLabel="steps[6].form.haveIncomeSite.selectedLabel">
                                            <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                            </template>
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <label class="label label_req"><span>{{steps[6].form.averageMonthlyIncome.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.averageMonthlyIncome.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.averageMonthlyIncome.value"
                                               :placeholder="steps[6].form.averageMonthlyIncome.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.averageMonthlyIncome.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.sourcesIncome.title}}</span></label>
                                    <div class="control">
                                        <multiselect
                                            v-model="steps[6].form.sourcesIncome.selected"
                                            :deselect-label="steps[6].form.sourcesIncome.deselectLabel"
                                            track-by="name"
                                            label="name"
                                            openDirection="bottom"
                                            :multiple="true"
                                            :class="'multiselect_multiple'"
                                            :placeholder="steps[6].form.sourcesIncome.placeholder"
                                            :options="steps[6].form.sourcesIncome.options"
                                            :searchable="true"
                                            :close-on-select="false"
                                            :allow-empty="true"
                                            :selectLabel="steps[6].form.sourcesIncome.selectLabel"
                                            :selectedLabel="steps[6].form.sourcesIncome.selectedLabel">
                                            <span slot="noResult">{{steps[6].form.sourcesIncome.noResult}}</span>
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <label
                                    class="label label_req"><span>{{steps[6].form.contextualAdvertising.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.contextualAdvertising.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.contextualAdvertising.value"
                                               :placeholder="steps[6].form.contextualAdvertising.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.contextualAdvertising.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-3">
                                <label class="label label_req"><span>{{steps[6].form.contextualAdvertisingGAdsens.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.contextualAdvertisingGAdsens.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.contextualAdvertisingGAdsens.value"
                                               :placeholder="steps[6].form.contextualAdvertisingGAdsens.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[6].form.contextualAdvertisingGAdsens.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-3">
                                <label class="label label_req"><span>{{steps[6].form.bannerTizerNetworks.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.bannerTizerNetworks.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.bannerTizerNetworks.value"
                                               :placeholder="steps[6].form.bannerTizerNetworks.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.bannerTizerNetworks.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-3">
                                <label class="label label_req"><span>{{steps[6].form.cpa.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.cpa.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.cpa.value"
                                               :placeholder="steps[6].form.cpa.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.cpa.tooltip">
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
                                               v-model="steps[6].form.banMonetizationSystems.value">
                                            <input type="checkbox">
                                            <span>{{steps[6].form.banMonetizationSystems.title}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[6].form.additionalInformationIncome.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875"
                                               v-model="steps[6].form.additionalInformationIncome.value"
                                               :placeholder="steps[6].form.additionalInformationIncome.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.additionalInformationIncome.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Расходы сайта</h3>
                            </div>
                            <div class="column is-6">
                                <label
                                    class="label label_req"><span>{{steps[6].form.averageMonthlyExpensesSite.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.averageMonthlyExpensesSite.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.averageMonthlyExpensesSite.value"
                                               :placeholder="steps[6].form.averageMonthlyExpensesSite.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[6].form.averageMonthlyExpensesSite.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.categoriesExpensesSite.title}}</span></label>
                                    <div class="control">
                                        <multiselect
                                            v-model="steps[6].form.categoriesExpensesSite.selected"
                                            :deselect-label="steps[6].form.categoriesExpensesSite.deselectLabel"
                                            track-by="name"
                                            label="name"
                                            openDirection="bottom"
                                            :multiple="true"
                                            :class="'multiselect_multiple'"
                                            :placeholder="steps[6].form.categoriesExpensesSite.placeholder"
                                            :options="steps[6].form.categoriesExpensesSite.options"
                                            :searchable="true"
                                            :close-on-select="false"
                                            :allow-empty="true"
                                            :selectLabel="steps[6].form.categoriesExpensesSite.selectLabel"
                                            :selectedLabel="steps[6].form.categoriesExpensesSite.selectedLabel">
                                            <span
                                                slot="noResult">{{steps[6].form.categoriesExpensesSite.noResult}}</span>
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <label class="label label_req"><span>{{steps[6].form.contentExpensesSite.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.contentExpensesSite.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.contentExpensesSite.value"
                                               :placeholder="steps[6].form.contentExpensesSite.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.contentExpensesSite.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-3">
                                <label class="label label_req"><span>{{steps[6].form.hostingExpensesSite.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.hostingExpensesSite.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.hostingExpensesSite.value"
                                               :placeholder="steps[6].form.hostingExpensesSite.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.hostingExpensesSite.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-3">
                                <label
                                    class="label label_req"><span>{{steps[6].form.otherExpensesSite.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.otherExpensesSite.prevTxt}}
                                </span>
                                    </p>
                                    <div class="control is-expanded has-icons-right has-icons-right_1">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[6].form.otherExpensesSite.value"
                                               :placeholder="steps[6].form.otherExpensesSite.placeholder"
                                        >
                                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.otherExpensesSite.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[6].form.additionalInformationExpensesSite.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875"
                                               v-model="steps[6].form.additionalInformationExpensesSite.value"
                                               :placeholder="steps[6].form.additionalInformationExpensesSite.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.additionalInformationExpensesSite.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>О контенте и дизайне</h3>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.siteDesign.title}}</span></label>
                                    <div class="control">
                                        <multiselect v-model="steps[6].form.siteDesign.selected"
                                                     :deselect-label="steps[6].form.siteDesign.deselectLabel"
                                                     track-by="name"
                                                     label="name"
                                                     openDirection="bottom"
                                                     :placeholder="steps[6].form.siteDesign.placeholder"
                                                     :options="steps[6].form.siteDesign.options"
                                                     :searchable="false"
                                                     :allow-empty="false"
                                                     :selectLabel="steps[6].form.siteDesign.selectLabel"
                                                     :selectedLabel="steps[6].form.siteDesign.selectedLabel">
                                            <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                            </template>
                                        </multiselect>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-12 pb-0">
                                <label class="label"><span>Фото и картинки на сайте</span></label>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.imgSiteOwn.title}}</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.imgSiteOwn.prevTxt}}
                                </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_1">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[6].form.imgSiteOwn.value"
                                                   :placeholder="steps[6].form.imgSiteOwn.placeholder"
                                            >
                                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.imgSiteOwn.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <vue-slider v-model="steps[6].form.imgSiteOwn.value"
                                                :tooltip="steps[6].form.imgSiteOwn.optionSlider.tooltip"
                                                :min="steps[6].form.imgSiteOwn.optionSlider.min"
                                                :max="steps[6].form.imgSiteOwn.optionSlider.max">

                                    </vue-slider>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.imgSiteOtherSources.title}}</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.imgSiteOtherSources.prevTxt}}
                                </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_1">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[6].form.imgSiteOtherSources.value"
                                                   :placeholder="steps[6].form.imgSiteOtherSources.placeholder"
                                            >
                                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.imgSiteOtherSources.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <vue-slider v-model="steps[6].form.imgSiteOtherSources.value"
                                                :tooltip="steps[6].form.imgSiteOtherSources.optionSlider.tooltip"
                                                :min="steps[6].form.imgSiteOtherSources.optionSlider.min"
                                                :max="steps[6].form.imgSiteOtherSources.optionSlider.max">

                                    </vue-slider>
                                </div>
                            </div>

                            <div class="column is-12 pb-0">
                                <label
                                    class="label"><span>Тексты на сайте</span></label>
                            </div>

                            <div class="column is-3">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.textSiteCopyright.title}}</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.textSiteCopyright.prevTxt}}
                                </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_1">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[6].form.textSiteCopyright.value"
                                                   :placeholder="steps[6].form.textSiteCopyright.placeholder"
                                            >
                                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.textSiteCopyright.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <vue-slider v-model="steps[6].form.textSiteCopyright.value"
                                                :tooltip="steps[6].form.textSiteCopyright.optionSlider.tooltip"
                                                :min="steps[6].form.textSiteCopyright.optionSlider.min"
                                                :max="steps[6].form.textSiteCopyright.optionSlider.max">

                                    </vue-slider>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.textSiteManualRewrite.title}}</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.textSiteManualRewrite.prevTxt}}
                                </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_1">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[6].form.textSiteManualRewrite.value"
                                                   :placeholder="steps[6].form.textSiteManualRewrite.placeholder"
                                            >
                                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.textSiteManualRewrite.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <vue-slider v-model="steps[6].form.textSiteManualRewrite.value"
                                                :tooltip="steps[6].form.textSiteManualRewrite.optionSlider.tooltip"
                                                :min="steps[6].form.textSiteManualRewrite.optionSlider.min"
                                                :max="steps[6].form.textSiteManualRewrite.optionSlider.max">

                                    </vue-slider>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.textSiteSavePaste.title}}</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.textSiteSavePaste.prevTxt}}
                                </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_1">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[6].form.textSiteSavePaste.value"
                                                   :placeholder="steps[6].form.textSiteSavePaste.placeholder"
                                            >
                                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.textSiteSavePaste.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <vue-slider v-model="steps[6].form.textSiteSavePaste.value"
                                                :tooltip="steps[6].form.textSiteSavePaste.optionSlider.tooltip"
                                                :min="steps[6].form.textSiteSavePaste.optionSlider.min"
                                                :max="steps[6].form.textSiteSavePaste.optionSlider.max">

                                    </vue-slider>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="field">
                                    <label
                                        class="label label_req"><span>{{steps[6].form.textSiteGenerated.title}}</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[6].form.textSiteGenerated.prevTxt}}
                                </span>
                                        </p>
                                        <div class="control is-expanded has-icons-right has-icons-right_1">
                                            <input type="number"
                                                   class="input is-size-875"
                                                   v-model="steps[6].form.textSiteGenerated.value"
                                                   :placeholder="steps[6].form.textSiteGenerated.placeholder"
                                            >
                                            <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[6].form.textSiteGenerated.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <vue-slider v-model="steps[6].form.textSiteGenerated.value"
                                                :tooltip="steps[6].form.textSiteGenerated.optionSlider.tooltip"
                                                :min="steps[6].form.textSiteGenerated.optionSlider.min"
                                                :max="steps[6].form.textSiteGenerated.optionSlider.max">

                                    </vue-slider>
                                </div>
                            </div>
                            <div class="column is-12">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[6].form.additionalInformationContentSite.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_1">
                                        <input type="text"
                                               class="input is-size-875"
                                               v-model="steps[6].form.additionalInformationContentSite.value"
                                               :placeholder="steps[6].form.additionalInformationContentSite.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.additionalInformationContentSite.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                    </div>
                </div>

                <hr>
                <div class="px-1-5">
                    <div class="columns is-multiline">
                        <div class="column is-12 pb-0">
                            <h3>Группы в социальных сетях</h3>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.saleGroupsSocNet.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[6].form.saleGroupsSocNet.selected"
                                                 :deselect-label="steps[6].form.saleGroupsSocNet.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[6].form.saleGroupsSocNet.placeholder"
                                                 :options="steps[6].form.saleGroupsSocNet.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[6].form.saleGroupsSocNet.selectLabel"
                                                 :selectedLabel="steps[6].form.saleGroupsSocNet.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[6].form.socNetList.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[6].form.socNetList.selected"
                                        :deselect-label="steps[6].form.socNetList.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[6].form.socNetList.placeholder"
                                        :options="steps[6].form.socNetList.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[6].form.socNetList.selectLabel"
                                        :selectedLabel="steps[6].form.socNetList.selectedLabel">
                                        <span slot="noResult">{{steps[6].form.socNetList.noResult}}</span>
                                    </multiselect>
                                </div>
                            </div>
                        </div>

                        <template v-for="(item, index) in steps[6].form.socNetItems">
                            <div class="column is-12">
                                <div class="columns is-multiline">
                                    <div class="column is-12 pb-0">
                                        <h3>Группа в {{steps[6].form.socNetItems[index].title}}</h3>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label class="label label_req"><span>{{steps[6].form.socNetItems[index].link.title}}</span></label>
                                            <div class="control has-icons-right has-icons-right_1">
                                                <input type="url"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].link.value"
                                                       :placeholder="steps[6].form.socNetItems[index].link.placeholder"
                                                >
                                                <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.socNetItems[index].link.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label class="label label_req"><span>{{steps[6].form.socNetItems[index].countUsers.title}}</span></label>
                                            <div class="control has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].countUsers.value"
                                                       :placeholder="steps[6].form.socNetItems[index].countUsers.placeholder"
                                                >
                                                <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[6].form.socNetItems[index].countUsers.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[6].form.socNetItems[index].haveIncome.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[6].form.socNetItems[index].haveIncome.selected"
                                                    :deselect-label="steps[6].form.socNetItems[index].haveIncome.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :placeholder="steps[6].form.socNetItems[index].haveIncome.placeholder"
                                                    :options="steps[6].form.socNetItems[index].haveIncome.options"
                                                    :searchable="false"
                                                    :allow-empty="false"
                                                    :selectLabel="steps[6].form.socNetItems[index].haveIncome.selectLabel"
                                                    :selectedLabel="steps[6].form.socNetItems[index].haveIncome.selectedLabel">
                                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                                        }}
                                                    </template>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-3">
                                        <label
                                            class="label label_req"><span>{{steps[6].form.socNetItems[index].incomeYear.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[6].form.socNetItems[index].incomeYear.prevTxt}}
                                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].incomeYear.value"
                                                       :placeholder="steps[6].form.socNetItems[index].incomeYear.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[6].form.socNetItems[index].incomeYear.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="column is-3">
                                        <label
                                            class="label label_req"><span>{{steps[6].form.socNetItems[index].incomeQuarter.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[6].form.socNetItems[index].incomeQuarter.prevTxt}}
                                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].incomeQuarter.value"
                                                       :placeholder="steps[6].form.socNetItems[index].incomeQuarter.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[6].form.socNetItems[index].incomeQuarter.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="column is-3">
                                        <label
                                            class="label label_req"><span>{{steps[6].form.socNetItems[index].turnoverYear.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[6].form.socNetItems[index].turnoverYear.prevTxt}}
                                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].turnoverYear.value"
                                                       :placeholder="steps[6].form.socNetItems[index].turnoverYear.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[6].form.socNetItems[index].turnoverYear.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="column is-3">
                                        <label
                                            class="label label_req"><span>{{steps[6].form.socNetItems[index].turnoverQuarter.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[6].form.socNetItems[index].turnoverQuarter.prevTxt}}
                                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].turnoverQuarter.value"
                                                       :placeholder="steps[6].form.socNetItems[index].turnoverQuarter.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[6].form.socNetItems[index].turnoverQuarter.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="column is-3">
                                        <label
                                            class="label label_req"><span>{{steps[6].form.socNetItems[index].expensesYear.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[6].form.socNetItems[index].expensesYear.prevTxt}}
                                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].expensesYear.value"
                                                       :placeholder="steps[6].form.socNetItems[index].expensesYear.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[6].form.socNetItems[index].expensesYear.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="column is-3">
                                        <label
                                            class="label label_req"><span>{{steps[6].form.socNetItems[index].expensesQuarter.title}}</span></label>
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-size-875">
                                                   {{steps[6].form.socNetItems[index].expensesQuarter.prevTxt}}
                                                </span>
                                            </p>
                                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                                <input type="number"
                                                       class="input is-size-875"
                                                       v-model="steps[6].form.socNetItems[index].expensesQuarter.value"
                                                       :placeholder="steps[6].form.socNetItems[index].expensesQuarter.placeholder"
                                                >
                                                <div class="icons is-right">
                                                  <span class="icon is-small"
                                                        v-tooltip="steps[6].form.socNetItems[index].expensesQuarter.tooltip">
                                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                                  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[6].form.socNetItems[index].themes.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[6].form.socNetItems[index].themes.selected"
                                                    :deselect-label="steps[6].form.socNetItems[index].themes.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :multiple="true"
                                                    :class="'multiselect_multiple'"
                                                    :placeholder="steps[6].form.socNetItems[index].themes.placeholder"
                                                    :options="steps[6].form.socNetItems[index].themes.options"
                                                    :searchable="true"
                                                    :close-on-select="false"
                                                    :allow-empty="true"
                                                    :selectLabel="steps[6].form.socNetItems[index].themes.selectLabel"
                                                    :selectedLabel="steps[6].form.socNetItems[index].themes.selectedLabel">
                                                    <span slot="noResult">{{steps[6].form.socNetItems[index].themes.noResult}}</span>
                                                </multiselect>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[6].form.socNetItems[index].lang.title}}</span></label>
                                            <div class="control">
                                                <multiselect v-model="steps[6].form.socNetItems[index].lang.selected"
                                                             :deselect-label="steps[6].form.socNetItems[index].lang.deselectLabel"
                                                             track-by="name"
                                                             label="name"
                                                             openDirection="bottom"
                                                             :placeholder="steps[6].form.socNetItems[index].lang.placeholder"
                                                             :options="steps[6].form.socNetItems[index].lang.options"
                                                             :searchable="true"
                                                             :allow-empty="false"
                                                             :selectLabel="steps[6].form.socNetItems[index].lang.selectLabel"
                                                             :selectedLabel="steps[6].form.socNetItems[index].lang.selectedLabel">
                                                    <span slot="noResult">{{steps[6].form.socNetItems[index].lang.noResult}}</span>
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
                                                class="label label_req"><span>{{steps[6].form.socNetItems[index].methodTransferGroup.title}}</span></label>
                                            <div class="control">
                                                <multiselect
                                                    v-model="steps[6].form.socNetItems[index].methodTransferGroup.selected"
                                                    :deselect-label="steps[6].form.socNetItems[index].methodTransferGroup.deselectLabel"
                                                    track-by="name"
                                                    label="name"
                                                    openDirection="bottom"
                                                    :multiple="true"
                                                    :class="'multiselect_multiple'"
                                                    :placeholder="steps[6].form.socNetItems[index].methodTransferGroup.placeholder"
                                                    :options="steps[6].form.socNetItems[index].methodTransferGroup.options"
                                                    :searchable="true"
                                                    :close-on-select="false"
                                                    :allow-empty="true"
                                                    :selectLabel="steps[6].form.socNetItems[index].methodTransferGroup.selectLabel"
                                                    :selectedLabel="steps[6].form.socNetItems[index].methodTransferGroup.selectedLabel">
                                                    <span slot="noResult">{{steps[6].form.socNetItems[index].methodTransferGroup.noResult}}</span>
                                                </multiselect>
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
                                            @click="toggleStep(7)">
                                        <span>Шаг 7: Целевая аудитория</span>
                                        <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                    </button>
                                    <button class="button is-clear is-clear_close is-size-875 h-3"
                                            @click="toggleStep(5)">
                                        <span class="has-text-decoration-underline">Вернуться назад</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 7">
            <div class="box step">
                <div class="step__header">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_target_audience.svg" alt=""
                                     class="svg"><span>{{steps[7].title}}</span>
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
                                        <progress class="progress is-success is-small" value="52" max="100"></progress>
                                        <div class="has-text-success has-text-weight-bold percent">51.96%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[7].form.typeAudience.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[7].form.typeAudience.selected"
                                             :deselect-label="steps[7].form.typeAudience.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[7].form.typeAudience.placeholder"
                                             :options="steps[7].form.typeAudience.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[7].form.typeAudience.selectLabel"
                                             :selectedLabel="steps[7].form.typeAudience.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <template>
                        <div class="column is-12 pb-0">
                            <h3>B2C</h3>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.genderTargetAudience.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[7].form.b2c.genderTargetAudience.selected"
                                                 :deselect-label="steps[7].form.b2c.genderTargetAudience.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[7].form.b2c.genderTargetAudience.placeholder"
                                                 :options="steps[7].form.b2c.genderTargetAudience.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[7].form.b2c.genderTargetAudience.selectLabel"
                                                 :selectedLabel="steps[7].form.b2c.genderTargetAudience.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.ageMenFrom.title}}</span></label>
                                <div class="field has-addons ">
                                    <p class="control control-text-left control-text-left_3em">
                                        <input type="number" class="input is-size-875"
                                               v-model="steps[7].form.b2c.ageMenFrom.value">
                                        <span class="text is-left is-size-875">от&nbsp;</span>
                                    </p>
                                    <p class="control control-text-left control-text-left_3em">
                                        <input type="number" class="input is-size-875"
                                               v-model="steps[7].form.b2c.ageMenTo.value">
                                        <span class="text is-left is-size-875">до&nbsp;</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.ageWomenFrom.title}}</span></label>
                                <div class="field has-addons">
                                    <p class="control control-text-left control-text-left_3em">
                                        <input type="number" class="input is-size-875"
                                               v-model="steps[7].form.b2c.ageWomenFrom.value">
                                        <span class="text is-left is-size-875">от&nbsp;</span>
                                    </p>
                                    <p class="control control-text-left control-text-left_3em">
                                        <input type="number" class="input is-size-875"
                                               v-model="steps[7].form.b2c.ageWomenTo.value">
                                        <span class="text is-left is-size-875">до&nbsp;</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label class="label label_req"><span>{{steps[7].form.b2c.sexRatio.title}}</span></label>
                                <div class="field has-slider slider-gender">
                                    <figure>
                                        <img src="/svg/icons/ic_gender_man.svg" class="svg" alt="">
                                    </figure>
                                    <div class="slider-gender-container">
                                        <vue-slider v-model="steps[7].form.b2c.sexRatio.value"
                                                    :tooltip="steps[7].form.b2c.sexRatio.optionSlider.tooltip"
                                                    :formatter="steps[7].form.b2c.sexRatio.optionSlider.formatter"
                                                    :tooltipStyle="steps[7].form.b2c.sexRatio.optionSlider.tooltipStyle"
                                                    :min="steps[7].form.b2c.sexRatio.optionSlider.min"
                                                    :max="steps[7].form.b2c.sexRatio.optionSlider.max">

                                        </vue-slider>
                                    </div>
                                    <figure>
                                        <img src="/svg/icons/ic_gender_woman.svg" class="svg" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>

                        <div class="column is-12">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.familyStatusClients.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[7].form.b2c.familyStatusClients.selected"
                                        :deselect-label="steps[7].form.b2c.familyStatusClients.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[7].form.b2c.familyStatusClients.placeholder"
                                        :options="steps[7].form.b2c.familyStatusClients.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[7].form.b2c.familyStatusClients.selectLabel"
                                        :selectedLabel="steps[7].form.b2c.familyStatusClients.selectedLabel">
                                        <span slot="noResult">{{steps[7].form.b2c.familyStatusClients.noResult}}</span>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <label class="label label_req"><span>{{steps[7].form.b2c.aloneClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.aloneClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.aloneClients.value"
                                           :placeholder="steps[7].form.b2c.aloneClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[7].form.b2c.aloneClients.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="column is-3">
                            <label
                                class="label label_req"><span>{{steps[7].form.b2c.couplesClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.couplesClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.couplesClients.value"
                                           :placeholder="steps[7].form.b2c.couplesClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[7].form.b2c.couplesClients.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="column is-3">
                            <label
                                class="label label_req"><span>{{steps[7].form.b2c.familiesWithChildrenClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.familiesWithChildrenClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.familiesWithChildrenClients.value"
                                           :placeholder="steps[7].form.b2c.familiesWithChildrenClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                  <span class="icon is-small"
                                        v-tooltip="steps[7].form.b2c.familiesWithChildrenClients.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="column is-12">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.socialStatusClients.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[7].form.b2c.socialStatusClients.selected"
                                        :deselect-label="steps[7].form.b2c.socialStatusClients.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[7].form.b2c.socialStatusClients.placeholder"
                                        :options="steps[7].form.b2c.socialStatusClients.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[7].form.b2c.socialStatusClients.selectLabel"
                                        :selectedLabel="steps[7].form.b2c.socialStatusClients.selectedLabel">
                                        <span slot="noResult">{{steps[7].form.b2c.socialStatusClients.noResult}}</span>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <label class="label label_req"><span>{{steps[7].form.b2c.childClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.childClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.childClients.value"
                                           :placeholder="steps[7].form.b2c.childClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[7].form.b2c.childClients.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="column is-3">
                            <label
                                class="label label_req"><span>{{steps[7].form.b2c.studentsClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.studentsClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.studentsClients.value"
                                           :placeholder="steps[7].form.b2c.studentsClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[7].form.b2c.studentsClients.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="column is-3">
                            <label
                                class="label label_req"><span>{{steps[7].form.b2c.pensionersClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.pensionersClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.pensionersClients.value"
                                           :placeholder="steps[7].form.b2c.pensionersClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                      <span class="icon is-small"
                                            v-tooltip="steps[7].form.b2c.pensionersClients.tooltip">
                                        <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                      </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.averageIncomeTargetClientsFrom.title}}</span></label>
                                <div class="field has-addons">
                                    <div
                                        class="control control-text-left control-text-left_3em has-icons-right has-icons-right_1 is-flex-1">
                                        <input type="number" class="input is-size-875"
                                               v-model="steps[7].form.b2c.averageIncomeTargetClientsFrom.value">
                                        <span class="text is-left is-size-875">от&nbsp;</span>
                                        <div class="icons is-right">
                                      <span class="icon is-small"
                                            v-tooltip="steps[7].form.b2c.averageIncomeTargetClientsFrom.tooltip">
                                        <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                      </span>
                                        </div>
                                    </div>
                                    <div
                                        class="control control-text-left control-text-left_3em has-icons-right has-icons-right_1 is-flex-1">
                                        <input type="number" class="input is-size-875"
                                               v-model="steps[7].form.b2c.averageIncomeTargetClientsTo.value">
                                        <span class="text is-left is-size-875">до&nbsp;</span>
                                        <div class="icons is-right">
                                      <span class="icon is-small"
                                            v-tooltip="steps[7].form.b2c.averageIncomeTargetClientsTo.tooltip">
                                        <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                      </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <label
                                class="label label_req"><span>{{steps[7].form.b2c.averageCheckClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2c.averageCheckClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2c.averageCheckClients.value"
                                           :placeholder="steps[7].form.b2c.averageCheckClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                      <span class="icon is-small"
                                            v-tooltip="steps[7].form.b2c.averageCheckClients.tooltip">
                                        <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                      </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2c.mainAdvertisingSourcesAttractClients.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.selected"
                                        :deselect-label="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.placeholder"
                                        :options="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.selectLabel"
                                        :selectedLabel="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.selectedLabel">
                                        <span slot="noResult">{{steps[7].form.b2c.mainAdvertisingSourcesAttractClients.noResult}}</span>
                                    </multiselect>
                                </div>
                            </div>
                        </div>

                    </template>

                    <template>
                        <div class="column is-12 pb-0">
                            <h3>B2B</h3>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2b.mainCategoryBusinessPartners.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[7].form.b2b.mainCategoryBusinessPartners.selected"
                                        :deselect-label="steps[7].form.b2b.mainCategoryBusinessPartners.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[7].form.b2b.mainCategoryBusinessPartners.placeholder"
                                        :options="steps[7].form.b2b.mainCategoryBusinessPartners.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[7].form.b2b.mainCategoryBusinessPartners.selectLabel"
                                        :selectedLabel="steps[7].form.b2b.mainCategoryBusinessPartners.selectedLabel">
                                        <span slot="noResult">{{steps[7].form.b2b.mainCategoryBusinessPartners.noResult}}</span>
                                    </multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2b.haveExistingContracts.title}}</span></label>
                                <div class="control">
                                    <multiselect v-model="steps[7].form.b2b.haveExistingContracts.selected"
                                                 :deselect-label="steps[7].form.b2b.haveExistingContracts.deselectLabel"
                                                 track-by="name"
                                                 label="name"
                                                 openDirection="bottom"
                                                 :placeholder="steps[7].form.b2b.haveExistingContracts.placeholder"
                                                 :options="steps[7].form.b2b.haveExistingContracts.options"
                                                 :searchable="false"
                                                 :allow-empty="false"
                                                 :selectLabel="steps[7].form.b2b.haveExistingContracts.selectLabel"
                                                 :selectedLabel="steps[7].form.b2b.haveExistingContracts.selectedLabel">
                                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                        </template>
                                    </multiselect>
                                </div>
                            </div>
                        </div>

                        <template v-for="(item, index) in steps[7].form.b2b.listContracts">
                            <div class="column is-12">
                                <div class="columns is-multiline list-wrap">
                                    <div class="column is-6">
                                        <div class="field">
                                            <label
                                                class="label label_req"><span>{{steps[7].form.b2b.listContracts[index].title.title}}</span></label>
                                            <div class="control has-icons-right has-icons-right_1">
                                                <input type="text"
                                                       class="input is-size-875"
                                                       v-model="steps[7].form.b2b.listContracts[index].title.value"
                                                       :placeholder="steps[7].form.b2b.listContracts[index].title.placeholder"
                                                >
                                                <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[7].form.b2b.listContracts[index].title.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="columns is-multiline">
                                            <div class="column">
                                                <div class="field">
                                                    <label class="label label_req"><span>{{steps[7].form.b2b.listContracts[index].finalDate.title}}</span></label>
                                                    <div class="control has-icons-left has-icons-left_1">
                                                        <flat-pickr
                                                            class="input is-size-875"
                                                            v-model="steps[7].form.b2b.listContracts[index].finalDate.value"
                                                            :placeholder="steps[7].form.b2b.listContracts[index].finalDate.placeholder"
                                                            :config="steps[7].form.b2b.listContracts[index].finalDate.config"
                                                        >

                                                        </flat-pickr>
                                                        <div class="icons is-left">
                                                              <span class="icon is-small">
                                                                <img src="/svg/icons/ic_calendar.svg" class="svg"
                                                                     alt="">
                                                              </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-narrow">
                                                <button class="button is-warning is-outlined button-remove"
                                                        v-tooltip="'Удалить'"
                                                        @click="removeContract(index)">
                                                    &times;<span class="is-size-875 is-hidden-tablet">Удалить</span>
                                                </button>
                                                <button class="button is-info is-outlined button-add"
                                                        v-tooltip="'Добавить'"
                                                        @click="addContract">
                                                    +<span class="is-size-875 is-hidden-tablet">Добавить</span>
                                                </button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div class="column is-6">
                            <div class="field">
                                <label class="label label_req"><span>{{steps[7].form.b2b.countPerpetualServiceContracts.title}}</span></label>

                                <div class="field">
                                    <div class="control has-icons-right has-icons-right_2">
                                        <input type="number"
                                               class="input is-size-875"
                                               v-model="steps[7].form.b2b.countPerpetualServiceContracts.value"
                                               :placeholder="steps[7].form.b2b.countPerpetualServiceContracts.placeholder"
                                        >
                                        <div class="icons is-right">
                                              <span class="icon is-small"
                                                    v-tooltip="steps[7].form.b2b.countPerpetualServiceContracts.tooltip">
                                                <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                              </span>
                                            <div class="icon buttons-control-input-number">
                                                <div class="plus"
                                                     @click="steps[7].form.b2b.countPerpetualServiceContracts.value++">
                                                    <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                                </div>
                                                <div class="minus"
                                                     @click="steps[7].form.b2b.countPerpetualServiceContracts.value--">
                                                    <img src="/svg/icons/ic_arrow.svg" class="svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <label class="label label_req"><span>{{steps[7].form.b2b.averageCheckClients.title}}</span></label>
                            <div class="field has-addons">
                                <p class="control">
                                <span class="button is-static is-size-875">
                                   {{steps[7].form.b2b.averageCheckClients.prevTxt}}
                                </span>
                                </p>
                                <div class="control is-expanded has-icons-right has-icons-right_1">
                                    <input type="number"
                                           class="input is-size-875"
                                           v-model="steps[7].form.b2b.averageCheckClients.value"
                                           :placeholder="steps[7].form.b2b.averageCheckClients.placeholder"
                                    >
                                    <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="steps[7].form.b2b.averageCheckClients.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="column is-6">
                            <div class="field">
                                <label
                                    class="label label_req"><span>{{steps[7].form.b2b.mainAdvertisingSourcesAttractClients.title}}</span></label>
                                <div class="control">
                                    <multiselect
                                        v-model="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.selected"
                                        :deselect-label="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.deselectLabel"
                                        track-by="name"
                                        label="name"
                                        openDirection="bottom"
                                        :multiple="true"
                                        :class="'multiselect_multiple'"
                                        :placeholder="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.placeholder"
                                        :options="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.options"
                                        :searchable="true"
                                        :close-on-select="false"
                                        :allow-empty="true"
                                        :selectLabel="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.selectLabel"
                                        :selectedLabel="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.selectedLabel">
                                        <span slot="noResult">{{steps[7].form.b2b.mainAdvertisingSourcesAttractClients.noResult}}</span>
                                    </multiselect>
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
                                        @click="toggleStep(8)">
                                    <span>Шаг 8: Юридическое состояние</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3"
                                        @click="toggleStep(6)">
                                    <span class="has-text-decoration-underline">Вернуться назад</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="step === 8">
            <div class="box step">
                <div class="step__header">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_law_form.svg" alt=""
                                     class="svg"><span>{{steps[8].title}}</span>
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
                                        <progress class="progress is-success is-small" value="65" max="100"></progress>
                                        <div class="has-text-success has-text-weight-bold percent">65.07%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.legalStatus.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[8].form.legalStatus.selected"
                                             :deselect-label="steps[8].form.legalStatus.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[8].form.legalStatus.placeholder"
                                             :options="steps[8].form.legalStatus.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[8].form.legalStatus.selectLabel"
                                             :selectedLabel="steps[8].form.legalStatus.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.taxSystem.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[8].form.taxSystem.selected"
                                             :deselect-label="steps[8].form.taxSystem.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[8].form.taxSystem.placeholder"
                                             :options="steps[8].form.taxSystem.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[8].form.taxSystem.selectLabel"
                                             :selectedLabel="steps[8].form.taxSystem.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.changesProfileLegalEntity.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[8].form.changesProfileLegalEntity.selected"
                                             :deselect-label="steps[8].form.changesProfileLegalEntity.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[8].form.changesProfileLegalEntity.placeholder"
                                             :options="steps[8].form.changesProfileLegalEntity.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[8].form.changesProfileLegalEntity.selectLabel"
                                             :selectedLabel="steps[8].form.changesProfileLegalEntity.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.havePenalties.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[8].form.havePenalties.selected"
                                             :deselect-label="steps[8].form.havePenalties.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[8].form.havePenalties.placeholder"
                                             :options="steps[8].form.havePenalties.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[8].form.havePenalties.selectLabel"
                                             :selectedLabel="steps[8].form.havePenalties.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.listPenalties.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="steps[8].form.listPenalties.selected"
                                    :deselect-label="steps[8].form.listPenalties.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :multiple="true"
                                    :class="'multiselect_multiple'"
                                    :placeholder="steps[8].form.listPenalties.placeholder"
                                    :options="steps[8].form.listPenalties.options"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :allow-empty="true"
                                    :selectLabel="steps[8].form.listPenalties.selectLabel"
                                    :selectedLabel="steps[8].form.listPenalties.selectedLabel">
                                    <span slot="noResult">{{steps[8].form.listPenalties.noResult}}</span>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.haveDisputableSituations.title}}</span></label>
                            <div class="control">
                                <multiselect v-model="steps[8].form.haveDisputableSituations.selected"
                                             :deselect-label="steps[8].form.haveDisputableSituations.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="steps[8].form.haveDisputableSituations.placeholder"
                                             :options="steps[8].form.haveDisputableSituations.options"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :selectLabel="steps[8].form.haveDisputableSituations.selectLabel"
                                             :selectedLabel="steps[8].form.haveDisputableSituations.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}
                                    </template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="field">
                            <label
                                class="label label_req"><span>{{steps[8].form.listDisputableSituations.title}}</span></label>
                            <div class="control">
                                <multiselect
                                    v-model="steps[8].form.listDisputableSituations.selected"
                                    :deselect-label="steps[8].form.listDisputableSituations.deselectLabel"
                                    track-by="name"
                                    label="name"
                                    openDirection="bottom"
                                    :multiple="true"
                                    :class="'multiselect_multiple'"
                                    :placeholder="steps[8].form.listDisputableSituations.placeholder"
                                    :options="steps[8].form.listDisputableSituations.options"
                                    :searchable="true"
                                    :close-on-select="false"
                                    :allow-empty="true"
                                    :selectLabel="steps[8].form.listDisputableSituations.selectLabel"
                                    :selectedLabel="steps[8].form.listDisputableSituations.selectedLabel">
                                    <span slot="noResult">{{steps[8].form.listDisputableSituations.noResult}}</span>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step__footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="buttons">
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                >
                                    <span>Перейти к публикации объявления</span>
                                    <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                </button>
                                <button class="button is-clear is-clear_close is-size-875 h-3"
                                        @click="toggleStep(7)">
                                    <span class="has-text-decoration-underline">Вернуться назад</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        tooltip: 'tooltip text',
                                        placeholder: '25.02.2020',
                                        value: '',
                                        config: {
                                            altFormat: 'd.m.Y',
                                            altInput: true,
                                            dateFormat: 'Y-m-d'
                                        }
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
                                        placeholder: '25.02.2020',
                                        value: '',
                                        config: {
                                            altFormat: 'd.m.Y',
                                            altInput: true,
                                            dateFormat: 'Y-m-d'
                                        },
                                        tooltip: 'tooltip text',
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
                                        placeholder: '25.02.2020',
                                        value: '',
                                        config: {
                                            altFormat: 'd.m.Y',
                                            altInput: true,
                                            dateFormat: 'Y-m-d'
                                        },
                                        tooltip: 'tooltip text',
                                    },
                                },
                            ],
                        }
                    },
                    4: {
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
                    },
                    5: {
                        title: "Материальные активы",
                        active: false,
                        success: false,
                        form: {
                            techDocEquipmentCD: {
                                selected: null,
                                title: 'Техническая документация на оборудование (чеки или договор)?',
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
                            techDocEquipment: {
                                selected: null,
                                title: 'Техническая документация на оборудование?',
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
                            conditionProperty: {
                                selected: null,
                                title: 'Состояние имущества (по оценке собственника)',
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
                            conditionEquipment: {
                                selected: null,
                                title: 'Состояние оборудования, транспорта, техники (по оценке собственника)',
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
                            pledgeEquipment: {
                                selected: null,
                                title: 'Залог на оборудование, транспорт и дугие материльные активы?',
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
                                placeholder: '25.02.2020',
                                value: '',
                                config: {
                                    altFormat: 'd.m.Y',
                                    altInput: true,
                                    dateFormat: 'Y-m-d'
                                }
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
                                ],
                                noResult: 'Ничего не найдено'
                            },
                            listTransferredProperty: {
                                selected: null,
                                title: 'Перечень имущества передаваемого продавцом',
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

                            deductionsDepreciation: {
                                selected: null,
                                title: 'Отчисления на амортизцию',
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
                            amountDeductionsProfits: {
                                title: 'Объем отчислений от прибыли',
                                placeholder: '75',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                            },

                        }
                    },
                    6: {
                        title: "Нематериальные активы",
                        active: false,
                        success: false,
                        form: {
                            saleSite: {
                                selected: null,
                                title: 'Продается ли сайт?',
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
                            yearCreationSite: {
                                title: 'Год создания сайта',
                                placeholder: '2010',
                                value: '',
                            },
                            cms: {
                                selected: null,
                                title: 'Система управления сайтом',
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
                            themeSite: {
                                selected: null,
                                title: 'Тематика сайта',
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
                            salePhone: {
                                selected: null,
                                title: 'Продается ли телефон?',
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
                            phone: {
                                title: 'Номер телефона',
                                placeholder: '880005553535',
                                value: '',
                                tooltip: 'tooltip text'
                            },
                            intellectualProperty: {
                                selected: null,
                                title: 'Интеллектуальная собственность?',
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
                            intellectualPropertyList: {
                                selected: null,
                                title: 'Укажите объекты интеллектуальной собственности',
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

                            visitorsPerDay: {
                                title: 'Посетителей в день',
                                placeholder: '18 300',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            viewsPerDay: {
                                title: 'Просмотров в день',
                                placeholder: '12 300',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            natureTraffic: {
                                selected: null,
                                title: 'Характер трафика',
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
                            sourcesTraffic: {
                                selected: null,
                                title: 'Источники трафика',
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
                            sourceGoogle: {
                                title: 'Источник: Google',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            sourceYandex: {
                                title: 'Источник: Яндекс',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                            },
                            additionalInformationTraffic: {
                                title: 'Дополнительная информация по трафику',
                                placeholder: 'Опишите дополнительную информацию по вашему трафику',
                                value: '',
                                tooltip: 'tooltip text',
                            },

                            haveIncomeSite: {
                                selected: null,
                                title: 'Получаете ли доход из сайта?',
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
                            averageMonthlyIncome: {
                                title: 'Среднемесячный доход',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            sourcesIncome: {
                                selected: null,
                                title: 'Источники дохода',
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
                            contextualAdvertising: {
                                title: 'Контекстная реклама',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            contextualAdvertisingGAdsens: {
                                title: 'Из них Google Adsens',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            bannerTizerNetworks: {
                                title: 'Баннерные и тизирные сети',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            cpa: {
                                title: 'CPA',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            banMonetizationSystems: {
                                title: 'Бан в системах монетизации',
                                value: false,
                            },
                            additionalInformationIncome: {
                                title: 'Дополнительная информация по доходам',
                                placeholder: 'Опишите дополнительную информацию по доходам',
                                value: '',
                                tooltip: 'tooltip text',
                            },

                            averageMonthlyExpensesSite: {
                                title: 'Среднемесячный расход',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            categoriesExpensesSite: {
                                selected: null,
                                title: 'Категории расходов',
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
                            contentExpensesSite: {
                                title: 'Контент',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            hostingExpensesSite: {
                                title: 'Хостинг и администрирование',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            otherExpensesSite: {
                                title: 'Иные расходы',
                                placeholder: '1 000',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: 'zł',
                            },
                            additionalInformationExpensesSite: {
                                title: 'Дополнительная информация по расходам',
                                placeholder: 'Опишите дополнительную информацию по расходам',
                                value: '',
                                tooltip: 'tooltip text',
                            },

                            siteDesign: {
                                selected: null,
                                title: 'Дизайн сайта',
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

                            imgSiteOwn: {
                                title: 'Собственные',
                                placeholder: '50',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                                optionSlider: {
                                    tooltip: false,
                                    min: 0,
                                    max: 100
                                },
                            },
                            imgSiteOtherSources: {
                                title: 'Из других источников',
                                placeholder: '50',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                                optionSlider: {
                                    tooltip: false,
                                    min: 0,
                                    max: 100
                                },
                            },

                            textSiteCopyright: {
                                title: 'Копирайт',
                                placeholder: '50',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                                optionSlider: {
                                    tooltip: false,
                                    min: 0,
                                    max: 100
                                },
                            },
                            textSiteManualRewrite: {
                                title: 'Ручной рерайт',
                                placeholder: '50',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                                optionSlider: {
                                    tooltip: false,
                                    min: 0,
                                    max: 100
                                },
                            },
                            textSiteSavePaste: {
                                title: 'Копи-паст',
                                placeholder: '50',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                                optionSlider: {
                                    tooltip: false,
                                    min: 0,
                                    max: 100
                                },
                            },
                            textSiteGenerated: {
                                title: 'Генерированый',
                                placeholder: '50',
                                value: '',
                                tooltip: 'tooltip text',
                                prevTxt: '%',
                                optionSlider: {
                                    tooltip: false,
                                    min: 0,
                                    max: 100
                                },
                            },
                            additionalInformationContentSite: {
                                title: 'Дополнительная информация по контенту и дизайну',
                                placeholder: 'Опишите дополнительную информацию по контенту и дизайну',
                                value: '',
                                tooltip: 'tooltip text',
                            },

                            saleGroupsSocNet: {
                                selected: null,
                                title: 'Передаются ли группы в социальных сетях?',
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
                            socNetList: {
                                selected: null,
                                title: 'Укажите социальные сети',
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
                            socNetItems: [
                                {
                                    title: 'Facebook',
                                    link: {
                                        title: 'Ссылка на группу в Facebook',
                                        placeholder: 'https://',
                                        value: '',
                                        tooltip: 'tooltip text',
                                    },
                                    countUsers: {
                                        title: 'Объём пользователей группы в Facebook',
                                        placeholder: '11000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                    },
                                    haveIncome: {
                                        selected: null,
                                        title: 'Получаете ли доход с группы?',
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
                                    incomeYear: {
                                        title: 'Доход с группы в год',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    incomeQuarter: {
                                        title: 'Доход с группы в квартал ',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    turnoverYear: {
                                        title: 'Оборот с группы в год',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    turnoverQuarter: {
                                        title: 'Оборот с группы в квартал ',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    expensesYear: {
                                        title: 'Расходы с группы в год',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    expensesQuarter: {
                                        title: 'Расходы с группы в квартал ',
                                        placeholder: '1 000',
                                        value: '',
                                        tooltip: 'tooltip text',
                                        prevTxt: 'zł',
                                    },
                                    themes: {
                                        selected: null,
                                        title: 'Тематика группы',
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
                                    lang: {
                                        selected: null,
                                        title: 'Языковой сегмент группы',
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
                                    methodTransferGroup: {
                                        selected: null,
                                        title: 'Способ передачи группы',
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

                                }
                            ]
                        }
                    },
                    7: {
                        title: "Целевая аудитория",
                        active: false,
                        success: false,
                        form: {
                            typeAudience: {
                                selected: null,
                                title: 'Тип аудитории на которую расчитан бизнес',
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
                            b2c: {
                                genderTargetAudience: {
                                    selected: null,
                                    title: 'Пол целевой аудитории',
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
                                ageMenFrom: {
                                    title: 'Возраст мужчин',
                                    placeholder: '20',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                ageMenTo: {
                                    title: 'Возраст мужчин',
                                    placeholder: '48',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                ageWomenFrom: {
                                    title: 'Возраст женщин',
                                    placeholder: '20',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                ageWomenTo: {
                                    title: 'Возраст женщин',
                                    placeholder: '48',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                sexRatio: {
                                    title: 'Соотношение полов',
                                    value: 50,
                                    optionSlider: {
                                        tooltip: 'always',
                                        formatter: '{value}%',
                                        min: 0,
                                        max: 100,
                                        tooltipStyle: {
                                            "backgroundColor": "transparent",
                                            "borderColor": "transparent",
                                            "color": "#1C2940",
                                            "top": ".5rem",
                                            "position": "relative"

                                        }
                                    }
                                },

                                familyStatusClients: {
                                    selected: null,
                                    title: 'Семейный статус клиентов',
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
                                aloneClients: {
                                    title: 'Соотношение одиноких',
                                    placeholder: '50',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: '%',
                                },
                                couplesClients: {
                                    title: 'Соотношение пар',
                                    placeholder: '50',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: '%',
                                },
                                familiesWithChildrenClients: {
                                    title: 'Соотношение семей с детьми',
                                    placeholder: '50',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: '%',
                                },

                                socialStatusClients: {
                                    selected: null,
                                    title: 'Социальные статусы клиентов',
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
                                childClients: {
                                    title: 'Соотношение детей',
                                    placeholder: '50',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: '%',
                                },
                                studentsClients: {
                                    title: 'Соотношение студентов',
                                    placeholder: '50',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: '%',
                                },
                                pensionersClients: {
                                    title: 'Соотношение пенсонеров',
                                    placeholder: '50',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: '%',
                                },

                                averageIncomeTargetClientsFrom: {
                                    title: 'Средний уровень доходов целевых клиентов',
                                    placeholder: '1000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                averageIncomeTargetClientsTo: {
                                    title: 'Средний уровень доходов целевых клиентов',
                                    placeholder: '1000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },

                                averageCheckClients: {
                                    title: 'Средний чек клиента',
                                    placeholder: '1000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: 'zł',
                                },
                                mainAdvertisingSourcesAttractClients: {
                                    selected: null,
                                    title: 'Основные рекламные источники привлечение клиентов',
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
                            },
                            b2b: {
                                mainCategoryBusinessPartners: {
                                    selected: null,
                                    title: 'Основаня категория партнёров по бизнесу',
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
                                haveExistingContracts: {
                                    selected: null,
                                    title: 'Наличие действущих контрактов?',
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
                                listContracts: [
                                    {
                                        title: {
                                            title: 'Название контракта №1',
                                            placeholder: 'Укажите название контракта',
                                            value: '',
                                            tooltip: 'tooltip text',
                                        },
                                        finalDate: {
                                            title: 'Срок действия контракта №1',
                                            tooltip: 'tooltip text',
                                            placeholder: '25.02.2020',
                                            value: '',
                                            config: {
                                                altFormat: 'd.m.Y',
                                                altInput: true,
                                                dateFormat: 'Y-m-d'
                                            }
                                        },
                                    }
                                ],
                                countPerpetualServiceContracts: {
                                    title: 'Количество бессрочных договров на оказания улсуг',
                                    placeholder: '4',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                averageCheckClients: {
                                    title: 'Средний чек клиента',
                                    placeholder: '1000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                    prevTxt: 'zł',
                                },
                                mainAdvertisingSourcesAttractClients: {
                                    selected: null,
                                    title: 'Основные рекламные источники привлечение клиентов',
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
                            }
                        }
                    },
                    8: {
                        title: "Юридическое состояние",
                        active: false,
                        success: false,
                        form: {
                            legalStatus: {
                                selected: null,
                                title: 'Юридический статус',
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
                            taxSystem: {
                                selected: null,
                                title: 'Система налогообложения',
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
                            changesProfileLegalEntity: {
                                selected: null,
                                title: 'Были изменения профиля деятельности в юридическом лице?',
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
                            havePenalties: {
                                selected: null,
                                title: 'Непокрытые штрафные санкции, наложенные фискальными органами?',
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
                            listPenalties: {
                                selected: null,
                                title: 'Укажите штрафные санкции',
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
                            haveDisputableSituations: {
                                selected: null,
                                title: 'Вовлечение в спорные/коммерческие/административные ситуации?',
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
                            listDisputableSituations: {
                                selected: null,
                                title: 'Укажите типы спорных ситуаций',
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
                        }
                    },
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
            addContract() {
                // Добавление контракта
            },
            removeContract(index) {
                // Удаление контракта
            },
        }
    }
</script>

<style scoped>

</style>
