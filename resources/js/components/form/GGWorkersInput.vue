<template>
    <div class="column is-12">
        <div class="columns is-multiline">
            <div class="column is-12 pb-0">
                <h3>{{label}}</h3>
            </div>
            <div class="column is-12">
                <div class="columns is-multiline list-wrap"
                     v-for="(item, index) in list">
                    <g-g-select-input  v-model="item.post.selected" :placeholder="item.post.placeholder" :label="item.post.title" :searchable="true" :options="options"></g-g-select-input>
                    <g-g-select-input  v-model="item.termsContractDismissal.selected" :placeholder="item.termsContractDismissal.placeholder" :label="item.termsContractDismissal.title" :searchable="true" :options="options"></g-g-select-input>

                    <div class="column is-6">
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="columns is-multiline">
                                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'" v-model="item.monthlyWages.value" :label="item.monthlyWages.title" :placeholder="item.monthlyWages.placeholder"></g-g-input>
                                    <g-g-input :type="'number'" :prevText="'zt'" :size="'is-6'" v-model="item.taxAmountPerMonth.value" :label="item.taxAmountPerMonth.title" :placeholder="item.taxAmountPerMonth.placeholder"></g-g-input>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <button class="button is-warning is-outlined button-remove"
                                        v-tooltip="'Удалить этого сотрудника'"
                                        @click="removeStaff(index)">
                                    &times;<span class="is-size-875 is-hidden-tablet">Удалить этого сотрудника</span>
                                </button>
                                <button class="button is-info is-outlined button-add"
                                        v-tooltip="'Добавить сотрудника'"
                                        @click="addStaff">
                                    +<span class="is-size-875 is-hidden-tablet">Добавить сотрудника</span>
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
            //value: null,
            label:'',
            placeholder: {default: 'Поиск'}
        },
        data(){
            return{

                list: [
                    {
                        post: {
                            selected: null,
                            title: 'Должность',
                            placeholder: 'Выберите',
                            selectedLabel: '',
                            selectLabel: '',
                            deselectLabel: '',
                            noResult: 'Ничего не найдено'
                        },
                        termsContractDismissal: {
                            selected: null,
                            title: 'Условия договора об увольнении',
                            placeholder: 'Выберите',
                            selectedLabel: '',
                            selectLabel: '',
                            deselectLabel: '',
                            noResult: 'Ничего не найдено'
                        },
                        monthlyWages: {
                            title: 'Месячная заработная плата',
                            placeholder: '1000',
                            value: '',
                            tooltip: 'tooltip text',
                            prevTxt: 'zł'
                        },
                        taxAmountPerMonth: {
                            title: 'Сумма налогов, в месяц',
                            placeholder: '1000',
                            value: '',
                            tooltip: 'tooltip text',
                            prevTxt: 'zł'
                        },
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
                    post: {
                        selected: null,
                        title: 'Должность',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено'
                    },
                    termsContractDismissal: {
                        selected: null,
                        title: 'Условия договора об увольнении',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено'
                    },
                    monthlyWages: {
                        title: 'Месячная заработная плата',
                        placeholder: '1000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł'
                    },
                    taxAmountPerMonth: {
                        title: 'Сумма налогов, в месяц',
                        placeholder: '1000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł'
                    },
                });
            },
            removeStaff(index) {
                this.list.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>
