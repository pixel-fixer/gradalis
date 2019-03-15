<template>
    <div class="column is-12">
        <div v-for="(item, index) in listContracts" class="columns is-multiline list-wrap">
            <g-g-input @input="inputChange" :size="'is-6'" :type="'number'" :prevText="'zt'"
                       v-model="item.title"
                       :label="trans('business.create.listContracts.title.title') + ' ' + (index + 1)"
                       :placeholder="trans('business.create.listContracts.title.title')"></g-g-input>

            <div class="column is-6">
                <div class="columns is-multiline">
                    <g-g-date-input @input="inputChange" :size="'is-6'" v-model="item.finalDate"
                                    :label="trans('business.create.listContracts.title.title') + ' ' + (index + 1)"
                                    :placeholder="trans('business.create.listContracts.title.title')"></g-g-date-input>
                    <div class="column is-narrow">
                        <button class="button is-warning is-outlined button-remove"
                                v-tooltip="trans('business.create.remove_contract')"
                                @click="removeContract(index)">
                            &times;<span class="is-size-875 is-hidden-tablet">{{trans('business.create.remove_contract')}}</span>
                        </button>
                        <button class="button is-info is-outlined button-add"
                                v-tooltip="trans('business.create.add_contract')"
                                @click="addContract">
                            +<span class="is-size-875 is-hidden-tablet">{{trans('business.create.add_contract')}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import GGInput from './GGInput'
    import GGDateInput from './GGDateInput'

    export default {
        name: "GGContractsInput",
        components: {GGInput, GGDateInput},
        props: {
            value:{default:null}
        },
        data() {
            return {
                listContracts: [
                    {
                        title: null,
                        finalDate: null,
                    }
                ],
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.listContracts);
            },
            addContract() {
                this.listContracts.push({
                    title: null,
                    finalDate: null,
                });
            },
            removeContract(index) {
                this.listContracts.splice(index, 1);
            },
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    if (value) {
                        this.listContracts = value;
                    } else {
                        this.listContracts = [{
                            title: null,
                            finalDate: null,
                        }]
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
