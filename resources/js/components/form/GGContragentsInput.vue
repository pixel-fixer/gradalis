<template>
    <div class="column is-12">
        <div class="columns is-multiline">
            <div class="column is-12 pb-0">
                <h3>{{label}}</h3>
            </div>
            <div class="column is-12">
                <div class="columns is-multiline list-wrap"
                     v-for="(item, index) in list">
                    <g-g-select-input  v-model="item.direction.selected" :placeholder="item.direction.placeholder" :label="item.direction.title" :searchable="true" :options="options"></g-g-select-input>

                    <g-g-input v-model="item.name.value" :label="item.name.title" :placeholder="item.name.placeholder"></g-g-input>

                    <div class="column is-6">
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="columns is-multiline">
                                    <g-g-input :size="'is-6'" :type="'phone'" v-model="item.phone.value" :label="item.phone.title" :placeholder="item.phone.placeholder"></g-g-input>
                                    <g-g-input :size="'is-6'" :type="'email'" v-model="item.mail.value" :label="item.mail.title" :placeholder="item.mail.placeholder"></g-g-input>
                                </div>
                            </div>
                            <div class="column is-narrow">
                                <button class="button is-warning is-outlined button-remove"
                                        v-tooltip="'Удалить этого контрагента'"
                                        @click="removeContractors(index)">
                                    &times;<span class="is-size-875 is-hidden-tablet">Удалить этого контрагента</span>
                                </button>
                                <button class="button is-info is-outlined button-add"
                                        v-tooltip="'Добавить контрагента'"
                                        @click="addContractors">
                                    +<span class="is-size-875 is-hidden-tablet">Добавить контрагента</span>
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
                        direction: {
                            selected: null,
                            title: 'Направление контрагента',
                            placeholder: 'Выберите',
                            selectedLabel: '',
                            selectLabel: '',
                            deselectLabel: '',

                            noResult: 'Ничего не найдено'
                        },
                        name: {
                            title: 'Название юридического лица',
                            placeholder: 'Укажите название',
                            value: '',
                            tooltip: 'tooltip text'
                        },
                        phone: {
                            title: 'Телефон',
                            placeholder: '+48 456 566-09-23',
                            value: '',
                            tooltip: 'tooltip text'
                        },
                        mail: {
                            title: 'Почта',
                            placeholder: 'agent@mail.com',
                            value: '',
                            tooltip: 'tooltip text'
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
            addContractors() {
                this.list.push({
                    direction: {
                        selected: null,
                        title: 'Направление контрагента',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено'
                    },
                    name: {
                        title: 'Название юридического лица',
                        placeholder: 'Укажите название',
                        value: '',
                        tooltip: 'tooltip text'
                    },
                    phone: {
                        title: 'Телефон',
                        placeholder: '+48 456 566-09-23',
                        value: '',
                        tooltip: 'tooltip text'
                    },
                    mail: {
                        title: 'Почта',
                        placeholder: 'agent@mail.com',
                        value: '',
                        tooltip: 'tooltip text'
                    },
                });
            },
            removeContractors(index) {
                this.list.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>
