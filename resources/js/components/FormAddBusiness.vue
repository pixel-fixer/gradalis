<template>
    <div class="stepper">
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

        <div v-if="step === 1">
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

                    <div class="column is-6">
                        <div class="field">
                            <label class="label label_req"><span>{{business.region.title}}</span></label>
                            <div class="control">
                                <multiselect
                                             :deselect-label="business.region.deselectLabel"
                                             track-by="name"
                                             label="name"
                                             openDirection="bottom"
                                             :placeholder="business.region.placeholder"
                                             :options="business.region.options"
                                             :searchable="true"
                                             :allow-empty="false"
                                             :selectLabel="business.region.selectLabel"
                                             :selectedLabel="business.region.selectedLabel">
                                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <g-g-location-select-input :type="'city'" v-model="business.city_id"
                                               :size="'is-6'"></g-g-location-select-input>

                    <g-g-address-input v-model="business.options.addresses"></g-g-address-input>

                    <g-g-input :size="'is-6'" v-model="business.options.nameLegalEntity"
                               :label="trans('business.create.nameLegalEntity.title')"
                               :placeholder="trans('business.create.nameLegalEntity.placeholder')"></g-g-input>
                    <g-g-input :size="'is-6'" v-model="business.name" :label="trans('business.create.name.title')"
                               :placeholder="trans('business.create.name.placeholder')"></g-g-input>
                    <g-g-radio-input v-model="business.options.partBusiness.value"
                                     :label="trans('business.create.partBusiness.title')"
                                     :list="business.options.partBusiness.list"></g-g-radio-input>

                    <g-g-input :type="'number'" :prevText="'%'" :size="'is-6'"
                               v-model="business.options.numberShares" :label="trans('business.create.numberShares.title')"
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
                        <upload-photo-business></upload-photo-business>
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
        <div v-if="step === 2">
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
                            <div class="buttons"><!--@click="toggleStep(3)"-->
                                <button class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                        @click="submit()">
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
        <div v-if="step === 3">
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
                                 v-for="(object, index) in steps[3].form.objects">
                                <h3 class="mb-1">Объект №{{index + 1}}</h3>
                                <div class="columns is-multiline list-wrap">
                                    <g-g-select-input v-model="object.categoryProperty.selected" :size="'is-6'"
                                                      :placeholder="object.categoryProperty.placeholder"
                                                      :label="object.categoryProperty.title" :searchable="true"
                                                      :options="object.categoryProperty.options"></g-g-select-input>
                                    <g-g-select-input v-model="object.typeProperty.selected" :size="'is-6'"
                                                      :placeholder="object.typeProperty.placeholder"
                                                      :label="object.typeProperty.title" :searchable="true"
                                                      :options="object.typeProperty.options"></g-g-select-input>

                                    <g-g-input :type="'number'" :prevText="'кв.м.'" :size="'is-6'"
                                               v-model="object.numberSquareMeters.value"
                                               :label="object.numberSquareMeters.title"
                                               :placeholder="object.numberSquareMeters.placeholder"></g-g-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.priceSquareMeters.value"
                                               :label="object.priceSquareMeters.title"
                                               :placeholder="object.priceSquareMeters.placeholder"></g-g-input>
                                    <g-g-radio-input :size="'is-3'" v-model="object.priceIncludingVAT.value"
                                                     :label="object.priceIncludingVAT.title"
                                                     :list="{'value':object.priceIncludingVAT.value,'title':object.priceIncludingVAT.title}"></g-g-radio-input>

                                    <g-g-select-input v-model="object.titleDocuments.selected"
                                                      :placeholder="object.titleDocuments.placeholder"
                                                      :label="object.titleDocuments.title" :searchable="true"
                                                      :options="object.titleDocuments.options"></g-g-select-input>
                                    <g-g-select-input v-model="object.restrictionsOperation.selected"
                                                      :placeholder="object.restrictionsOperation.placeholder"
                                                      :label="object.restrictionsOperation.title" :searchable="true"
                                                      :options="object.restrictionsOperation.options"></g-g-select-input>
                                    <g-g-select-input v-model="object.listRestrictionsOperation.selected" :size="'is-6'"
                                                      :placeholder="object.listRestrictionsOperation.placeholder"
                                                      :label="object.listRestrictionsOperation.title" :searchable="true"
                                                      :options="object.listRestrictionsOperation.options"></g-g-select-input>

                                    <g-g-select-input v-model="object.refRegisterEstate.selected"
                                                      :placeholder="object.refRegisterEstate.placeholder"
                                                      :label="object.refRegisterEstate.title" :searchable="true"
                                                      :options="object.refRegisterEstate.options"></g-g-select-input>
                                    <g-g-select-input v-model="object.technicalPropertyPlan.selected"
                                                      :placeholder="object.technicalPropertyPlan.placeholder"
                                                      :label="object.technicalPropertyPlan.title" :searchable="true"
                                                      :options="object.technicalPropertyPlan.options"></g-g-select-input>
                                    <g-g-select-input v-model="object.coordinationRedevelopment.selected" :size="'is-6'"
                                                      :placeholder="object.coordinationRedevelopment.placeholder"
                                                      :label="object.coordinationRedevelopment.title" :searchable="true"
                                                      :options="object.coordinationRedevelopment.options"></g-g-select-input>

                                    <g-g-select-input v-model="object.availabilityMortgage.selected" :size="'is-6'"
                                                      :placeholder="object.availabilityMortgage.placeholder"
                                                      :label="object.availabilityMortgage.title" :searchable="true"
                                                      :options="object.availabilityMortgage.options"></g-g-select-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.totalAmountMortgage.value"
                                               :label="object.totalAmountMortgage.title"
                                               :placeholder="object.totalAmountMortgage.placeholder"></g-g-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.repaidAmountMortgage.value"
                                               :label="object.repaidAmountMortgage.title"
                                               :placeholder="object.repaidAmountMortgage.placeholder"></g-g-input>

                                    <g-g-input :type="'number'" :prevText="'zt'" v-model="object.balanceMortgage.value"
                                               :label="object.balanceMortgage.title"
                                               :placeholder="object.balanceMortgage.placeholder"></g-g-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.monthlyPaymentMortgage.value"
                                               :label="object.monthlyPaymentMortgage.title"
                                               :placeholder="object.monthlyPaymentMortgage.placeholder"></g-g-input>
                                    <g-g-date-input v-model="object.finalPaymentMortgageDate.value"
                                                    :label="object.finalPaymentMortgageDate.title"
                                                    :placeholder="object.finalPaymentMortgageDate.placeholder"></g-g-date-input>

                                    <g-g-select-input v-model="object.availabilityLoanSecuredObject.selected"
                                                      :size="'is-6'"
                                                      :placeholder="object.availabilityLoanSecuredObject.placeholder"
                                                      :label="object.availabilityLoanSecuredObject.title"
                                                      :searchable="true"
                                                      :options="object.availabilityLoanSecuredObject.options"></g-g-select-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.totalAmountCredit.value"
                                               :label="object.totalAmountCredit.title"
                                               :placeholder="object.totalAmountCredit.placeholder"></g-g-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.repaidAmountCredit.value"
                                               :label="object.repaidAmountCredit.title"
                                               :placeholder="object.repaidAmountCredit.placeholder"></g-g-input>

                                    <g-g-input :type="'number'" :prevText="'zt'" v-model="object.balanceCredit.value"
                                               :label="object.balanceCredit.title"
                                               :placeholder="object.balanceCredit.placeholder"></g-g-input>
                                    <g-g-input :type="'number'" :prevText="'zt'"
                                               v-model="object.monthlyPaymentCredit.value"
                                               :label="object.monthlyPaymentCredit.title"
                                               :placeholder="object.monthlyPaymentCredit.placeholder"></g-g-input>
                                    <g-g-date-input :size="'is-3'" v-model="object.finalPaymentCreditDate.value"
                                                    :label="object.finalPaymentCreditDate.title"
                                                    :placeholder="object.finalPaymentCreditDate.placeholder"></g-g-date-input>
                                    <g-g-select-input :size="'is-3'" v-model="object.purposeCredit.selected"
                                                      :placeholder="object.purposeCredit.placeholder"
                                                      :label="object.purposeCredit.title" :searchable="true"
                                                      :options="object.purposeCredit.options"></g-g-select-input>

                                    <g-g-select-input :size="'is-6'" v-model="object.jointPropertyEstate.selected"
                                                      :placeholder="object.jointPropertyEstate.placeholder"
                                                      :label="object.jointPropertyEstate.title" :searchable="true"
                                                      :options="object.jointPropertyEstate.options"></g-g-select-input>
                                    <g-g-select-input :size="'is-6'" v-model="object.typeRelationshipCoowners.selected"
                                                      :placeholder="object.typeRelationshipCoowners.placeholder"
                                                      :label="object.typeRelationshipCoowners.title" :searchable="true"
                                                      :options="object.typeRelationshipCoowners.options"></g-g-select-input>

                                    <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                               v-model="object.monthlyUtilityCosts.value"
                                               :label="object.monthlyUtilityCosts.title"
                                               :placeholder="object.monthlyUtilityCosts.placeholder"></g-g-input>


                                    <template>
                                        <!--Если аренда-->
                                        <g-g-select-input v-model="object.presenceChanging.selected" :size="'is-6'"
                                                          :placeholder="object.presenceChanging.placeholder"
                                                          :label="object.presenceChanging.title" :searchable="true"
                                                          :options="object.presenceChanging.options"></g-g-select-input>
                                        <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                                   v-model="object.costChanging.value"
                                                   :label="object.costChanging.title"
                                                   :placeholder="object.costChanging.placeholder"></g-g-input>
                                        <g-g-date-input v-model="object.leaseTermTo.value"
                                                        :label="object.leaseTermTo.title"
                                                        :placeholder="object.leaseTermTo.placeholder"></g-g-date-input>

                                    </template>

                                    <g-g-input :size="'is-6'" :type="'number'" v-model="object.houseBookNumber.value"
                                               :label="object.houseBookNumber.title"
                                               :placeholder="object.houseBookNumber.placeholder"></g-g-input>

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
        <div v-if="step === 4">
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
                    <g-g-select-input v-model="steps[4].form.transferWorkSchemes.selected"
                                      :placeholder="steps[4].form.transferWorkSchemes.placeholder"
                                      :label="steps[4].form.transferWorkSchemes.title" :searchable="true"
                                      :options="steps[4].form.transferWorkSchemes.options"></g-g-select-input>
                    <g-g-input :type="'number'" :prevText="'Месяцев'" v-model="steps[4].form.monthTeach.value"
                               :label="steps[4].form.monthTeach.title"
                               :placeholder="steps[4].form.monthTeach.placeholder"></g-g-input>
                    <g-g-select-input v-model="steps[4].form.readyTrainingMaterials.selected"
                                      :placeholder="steps[4].form.readyTrainingMaterials.placeholder"
                                      :label="steps[4].form.readyTrainingMaterials.title" :searchable="true"
                                      :options="steps[4].form.readyTrainingMaterials.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[4].form.typeTrainingMaterials.selected"
                                      :placeholder="steps[4].form.typeTrainingMaterials.placeholder"
                                      :label="steps[4].form.typeTrainingMaterials.title" :searchable="true"
                                      :options="steps[4].form.typeTrainingMaterials.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[4].form.transferCustomerBase.selected"
                                      :placeholder="steps[4].form.transferCustomerBase.placeholder"
                                      :label="steps[4].form.transferCustomerBase.title" :searchable="true"
                                      :options="steps[4].form.transferCustomerBase.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[4].form.typeTransferCustomerBase.selected"
                                      :placeholder="steps[4].form.typeTransferCustomerBase.placeholder"
                                      :label="steps[4].form.typeTransferCustomerBase.title" :searchable="true"
                                      :options="steps[4].form.typeTransferCustomerBase.options"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="steps[4].form.haveContractors.selected"
                                      :placeholder="steps[4].form.haveContractors.placeholder"
                                      :label="steps[4].form.haveContractors.title" :searchable="true"
                                      :options="steps[4].form.haveContractors.options"></g-g-select-input>

                    <g-g-contragents-input :label="steps[4].form.contractors.title"></g-g-contragents-input>
                    <g-g-workers-input :label="steps[4].form.staff.title"></g-g-workers-input>

                    <g-g-certificates-input :label="steps[4].form.certificates.title"></g-g-certificates-input>

                    <g-g-certificates-input :label="steps[4].form.certificates.title"></g-g-certificates-input>
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
        <div v-if="step === 5">
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
                    <g-g-select-input v-model="steps[5].form.techDocEquipmentCD.selected" :size="'is-6'"
                                      :placeholder="steps[5].form.techDocEquipmentCD.placeholder"
                                      :label="steps[5].form.techDocEquipmentCD.title" :searchable="true"
                                      :options="steps[5].form.techDocEquipmentCD.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[5].form.techDocEquipment.selected" :size="'is-6'"
                                      :placeholder="steps[5].form.techDocEquipment.placeholder"
                                      :label="steps[5].form.techDocEquipment.title" :searchable="true"
                                      :options="steps[5].form.techDocEquipment.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[5].form.conditionProperty.selected" :size="'is-6'"
                                      :placeholder="steps[5].form.conditionProperty.placeholder"
                                      :label="steps[5].form.conditionProperty.title" :searchable="true"
                                      :options="steps[5].form.conditionProperty.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[5].form.conditionEquipment.selected" :size="'is-6'"
                                      :placeholder="steps[5].form.conditionEquipment.placeholder"
                                      :label="steps[5].form.conditionEquipment.title" :searchable="true"
                                      :options="steps[5].form.conditionEquipment.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[5].form.pledgeEquipment.selected" :size="'is-6'"
                                      :placeholder="steps[5].form.pledgeEquipment.placeholder"
                                      :label="steps[5].form.pledgeEquipment.title" :searchable="true"
                                      :options="steps[5].form.techDocEquipmentCD.options"></g-g-select-input>

                    <g-g-input :size="'is-3'" :type="'number'" :prevText="'zt'"
                               v-model="steps[5].form.totalAmountCredit.value"
                               :label="steps[5].form.totalAmountCredit.title"
                               :placeholder="steps[5].form.totalAmountCredit.placeholder"></g-g-input>
                    <g-g-input :size="'is-3'" :type="'number'" :prevText="'zt'"
                               v-model="steps[5].form.repaidAmountCredit.value"
                               :label="steps[5].form.repaidAmountCredit.title"
                               :placeholder="steps[5].form.repaidAmountCredit.placeholder"></g-g-input>

                    <g-g-input :size="'is-3'" :type="'number'" :prevText="'zt'"
                               v-model="steps[5].form.balanceCredit.value" :label="steps[5].form.balanceCredit.title"
                               :placeholder="steps[5].form.balanceCredit.placeholder"></g-g-input>
                    <g-g-input :size="'is-3'" :type="'number'" :prevText="'zt'"
                               v-model="steps[5].form.monthlyPaymentCredit.value"
                               :label="steps[5].form.monthlyPaymentCredit.title"
                               :placeholder="steps[5].form.monthlyPaymentCredit.placeholder"></g-g-input>

                    <g-g-date-input :size="'is-3'" v-model="steps[5].form.finalPaymentCreditDate.value"
                                    :label="steps[5].form.finalPaymentCreditDate.title"
                                    :placeholder="steps[5].form.finalPaymentCreditDate.placeholder"></g-g-date-input>
                    <g-g-select-input v-model="steps[5].form.purposeCredit.selected" :size="'is-3'"
                                      :placeholder="steps[5].form.purposeCredit.placeholder"
                                      :label="steps[5].form.purposeCredit.title" :searchable="true"
                                      :options="steps[5].form.purposeCredit.options"></g-g-select-input>

                    <g-g-select-input v-model="steps[5].form.listTransferredProperty.selected" :size="'is-6'"
                                      :placeholder="steps[5].form.listTransferredProperty.placeholder"
                                      :label="steps[5].form.listTransferredProperty.title" :searchable="true"
                                      :options="steps[5].form.listTransferredProperty.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[5].form.deductionsDepreciation.selected" :size="'is-3'"
                                      :placeholder="steps[5].form.deductionsDepreciation.placeholder"
                                      :label="steps[5].form.deductionsDepreciation.title" :searchable="true"
                                      :options="steps[5].form.deductionsDepreciation.options"></g-g-select-input>
                    <g-g-input :size="'is-3'" :type="'number'" :prevText="'%'"
                               v-model="steps[5].form.amountDeductionsProfits.value"
                               :label="steps[5].form.amountDeductionsProfits.title"
                               :placeholder="steps[5].form.amountDeductionsProfits.placeholder"></g-g-input>
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
        <div v-if="step === 6">
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
                        <g-g-select-input v-model="steps[6].form.saleSite.selected"
                                          :placeholder="steps[6].form.saleSite.placeholder"
                                          :label="steps[6].form.saleSite.title" :searchable="true"
                                          :options="steps[6].form.saleSite.options"></g-g-select-input>
                        <g-g-input :type="'number'" :iconLeft="'/svg/icons/ic_calendar.svg'"
                                   v-model="steps[6].form.yearCreationSite.value"
                                   :label="steps[6].form.yearCreationSite.title"
                                   :placeholder="steps[6].form.yearCreationSite.placeholder"></g-g-input>
                        <g-g-select-input :size="'is-6'" v-model="steps[6].form.cms.selected"
                                          :placeholder="steps[6].form.cms.placeholder" :label="steps[6].form.cms.title"
                                          :searchable="true" :options="steps[6].form.cms.options"></g-g-select-input>

                        <g-g-select-input :size="'is-6'" v-model="steps[6].form.themeSite.selected"
                                          :placeholder="steps[6].form.themeSite.placeholder"
                                          :label="steps[6].form.themeSite.title" :searchable="true"
                                          :options="steps[6].form.themeSite.options"></g-g-select-input>
                        <g-g-select-input v-model="steps[6].form.salePhone.selected"
                                          :placeholder="steps[6].form.salePhone.placeholder"
                                          :label="steps[6].form.salePhone.title" :searchable="true"
                                          :options="steps[6].form.salePhone.options"></g-g-select-input>
                        <g-g-input :type="'number'" v-model="steps[6].form.phone.value"
                                   :label="steps[6].form.phone.title"
                                   :placeholder="steps[6].form.phone.placeholder"></g-g-input>

                        <g-g-select-input :size="'is-6'" v-model="steps[6].form.intellectualProperty.selected"
                                          :placeholder="steps[6].form.intellectualProperty.placeholder"
                                          :label="steps[6].form.intellectualProperty.title" :searchable="true"
                                          :options="steps[6].form.intellectualProperty.options"></g-g-select-input>
                        <g-g-select-input :size="'is-6'" v-model="steps[6].form.intellectualPropertyList.selected"
                                          :placeholder="steps[6].form.intellectualPropertyList.placeholder"
                                          :label="steps[6].form.intellectualPropertyList.title" :searchable="true"
                                          :options="steps[6].form.intellectualPropertyList.options"></g-g-select-input>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Трафик и SEO</h3>
                            </div>
                            <g-g-input :size="'is-6'" :type="'number'" v-model="steps[6].form.visitorsPerDay.value"
                                       :label="steps[6].form.visitorsPerDay.title"
                                       :placeholder="steps[6].form.visitorsPerDay.placeholder"></g-g-input>
                            <g-g-input :size="'is-6'" :type="'number'" v-model="steps[6].form.viewsPerDay.value"
                                       :label="steps[6].form.viewsPerDay.title"
                                       :placeholder="steps[6].form.viewsPerDay.placeholder"></g-g-input>

                            <g-g-select-input :size="'is-6'" v-model="steps[6].form.natureTraffic.selected"
                                              :placeholder="steps[6].form.natureTraffic.placeholder"
                                              :label="steps[6].form.natureTraffic.title" :searchable="true"
                                              :options="steps[6].form.natureTraffic.options"></g-g-select-input>
                            <g-g-select-input :size="'is-6'" v-model="steps[6].form.sourcesTraffic.selected"
                                              :placeholder="steps[6].form.sourcesTraffic.placeholder"
                                              :label="steps[6].form.sourcesTraffic.title" :searchable="true"
                                              :options="steps[6].form.sourcesTraffic.options"></g-g-select-input>

                            <g-g-input :size="'is-6'" :type="'number'" v-model="steps[6].form.sourceGoogle.value"
                                       :label="steps[6].form.sourceGoogle.title"
                                       :placeholder="steps[6].form.sourceGoogle.placeholder"></g-g-input>
                            <g-g-input :size="'is-6'" :type="'number'" v-model="steps[6].form.sourceYandex.value"
                                       :label="steps[6].form.sourceYandex.title"
                                       :placeholder="steps[6].form.sourceYandex.placeholder"></g-g-input>

                            <g-g-input :size="'is-12'" :type="'number'"
                                       v-model="steps[6].form.additionalInformationTraffic.value"
                                       :label="steps[6].form.additionalInformationTraffic.title"
                                       :placeholder="steps[6].form.additionalInformationTraffic.placeholder"></g-g-input>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Доходы сайта</h3>
                            </div>
                            <g-g-select-input v-model="steps[6].form.haveIncomeSite.selected"
                                              :placeholder="steps[6].form.haveIncomeSite.placeholder"
                                              :label="steps[6].form.haveIncomeSite.title" :searchable="true"
                                              :options="steps[6].form.haveIncomeSite.options"></g-g-select-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.averageMonthlyIncome.value"
                                       :label="steps[6].form.averageMonthlyIncome.title"
                                       :placeholder="steps[6].form.averageMonthlyIncome.placeholder"></g-g-input>
                            <g-g-select-input :size="'is-6'" v-model="steps[6].form.sourcesIncome.selected"
                                              :placeholder="steps[6].form.sourcesIncome.placeholder"
                                              :label="steps[6].form.sourcesIncome.title" :searchable="true"
                                              :options="steps[6].form.sourcesIncome.options"></g-g-select-input>

                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.contextualAdvertising.value"
                                       :label="steps[6].form.contextualAdvertising.title"
                                       :placeholder="steps[6].form.contextualAdvertising.placeholder"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.contextualAdvertisingGAdsens.value"
                                       :label="steps[6].form.contextualAdvertisingGAdsens.title"
                                       :placeholder="steps[6].form.contextualAdvertisingGAdsens.placeholder"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.bannerTizerNetworks.value"
                                       :label="steps[6].form.bannerTizerNetworks.title"
                                       :placeholder="steps[6].form.bannerTizerNetworks.placeholder"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'" v-model="steps[6].form.cpa.value"
                                       :label="steps[6].form.cpa.title"
                                       :placeholder="steps[6].form.cpa.placeholder"></g-g-input>

                            <g-g-radio-input :size="'is-6'" v-model="steps[6].form.banMonetizationSystems.value"
                                             :label="steps[6].form.banMonetizationSystems.title"
                                             :list="{'value':steps[6].form.banMonetizationSystems.value,'title':steps[6].form.banMonetizationSystems.title}"></g-g-radio-input>
                            <g-g-input :size="'is-12'" :type="'number'"
                                       v-model="steps[6].form.additionalInformationIncome.value"
                                       :label="steps[6].form.additionalInformationIncome.title"
                                       :placeholder="steps[6].form.additionalInformationIncome.placeholder"></g-g-input>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>Расходы сайта</h3>
                            </div>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.averageMonthlyExpensesSite.value"
                                       :label="steps[6].form.averageMonthlyExpensesSite.title"
                                       :placeholder="steps[6].form.averageMonthlyExpensesSite.placeholder"></g-g-input>
                            <g-g-select-input v-model="steps[6].form.categoriesExpensesSite.selected"
                                              :placeholder="steps[6].form.categoriesExpensesSite.placeholder"
                                              :label="steps[6].form.categoriesExpensesSite.title" :searchable="true"
                                              :options="steps[6].form.categoriesExpensesSite.options"></g-g-select-input>

                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.contentExpensesSite.value"
                                       :label="steps[6].form.contentExpensesSite.title"
                                       :placeholder="steps[6].form.contentExpensesSite.placeholder"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'"
                                       v-model="steps[6].form.hostingExpensesSite.value"
                                       :label="steps[6].form.hostingExpensesSite.title"
                                       :placeholder="steps[6].form.hostingExpensesSite.placeholder"></g-g-input>
                            <g-g-input :prevText="'zt'" :type="'number'" v-model="steps[6].form.otherExpensesSite.value"
                                       :label="steps[6].form.otherExpensesSite.title"
                                       :placeholder="steps[6].form.otherExpensesSite.placeholder"></g-g-input>

                            <g-g-input :size="'is-12'" :type="'number'"
                                       v-model="steps[6].form.additionalInformationExpensesSite.value"
                                       :label="steps[6].form.additionalInformationExpensesSite.title"
                                       :placeholder="steps[6].form.additionalInformationExpensesSite.placeholder"></g-g-input>
                        </template>

                        <template>
                            <div class="column is-12 pb-0">
                                <h3>О контенте и дизайне</h3>
                            </div>
                            <g-g-select-input :size="'is-6'" v-model="steps[6].form.siteDesign.selected"
                                              :placeholder="steps[6].form.siteDesign.placeholder"
                                              :label="steps[6].form.siteDesign.title" :searchable="true"
                                              :options="steps[6].form.siteDesign.options"></g-g-select-input>

                            <div class="column is-12 pb-0">
                                <label class="label"><span>Фото и картинки на сайте</span></label>
                            </div>
                            <g-g-input :size="'is-6'" :prevText="'%'" :type="'number'"
                                       v-model="steps[6].form.imgSiteOwn.value" :label="steps[6].form.imgSiteOwn.title"
                                       :placeholder="steps[6].form.imgSiteOwn.placeholder"></g-g-input>
                            <g-g-input :size="'is-6'" :prevText="'%'" :type="'number'"
                                       v-model="steps[6].form.imgSiteOtherSources.value"
                                       :label="steps[6].form.imgSiteOtherSources.title"
                                       :placeholder="steps[6].form.imgSiteOtherSources.placeholder"></g-g-input>

                            <div class="column is-12 pb-0">
                                <label
                                    class="label"><span>Тексты на сайте</span></label>
                            </div>
                            <g-g-input :prevText="'%'" :type="'number'" v-model="steps[6].form.textSiteCopyright.value"
                                       :label="steps[6].form.textSiteCopyright.title"
                                       :placeholder="steps[6].form.textSiteCopyright.placeholder"></g-g-input>
                            <g-g-input :prevText="'%'" :type="'number'"
                                       v-model="steps[6].form.textSiteManualRewrite.value"
                                       :label="steps[6].form.textSiteManualRewrite.title"
                                       :placeholder="steps[6].form.textSiteManualRewrite.placeholder"></g-g-input>
                            <g-g-input :prevText="'%'" :type="'number'" v-model="steps[6].form.textSiteSavePaste.value"
                                       :label="steps[6].form.textSiteSavePaste.title"
                                       :placeholder="steps[6].form.textSiteSavePaste.placeholder"></g-g-input>
                            <g-g-input :prevText="'%'" :type="'number'" v-model="steps[6].form.textSiteGenerated.value"
                                       :label="steps[6].form.textSiteGenerated.title"
                                       :placeholder="steps[6].form.textSiteGenerated.placeholder"></g-g-input>

                            <g-g-input :size="'is-12'" :type="'number'"
                                       v-model="steps[6].form.additionalInformationContentSite.value"
                                       :label="steps[6].form.additionalInformationContentSite.title"
                                       :placeholder="steps[6].form.additionalInformationContentSite.placeholder"></g-g-input>
                        </template>

                    </div>
                </div>

                <hr>
                <div class="px-1-5">
                    <g-g-social-input></g-g-social-input>
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
        <div v-if="step === 7">
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
                    <g-g-select-input v-model="steps[7].form.typeAudience.selected" :size="'is-6'"
                                      :placeholder="steps[7].form.typeAudience.placeholder"
                                      :label="steps[7].form.typeAudience.title" :searchable="true"
                                      :options="steps[7].form.typeAudience.options"></g-g-select-input>

                    <template>
                        <div class="column is-12 pb-0">
                            <h3>B2C</h3>
                        </div>
                        <g-g-select-input v-model="steps[7].form.b2c.genderTargetAudience.selected"
                                          :placeholder="steps[7].form.b2c.genderTargetAudience.placeholder"
                                          :label="steps[7].form.b2c.genderTargetAudience.title" :searchable="true"
                                          :options="steps[7].form.b2c.genderTargetAudience.options"></g-g-select-input>
                        <g-g-from-to-input v-model="steps[7].form.b2c.ageMenFrom.value"
                                           :label="steps[7].form.b2c.ageMenFrom.title"></g-g-from-to-input>
                        <g-g-from-to-input v-model="steps[7].form.b2c.ageMenFrom.value"
                                           :label="steps[7].form.b2c.ageWomenFrom.title"></g-g-from-to-input>
                        <g-g-from-to-input v-model="steps[7].form.b2c.sexRatio.value" :textFrom="'м %'" :textTo="'ж %'"
                                           :label="steps[7].form.b2c.sexRatio.title"></g-g-from-to-input>


                        <g-g-select-input v-model="steps[7].form.b2c.familyStatusClients.selected" :size="'is-12'"
                                          :placeholder="steps[7].form.b2c.familyStatusClients.placeholder"
                                          :label="steps[7].form.b2c.familyStatusClients.title" :searchable="true"
                                          :options="steps[7].form.b2c.familyStatusClients.options"></g-g-select-input>

                        <g-g-input :type="'number'" :prevText="'zt'" v-model="steps[7].form.b2c.aloneClients.value"
                                   :label="steps[7].form.b2c.aloneClients.title"
                                   :placeholder="steps[7].form.b2c.aloneClients.placeholder"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'" v-model="steps[7].form.b2c.couplesClients.value"
                                   :label="steps[7].form.b2c.couplesClients.title"
                                   :placeholder="steps[7].form.b2c.couplesClients.placeholder"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'"
                                   v-model="steps[7].form.b2c.familiesWithChildrenClients.value"
                                   :label="steps[7].form.b2c.familiesWithChildrenClients.title"
                                   :placeholder="steps[7].form.b2c.familiesWithChildrenClients.placeholder"></g-g-input>

                        <g-g-select-input v-model="steps[7].form.b2c.socialStatusClients.selected" :size="'is-12'"
                                          :placeholder="steps[7].form.b2c.socialStatusClients.placeholder"
                                          :label="steps[7].form.b2c.socialStatusClients.title" :searchable="true"
                                          :options="steps[7].form.b2c.socialStatusClients.options"></g-g-select-input>

                        <g-g-input :type="'number'" :prevText="'zt'" v-model="steps[7].form.b2c.childClients.value"
                                   :label="steps[7].form.b2c.childClients.title"
                                   :placeholder="steps[7].form.b2c.childClients.placeholder"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'" v-model="steps[7].form.b2c.studentsClients.value"
                                   :label="steps[7].form.b2c.studentsClients.title"
                                   :placeholder="steps[7].form.b2c.studentsClients.placeholder"></g-g-input>
                        <g-g-input :type="'number'" :prevText="'zt'" v-model="steps[7].form.b2c.pensionersClients.value"
                                   :label="steps[7].form.b2c.pensionersClients.title"
                                   :placeholder="steps[7].form.b2c.pensionersClients.placeholder"></g-g-input>

                        <g-g-from-to-input :size="'is-6'"
                                           v-model="steps[7].form.b2c.averageIncomeTargetClientsFrom.value"
                                           :label="steps[7].form.b2c.averageIncomeTargetClientsFrom.title"></g-g-from-to-input>
                        <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                   v-model="steps[7].form.b2c.averageCheckClients.value"
                                   :label="steps[7].form.b2c.averageCheckClients.title"
                                   :placeholder="steps[7].form.b2c.averageCheckClients.placeholder"></g-g-input>

                        <g-g-select-input v-model="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.selected"
                                          :size="'is-6'"
                                          :placeholder="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.placeholder"
                                          :label="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.title"
                                          :searchable="true"
                                          :options="steps[7].form.b2c.mainAdvertisingSourcesAttractClients.options"></g-g-select-input>

                    </template>

                    <template>
                        <div class="column is-12 pb-0">
                            <h3>B2B</h3>
                        </div>
                        <g-g-select-input v-model="steps[7].form.b2b.mainCategoryBusinessPartners.selected"
                                          :size="'is-6'"
                                          :placeholder="steps[7].form.b2b.mainCategoryBusinessPartners.placeholder"
                                          :label="steps[7].form.b2b.mainCategoryBusinessPartners.title"
                                          :searchable="true"
                                          :options="steps[7].form.b2b.mainCategoryBusinessPartners.options"></g-g-select-input>
                        <g-g-select-input v-model="steps[7].form.b2b.haveExistingContracts.selected" :size="'is-6'"
                                          :placeholder="steps[7].form.b2b.haveExistingContracts.placeholder"
                                          :label="steps[7].form.b2b.haveExistingContracts.title" :searchable="true"
                                          :options="steps[7].form.b2b.haveExistingContracts.options"></g-g-select-input>
                        <g-g-contracts-input v-model="steps[7].form.b2b.listContracts"></g-g-contracts-input>

                        <g-g-input :size="'is-6'" :type="'number'"
                                   v-model="steps[7].form.b2b.countPerpetualServiceContracts.value"
                                   :label="steps[7].form.b2b.countPerpetualServiceContracts.title"
                                   :placeholder="steps[7].form.b2b.countPerpetualServiceContracts.placeholder"></g-g-input>
                        <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                   v-model="steps[7].form.b2b.averageCheckClients.value"
                                   :label="steps[7].form.b2b.averageCheckClients.title"
                                   :placeholder="steps[7].form.b2b.averageCheckClients.placeholder"></g-g-input>

                        <g-g-select-input v-model="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.selected"
                                          :size="'is-6'"
                                          :placeholder="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.placeholder"
                                          :label="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.title"
                                          :searchable="true"
                                          :options="steps[7].form.b2b.mainAdvertisingSourcesAttractClients.options"></g-g-select-input>
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
        <div v-if="step === 8">
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
                    <g-g-select-input v-model="steps[8].form.legalStatus.selected" :size="'is-6'"
                                      :placeholder="steps[8].form.legalStatus.placeholder"
                                      :label="steps[8].form.legalStatus.title" :searchable="true"
                                      :options="steps[8].form.legalStatus.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[8].form.taxSystem.selected" :size="'is-6'"
                                      :placeholder="steps[8].form.taxSystem.placeholder"
                                      :label="steps[8].form.taxSystem.title" :searchable="true"
                                      :options="steps[8].form.taxSystem.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[8].form.changesProfileLegalEntity.selected" :size="'is-6'"
                                      :placeholder="steps[8].form.changesProfileLegalEntity.placeholder"
                                      :label="steps[8].form.changesProfileLegalEntity.title" :searchable="true"
                                      :options="steps[8].form.changesProfileLegalEntity.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[8].form.havePenalties.selected" :size="'is-6'"
                                      :placeholder="steps[8].form.havePenalties.placeholder"
                                      :label="steps[8].form.havePenalties.title" :searchable="true"
                                      :options="steps[8].form.havePenalties.options"></g-g-select-input>
                    <g-g-select-input :multiple="true" v-model="steps[8].form.listPenalties.selected" :size="'is-6'"
                                      :placeholder="steps[8].form.listPenalties.placeholder"
                                      :label="steps[8].form.listPenalties.title" :searchable="true"
                                      :options="steps[8].form.listPenalties.options"></g-g-select-input>
                    <g-g-select-input v-model="steps[8].form.haveDisputableSituations.selected" :size="'is-6'"
                                      :placeholder="steps[8].form.haveDisputableSituations.placeholder"
                                      :label="steps[8].form.haveDisputableSituations.title" :searchable="true"
                                      :options="steps[8].form.haveDisputableSituations.options"></g-g-select-input>
                    <g-g-select-input :multiple="true" v-model="steps[8].form.listDisputableSituations.selected"
                                      :size="'is-6'" :placeholder="steps[8].form.listDisputableSituations.placeholder"
                                      :label="steps[8].form.listDisputableSituations.title" :searchable="true"
                                      :options="steps[8].form.listDisputableSituations.options"></g-g-select-input>

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
        <portal-target name="modals"></portal-target>
    </div>
