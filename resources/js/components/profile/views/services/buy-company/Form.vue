<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">{{trans('services.buyCompany.title')}}</h1>
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

                            <g-g-input :size="'is-6'" v-model="form.surname"
                                       :label="trans('services.create.surname.title')"
                                       :placeholder="trans('services.create.surname.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.name"
                                       :label="trans('services.create.name.title')"
                                       :placeholder="trans('services.create.patronymic.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.patronymic"
                                       :label="trans('services.create.patronymic.title')"
                                       :placeholder="trans('services.create.patronymic.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.address"
                                       :label="trans('services.create.address.title')"
                                       :placeholder="trans('services.create.address.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.phone" :label="trans('services.create.phone.title')"
                                       :placeholder="trans('services.create.phone.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.phonePoland"
                                       :label="trans('services.create.phonePoland.title')"
                                       :placeholder="trans('services.create.phonePoland.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.email" :label="trans('services.create.email.title')"
                                       :placeholder="trans('services.create.email.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.skype" :label="trans('services.create.skype.title')"
                                       :placeholder="trans('services.create.skype.placeholder')"></g-g-input>


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
                    <div class="box step">
                        <div class="step__header mb-2">
                            <h3><span>{{steps[2].title}}</span></h3>
                            <div class="is-size-875 mt-1">
                                {{trans('services.create.step2Desc')}}
                            </div>
                        </div>

                        <div class="columns is-multiline">

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
                            <g-g-location-select-input v-model="form.countryLegalEntity"
                                                       :size="'is-6'"></g-g-location-select-input>
                            <g-g-input :size="'is-6'" v-model="form.krsRegonNumber"
                                       :label="trans('services.create.krsRegonNumber.title')"
                                       :placeholder="trans('services.create.krsRegonNumber.placeholder')"></g-g-input>

                        </div>

                        <div class="step__footer">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="buttons">
                                        <button
                                            class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                            @click="toggleStep(3)">
                                            <span>{{trans('strings.step')}} 3: {{steps[3].title}}</span>
                                            <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
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

                <div v-show="step === 3">
                    <div class="box step">
                        <div class="step__header mb-2">
                            <h3><span>{{steps[3].title}}</span></h3>
                        </div>

                        <div class="columns is-multiline">
                            <g-g-select-input v-model="form.typeLegalEntityOrder"
                                              :label="trans('services.create.typeLegalEntity.title')"
                                              :placeholder="trans('services.create.typeLegalEntity.placeholder')"
                                              :options="trans('services.create.typeLegalEntity.options')"
                                              :size="'is-6'"></g-g-select-input>
                            <g-g-select-input v-model="form.typeActivityOrder"
                                              :label="trans('services.create.typeActivity.title')+' ('+trans('strings.upTo5Pieces')+')'"
                                              :placeholder="trans('services.create.typeActivity.placeholder')"
                                              :options="trans('services.create.typeActivity.options')"
                                              :size="'is-6'"
                                              :multiple="true"
                                              :closeOnSelect="false"></g-g-select-input>
                            <g-g-select-input v-model="form.ageLegalEntity"
                                              :label="trans('services.create.ageLegalEntity.title')"
                                              :placeholder="trans('services.create.ageLegalEntity.placeholder')"
                                              :options="trans('services.create.ageLegalEntity.options')"
                                              :size="'is-6'"></g-g-select-input>
                            <g-g-select-input v-model="form.activityWorkingLegalEntity"
                                              :label="trans('services.create.activityWorking.title')"
                                              :placeholder="trans('services.create.activityWorking.placeholder')"
                                              :options="trans('services.create.activityWorking.options')"
                                              :size="'is-6'"></g-g-select-input>


                            <g-g-location-select-input v-model="form.countryOrder"
                                                       :size="'is-6'"></g-g-location-select-input>
                            <g-g-location-select-input v-model="form.regionOrder"
                                                       :size="'is-6'"
                                                       :type="'region'"></g-g-location-select-input>
                            <g-g-location-select-input v-model="form.cityOrder"
                                                       :size="'is-6'"
                                                       :type="'city'"></g-g-location-select-input>

                            <g-g-input :type="'number'" :prevText="'zł'"
                                       :size="'is-6'"
                                       v-model="form.annualTurnover"
                                       :label="trans('services.create.annualTurnover.title')"
                                       :placeholder="'1000'">
                            </g-g-input>

                            <g-g-textarea :size="'is-12'"
                                          v-model="form.additionalWishes"
                                          :label="trans('services.create.additionalWishes.title')"
                                          :placeholder="trans('services.create.additionalWishes.placeholder')"></g-g-textarea>

                        </div>

                        <div class="step__footer">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="buttons">
                                        <button
                                            class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                            @click="modalsShow.payment = true">
                                            <span>{{trans('strings.send')}}</span>
                                            <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                        </button>
                                        <button class="button is-clear is-clear_close is-size-875 h-3"
                                                @click="toggleStep(2)">
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

        <modalPaymentService :show="modalsShow.payment" @close="modalsShow.payment = false" @success="paymentSuccess"></modalPaymentService>
        <modalPaymentServiceSuccess :show="modalsShow.paymentSuccess" @close="modalsShow.paymentSuccess = false"></modalPaymentServiceSuccess>

    </div>
</template>

<script>
    import GGInput from '../../../../form/GGInput';
    import GGLocationSelectInput from '../../../../form/GGLocationSelectInput';
    import GGSelectInput from '../../../../form/GGSelectInput';
    import GGTextarea from '../../../../form/GGTextarea';

    import modalPaymentService from '../modals/Payment'
    import modalPaymentServiceSuccess from '../modals/PaymentSuccess'

    export default {
        components: {
            GGInput, GGLocationSelectInput, GGSelectInput, GGTextarea, modalPaymentService, modalPaymentServiceSuccess
        },
        props: ['user'],
        data: () => ({
            step: 1,
            steps: {
                1: {
                    title: trans('services.basicInformation'),
                    active: true,
                    success: false,
                },
                2: {
                    title: trans('services.legalEntityData'),
                    active: false,
                    success: false,
                    labelReturnInvestment: trans('business.create.labelReturnInvestment')
                },
                3: {
                    title: trans('services.orderFormation'),
                    active: false,
                    success: false,
                },
            },
            form: {
                //region Step 1
                name: null,
                surname: null,
                patronymic: null,
                phone: null,
                phonePoland: null,
                address: null,
                email: null,
                skype: null,
                //endregion

                //region Step 2
                nameLegalEntity: null,
                addressLegalEntity: null,
                houseNumberLegalEntity: null,
                officeNumberLegalEntity: null,
                indexLegalEntity: null,
                countryLegalEntity: null,
                krsRegonNumber: null,
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
