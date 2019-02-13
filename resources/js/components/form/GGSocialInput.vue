<template>
    <div class="columns is-multiline">
        <div class="column is-12 pb-0">
            <h3>Группы в социальных сетях</h3>
        </div>
        <g-g-select-input :size="'is-6'" v-model="saleGroupsSocNet.value" :label="saleGroupsSocNet.title"
                          :placeholder="saleGroupsSocNet.placeholder" :options="options"></g-g-select-input>
        <g-g-select-input :allowempty="true" :multiple="true" :size="'is-6'" :type="'number'" v-model="selectedGroups"
                          :label="socNetList.title"
                          :placeholder="socNetList.placeholder" :options="options"></g-g-select-input>

        <template v-for="(item, index) in socNetItems">
            <div class="column is-12">
                <div class="columns is-multiline">
                    <div class="column is-12 pb-0">
                        <h3>Группа в {{item.title}}</h3>
                    </div>
                    <g-g-input :size="'is-6'" v-model="item.link.value" :label="item.link.title"
                               :placeholder="item.link.placeholder"></g-g-input>
                    <g-g-input :size="'is-6'" :type="'number'" v-model="item.countUsers.value"
                               :label="item.countUsers.title" :placeholder="item.countUsers.placeholder"></g-g-input>
                    <g-g-select-input :size="'is-6'" :type="'number'" v-model="item.haveIncome.value"
                                      :label="item.haveIncome.title"
                                      :placeholder="item.haveIncome.placeholder" :options="options"></g-g-select-input>

                    <g-g-input :prevText="'zt'" :type="'number'" v-model="item.incomeYear.value"
                               :label="item.incomeYear.title" :placeholder="item.incomeYear.placeholder"></g-g-input>
                    <g-g-input :prevText="'zt'" :type="'number'" v-model="item.incomeQuarter.value"
                               :label="item.incomeQuarter.title"
                               :placeholder="item.incomeQuarter.placeholder"></g-g-input>
                    <g-g-input :prevText="'zt'" :type="'number'" v-model="item.turnoverYear.value"
                               :label="item.turnoverYear.title"
                               :placeholder="item.turnoverYear.placeholder"></g-g-input>
                    <g-g-input :prevText="'zt'" :type="'number'" v-model="item.turnoverQuarter.value"
                               :label="item.turnoverQuarter.title"
                               :placeholder="item.turnoverQuarter.placeholder"></g-g-input>
                    <g-g-input :prevText="'zt'" :type="'number'" v-model="item.expensesYear.value"
                               :label="item.expensesYear.title"
                               :placeholder="item.expensesYear.placeholder"></g-g-input>
                    <g-g-input :prevText="'zt'" :type="'number'" v-model="item.expensesQuarter.value"
                               :label="item.expensesQuarter.title"
                               :placeholder="item.expensesQuarter.placeholder"></g-g-input>

                    <g-g-select-input :size="'is-6'" :type="'number'" v-model="item.themes.value"
                                      :label="item.themes.title"
                                      :placeholder="item.themes.placeholder" :options="options"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" :type="'number'" v-model="item.lang.value" :label="item.lang.title"
                                      :placeholder="item.lang.placeholder" :options="options"></g-g-select-input>
                    <g-g-select-input :size="'is-6'" :type="'number'" v-model="item.methodTransferGroup.value"
                                      :label="item.methodTransferGroup.title"
                                      :placeholder="item.methodTransferGroup.placeholder"
                                      :options="options"></g-g-select-input>

                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import GGInput from './GGInput'
    import GGSelectInput from './GGSelectInput'

    export default {
        name: "GGSocialInput",
        components: {GGInput, GGSelectInput},
        props: {
            //value: null,
            label: '',
            placeholder: {default: 'Поиск'}
        },
        data() {
            return {
                selectedGroups: null,
                saleGroupsSocNet: {
                    value: null,
                    title: 'Передаются ли группы в социальных сетях?',
                    placeholder: 'Выберите',
                    selectedLabel: '',
                    selectLabel: '',
                    deselectLabel: '',
                    noResult: 'Ничего не найдено'
                },
                socNetList: {
                    value: null,
                    title: 'Укажите социальные сети',
                    placeholder: 'Выберите',
                    selectedLabel: '',
                    selectLabel: '',
                    deselectLabel: '',
                    noResult: 'Ничего не найдено'
                },
                socNetItems: [{
                    title: 'Facebook',
                    link: {
                        title: 'Ссылка на группу',
                        placeholder: 'https://',
                        value: '',
                        tooltip: 'tooltip text',
                    },
                    countUsers: {
                        title: 'Объём пользователей группы',
                        placeholder: '11000',
                        value: '',
                        tooltip: 'tooltip text',
                    },
                    haveIncome: {
                        selected: null,
                        title: 'Получаете ли доход с группы?',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: trans('business.create.theme.options'),
                        noResult: 'Ничего не найдено'
                    },
                    incomeYear: {
                        title: 'Доход с группы в год',
                        placeholder: '1 000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł',
                    },
                    incomeQuarter: {
                        title: 'Доход с группы в квартал ',
                        placeholder: '1 000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł',
                    },
                    turnoverYear: {
                        title: 'Оборот с группы в год',
                        placeholder: '1 000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł',
                    },
                    turnoverQuarter: {
                        title: 'Оборот с группы в квартал ',
                        placeholder: '1 000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł',
                    },
                    expensesYear: {
                        title: 'Расходы с группы в год',
                        placeholder: '1 000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł',
                    },
                    expensesQuarter: {
                        title: 'Расходы с группы в квартал ',
                        placeholder: '1 000',
                        value: '',
                        tooltip: 'tooltip text',
                        prevTxt: 'zł',
                    },
                    themes: {
                        selected: null,
                        title: 'Тематика группы',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: trans('business.create.theme.options'),
                        noResult: 'Ничего не найдено'
                    },
                    lang: {
                        selected: null,
                        title: 'Языковой сегмент группы',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: trans('business.create.theme.options'),
                        noResult: 'Ничего не найдено'
                    },
                    methodTransferGroup: {
                        selected: null,
                        title: 'Способ передачи группы',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: trans('business.create.theme.options'),
                        noResult: 'Ничего не найдено'
                    },

                }],
                options: trans('business.create.theme.options'),
            }
        },

        watch: {
            selectedGroups: {
                immediate: true,
                handler(value) {
                    //console.log('changed')
                }
            }
        },
        methods: {
            inputChange() {
                this.$emit('input', this.socNetItems);
            },
            addItem() {
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
            removeItem(index) {
                this.list.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>
