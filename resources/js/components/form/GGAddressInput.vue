<template>
    <div class="column is-12">
        <div class="columns is-multiline list-wrap"
        v-for="item in list">

            <g-g-input :size="'is-12-tablet is-6-desktop'" @input="inputChange" v-model="item.address" :label="trans('business.create.address.title')" :placeholder="trans('business.create.address.placeholder')"></g-g-input>
            
            <div class="column is-12-tablet is-6-desktop">
                <div class="columns is-multiline">
                    <div class="column">
                        <div class="columns is-multiline">
                            <g-g-input :type="'number'" @input="inputChange" v-model="item.numberHouse" :label="trans('business.create.numberHouse.title')" :placeholder="trans('business.create.numberHouse.placeholder')"></g-g-input>
                            <g-g-input :type="'number'" @input="inputChange" v-model="item.housingHouse" :label="trans('business.create.housingHouse.title')" :placeholder="trans('business.create.housingHouse.placeholder')"></g-g-input>
                            <g-g-input :type="'number'" @input="inputChange" v-model="item.numberOffice" :label="trans('business.create.numberOffice.title')" :placeholder="trans('business.create.numberOffice.placeholder')"></g-g-input>
                            <g-g-input :type="'number'" @input="inputChange" v-model="item.index" :label="trans('business.create.index.title')" :placeholder="trans('business.create.index.placeholder')"></g-g-input>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <div class="buttons has-justify-content-center">
                            <button class="button is-warning is-outlined button-remove"
                                    v-tooltip="trans('business.create.remove_address')"
                                    @click="removeAddress(item)">
                                <span class="icon is-marginless">
                                    &times;
                                </span>
                                <span class="is-size-875 is-hidden-tablet">{{ trans('business.create.remove_address') }}</span>
                            </button>
                            <button class="button is-info is-outlined button-add"
                                    v-tooltip="trans('business.create.add_address')"
                                    @click="addAddress">
                                <span class="icon is-marginless">
                                    +
                                </span>
                                <span class="is-size-875 is-hidden-tablet">{{ trans('business.create.add_address') }}</span>
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import GGInput from './GGInput'
    export default {
        name: "GGAddressInput",
        components:{GGInput},
        props: {
            value: null,
        },
        data(){
            return{

                list: [{
                    address: null,
                    numberHouse: null,
                    housingHouse: null,
                    numberOffice: null,
                    index: null
                }],
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.list);
            },
            addAddress() {
                this.list.push({
                    address: null,
                    numberHouse: null,
                    housingHouse: null,
                    numberOffice: null,
                    index: null
                });
            },
            removeAddress(index) {
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
                            address: null,
                            numberHouse: null,
                            housingHouse: null,
                            numberOffice: null,
                            index: null
                        }]
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
