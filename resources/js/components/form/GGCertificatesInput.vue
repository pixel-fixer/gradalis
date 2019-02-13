<template>
    <div class="column is-12">
        <div class="columns is-multiline">
            <div class="column is-12 pb-0">
                <h3>{{label}}</h3>
            </div>
            <g-g-select-input  :size="'is-6'" v-model="havePurchasedServices.selected" :placeholder="havePurchasedServices.placeholder" :label="havePurchasedServices.title" :searchable="true" :options="havePurchasedServices.options"></g-g-select-input>
            <g-g-select-input  :size="'is-6'" v-model="neededLicenses.selected" :placeholder="neededLicenses.placeholder" :label="neededLicenses.title" :searchable="true" :options="neededLicenses.options"></g-g-select-input>
            <div class="column is-12">
                <div class="columns is-multiline list-wrap"
                v-for="(item, index) in list">
                    <div class="column is-12">
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="columns is-multiline">
                                    <g-g-select-input :size="'is-3'"  v-model="item.document.selected" :placeholder="item.document.placeholder" :label="item.document.title" :searchable="true" :options="options"></g-g-select-input>
                                    <g-g-select-input :size="'is-3'"  v-model="item.type.selected" :placeholder="item.type.placeholder" :label="item.type.title" :searchable="true" :options="options"></g-g-select-input>
                                    <g-g-date-input :size="'is-6'"  v-model="item.licensePeriod.value" :label="item.licensePeriod.title" :placeholder="item.licensePeriod.placeholder"></g-g-date-input>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <button class="button is-warning is-outlined button-remove"
                                        v-tooltip="'Удалить'"
                                        @click="removeCertificates(index)">
                                    &times;<span class="is-size-875 is-hidden-tablet">Удалить</span>
                                </button>
                                <button class="button is-info is-outlined button-add"
                                        v-tooltip="'Добавить'"
                                        @click="addCertificates">
                                    +<span class="is-size-875 is-hidden-tablet">Добавить</span>
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
        components:{GGDateInput,GGSelectInput},
        props: {
            //value: null,
            label:'',
            placeholder: {default: 'Поиск'}
        },
        data(){
            return{
                havePurchasedServices: {
                    selected: null,
                    title: 'Есть ли выкупленные долгосрочные услуги?',
                    placeholder: 'Выберите',
                    selectedLabel: '',
                    selectLabel: '',
                    deselectLabel: '',
                    options: trans('business.create.theme.options')
                },
                neededLicenses: {
                    selected: null,
                    title: 'Нужны ли сертификаты, лицензии, разрешения по виду деятельности?',
                    placeholder: 'Выберите',
                    selectedLabel: '',
                    selectLabel: '',
                    deselectLabel: '',
                    options: trans('business.create.theme.options')
                },
                list: [
                    {
                        document: {
                            selected: null,
                            title: 'Укажите документ',
                            placeholder: 'Выберите',
                            selectedLabel: '',
                            selectLabel: '',
                            deselectLabel: '',
                            noResult: 'Ничего не найдено'
                        },
                        type: {
                            selected: null,
                            title: 'Укажите тип',
                            placeholder: 'Выберите',
                            selectedLabel: '',
                            selectLabel: '',
                            deselectLabel: '',
                            noResult: 'Ничего не найдено'
                        },
                        licensePeriod: {
                            title: 'Срок действия лицензии',
                            placeholder: '25.02.2020',
                            value: '',
                            config: {
                                altFormat: 'd.m.Y',
                                altInput: true,
                                dateFormat: 'Y-m-d'
                            }
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
            addCertificates() {
                this.list.push({
                    document: {
                        selected: null,
                        title: 'Укажите документ',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено'
                    },
                    type: {
                        selected: null,
                        title: 'Укажите тип',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено'
                    },
                    licensePeriod: {
                        title: 'Срок действия лицензии',
                        placeholder: '25.02.2020',
                        value: '',
                        config: {
                            altFormat: 'd.m.Y',
                            altInput: true,
                            dateFormat: 'Y-m-d'
                        }
                    },
                });
            },
            removeCertificates(index) {
                this.list.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>
