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
                    <div class="column is-6">
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                   zł
                                </span>
                            </p>
                            <div class="control is-expanded has-icons-right has-icons-right_1">
                                <input type="text"
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
                                    <div class="control has-icons-right has-icons-right_2">
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
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label label_req"><span>{{steps[2].form.negativeScenario.title}}</span></label>
                                    <div class="control has-icons-right has-icons-right_2">
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
            <div class="box">
                Step 3 Content
            </div>
        </div>
        <div v-show="step === 4">
            <div class="box">
                Step 4 Content
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
                    2:
                        {
                            title: "Финансовые показатели",
                            active: false,
                            success: false,
                            form: {
                                priceShares: {
                                    title: 'Цена долей или акций',
                                    placeholder: '100 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                netAverageAnnualProfit: {
                                    title: 'Чистая средняя годовая прибыль',
                                    placeholder: '1 000 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                netAverageQuarterlyProfit: {
                                    title: 'Чистая средняя квартальная прибыль',
                                    placeholder: '50 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                averageAnnualTurnover: {
                                    title: 'Средний годовой оборот',
                                    placeholder: '10 000 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                averageQuarterlyTurnover: {
                                    title: 'Средний квартальный оборот',
                                    placeholder: '500 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                costBusinessPerYear: {
                                    title: 'Затраты на коммерческую деятельность в год',
                                    placeholder: '25 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                costBusinessPerQuarter: {
                                    title: 'Затраты на коммерческую деятельность в квартал',
                                    placeholder: '100 000',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                positiveScenario: {
                                    title: 'Позитивный сценарий (в месяцах)',
                                    placeholder: '12',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                                negativeScenario: {
                                    title: 'Негативный сценарий (в месяцах)',
                                    placeholder: '36',
                                    value: '',
                                    tooltip: 'tooltip text',
                                },
                            },
                            labelReturnInvestment: 'Окупаемость вложенных средств'
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
