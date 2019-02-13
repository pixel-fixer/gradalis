<template>
    <div class="column is-12">
        <div v-for="(item, index) in listContracts" class="columns is-multiline list-wrap">
            <g-g-input :size="'is-6'" :type="'number'" :prevText="'zt'" v-model="item.title.value"
                       :label="item.title.title" :placeholder="item.title.placeholder"></g-g-input>

            <div class="column is-6">
                <div class="columns is-multiline">
                    <g-g-date-input :size="'is-6'" v-model="item.finalDate.value" :label="item.finalDate.title"
                                    :placeholder="item.finalDate.placeholder"></g-g-date-input>
                    <div class="column is-narrow">
                        <button class="button is-warning is-outlined button-remove"
                                v-tooltip="'Удалить'"
                                @click="removeContract(index)">
                            &times;<span class="is-size-875 is-hidden-tablet">Удалить</span>
                        </button>
                        <button class="button is-info is-outlined button-add"
                                v-tooltip="'Добавить'"
                                @click="addContract">
                            +<span class="is-size-875 is-hidden-tablet">Добавить</span>
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
        props: {},
        data() {
            return {
                listContracts: [
                    {
                        title: {
                            title: 'Название контракта №1',
                            placeholder: 'Укажите название контракта',
                            value: '',
                            tooltip: 'tooltip text',
                        },
                        finalDate: {
                            title: 'Срок действия контракта №1',
                            tooltip: 'tooltip text',
                            placeholder: '25.02.2020',
                            value: '',
                            config: {
                                altFormat: 'd.m.Y',
                                altInput: true,
                                dateFormat: 'Y-m-d'
                            }
                        },
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
                    title: {
                        title: 'Название контракта №1',
                        placeholder: 'Укажите название контракта',
                        value: '',
                        tooltip: 'tooltip text',
                    },
                    finalDate: {
                        title: 'Срок действия контракта №1',
                        tooltip: 'tooltip text',
                        placeholder: '25.02.2020',
                        value: ''
                    },
                });
            },
            removeContract(index) {
                this.listContracts.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>
