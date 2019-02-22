<template>
    <div class="column is-12">
        <div class="columns is-multiline">
            <div class="column is-12 pb-0">
                <h3>{{label}}</h3>
            </div>
            <div class="column is-12">
                <div class="columns is-multiline list-wrap"
                     v-for="(item, index) in list">
                    <g-g-select-input @input="inputChange" :size="'is-3'" v-model="item.direction"
                                      :placeholder="trans('business.create.contractors.direction.placeholder')"
                                      :label="trans('business.create.contractors.direction.title')"
                                      :options="trans('business.create.contractors.direction.options')"></g-g-select-input>

                    <g-g-input @input="inputChange" v-model="item.name"
                               :label="trans('business.create.contractors.name.title')"
                               :placeholder="trans('business.create.contractors.name.placeholder')">
                    </g-g-input>
                    <div class="column is-6">
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="columns is-multiline">
                                    <g-g-input @input="inputChange" :size="'is-6'" v-model="item.phone"
                                               :label="trans('business.create.contractors.phone.title')"
                                               :placeholder="trans('business.create.contractors.phone.placeholder')">
                                    </g-g-input>
                                    <g-g-input @input="inputChange" :size="'is-6'" v-model="item.mail"
                                               :label="trans('business.create.contractors.mail.title')"
                                               :placeholder="trans('business.create.contractors.mail.placeholder')">
                                    </g-g-input>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <button class="button is-warning is-outlined button-remove"
                                        v-tooltip="trans('business.create.contractors.remove')"
                                        @click="removeContractors(index)">
                                    &times;<span class="is-size-875 is-hidden-tablet">{{trans('business.create.contractors.remove')}}</span>
                                </button>
                                <button class="button is-info is-outlined button-add"
                                        v-tooltip="trans('business.create.contractors.add')"
                                        @click="addContractors">
                                    +<span class="is-size-875 is-hidden-tablet">{{trans('business.create.contractors.add')}}</span>
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
        name: "GGContragentsInput",
        components: {GGInput, GGSelectInput},
        props: {
            value: {default:null},
            label: '',
            placeholder: {default: 'Поиск'}
        },
        data() {
            return {

                list: [
                    {
                        direction: null,
                        name: null,
                        phone: null,
                        mail: null
                    },
                ],
                options: trans('business.create.theme.options'),
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.list);
            },
            addContractors() {
                this.list.push({
                    direction: null,
                    name: null,
                    phone: null,
                    mail: null
                });
            },
            removeContractors(index) {
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
                            direction: null,
                            name: null,
                            phone: null,
                            mail: null
                        }]
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
