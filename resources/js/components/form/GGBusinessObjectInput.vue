<template>
    <div class="column is-12">
        <div class="add-business__objects-list">
            <div class="add-business__objects-item px-1-5 list-wrap"
                 v-for="(object, index) in businessObjects">
                <h3 class="mb-1">Объект №{{index + 1}}</h3>
                <div class="columns is-multiline ">
                    <g-g-select-input v-model="object.categoryProperty" :size="'is-6'"
                                      :placeholder="trans('business.create.categoryProperty.placeholder')"
                                      :label="trans('business.create.categoryProperty.title')"
                                      :options="trans('business.create.categoryProperty.options')">
                    </g-g-select-input>
                    <g-g-select-input v-model="object.typeProperty" :size="'is-6'"
                                      :placeholder="trans('business.create.typeProperty.placeholder')"
                                      :label="trans('business.create.typeProperty.title')" :searchable="true"
                                      :options="trans('business.create.typeProperty.options')"></g-g-select-input>

                    <g-g-input :type="'number'"
                               :prevText="trans('business.create.numberSquareMeters.prevText')"
                               :size="'is-6'"
                               v-model="object.numberSquareMeters"
                               :label="trans('business.create.numberSquareMeters.title')"
                               :placeholder="trans('business.create.numberSquareMeters.placeholder')">
                    </g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.priceSquareMeters"
                               :label="trans('business.create.priceSquareMeters.title')"
                               :placeholder="trans('business.create.priceSquareMeters.placeholder')">
                    </g-g-input>

                    <g-g-check-box-input :size="'is-3'" v-model="object.priceIncludingVAT"
                                         :label="trans('business.create.priceIncludingVAT.title')">
                    </g-g-check-box-input>

                    <g-g-select-input v-model="object.titleDocuments"
                                      :label="trans('business.create.titleDocuments.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-select-input v-model="object.restrictionsOperation"
                                      :label="trans('business.create.restrictionsOperation.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>

                    <g-g-select-input :size="'is-6'" v-model="object.listRestrictionsOperation"
                                      :multiple="true"
                                      :placeholder="trans('business.create.listRestrictionsOperation.placeholder')"
                                      :label="trans('business.create.listRestrictionsOperation.title')"
                                      :options="trans('business.create.listRestrictionsOperation.options')"></g-g-select-input>

                    <g-g-select-input v-model="object.refRegisterEstate"
                                      :label="trans('business.create.refRegisterEstate.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-select-input v-model="object.technicalPropertyPlan"
                                      :label="trans('business.create.technicalPropertyPlan.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" v-model="object.coordinationRedevelopment"
                                      :label="trans('business.create.coordinationRedevelopment.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>

                    <g-g-select-input :size="'is-6'" v-model="object.availabilityMortgage"
                                      :label="trans('business.create.availabilityMortgage.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>
                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.totalAmountMortgage"
                               :label="trans('business.create.totalAmountMortgage.title')"
                               :placeholder="trans('business.create.totalAmountMortgage.placeholder')">
                    </g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.repaidAmountMortgage"
                               :label="trans('business.create.repaidAmountMortgage.title')"
                               :placeholder="trans('business.create.repaidAmountMortgage.placeholder')">
                    </g-g-input>


                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.balanceMortgage"
                               :label="trans('business.create.balanceMortgage.title')"
                               :placeholder="trans('business.create.balanceMortgage.placeholder')">
                    </g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.monthlyPaymentMortgage"
                               :label="trans('business.create.monthlyPaymentMortgage.title')"
                               :placeholder="trans('business.create.monthlyPaymentMortgage.placeholder')">
                    </g-g-input>
                    <g-g-date-input v-model="object.finalPaymentMortgageDate"
                                    :label="trans('business.create.finalPaymentMortgageDate.title')"
                                    :placeholder="trans('business.create.finalPaymentMortgageDate.placeholder')">
                    </g-g-date-input>

                    <g-g-select-input :size="'is-6'" v-model="object.availabilityLoanSecuredObject"
                                      :label="trans('business.create.availabilityLoanSecuredObject.title')"
                                      :placeholder="trans('business.create.yn.placeholder')"
                                      :options="trans('business.create.yn.options')"></g-g-select-input>

                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.totalAmountCredit"
                               :label="trans('business.create.totalAmountCredit.title')"
                               :placeholder="trans('business.create.totalAmountCredit.placeholder')">
                    </g-g-input>
                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.repaidAmountCredit"
                               :label="trans('business.create.repaidAmountCredit.title')"
                               :placeholder="trans('business.create.repaidAmountCredit.placeholder')">
                    </g-g-input>

                    <g-g-input :type="'number'" :prevText="'zt'"
                               v-model="object.balanceCredit"
                               :label="trans('business.create.balanceCredit.title')"
                               :placeholder="trans('business.create.balanceCredit.placeholder')">
                    </g-g-input>

                    <g-g-date-input :size="'is-3'" v-model="object.finalPaymentCreditDate"
                                    :label="trans('business.create.finalPaymentCreditDate.title')"
                                    :placeholder="trans('business.create.finalPaymentCreditDate.placeholder')">
                    </g-g-date-input>
                    <g-g-select-input :size="'is-3'" v-model="object.purposeCredit"
                                      :placeholder="trans('business.create.purposeCredit.placeholder')"
                                      :label="trans('business.create.purposeCredit.title')"
                                      :options="trans('business.create.purposeCredit.options')"></g-g-select-input>


                    <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                               v-model="object.monthlyUtilityCosts"
                               :label="trans('business.create.monthlyUtilityCosts.title')"
                               :placeholder="trans('business.create.monthlyUtilityCosts.placeholder')">
                    </g-g-input>


                    <template v-if="(object.listRestrictionsOperation == 8)">
                        <!--Если аренда-->
                        <g-g-check-box-input :size="'is-6'"
                                             v-model="object.presenceChanging"
                                             :label="trans('business.create.presenceChanging.title')">
                        </g-g-check-box-input>

                        <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                                   v-model="object.costChanging"
                                   :label="trans('business.create.costChanging.title')"
                                   :placeholder="trans('business.create.costChanging.placeholder')">
                        </g-g-input>
                        <g-g-date-input :size="'is-3'" v-model="object.leaseTermTo"
                                        :label="trans('business.create.leaseTermTo.title')"
                                        :placeholder="trans('business.create.leaseTermTo.placeholder')">
                        </g-g-date-input>

                    </template>

                    <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'"
                               v-model="object.houseBookNumber"
                               :label="trans('business.create.houseBookNumber.title')"
                               :placeholder="trans('business.create.houseBookNumber.placeholder')">
                    </g-g-input>

                    <div class="column is-6">
                        <button class="button is-warning is-outlined button-remove"
                                @click="removeObject">
                            &times;<span class="is-size-875">{{trans('business.create.remove_object')}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-1-5 mb-1">
            <div class="columns is-multiline">
                <div class="column is-6">
                    <button class="button is-info is-outlined button-add"
                            @click="addObject">
                        +<span class="is-size-875">{{trans('business.create.add_object')}}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import GGSelectInput from './GGSelectInput';
    import GGCheckBoxInput from './GGCheckBoxInput';
    import GGDateInput from './GGDateInput';
    import GGInput from './GGInput';
    import GGTextarea from './GGTextarea';

    export default {
        name: "GGBusinessObject",
        components: {
            GGTextarea,
            GGInput,
            GGDateInput,
            GGCheckBoxInput,
            GGSelectInput
        },
        props: {
            //value: {default:null},
            value: {
                default: []
            },
        },
        data() {
            return {}
        },
        methods: {
            addObject() {
                this.businessObjects.push({
                    categoryProperty: null,
                    typeProperty: null,
                    numberSquareMeters: null,
                    priceSquareMeters: null,
                    priceIncludingVAT: null,
                    titleDocuments: null,
                    restrictionsOperation: null,
                    listRestrictionsOperation: null,
                    refRegisterEstate: null,
                    technicalPropertyPlan: null,
                    coordinationRedevelopment: null,
                    availabilityMortgage: null,
                    totalAmountMortgage: null,
                    repaidAmountMortgage: null,
                    balanceMortgage: null,
                    monthlyPaymentMortgage: null,
                    finalPaymentMortgageDate: null,
                    availabilityLoanSecuredObject: null,
                    totalAmountCredit: null,
                    repaidAmountCredit: null,
                    balanceCredit: null,
                    monthlyPaymentCredit: null,
                    finalPaymentCreditDate: null,
                    purposeCredit: null,
                    jointPropertyEstate: null,
                    typeRelationshipCoowners: null,
                    monthlyUtilityCosts: null,
                    houseBookNumber: null,

                    presenceChanging: null,
                    costChanging: null,
                    leaseTermTo: null,
                });
            },
            removeObject(index) {
                this.businessObjects.splice(index, 1);
            },
        },
        computed: {
            businessObjects: {
                get: function () {
                    return this.value
                },
                set: function (value) {
                    this.$emit('input', value);
                },
            }
        },
    }
</script>

<style scoped>

</style>
