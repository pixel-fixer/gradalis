<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">{{trans('services.recruiting.title')}}</h1>
        </section>


        <section class="section pt-0 px-0">

            <div ref="buy-company-form" class="stepper">
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
                            {{step}}/{{Object.keys(steps).length}}
                        </div>
                        <div class="stepper__nav__item__title">{{steps[step].title}}</div>
                    </div>
                </div>

                <div v-show="step === 1">
                    <div class="box step">
                        <div class="step__header mb-2">
                            <h3><span>{{steps[1].title}}</span></h3>
                        </div>

                        <div class="columns is-multiline">
                            <g-g-select-input v-model="form.termEmployment"
                                              :label="trans('services.create.termEmployment.title')"
                                              :placeholder="trans('services.create.termEmployment.placeholder')"
                                              :options="trans('services.create.termEmployment.options')"
                                              :size="'is-6'"></g-g-select-input>
                            <g-g-select-input v-model="form.fieldActivity"
                                              :label="trans('services.create.fieldActivity.title')"
                                              :placeholder="trans('services.create.fieldActivity.placeholder')"
                                              :options="trans('services.create.fieldActivity.options')"
                                              :size="'is-6'"></g-g-select-input>
                            <g-g-input :size="'is-6'" v-model="form.krsRegonNumber"
                                       :label="trans('services.create.krsRegonNumber.title')"
                                       :placeholder="trans('services.create.krsRegonNumber.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.phone" :label="trans('services.create.phone.title')"
                                       :placeholder="trans('services.create.phone.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.nameLegalEntity"
                                       :label="trans('services.create.nameLegalEntity.title')"
                                       :placeholder="trans('services.create.nameLegalEntity.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.addressLegalEntity"
                                       :label="trans('services.create.addressLegalEntity.address.title')"
                                       :placeholder="trans('services.create.addressLegalEntity.address.placeholder')"></g-g-input>
                            <g-g-input :size="'is-2'" v-model="form.houseNumberLegalEntity"
                                       :label="trans('services.create.addressLegalEntity.houseNumber.title')"
                                       :placeholder="'№'"></g-g-input>
                            <g-g-input :size="'is-2'" v-model="form.officeNumberLegalEntity"
                                       :label="trans('services.create.addressLegalEntity.officeNumber.title')"
                                       :placeholder="'№'"></g-g-input>
                            <g-g-input :size="'is-2'" v-model="form.indexLegalEntity"
                                       :label="trans('services.create.addressLegalEntity.index.title')"
                                       :placeholder="'01001'"></g-g-input>
                            <div class="column is-12">
                                <UploadPhotoVideo :label="trans('services.create.placeWork.title')"></UploadPhotoVideo>
                            </div>

                        </div>

                        <div class="step__footer">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="buttons">
                                        <button
                                            class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                            @click="toggleStep(2)">
                                            <span>{{trans('strings.step')}} 2: {{steps[2].title}}</span>
                                            <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                        </button>
                                        <button class="button is-clear is-clear_close is-size-875 h-3">
                                            <span
                                                class="has-text-decoration-underline">{{trans('strings.cancel')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="step === 2">
                    <div class="step">
                        <div class="step__header mb-2">
                            <h3><span>{{steps[2].title}}</span></h3>
                            <div class="is-size-875 mt-1">
                                {{trans('services.create.step2Desc')}}
                            </div>
                        </div>
                        <!--ToDo: Набор полей меняется в зависимости от значения поля "Условия найма"-->
                        <template v-for="(item, index) in form.vacancy">
                            <div class="mb-2">
                                <h3 class="mb-1"><span>{{trans('services.vacancy')}} №{{index+1}}</span></h3>
                                <div class="box px-0">
                                    <div class="px-1-5">
                                        <div class="columns is-multiline">
                                            <g-g-select-input v-model="item.termsEmployment"
                                                              :label="trans('services.create.termsEmployment.title')"
                                                              :placeholder="trans('services.create.termsEmployment.placeholder')"
                                                              :options="trans('services.create.termsEmployment.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.availabilityPhoto"
                                                              :label="trans('services.create.availabilityPhoto.title')"
                                                              :placeholder="trans('services.create.availabilityPhoto.placeholder')"
                                                              :options="trans('services.create.availabilityPhoto.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.specialty"
                                                              :label="trans('services.create.specialty.title')"
                                                              :placeholder="trans('services.create.specialty.placeholder')"
                                                              :options="trans('services.create.specialty.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.availabilityResume"
                                                              :label="trans('services.create.availabilityResume.title')"
                                                              :placeholder="trans('services.create.availabilityResume.placeholder')"
                                                              :options="trans('services.create.availabilityResume.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-input :size="'is-6'" v-model="item.numberEmployees"
                                                       :label="trans('services.create.numberEmployees.title')"
                                                       :placeholder="'10'"
                                                       :type="'number'"></g-g-input>

                                            <!-- Если контракт-->
                                            <g-g-select-input v-model="item.termContract"
                                                              :label="trans('services.create.termContract.title')"
                                                              :placeholder="trans('services.create.termContract.placeholder')"
                                                              :options="trans('services.create.termContract.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-input :type="'number'" :prevText="'zł'"
                                                       :size="'is-6'"
                                                       v-model="item.monthlySalary"
                                                       :label="trans('services.create.monthlySalary.title')"
                                                       :placeholder="'1000'">
                                            </g-g-input>
                                            <g-g-select-input v-model="item.preferences"
                                                              :label="trans('services.create.preferences.title')"
                                                              :placeholder="trans('services.create.preferences.placeholder')"
                                                              :options="trans('services.create.preferences.options')"
                                                              :size="'is-6'"
                                                              :multiple="true"
                                                              :closeOnSelect="false"></g-g-select-input>
                                            <g-g-check-box-input :margin="false" :size="'is-12'"
                                                                 v-model="item.taxIncluded"
                                                                 :label="trans('services.create.taxIncluded.title')"></g-g-check-box-input>
                                            <!-- End Если контракт-->


                                            <!-- Если лизинг-->
                                            <g-g-select-input v-model="item.termContractLeasing"
                                                              :label="trans('services.create.termContractLeasing.title')"
                                                              :placeholder="trans('services.create.termContractLeasing.placeholder')"
                                                              :options="trans('services.create.termContractLeasing.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-input :type="'number'" :prevText="'zł'"
                                                       :size="'is-6'"
                                                       v-model="item.ratePerHour"
                                                       :label="trans('services.create.ratePerHour.title')"
                                                       :placeholder="'1000'">
                                            </g-g-input>
                                            <g-g-input :type="'number'"
                                                       :size="'is-6'"
                                                       v-model="item.workingHoursPerMonth"
                                                       :label="trans('services.create.workingHoursPerMonth.title')"
                                                       :placeholder="'44'">
                                            </g-g-input>
                                            <g-g-check-box-input :margin="false" :size="'is-12'"
                                                                 v-model="item.taxAgencyIncluded"
                                                                 :label="trans('services.create.taxAgencyIncluded.title')"></g-g-check-box-input>
                                            <!-- End Если лизинг-->


                                            <div class="column is-12">
                                                <button
                                                    class="button h-3 is-info is-size-875 has-text-weight-bold is-outlined px-1">
                                                    {{trans('strings.save')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr-basic">
                                    <div class="px-1-5">
                                        <div class="columns is-multiline">
                                            <g-g-select-input v-model="item.experienceInProfession"
                                                              :label="trans('services.create.experienceInProfession.title')"
                                                              :placeholder="trans('services.create.experienceInProfession.placeholder')"
                                                              :options="trans('services.create.experienceInProfession.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.gender"
                                                              :label="trans('services.create.gender.title')"
                                                              :placeholder="trans('services.create.gender.placeholder')"
                                                              :options="trans('services.create.gender.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.education"
                                                              :label="trans('services.create.education.title')"
                                                              :placeholder="trans('services.create.education.placeholder')"
                                                              :options="trans('services.create.education.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.scheduleWork"
                                                              :label="trans('services.create.scheduleWork.title')"
                                                              :placeholder="trans('services.create.scheduleWork.placeholder')"
                                                              :options="trans('services.create.scheduleWork.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.typeEmployment"
                                                              :label="trans('services.create.typeEmployment.title')"
                                                              :placeholder="trans('services.create.typeEmployment.placeholder')"
                                                              :options="trans('services.create.typeEmployment.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-select-input v-model="item.modeWork"
                                                              :label="trans('services.create.modeWork.title')"
                                                              :placeholder="trans('services.create.modeWork.placeholder')"
                                                              :options="trans('services.create.modeWork.options')"
                                                              :size="'is-6'"></g-g-select-input>
                                            <g-g-textarea :size="'is-12'"
                                                          v-model="item.wishesEmployer"
                                                          :label="trans('services.create.wishesEmployer.title')"
                                                          :placeholder="trans('services.create.wishesEmployer.placeholder')"></g-g-textarea>


                                            <div class="column is-12">
                                                <div class="buttons">
                                                    <button
                                                        class="button h-3 is-info is-size-875 has-text-weight-bold is-outlined px-1">
                                                        {{trans('strings.save')}}
                                                    </button>
                                                    <button
                                                        class="button h-3 is-warning has-text-weight-bold is-outlined px-1 button-remove">
                                                        <span class="icon">&times;</span>
                                                        <span
                                                            class="is-size-875">{{trans('services.removeVacancy')}}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div class="step__footer">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="buttons">
                                        <button
                                            class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                            @click="modalsShow.payment = true">
                                            <span>{{trans('services.orderService')}}</span>
                                        </button>
                                        <button class="button is-clear is-clear_close is-size-875 h-3"
                                                @click="toggleStep(1)">
                                            <span
                                                class="has-text-decoration-underline">{{trans('strings.comeBack')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>

        <modalPaymentService :show="modalsShow.payment" @close="modalsShow.payment = false"
                             @success="paymentSuccess"></modalPaymentService>
        <modalPaymentServiceSuccess :show="modalsShow.paymentSuccess"
                                    @close="modalsShow.paymentSuccess = false"></modalPaymentServiceSuccess>

    </div>
</template>

<script>
    import GGInput from '../../../../form/GGInput';
    import GGSelectInput from '../../../../form/GGSelectInput';
    import GGTextarea from '../../../../form/GGTextarea';
    import GGCheckBoxInput from '../../../../form/GGCheckBoxInput';

    import modalPaymentService from '../modals/Payment'
    import modalPaymentServiceSuccess from '../modals/PaymentSuccess'

    import UploadPhotoVideo from './UploadPhotoVideo'

    export default {
        components: {
            GGInput,
            GGSelectInput,
            GGTextarea,
            modalPaymentService,
            modalPaymentServiceSuccess,
            UploadPhotoVideo,
            GGCheckBoxInput
        },
        props: ['user'],
        data: () => ({
            step: 2,
            steps: {
                1: {
                    title: trans('services.tenantData'),
                    active: true,
                    success: false,
                },
                2: {
                    title: trans('services.leaseSheet'),
                    active: false,
                    success: false,
                    labelReturnInvestment: trans('business.create.labelReturnInvestment')
                },

            },
            form: {
                //region Step 1
                phone: null,
                krsRegonNumber: null,
                nameLegalEntity: null,
                addressLegalEntity: null,
                houseNumberLegalEntity: null,
                officeNumberLegalEntity: null,
                indexLegalEntity: null,
                termEmployment: null,
                fieldActivity: null,


                //endregion

                //region Step 2
                vacancy: [
                    {
                        termsEmployment: null,
                        availabilityPhoto: null,
                        specialty: null,
                        termContract: null,
                        termContractLeasing: null,
                        numberEmployees: null,
                        availabilityResume: null,
                        monthlySalary: null,
                        ratePerHour: null,
                        preferences: null,
                        taxIncluded: null,
                        taxAgencyIncluded: null,
                        workingHoursPerMonth: null,

                        experienceInProfession: null,
                        gender: null,
                        education: null,
                        scheduleWork: null,
                        typeEmployment: null,
                        modeWork: null,
                        wishesEmployer: null,
                    }
                ],

                //endregion

                //region Step 3
                typeLegalEntityOrder: null,
                typeActivityOrder: null,
                ageLegalEntity: null,
                activityWorkingLegalEntity: null,
                countryOrder: null,
                regionOrder: null,
                cityOrder: null,
                annualTurnover: null,
                additionalWishes: null,
                //endregion
            },
            modalsShow: {
                payment: false,
                paymentSuccess: false,
            },
        }),
        mounted() {

        },
        methods: {
            toggleStep(index) {
                let vm = this;
                Object.keys(this.steps).forEach(function (item) {
                    vm.steps[item].active = false;
                });
                this.step = parseInt(index, 10);

                this.steps[index].active = true;
            },
            paymentSuccess() {
                this.modalsShow.payment = false;
                this.modalsShow.paymentSuccess = true;
            },
        }
    }
</script>

<style>

</style>
