<template>
    <div ref="business-form" class="stepper">
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
                                    <div class="is-size-875">{{ trans('business.create.sold_success')}}</div>
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
                    <g-g-category-button v-model="business.category_id" :size="'is-6'"></g-g-category-button>
                    <g-g-location-select-input v-model="business.country_id" :size="'is-6'"></g-g-location-select-input>
                    <g-g-location-select-input :size="'is-6'" v-model="business.district_id"
                                               :type="'region'"></g-g-location-select-input>
                    <g-g-location-select-input :type="'city'" v-model="business.city_id"
                                               :size="'is-6'"></g-g-location-select-input>

                    <g-g-address-input v-model="business.options.addresses"></g-g-address-input>

                    <g-g-input :size="'is-6'" v-model="business.options.nameLegalEntity"
                               :label="trans('business.create.nameLegalEntity.title')"
                               :placeholder="trans('business.create.nameLegalEntity.placeholder')"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="business.name" :label="trans('business.create.name.title')"
                               :placeholder="trans('business.create.name.placeholder')"></g-g-input>
                    <g-g-radio-input v-model="business.options.partBusiness"
                                     :label="trans('business.create.partBusiness.title')"
                                     :list="trans('business.create.partBusiness.list')"></g-g-radio-input>

                    <g-g-input :type="'number'" :prevText="'%'" :size="'is-6'"
                               v-model="business.options.numberShares"
                               :label="trans('business.create.numberShares.title')"
                               :placeholder="trans('business.create.numberShares.placeholder')"></g-g-input>

                    <g-g-textarea :size="'is-12'" v-model="business.description"
                                  :label="trans('business.create.description.title')"
                                  :placeholder="trans('business.create.description.placeholder')"></g-g-textarea>

                    <g-g-input :type="'number'" :iconLeft="'/svg/icons/ic_calendar.svg'" :size="'is-6'"
                               v-model="business.options.yearFoundationBusiness"
                               :label="trans('business.create.yearFoundationBusiness.title')"
                               :placeholder="trans('business.create.yearFoundationBusiness.placeholder')"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="business.options.reasonSale"
                               :label="trans('business.create.reasonSale.title')"
                               :placeholder="trans('business.create.reasonSale.placeholder')"></g-g-input>

                    <div class="column is-12">
                        <upload-photo-business v-model="business.images"></upload-photo-business>
                    </div>
                    <g-g-input :size="'is-6'" v-model="business.options.nameVideoReview"
                               :label="trans('business.create.nameVideoReview.title')"
                               :placeholder="trans('business.create.nameVideoReview.placeholder')"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="business.options.linkVideoReview"
                               :label="trans('business.create.linkVideoReview.title')"
                               :placeholder="trans('business.create.linkVideoReview.placeholder')"></g-g-input>
                    <div class="column is-12">
                        <div class="field">
                            <div class="control">
                                <label class="checkbox is-info is-size-875" v-model="accept.value">
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
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.price" :label="trans('business.create.price.title')"
                               :placeholder="trans('business.create.price.placeholder')"></g-g-input>
                    <div class="column is-6 is-paddingless"></div>
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.profitability"
                               :label="trans('business.create.profitability.title')"
                               :placeholder="trans('business.create.profitability.placeholder')"></g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.options.netAverageQuarterlyProfit"
                               :label="trans('business.create.netAverageQuarterlyProfit.title')"
                               :placeholder="trans('business.create.netAverageQuarterlyProfit.placeholder')"></g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.revenue"
                               :label="trans('business.create.revenue.title')"
                               :placeholder="trans('business.create.revenue.placeholder')"></g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.options.averageQuarterlyTurnover"
                               :label="trans('business.create.averageQuarterlyTurnover.title')"
                               :placeholder="trans('business.create.averageQuarterlyTurnover.placeholder')"></g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.options.costBusinessPerYear"
                               :label="trans('business.create.costBusinessPerYear.title')"
                               :placeholder="trans('business.create.costBusinessPerYear.placeholder')"></g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'"
                               v-model="business.options.costBusinessPerQuarter"
                               :label="trans('business.create.costBusinessPerQuarter.title')"
                               :placeholder="trans('business.create.costBusinessPerQuarter.placeholder')"></g-g-input>

                    <div class="column is-12">
                        <label class="label is-size-6"><span>{{steps[2].labelReturnInvestment}}</span></label>
                        <div class="columns is-multiline">
                            <g-g-input :type="'number'" :prevText="'Месяцев'" :size="'is-6'"
                                       v-model="business.payback"
                                       :label="trans('business.create.payback.title')"
                                       :placeholder="trans('business.create.payback.placeholder')"></g-g-input>
                            <g-g-input :type="'number'" :prevText="'Месяцев'" :size="'is-6'"
                                       v-model="business.options.negativeScenario"
                                       :label="trans('business.create.negativeScenario.title')"
                                       :placeholder="trans('business.create.negativeScenario.placeholder')"></g-g-input>
                        </div>
                    </div>
                </div>
                <div class="step__footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="buttons">
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                        @click="toggleStep(3)"
                                >
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
                <div class="columns is-multiline ">
                    <div class="column is-12">
                        <g-g-business-object-input v-model="business.options.objects"></g-g-business-object-input>
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

                    <g-g-select-input v-model="business.options.transferWorkSchemes"
                                      :size="'is-3-desktop is-6-tablet'"
                                      :label="trans('business.create.transferWorkSchemes.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-input :type="'number'" :prevText="trans('business.create.monthTeach.prevText')"
                               :size="'is-3-desktop is-6-tablet'"
                               v-model="business.options.monthTeach"
                               :label="trans('business.create.monthTeach.title')"
                               :placeholder="trans('business.create.monthTeach.placeholder')">
                    </g-g-input>

                    <g-g-select-input v-model="business.options.readyTrainingMaterials"
                                      :size="'is-3-desktop is-6-tablet'"
                                      :label="trans('business.create.readyTrainingMaterials.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>

                    <g-g-select-input :size="'is-3-desktop is-6-tablet'" v-model="business.options.typeTrainingMaterials"
                                      :multiple="true"
                                      :closeOnSelect="false"
                                      :placeholder="trans('business.create.typeTrainingMaterials.placeholder')"
                                      :label="trans('business.create.typeTrainingMaterials.title')"
                                      :options="trans('business.create.typeTrainingMaterials.options')"></g-g-select-input>

                    <g-g-select-input v-model="business.options.transferCustomerBase"
                                      :size="'is-3-desktop is-6-tablet'"
                                      :label="trans('business.create.transferCustomerBase.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>

                    <g-g-select-input :size="'is-3-desktop is-6-tablet'" v-model="business.options.typeTransferCustomerBase"
                                      :multiple="true"
                                      :closeOnSelect="false"
                                      :placeholder="trans('business.create.typeTransferCustomerBase.placeholder')"
                                      :label="trans('business.create.typeTransferCustomerBase.title')"
                                      :options="trans('business.create.typeTransferCustomerBase.options')"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="business.options.haveContractors"
                                      :label="trans('business.create.haveContractors.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>

                    <g-g-contragents-input v-if="business.options.haveContractors == 1"
                                           :label="trans('business.create.contractors.title')"></g-g-contragents-input>
                    <g-g-workers-input v-model="business.options.staff"
                                       :label="trans('business.create.staff.title')"></g-g-workers-input>
                    <g-g-select-input :size="'is-6'" v-model="business.options.willStaffLeave"
                                      :label="trans('business.create.willStaffLeave.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <template v-if="business.options.willStaffLeave == 1">
                        <g-g-leaving-workers-input v-model="business.options.leavingStaff"></g-g-leaving-workers-input>
                    </template>
                    <g-g-certificates-input

                        :label="trans('business.create.certificates.title')"></g-g-certificates-input>
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
                    <g-g-select-input :size="'is-6'" v-model="business.options.techDocEquipmentCD"
                                      :label="trans('business.create.techDocEquipmentCD.title')"
                                      :placeholder="trans('business.create.have.placeholder')"
                                      :options="trans('business.create.have.options')"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="business.options.techDocEquipment"
                                      :label="trans('business.create.techDocEquipment.title')"
                                      :placeholder="trans('business.create.have.placeholder')"
                                      :options="trans('business.create.have.options')"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="business.options.conditionProperty"
                                      :label="trans('business.create.conditionProperty.title')"
                                      :placeholder="trans('business.create.conditionProperty.placeholder')"
                                      :options="trans('business.create.conditionProperty.options')"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="business.options.conditionEquipment"
                                      :label="trans('business.create.conditionEquipment.title')"
                                      :placeholder="trans('business.create.conditionEquipment.placeholder')"
                                      :options="trans('business.create.conditionEquipment.options')"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="business.options.pledgeEquipment"
                                      :label="trans('business.create.pledgeEquipment.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <template v-if="business.options.pledgeEquipment == 1">
                        <g-g-input :type="'number'" :prevText="'zt'"
                                   v-model="business.options.totalAmountCredit"
                                   :label="trans('business.create.totalAmountCredit.title')"
                                   :placeholder="trans('business.create.totalAmountCredit.placeholder')">
                        </g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'"
                                   v-model="business.options.repaidAmountCredit"
                                   :label="trans('business.create.repaidAmountCredit.title')"
                                   :placeholder="trans('business.create.repaidAmountCredit.placeholder')">
                        </g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'"
                                   v-model="business.options.balanceCredit"
                                   :label="trans('business.create.balanceCredit.title')"
                                   :placeholder="trans('business.create.balanceCredit.placeholder')">
                        </g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'"
                                   v-model="business.options.monthlyPaymentCredit"
                                   :label="trans('business.create.monthlyPaymentCredit.title')"
                                   :placeholder="trans('business.create.monthlyPaymentCredit.placeholder')">
                        </g-g-input>
                        <g-g-date-input :size="'is-3'" v-model="business.options.finalPaymentCreditDate"
                                        :label="trans('business.create.finalPaymentCreditDate.title')"
                                        :placeholder="trans('business.create.finalPaymentCreditDate.placeholder')"></g-g-date-input>

                        <g-g-select-input v-model="business.options.purposeCredit" :size="'is-3'"
                                          :placeholder="trans('business.create.purposeCredit.placeholder')"
                                          :label="trans('business.create.purposeCredit.title')" :searchable="true"
                                          :options="trans('business.create.purposeCredit.options')"></g-g-select-input>
                    </template>
                    <g-g-select-input v-model="business.options.listTransferredProperty" :size="'is-6'"
                                      :multiple="true"
                                      :placeholder="trans('business.create.listTransferredProperty.placeholder')"
                                      :label="trans('business.create.listTransferredProperty.title')" :searchable="true"
                                      :options="trans('business.create.listTransferredProperty.options')"></g-g-select-input>
                    <g-g-select-input v-model="business.options.deductionsDepreciation" :size="'is-3-desktop is-6-tablet'"
                                      :placeholder="trans('business.create.deductionsDepreciation.placeholder')"
                                      :label="trans('business.create.deductionsDepreciation.title')" :searchable="true"
                                      :options="trans('business.create.deductionsDepreciation.options')"></g-g-select-input>

                    <g-g-input v-if="business.options.deductionsDepreciation == 1" :type="'number'" :prevText="'%'"
                               v-model="business.options.amountDeductionsProfits"
                               :label="trans('business.create.amountDeductionsProfits.title')"
                               :placeholder="trans('business.create.amountDeductionsProfits.placeholder')">
                    </g-g-input>
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
                        <g-g-select-input v-model="business.options.saleSite" :size="'is-3'"
                                          :placeholder="trans('business.create.saleSite.placeholder')"
                                          :label="trans('business.create.saleSite.title')" :searchable="true"
                                          :options="trans('business.create.yn.options')"></g-g-select-input>

                        <g-g-input :type="'number'" :iconLeft="'/svg/icons/ic_calendar.svg'"
                                   v-model="business.options.yearCreationSite"
                                   :label="trans('business.create.saleSite.title')"
                                   :placeholder="trans('business.create.saleSite.placeholder')"></g-g-input>

                        <g-g-select-input :size="'is-6'" v-model="business.options.cms"
                                          :placeholder="trans('business.create.cms.placeholder')"
                                          :label="trans('business.create.cms.title')"
                                          :options="trans('business.create.cms.options')"></g-g-select-input>

                        <g-g-select-input :size="'is-6'" v-model="business.options.themeSite"
                                          :placeholder="trans('business.create.themeSite.placeholder')"
                                          :label="trans('business.create.themeSite.title')" :searchable="true"
                                          :options="trans('business.create.themeSite.options')"></g-g-select-input>
                        <g-g-select-input v-model="business.options.salePhone"
                                          :placeholder="trans('business.create.salePhone.placeholder')"
                                          :label="trans('business.create.salePhone.title')"
                                          :options="trans('business.create.yn.options')"></g-g-select-input>
                        <g-g-input :type="'number'" v-model="business.options.phone"
                                   :label="trans('business.create.phone.title')"
                                   :placeholder="trans('business.create.phone.placeholder')"></g-g-input>

                        <g-g-select-input :size="'is-6'" v-model="business.options.intellectualProperty"
                                          :placeholder="trans('business.create.intellectualProperty.placeholder')"
                                          :label="trans('business.create.intellectualProperty.title')"
                                          :options="trans('business.create.yn.options')">
                        </g-g-select-input>

                        <g-g-select-input :size="'is-6'" v-model="business.options.intellectualPropertyList"
                                          :multiple="true"
                                          :placeholder="trans('business.create.intellectualPropertyList.placeholder')"
                                          :label="trans('business.create.intellectualPropertyList.title')"
                                          :searchable="true"
                                          :options="trans('business.create.intellectualPropertyList.options')">
                        </g-g-select-input>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Трафик и SEO</h3>
                            </div>
                            <g-g-input :size="'is-6'" :type="'number'" v-model="business.options.visitorsPerDay"
                                       :label="trans('business.create.visitorsPerDay.title')"
                                       :placeholder="trans('business.create.visitorsPerDay.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" :type="'number'" v-model="business.options.viewsPerDay"
                                       :label="trans('business.create.viewsPerDay.title')"
                                       :placeholder="trans('business.create.viewsPerDay.placeholder')"></g-g-input>

                            <g-g-select-input :size="'is-6'" v-model="business.options.natureTraffic"
                                              :placeholder="trans('business.create.natureTraffic.placeholder')"
                                              :label="trans('business.create.natureTraffic.title')" :searchable="true"
                                              :options="trans('business.create.natureTraffic.options')"></g-g-select-input>
                            <g-g-select-input :size="'is-6'" v-model="business.options.sourcesTraffic"
                                              :multiple="true"
                                              :placeholder="trans('business.create.sourcesTraffic.placeholder')"
                                              :label="trans('business.create.sourcesTraffic.title')"
                                              :options="trans('business.create.sourcesTraffic.options')"></g-g-select-input>

                            <g-g-input :size="'is-6'" :type="'number'" v-model="business.options.sourceGoogle"
                                       :label="trans('business.create.sourceGoogle.title')"
                                       :placeholder="trans('business.create.sourceGoogle.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" :type="'number'" v-model="business.options.sourceYandex"
                                       :label="trans('business.create.sourceYandex.title')"
                                       :placeholder="trans('business.create.sourceYandex.placeholder')"></g-g-input>

                            <g-g-textarea :size="'is-12'"
                                          v-model="business.options.additionalInformationTraffic"
                                          :label="trans('business.create.additionalInformationTraffic.title')"
                                          :placeholder="trans('business.create.additionalInformationTraffic.placeholder')"></g-g-textarea>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Доходы сайта</h3>
                            </div>
                            <g-g-select-input v-model="business.options.haveIncomeSite"
                                              :placeholder="trans('business.create.haveIncomeSite.placeholder')"
                                              :label="trans('business.create.haveIncomeSite.title')"
                                              :options="trans('business.create.yn.options')"></g-g-select-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.averageMonthlyIncome"
                                       :label="trans('business.create.averageMonthlyIncome.title')"
                                       :placeholder="trans('business.create.averageMonthlyIncome.placeholder')"></g-g-input>
                            <g-g-select-input :size="'is-6'" v-model="business.options.sourcesIncome"
                                              :multiple="true"
                                              :placeholder="trans('business.create.sourcesIncome.placeholder')"
                                              :label="trans('business.create.sourcesIncome.title')"
                                              :options="trans('business.create.sourcesIncome.options')"></g-g-select-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.contextualAdvertising"
                                       :label="trans('business.create.contextualAdvertising.title')"
                                       :placeholder="trans('business.create.contextualAdvertising.placeholder')"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.contextualAdvertisingGAdsens"
                                       :label="trans('business.create.contextualAdvertisingGAdsens.title')"
                                       :placeholder="trans('business.create.contextualAdvertisingGAdsens.placeholder')"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.bannerTizerNetworks"
                                       :label="trans('business.create.bannerTizerNetworks.title')"
                                       :placeholder="trans('business.create.bannerTizerNetworks.placeholder')"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'" v-model="business.options.cpa"
                                       :label="trans('business.create.cpa.title')"
                                       :placeholder="trans('business.create.cpa.placeholder')"></g-g-input>

                            <g-g-check-box-input :margin="false" :size="'is-6'"
                                                 v-model="business.options.banMonetizationSystems"
                                                 :label="trans('business.create.banMonetizationSystems.title')"></g-g-check-box-input>
                            <g-g-textarea :size="'is-12'"
                                          v-model="business.options.additionalInformationIncome"
                                          :label="trans('business.create.banMonetizationSystems.title')"
                                          :placeholder="trans('business.create.banMonetizationSystems.placeholder')"></g-g-textarea>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Расходы сайта</h3>
                            </div>
                            <g-g-input :size="'is-6'" :prevText="'zt'" :type="'number'"
                                       v-model="business.options.averageMonthlyExpensesSite"
                                       :label="trans('business.create.averageMonthlyExpensesSite.title')"
                                       :placeholder="trans('business.create.averageMonthlyExpensesSite.placeholder')"></g-g-input>
                            <g-g-select-input v-model="business.options.categoriesExpensesSite"
                                              :multiple="true"
                                              :placeholder="trans('business.create.categoriesExpensesSite.placeholder')"
                                              :label="trans('business.create.categoriesExpensesSite.title')"
                                              :options="trans('business.create.categoriesExpensesSite.options')"></g-g-select-input>

                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.contentExpensesSite"
                                       :label="trans('business.create.contentExpensesSite.title')"
                                       :placeholder="trans('business.create.contentExpensesSite.placeholder')"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.hostingExpensesSite"
                                       :label="trans('business.create.hostingExpensesSite.title')"
                                       :placeholder="trans('business.create.hostingExpensesSite.placeholder')"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="business.options.otherExpensesSite"
                                       :label="trans('business.create.otherExpensesSite.title')"
                                       :placeholder="trans('business.create.otherExpensesSite.placeholder')"></g-g-input>

                            <g-g-textarea :size="'is-12'"
                                          v-model="business.options.additionalInformationExpensesSite"
                                          :label="trans('business.create.additionalInformationExpensesSite.title')"
                                          :placeholder="trans('business.create.additionalInformationExpensesSite.placeholder')"></g-g-textarea>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>О контенте и дизайне</h3>
                            </div>
                            <g-g-select-input :size="'is-6'" v-model="business.options.siteDesign"
                                              :placeholder="trans('business.create.siteDesign.placeholder')"
                                              :label="trans('business.create.siteDesign.title')"
                                              :options="trans('business.create.yn.options')"></g-g-select-input>

                            <div class="column is-12 pb-0">
                                <label class="label"><span>Фото и картинки на сайте</span></label>
                            </div>
                            <g-g-input :size="'is-6'" :prevText="'%'" :type="'number'"
                                       v-model="business.options.imgSiteOwn"
                                       :label="trans('business.create.imgSiteOwn.title')"
                                       :placeholder="trans('business.create.imgSiteOwn.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" :prevText="'%'" :type="'number'"
                                       v-model="business.options.imgSiteOtherSources"
                                       :label="trans('business.create.imgSiteOtherSources.title')"
                                       :placeholder="trans('business.create.imgSiteOtherSources.placeholder')"></g-g-input>

                            <div class="column is-12 pb-0">
                                <label
                                    class="label"><span>Тексты на сайте</span></label>
                            </div>
                            <g-g-input :prevText="'%'" :type="'number'"
                                       v-model="business.options.textSiteCopyright"
                                       :label="trans('business.create.textSiteCopyright.title')"
                                       :placeholder="trans('business.create.textSiteCopyright.placeholder')"></g-g-input>
                            <g-g-input :prevText="'%'" :type="'number'"
                                       v-model="business.options.textSiteManualRewrite"
                                       :label="trans('business.create.textSiteManualRewrite.title')"
                                       :placeholder="trans('business.create.textSiteManualRewrite.placeholder')"></g-g-input>
                            <g-g-input :prevText="'%'" :type="'number'"
                                       v-model="business.options.textSiteSavePaste"
                                       :label="trans('business.create.textSiteSavePaste.title')"
                                       :placeholder="trans('business.create.textSiteSavePaste.placeholder')"></g-g-input>
                            <g-g-input :prevText="'%'" :type="'number'"
                                       v-model="business.options.textSiteGenerated"
                                       :label="trans('business.create.textSiteGenerated.title')"
                                       :placeholder="trans('business.create.textSiteGenerated.placeholder')"></g-g-input>

                            <g-g-textarea :size="'is-12'"
                                          v-model="business.options.additionalInformationContentSite"
                                          :label="trans('business.create.additionalInformationContentSite.title')"
                                          :placeholder="trans('business.create.additionalInformationContentSite.placeholder')"></g-g-textarea>
                        </template>
                        <div class="column is-12">
                            <g-g-social-input v-model="business.options.socNet"></g-g-social-input>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="px-1-5">
                    <!--<g-g-social-input v-model="business.options.socNet"></g-g-social-input>-->
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
                    <g-g-select-input v-model="business.options.typeAudience" :size="'is-6'"
                                      :placeholder="trans('business.create.typeAudience.placeholder')"
                                      :label="trans('business.create.typeAudience.title')"
                                      :options="trans('business.create.typeAudience.options')"></g-g-select-input>

                    <template v-if="(business.options.typeAudience == 1 || business.options.typeAudience == 3)">
                        <div class="column is-12 pb-0">
                            <h3>B2C</h3>
                        </div>
                        <g-g-select-input v-model="business.options.genderTargetAudience"
                                          :size="'is-6-desktop is-12-tablet'"
                                          :placeholder="trans('business.create.genderTargetAudience.placeholder')"
                                          :label="trans('business.create.genderTargetAudience.title')"
                                          :options="trans('business.create.genderTargetAudience.options')">
                        </g-g-select-input>
                        <g-g-from-to-input v-model="business.options.ageMen"
                                           :size="'is-3-desktop is-4-tablet'"
                                           :label="trans('business.create.ageMenFrom.title')"></g-g-from-to-input>
                        <g-g-from-to-input v-model="business.options.ageWomen"
                                           :size="'is-3-desktop is-4-tablet'"
                                           :label="trans('business.create.ageWomenFrom.title')"></g-g-from-to-input>
                        <g-g-from-to-input v-model="business.options.sexRatio" :textFrom="'м %'" :textTo="'ж %'"
                                           :size="'is-3-desktop is-4-tablet'"
                                           :label="trans('business.create.sexRatio.title')"></g-g-from-to-input>
                        <g-g-select-input v-model="business.options.familyStatusClients" :size="'is-12'"
                                          :multiple="true"
                                          :placeholder="trans('business.create.familyStatusClients.placeholder')"
                                          :label="trans('business.create.familyStatusClients.title')"
                                          :options="trans('business.create.familyStatusClients.options')"></g-g-select-input>
                        <g-g-input :type="'number'" :prevText="'%'" v-model="business.options.aloneClients"
                                   :size="'is-3-desktop is-4-tablet'"
                                   :label="trans('business.create.aloneClients.title')"
                                   :placeholder="trans('business.create.aloneClients.placeholder')"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'%'" v-model="business.options.couplesClients"
                                   :size="'is-3-desktop is-4-tablet'"
                                   :label="trans('business.create.couplesClients.title')"
                                   :placeholder="trans('business.create.couplesClients.placeholder')"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'%'"
                                   :size="'is-3-desktop is-4-tablet'"
                                   v-model="business.options.familiesWithChildrenClients"
                                   :label="trans('business.create.familiesWithChildrenClients.title')"
                                   :placeholder="trans('business.create.familiesWithChildrenClients.placeholder')"></g-g-input>
                        <g-g-select-input v-model="business.options.socialStatusClients" :size="'is-12'"
                                          :multiple="true"
                                          :placeholder="trans('business.create.socialStatusClients.placeholder')"
                                          :label="trans('business.create.socialStatusClients.title')"
                                          :options="trans('business.create.socialStatusClients.options')"></g-g-select-input>
                        <g-g-input :type="'number'" :prevText="'%'" v-model="business.options.childClients"
                                   :size="'is-3-desktop is-4-tablet'"
                                   :label="trans('business.create.childClients.title')"
                                   :placeholder="trans('business.create.childClients.placeholder')"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'%'" v-model="business.options.studentsClients"
                                   :size="'is-3-desktop is-4-tablet'"
                                   :label="trans('business.create.studentsClients.title')"
                                   :placeholder="trans('business.create.studentsClients.placeholder')"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'%'" v-model="business.options.pensionersClients"
                                   :size="'is-3-desktop is-4-tablet'"
                                   :label="trans('business.create.pensionersClients.title')"
                                   :placeholder="trans('business.create.pensionersClients.placeholder')"></g-g-input>
                        <g-g-from-to-input :size="'is-6'"
                                           v-model="business.options.averageIncomeTargetClientsFrom"
                                           :label="trans('business.create.averageIncomeTargetClientsFrom.title')"></g-g-from-to-input>
                        <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                   v-model="business.options.averageCheckClients"
                                   :label="trans('business.create.averageCheckClients.title')"
                                   :placeholder="trans('business.create.averageCheckClients.placeholder')"></g-g-input>
                        <g-g-select-input v-model="business.options.mainAdvertisingSourcesAttractClients"
                                          :multiple="true"
                                          :size="'is-6'"
                                          :placeholder="trans('business.create.mainAdvertisingSourcesAttractClients.placeholder')"
                                          :label="trans('business.create.mainAdvertisingSourcesAttractClients.title')"
                                          :options="trans('business.create.mainAdvertisingSourcesAttractClients.options')"></g-g-select-input>

                    </template>

                    <template v-if="(business.options.typeAudience == 2 || business.options.typeAudience == 3)">
                        <div class="column is-12 pb-0">
                            <h3>B2B</h3>
                        </div>
                        <g-g-select-input v-model="business.options.mainCategoryBusinessPartners"
                                          :size="'is-6'"
                                          :multiple="true"
                                          :placeholder="trans('business.create.mainCategoryBusinessPartners.placeholder')"
                                          :label="trans('business.create.mainCategoryBusinessPartners.title')"
                                          :options="trans('business.create.mainCategoryBusinessPartners.options')"></g-g-select-input>
                        <g-g-select-input v-model="business.options.haveExistingContracts" :size="'is-6'"
                                          :placeholder="trans('business.create.haveExistingContracts.placeholder')"
                                          :label="trans('business.create.haveExistingContracts.title')"
                                          :searchable="true"
                                          :options="trans('business.create.haveExistingContracts.options')"></g-g-select-input>
                        <g-g-contracts-input v-model="business.options.listContracts"></g-g-contracts-input>

                        <g-g-input :size="'is-6'" :type="'number'"
                                   v-model="business.options.countPerpetualServiceContracts"
                                   :label="trans('business.create.countPerpetualServiceContracts.title')"
                                   :placeholder="trans('business.create.countPerpetualServiceContracts.placeholder')"></g-g-input>
                        <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                   v-model="business.options.averageCheckClients"
                                   :label="trans('business.create.averageCheckClients.title')"
                                   :placeholder="trans('business.create.averageCheckClients.placeholder')"></g-g-input>

                        <g-g-select-input v-model="business.options.mainAdvertisingSourcesAttractClients"
                                          :size="'is-6'"
                                          :multiple="true"
                                          :placeholder="trans('business.create.mainAdvertisingSourcesAttractClients.placeholder')"
                                          :label="trans('business.create.mainAdvertisingSourcesAttractClients.title')"
                                          :options="trans('business.create.mainAdvertisingSourcesAttractClients.options')"></g-g-select-input>
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
                    <g-g-select-input v-model="business.options.legalStatus" :size="'is-6'"
                                      :placeholder="trans('business.create.legalStatus.placeholder')"
                                      :label="trans('business.create.legalStatus.title')"
                                      :options="trans('business.create.legalStatus.options')"></g-g-select-input>
                    <g-g-select-input v-model="business.options.taxSystem" :size="'is-6'"
                                      :placeholder="trans('business.create.taxSystem.placeholder')"
                                      :label="trans('business.create.taxSystem.title')"
                                      :options="trans('business.create.taxSystem.options')"></g-g-select-input>
                    <g-g-select-input v-model="business.options.changesProfileLegalEntity" :size="'is-6'"
                                      :placeholder="trans('business.create.changesProfileLegalEntity.placeholder')"
                                      :label="trans('business.create.changesProfileLegalEntity.title')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-select-input v-model="business.options.havePenalties" :size="'is-6'"
                                      :placeholder="trans('business.create.havePenalties.placeholder')"
                                      :label="trans('business.create.havePenalties.title')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-select-input :multiple="true"
                                      v-model="business.options.listPenalties"
                                      :size="'is-6'"
                                      :placeholder="trans('business.create.listPenalties.placeholder')"
                                      :label="trans('business.create.listPenalties.title')"
                                      :options="trans('business.create.listPenalties.options')">
                    </g-g-select-input>
                    <g-g-select-input v-model="business.options.haveDisputableSituations"
                                      :size="'is-6'"
                                      :placeholder="trans('business.create.haveDisputableSituations.placeholder')"
                                      :label="trans('business.create.haveDisputableSituations.title')"
                                      :options="trans('business.create.yn.options')">
                    </g-g-select-input>
                    <g-g-select-input :multiple="true"
                                      v-model="business.options.listDisputableSituations"
                                      :size="'is-6'"
                                      :placeholder="trans('business.create.listDisputableSituations.placeholder')"
                                      :label="trans('business.create.listDisputableSituations.title')"
                                      :options="trans('business.create.listDisputableSituations.options')">
                    </g-g-select-input>
                </div>
                <div class="step__footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="buttons">
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                        @click="toggleStep(9)"
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
        <div v-show="step === 9">
            <div class="box step px-0 pb-0">
                <div class="step__header px-1-5">
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <h3><img src="/svg/icons/ic_law_form.svg" alt=""
                                     class="svg"><span>{{steps[9].title}}</span>
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
                <div class="box px-0 pb-0 no-box-shadow">
                    <div class="px-1-5">
                        <div class="check-sell-business-myself mt-1 mb-1">
                            <div class="field">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox"
                                               checked>
                                        <span>Я хочу продавать бизнес самостоятельно</span>
                                    </label>
                                    <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="'tooltip text'">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="mb-1">Способы размещения объявления до 50 дней</h3>
                            <p>Публикация вашего бизнеса на проекте абсолютно бесплатна. Мы отправим ваше объявление на
                                модерацию и после проверки опубликуем его в каталоге бизнесов.</p>
                        </div>

                        <div class="ways-place-ads">
                            <div class="columns is-multiline is-gapless">
                                <div class="column is-4">
                                    <div class="ways-place-ads__item">
                                        <div class="ways-place-ads__item__info">
                                            <input @click="togglePackage(1)" type="radio" name="ways-place-ads"
                                                   class="radio-wpa" id="wpa-basic" checked>
                                            <label for="wpa-basic"
                                                   v-tooltip="'25 567 пользователей выбрали этот тарифный план'">
                                                <div class="content">
                                                    <h4>Обычная продажа</h4>
                                                    <div class="text is-size-875">62% на успех в продаже</div>
                                                    <div class="ways-place-ads__item__info__price has-text-weight-bold">
                                                        Бесплатно
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="ways-place-ads__item__services">

                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div class="ways-place-ads__item">
                                        <div class="ways-place-ads__item__info">
                                            <input @click="togglePackage(2)" type="radio" name="ways-place-ads"
                                                   class="radio-wpa" id="wpa-economy">
                                            <label for="wpa-economy"
                                                   v-tooltip="'25 567 пользователей выбрали этот тарифный план'">
                                                <div class="content">
                                                    <h4>Комплекс «Эконом»</h4>
                                                    <span class="tag is-danger has-text-weight-bold">-9%</span>
                                                    <div class="text is-size-875"><b>×5</b> просмотров</div>
                                                    <div class="has-text-success is-size-875"><b>+19%</b> к успеху
                                                        продажи бизнеса
                                                    </div>
                                                    <div class="ways-place-ads__item__info__price has-text-weight-bold">
                                                        €15 за 50 дней
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="ways-place-ads__item__services">
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                            src="http://marketplacenew.local/svg/icons/services/ic_translate.svg"
                                                            alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и
                                                            русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                            src="http://marketplacenew.local/svg/icons/services/ic_translate.svg"
                                                            alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и
                                                            русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div class="ways-place-ads__item">
                                        <div class="ways-place-ads__item__info">
                                            <input @click="togglePackage(3)" type="radio" name="ways-place-ads"
                                                   class="radio-wpa" id="wpa-lux">
                                            <label for="wpa-lux"
                                                   v-tooltip="'25 567 пользователей выбрали этот тарифный план'">
                                                <div class="content">
                                                    <h4>«Люкс продажа»</h4>
                                                    <span class="tag is-danger has-text-weight-bold">-22%</span>
                                                    <div class="text is-size-875"><b>×30</b> просмотров</div>
                                                    <div class="has-text-success is-size-875"><b>+88%</b> к успеху
                                                        продажи бизнеса
                                                    </div>
                                                    <div class="ways-place-ads__item__info__price has-text-weight-bold">
                                                        €50 за 50 дней
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="ways-place-ads__item__services">
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                            src="http://marketplacenew.local/svg/icons/services/ic_translate.svg"
                                                            alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и
                                                            русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                            src="http://marketplacenew.local/svg/icons/services/ic_translate.svg"
                                                            alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и
                                                            русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                            src="http://marketplacenew.local/svg/icons/services/ic_translate.svg"
                                                            alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и
                                                            русский.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-service">
                                                <div class="card-service__body">
                                                    <div class="is-flex">
                                                        <figure class="card-service__icon"><img
                                                            src="http://marketplacenew.local/svg/icons/services/ic_translate.svg"
                                                            alt="">
                                                        </figure>
                                                        <h4 class="card-service__title">Перевод документов</h4></div>
                                                    <div class="card-service__info">
                                                        <div class="card-service__excerpt is-size-875">
                                                            Наши специалисты переведут документы на английский и
                                                            русский.
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
                    <div class="ways-place-ads-footer px-1-5 is-flex">
                        <div class="is-flex ways-place-ads-footer-price-info-wrap">
                            <h3>Итого:</h3>
                            <div class="ways-place-ads-footer-price-info">
                                <span class="price-old has-text-weight-bold">${{price+20}}</span>
                                <span class="price-now has-text-weight-bold">${{price}}</span>
                                <span v-if="(economy > 0)" class="price-sale">Экономия <span
                                    class="has-text-weight-bold has-text-danger">-{{economy}}%</span></span>
                            </div>
                        </div>
                        <div>
                            <button @click="submit" class="button is-warning h-3 is-size-875 has-text-weight-bold px-1">
                                Продать бизнес {{package}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <portal-target name="modals"></portal-target>
    </div>
</template>

<script>
    import {VStepper} from 'vue-stepper-component';
    import Multiselect from 'vue-multiselect';
    import GGSelectInput from './form/GGSelectInput';
    import GGBusinessObjectInput from './form/GGBusinessObjectInput';
    import GGContractsInput from './form/GGContractsInput';
    import GGCategoryButton from './form/GGCategoryButton';
    import GGSocialInput from './form/GGSocialInput';
    import GGRadioInput from './form/GGRadioInput';
    import GGCheckBoxInput from './form/GGCheckBoxInput';
    import GGDateInput from './form/GGDateInput';
    import GGFromToInput from './form/GGFromToInput';
    import GGInput from './form/GGInput';
    import GGTextarea from './form/GGTextarea';
    import GGAddressInput from './form/GGAddressInput';
    import GGCertificatesInput from './form/GGCertificatesInput';
    import GGContragentsInput from './form/GGContragentsInput';
    import GGWorkersInput from './form/GGWorkersInput';
    import GGLeavingWorkersInput from './form/GGLeavingWorkersInput';
    import GGLocationSelectInput from './form/GGLocationSelectInput';
    import vueSlider from 'vue-slider-component';
    import flatPickr from 'vue-flatpickr-component';
    import {Russian} from "flatpickr/dist/l10n/ru.js"
    import 'flatpickr/dist/flatpickr.css';

    flatpickr.localize(Russian);
    export default {
        name: "form-add-bussines",
        components: {
            GGTextarea,
            GGContractsInput,
            GGBusinessObjectInput,
            GGCategoryButton,
            GGSocialInput,
            GGFromToInput,
            GGInput,
            GGDateInput,
            GGRadioInput,
            GGCheckBoxInput,
            GGAddressInput,
            GGCertificatesInput,
            GGContragentsInput,
            GGWorkersInput,
            GGLeavingWorkersInput,
            GGSelectInput,
            GGLocationSelectInput,
            VStepper, Multiselect, vueSlider, flatPickr
        },
        props: {id: {default: null}},
        data() {
            return {
                model: null,
                rent: false,
                economy: 0,
                price: 0,
                package: '',
                business: {
                    category_id: null,
                    country_id: null,
                    city_id: null,
                    name: null,
                    description: null,
                    payback: null,
                    price: null,
                    revenue: null,
                    profitability: null,
                    district_id: null,
                    images: [],
                    options: {
                        //region Step 1
                        addresses: null,
                        nameLegalEntity: null,
                        partBusiness: 'part',
                        numberShares: null,
                        descriptionBusiness: null,
                        yearFoundationBusiness: null,
                        reasonSale: null,
                        nameVideoReview: null,
                        linkVideoReview: null,
                        //endregion
                        //region Step 2
                        netAverageQuarterlyProfit: null,
                        averageQuarterlyTurnover: null,
                        costBusinessPerYear: null,
                        costBusinessPerQuarter: null,
                        negativeScenario: null,
                        //endregion
                        //region Step 3
                        objects: [],
                        //endregion
                        //region Step 4
                        transferWorkSchemes: null,
                        monthTeach: null,
                        readyTrainingMaterials: null,
                        typeTrainingMaterials: null,
                        transferCustomerBase: null,
                        typeTransferCustomerBase: null,
                        haveContractors: 2,
                        contractors: null,
                        staff: null,
                        willStaffLeave: 2,
                        leavingStaff: null,
                        certificates: null,
                        //endregion
                        // region Step 5
                        techDocEquipmentCD: null,
                        techDocEquipment: null,
                        conditionProperty: null,
                        conditionEquipment: null,
                        pledgeEquipment: 2,
                        totalAmountCredit: null,
                        repaidAmountCredit: null,
                        balanceCredit: null,
                        monthlyPaymentCredit: null,
                        finalPaymentCreditDate: null,
                        purposeCredit: null,
                        listTransferredProperty: null,
                        deductionsDepreciation: 2,
                        amountDeductionsProfits: null,
                        //endregion
                        //region Step 6
                        saleSite: null,
                        yearCreationSite: null,
                        cms: null,
                        themeSite: null,
                        salePhone: null,
                        phone: null,
                        intellectualProperty: null,
                        intellectualPropertyList: null,
                        visitorsPerDay: null,
                        viewsPerDay: null,
                        natureTraffic: null,
                        sourcesTraffic: null,
                        sourceGoogle: null,
                        sourceYandex: null,
                        additionalInformationTraffic: null,
                        haveIncomeSite: null,
                        averageMonthlyIncome: null,
                        sourcesIncome: null,
                        contextualAdvertising: null,
                        contextualAdvertisingGAdsens: null,
                        bannerTizerNetworks: null,
                        cpa: null,
                        banMonetizationSystems: null,
                        additionalInformationIncome: null,
                        averageMonthlyExpensesSite: null,
                        categoriesExpensesSite: null,
                        contentExpensesSite: null,
                        hostingExpensesSite: null,
                        otherExpensesSite: null,
                        additionalInformationExpensesSite: null,
                        siteDesign: null,
                        imgSiteOwn: null,
                        imgSiteOtherSources: null,
                        textSiteCopyright: null,
                        textSiteManualRewrite: null,
                        textSiteSavePaste: null,
                        textSiteGenerated: null,
                        additionalInformationContentSite: null,
                        socNet: null,
                        //endregion
                        //region Step 7
                        typeAudience: null,
                        genderTargetAudience: null,
                        ageMen: null,
                        ageWomen: null,
                        sexRatio: null,
                        familyStatusClients: null,
                        aloneClients: null,
                        couplesClients: null,
                        familiesWithChildrenClients: null,
                        socialStatusClients: null,
                        childClients: null,
                        studentsClients: null,
                        pensionersClients: null,
                        averageIncomeTargetClientsFrom: null,
                        averageIncomeTargetClientsTo: null,
                        averageCheckClients: null,
                        mainAdvertisingSourcesAttractClients: null,
                        mainCategoryBusinessPartners: null,
                        haveExistingContracts: null,
                        listContracts: [],
                        countPerpetualServiceContracts: null,
                        averageCheckClients: null,
                        mainAdvertisingSourcesAttractClients: null,
                        //endregion
                        //region Step 8
                        legalStatus: null,
                        taxSystem: null,
                        changesProfileLegalEntity: null,
                        havePenalties: null,
                        listPenalties: null,
                        haveDisputableSituations: null,
                        listDisputableSituations: null,
                        //endregion
                    }
                },
                accept: {
                    value: false,
                },
                step: 1,
                steps: {
                    1: {
                        title: trans('business.create.main_info'),
                        active: true,
                        success: false,
                    },
                    2: {
                        title: trans('business.create.finance_info'),
                        active: false,
                        success: false,
                        labelReturnInvestment: trans('business.create.labelReturnInvestment')
                    },
                    3: {
                        title: "Недвижимость",
                        active: false,
                        success: false,
                    },
                    4: {
                        title: "Бизнес-процессы",
                        active: false,
                        success: false,
                    },
                    5: {
                        title: "Материальные активы",
                        active: false,
                        success: false,
                    },
                    6: {
                        title: "Нематериальные активы",
                        active: false,
                        success: false,
                    },
                    7: {
                        title: "Целевая аудитория",
                        active: false,
                        success: false,
                    },
                    8: {
                        title: "Юридическое состояние",
                        active: false,
                        success: false,
                    },
                    9: {
                        title: "Размещение объявления",
                        active: false,
                        success: false,
                    },
                }
            }
        },
        methods: {
            togglePackage(pack) {
                if (pack == 3) {
                    this.economy = 22;
                    this.price = 50;
                    this.package = 'с пакетом «Люкс продажа»';
                } else if (pack == 2) {
                    this.economy = 9;
                    this.price = 15;
                    this.package = 'с пакетом «Эконом»';
                } else if (pack == 1) {
                    this.economy = 0;
                    this.price = 0;
                    this.package = '';
                }
            },
            submit() {
                console.log('submit!');
                let vm = this;
                if (vm.model) {
                    axios.put('/business/' + vm.model.id, {
                        business: this.business
                    }).then(responce => {
                        if (responce.data.status === 'ok') {
                            window.location.href = '/profile/objects';
                        }
                    }).catch(e => {
                        this.$swal({type: 'error', title: 'Ошибка!', text: 'Не все поля были заполнны'});
                    });
                } else {
                    axios.post('/business', {
                        business: this.business
                    }).then(responce => {
                        if (responce.data.status === 'ok') {
                            window.location.href = '/profile/objects';
                        }
                    }).catch(e => {
                        let errors = e.response.data.errors;
                        this.$swal({type: 'error', title: 'Ошибка!', text: errors[Object.keys(errors)[0]]});
                    });
                }
            },
            toggleStep(index) {
                let vm = this;
                Object.keys(this.steps).forEach(function (item) {
                    vm.steps[item].active = false;
                });
                this.step = parseInt(index, 10);

                this.steps[index].active = true;
            },
            fetchBusiness() {
                axios.get('/business-get-categories').then(responce => {
                    vm.categories = responce.data;
                })
            }
        },
        mounted() {
            if (this.id) {
                axios.get('/business-get-by-id/' + this.id).then(responce => {
                    this.business = {...this.business, ...responce.data.business};
                    this.business.options = {...this.business.options, ...responce.data.options};
                    this.business.images = responce.data.images;
                })
            }
        }
    }
</script>

<style scoped>

</style>