</template>

<script>
    import {VStepper} from 'vue-stepper-component';
    import Multiselect from 'vue-multiselect';
    import GGSelectInput from './form/GGSelectInput';
    import GGContractsInput from './form/GGContractsInput';
    import GGCategoryButton from './form/GGCategoryButton';
    import GGSocialInput from './form/GGSocialInput';
    import GGRadioInput from './form/GGRadioInput';
    import GGDateInput from './form/GGDateInput';
    import GGFromToInput from './form/GGFromToInput';
    import GGInput from './form/GGInput';
    import GGTextarea from './form/GGTextarea';
    import GGAddressInput from './form/GGAddressInput';
    import GGCertificatesInput from './form/GGCertificatesInput';
    import GGContragentsInput from './form/GGContragentsInput';
    import GGWorkersInput from './form/GGWorkersInput';
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
            GGCategoryButton,
            GGSocialInput,
            GGFromToInput,
            GGInput,
            GGDateInput,
            GGRadioInput,
            GGAddressInput,
            GGCertificatesInput,
            GGContragentsInput,
            GGWorkersInput,
            GGSelectInput,
            GGLocationSelectInput,
            VStepper, Multiselect, vueSlider, flatPickr
        },
        data() {
            return {
                business: {
                    category: null,
                    country_id: null,
                    city_id: null,
                    name: null,
                    description:null,
                    payback: null,
                    price: null,
                    revenue: null,
                    profitability: null,
                    district_id:1,
                    region: {
                        selected: null,
                        title: 'Регион',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: trans('business.create.theme.options'),
                    },
                    options: {
                        //region Step 1
                        addresses: {},
                        nameLegalEntity: null,
                        partBusiness: {
                            value: 'part',
                            list: trans('business.create.partBusiness.list')
                        },
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
                                        options: trans('business.create.theme.options'),
                                    },
                                    typeProperty: {
                                        selected: null,
                                        title: 'Тип недвижимости',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
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
                                        options: trans('business.create.theme.options'),
                                    },
                                    restrictionsOperation: {
                                        selected: null,
                                        title: 'Огрничения по эксплуатции',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                    },
                                    listRestrictionsOperation: {
                                        selected: null,
                                        title: 'Укажите ограничения',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                        noResult: 'Ничего не найдено'
                                    },
                                    refRegisterEstate: {
                                        selected: null,
                                        title: 'Справка из регистра недв. и зданий',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                    },
                                    technicalPropertyPlan: {
                                        selected: null,
                                        title: 'Технический план недвижимости',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                    },
                                    coordinationRedevelopment: {
                                        selected: null,
                                        title: 'Согласование перепланировок',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                    },
                                    availabilityMortgage: {
                                        selected: null,
                                        title: 'Наличие ипотеки по объекту',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
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
                                    },
                                    availabilityLoanSecuredObject: {
                                        selected: null,
                                        title: 'Наличие кредита под залог объекта',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
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
                                        options: trans('business.create.theme.options'),
                                    },
                                    jointPropertyEstate: {
                                        selected: null,
                                        title: 'Совместная собственность недвижимости',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                    },
                                    typeRelationshipCoowners: {
                                        selected: null,
                                        title: 'Тип взаимоотношений сообственников',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
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
                                        options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
                            },
                            typeTrainingMaterials: {
                                selected: null,
                                title: 'Тип обучающих материалов',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            transferCustomerBase: {
                                selected: null,
                                title: 'Передаёте базы клиентов?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                            },
                            typeTransferCustomerBase: {
                                selected: null,
                                title: 'Тип передачи базы',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            haveContractors: {
                                selected: null,
                                title: 'Есть ли контрагенты?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                                            options: trans('business.create.theme.options'),
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
                            },
                            willStaffLeave: {
                                selected: null,
                                title: 'Уйдет ли персонал за собственником?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                            },
                            certificates: {
                                title: 'Услуги и сертификаты',
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
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            techDocEquipment: {
                                selected: null,
                                title: 'Техническая документация на оборудование?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            conditionProperty: {
                                selected: null,
                                title: 'Состояние имущества (по оценке собственника)',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            conditionEquipment: {
                                selected: null,
                                title: 'Состояние оборудования, транспорта, техники (по оценке собственника)',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            pledgeEquipment: {
                                selected: null,
                                title: 'Залог на оборудование, транспорт и дугие материльные активы?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            listTransferredProperty: {
                                selected: null,
                                title: 'Перечень имущества передаваемого продавцом',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },

                            deductionsDepreciation: {
                                selected: null,
                                title: 'Отчисления на амортизцию',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            themeSite: {
                                selected: null,
                                title: 'Тематика сайта',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            salePhone: {
                                selected: null,
                                title: 'Продается ли телефон?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            intellectualPropertyList: {
                                selected: null,
                                title: 'Укажите объекты интеллектуальной собственности',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            sourcesTraffic: {
                                selected: null,
                                title: 'Источники трафика',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                        options: trans('business.create.theme.options'),
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
                                        options: trans('business.create.theme.options'),
                                        noResult: 'Ничего не найдено'
                                    },
                                    lang: {
                                        selected: null,
                                        title: 'Языковой сегмент группы',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
                                        noResult: 'Ничего не найдено'
                                    },
                                    methodTransferGroup: {
                                        selected: null,
                                        title: 'Способ передачи группы',
                                        placeholder: 'Выберите',
                                        selectedLabel: '',
                                        selectLabel: '',
                                        deselectLabel: '',
                                        options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
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
                                    options: trans('business.create.theme.options'),
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
                                    options: trans('business.create.theme.options'),
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
                                    options: trans('business.create.theme.options'),
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
                                    options: trans('business.create.theme.options'),
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
                                    options: trans('business.create.theme.options'),
                                    noResult: 'Ничего не найдено'
                                },
                                haveExistingContracts: {
                                    selected: null,
                                    title: 'Наличие действущих контрактов?',
                                    placeholder: 'Выберите',
                                    selectedLabel: '',
                                    selectLabel: '',
                                    deselectLabel: '',
                                    options: trans('business.create.theme.options'),
                                    noResult: 'Ничего не найдено'
                                },
                                listContracts: [],
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
                                    options: trans('business.create.theme.options'),
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
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            taxSystem: {
                                selected: null,
                                title: 'Система налогообложения',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            changesProfileLegalEntity: {
                                selected: null,
                                title: 'Были изменения профиля деятельности в юридическом лице?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            havePenalties: {
                                selected: null,
                                title: 'Непокрытые штрафные санкции, наложенные фискальными органами?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            listPenalties: {
                                selected: null,
                                title: 'Укажите штрафные санкции',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            haveDisputableSituations: {
                                selected: null,
                                title: 'Вовлечение в спорные/коммерческие/административные ситуации?',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
                                noResult: 'Ничего не найдено'
                            },
                            listDisputableSituations: {
                                selected: null,
                                title: 'Укажите типы спорных ситуаций',
                                placeholder: 'Выберите',
                                selectedLabel: '',
                                selectLabel: '',
                                deselectLabel: '',
                                options: trans('business.create.theme.options'),
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
                let vm = this;
                axios.post('/business', {
                    business: this.business
                }).then(responce => {
                    vm.categories = responce.data;
                })
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
        }
    }
</script>

<style scoped>

</style>
