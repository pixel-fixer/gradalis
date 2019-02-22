<template>
    <div class="column is-12">
        <div class="columns is-multiline">
            <div class="column is-12 pb-0">
                <h3>{{label}}</h3>
            </div>
            <div class="column is-12">
                <div class="columns is-multiline list-wrap"
                     v-for="(item, index) in list">

                    <g-g-select-input @input="inputChange" :size="'is-3'" v-model="item.post"
                                      :placeholder="trans('business.create.staff.post.placeholder')"
                                      :label="trans('business.create.staff.post.title')"
                                      :options="trans('business.create.staff.post.options')"></g-g-select-input>

                    <g-g-select-input @input="inputChange" :size="'is-3'" v-model="item.termsContractDismissal"
                                      :placeholder="trans('business.create.staff.termsContractDismissal.placeholder')"
                                      :label="trans('business.create.staff.termsContractDismissal.title')"
                                      :options="trans('business.create.staff.termsContractDismissal.options')"></g-g-select-input>

                    <div class="column is-6">
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="columns is-multiline">
                                    <g-g-input @input="inputChange" :type="'number'" :prevText="'zt'" :size="'is-6'" v-model="item.monthlyWages"
                                         :label="trans('business.create.staff.monthlyWages.title')"
                                         :placeholder="trans('business.create.staff.monthlyWages.placeholder')">
                                    </g-g-input>
                                    <g-g-input @input="inputChange" :type="'number'" :prevText="'zt'" :size="'is-6'" v-model="item.taxAmountPerMonth"
                                         :label="trans('business.create.staff.taxAmountPerMonth.title')"
                                         :placeholder="trans('business.create.staff.taxAmountPerMonth.placeholder')">
                                    </g-g-input>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <button class="button is-warning is-outlined button-remove"
                                        v-tooltip="trans('business.create.staff.remove')"
                                        @click="removeStaff(index)">
                                    &times;<span class="is-size-875 is-hidden-tablet">{{trans('business.create.staff.remove')}}</span>
                                </button>
                                <button class="button is-info is-outlined button-add"
                                        v-tooltip="trans('business.create.staff.add')"
                                        @click="addStaff">
                                    +<span class="is-size-875 is-hidden-tablet">{{trans('business.create.staff.add')}}</span>
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
    import GGInput from './GGInput'
    import GGSelectInput from './GGSelectInput'
    export default {
        name: "GGWorkersInput",
        components:{GGInput,GGSelectInput},
        props: {
            value: {default:null},
            label:'',
            placeholder: {default: 'Поиск'}
        },
        data(){
            return{

                list: [
                    {
                        post: null,
                        termsContractDismissal: null,
                        monthlyWages:null,
                        taxAmountPerMonth: null,
                    },
                ],
                options: trans('business.create.theme.options'),
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.list);
            },
            addStaff() {
                this.list.push({
                    post: null,
                    termsContractDismissal: null,
                    monthlyWages:null,
                    taxAmountPerMonth: null,
                });
            },
            removeStaff(index) {
                this.list.splice(index, 1);
            },
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    if (value) {
                        this.list = value;
                    } else {
                        this.list = [{
                            post: null,
                            termsContractDismissal: null,
                            monthlyWages:null,
                            taxAmountPerMonth: null,
                        }]
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
