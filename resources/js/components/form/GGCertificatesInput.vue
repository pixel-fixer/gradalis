<template>
    <div class="column is-12">
        <div class="columns is-multiline">
            <div class="column is-12 pb-0">
                <h3>{{label}}</h3>
            </div>

            <g-g-select-input @input="inputChange" :size="'is-6'" v-model="form.havePurchasedServices"
                              :placeholder="trans('business.create.yn.placeholder')"
                              :label="trans('business.create.havePurchasedServices.title')"
                              :options="trans('business.create.yn.options')"></g-g-select-input>
            <g-g-select-input @input="inputChange" :size="'is-6'" v-model="form.neededLicenses"
                              :label="trans('business.create.neededLicenses.title')" :searchable="true"
                              :placeholder="trans('business.create.yn.placeholder')"
                              :options="trans('business.create.yn.options')"></g-g-select-input>
            <div class="column is-12">
                <div class="columns is-multiline list-wrap"
                     v-for="(item, index) in form.list">
                    <div class="column is-12">
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="columns is-multiline">
                                    <g-g-select-input @input="inputChange" :size="'is-3'" v-model="item.document"
                                                      :placeholder="trans('business.create.certificates.document.placeholder')"
                                                      :label="trans('business.create.certificates.document.title')"
                                                      :options="trans('business.create.certificates.document.options')"></g-g-select-input>
                                    <g-g-select-input @input="inputChange" :size="'is-3'" v-model="item.type"
                                                      :placeholder="trans('business.create.certificates.type.placeholder')"
                                                      :label="trans('business.create.certificates.type.title')"
                                                      :options="trans('business.create.certificates.type.options')"></g-g-select-input>
                                    <g-g-date-input @input="inputChange" :size="'is-6'" v-model="item.licensePeriod"
                                                    :label="trans('business.create.certificates.licensePeriod.title')"
                                                    :placeholder="trans('business.create.certificates.licensePeriod.placeholder')"></g-g-date-input>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <button class="button is-warning is-outlined button-remove"
                                        v-tooltip="trans('business.create.certificates.remove')"
                                        @click="removeCertificates(index)">
                                    &times;<span class="is-size-875 is-hidden-tablet">{{trans('business.create.certificates.remove')}}</span>
                                </button>
                                <button class="button is-info is-outlined button-add"
                                        v-tooltip="trans('business.create.certificates.add')"
                                        @click="addCertificates">
                                    +<span class="is-size-875 is-hidden-tablet">{{trans('business.create.certificates.add')}}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import GGDateInput from './GGDateInput'
    import GGSelectInput from './GGSelectInput'

    export default {
        name: "GGCertificatesInput",
        components: {GGDateInput, GGSelectInput},
        props: {
            value:{default:null},
            label: '',
            placeholder: {default: 'Поиск'}
        },
        data() {
            return {
                form: {
                    havePurchasedServices: null,
                    neededLicenses: null,
                    list: [{
                        document: null,
                        type: null,
                        licensePeriod: null
                    }],
                }
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.form);
            },
            addCertificates() {
                this.form.list.push({
                    document: null,
                    type: null,
                    licensePeriod: null
                });
            },
            removeCertificates(index) {
                this.form.list.splice(index, 1);
            },
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    if (value) {
                        this.form = value;
                    } else {
                        this.form =  {
                            havePurchasedServices: null,
                            neededLicenses: null,
                            list: [{
                                document: null,
                                type: null,
                                licensePeriod: null
                            }],
                        }
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
