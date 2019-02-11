<template>
    <div class="column is-12">
        <div class="columns is-multiline list-wrap"
        v-for="item in list">

            <g-g-input :size="'is-6'" v-model="item.address.value" :label="item.address.title" :placeholder="item.address.placeholder"></g-g-input>
            
            <div class="column is-6">
                <div class="columns is-multiline">
                    <div class="column">
                        <div class="columns is-multiline">
                            <g-g-input :type="'number'" :size="'is-3'" v-model="item.numberHouse.value" :label="item.numberHouse.title" :placeholder="item.numberHouse.placeholder"></g-g-input>
                            <g-g-input :type="'number'" :size="'is-3'" v-model="item.housingHouse.value" :label="item.housingHouse.title" :placeholder="item.housingHouse.placeholder"></g-g-input>
                            <g-g-input :type="'number'" :size="'is-3'" v-model="item.numberOffice.value" :label="item.numberOffice.title" :placeholder="item.numberOffice.placeholder"></g-g-input>
                            <g-g-input :type="'number'" :size="'is-3'" v-model="item.index.value" :label="item.index.title" :placeholder="item.index.placeholder"></g-g-input>
                        </div>
                    </div>
                    <div class="column is-narrow">
                        <button class="button is-warning is-outlined button-remove"
                                v-tooltip="'Удалить этот адрес'"
                                @click="removeAddress(item)">
                            &times;<span class="is-size-875 is-hidden-tablet">Удалить этот адрес</span>
                        </button>
                        <button class="button is-info is-outlined button-add"
                                v-tooltip="'Добавить еще один адрес'"
                                @click="addAddress">
                            +<span class="is-size-875 is-hidden-tablet">Добавить еще один адрес</span>
                        </button>
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
            //value: null,
            label:'',
            placeholder: {default: 'Поиск'}
        },
        data(){
            return{

                list: [{
                    tooltipAddress: "Tooltip text",
                    address: {
                        title: 'Адрес бизнеса',
                        placeholder: 'Укажите адрес',
                        value: '',
                    },
                    numberHouse: {
                        title: 'Номер дома',
                        placeholder: '№',
                        value: '',
                    },
                    housingHouse: {
                        title: 'Корпус дома',
                        placeholder: 'Корпус',
                        value: '',
                    },
                    numberOffice: {
                        title: 'Номер офиса',
                        placeholder: '№',
                        value: '',
                    },
                    index: {
                        title: 'Индекс',
                        placeholder: '01001',
                        value: '',
                    }
                }],
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.list);
            },
            addAddress() {
                this.list.push({
                    address: {
                        title: 'Адрес бизнеса',
                        placeholder: 'Укажите адрес',
                        value: '',
                    },
                    numberHouse: {
                        title: 'Номер дома',
                        placeholder: '№',
                        value: '',
                    },
                    housingHouse: {
                        title: 'Корпус дома',
                        placeholder: 'Корпус',
                        value: '',
                    },
                    numberOffice: {
                        title: 'Номер офиса',
                        placeholder: '№',
                        value: '',
                    },
                    index: {
                        title: 'Индекс',
                        placeholder: '01001',
                        value: '',
                    }
                });
            },
            removeAddress(index) {
                this.list.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>
