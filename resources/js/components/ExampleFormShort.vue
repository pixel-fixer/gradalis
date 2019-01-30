<template>
    <div>
        <form @submit.prevent="submit" v-if="show" class="form-inline">
            <div class="columns">
                <div class="column is-one-fifth">
                    <multiselect v-model="form.city.selected"
                                 :deselect-label="form.city.deselectLabel"
                                 track-by="name"
                                 label="name"
                                 :placeholder="form.city.placeholder"
                                 :options="form.city.options"
                                 :searchable="true"
                                 :allow-empty="false"
                                 :selectLabel="form.city.selectLabel"
                                 :selectedLabel="form.city.selectedLabel">
                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                    </multiselect>
                </div>
                <div class="column is-one-fifth">
                    <multiselect v-model="form.region.selected"
                                 :deselect-label="form.region.deselectLabel"
                                 track-by="name"
                                 label="name"
                                 :placeholder="form.region.placeholder"
                                 :options="form.region.options"
                                 :searchable="false"
                                 :allow-empty="false"
                                 :selectLabel="form.region.selectLabel"
                                 :selectedLabel="form.region.selectedLabel">
                        <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                    </multiselect>
                </div>
                <div class="column is-one-fifth">
                    <div class="control">
                        <div class="input inputbox-val" @click="modalCategoryShow = !modalCategoryShow">Категории
                        </div>
                    </div>
                </div>
                <div class="column is-one-fifth">
                    <div class="dropdown is-flex is-full">
                        <div class="dropdown-trigger">
                            <div class="input inputbox-val" aria-haspopup="true"
                                 aria-controls="dropdown-payback">
                                <span v-show="form.payback.empty">Окупаемость</span>
                                <span v-show="!form.payback.empty">{{'от '+form.payback.value[0]+ ' до ' + form.payback.value[1] + ' мес.'}}</span>

                                <div class="multiselect__select"></div>
                            </div>

                        </div>
                        <div class="dropdown-menu" id="dropdown-payback" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-item">
                                    <label class="label"><span>Количество месяцев</span></label>
                                    <div class="field has-addons has-slider">
                                        <p class="control control-month-range">
                                            <input type="number" class="input is-size-875"
                                                   v-model="form.payback.value[0]">
                                            <span class="text is-left is-size-875">от&nbsp;</span>
                                            <span class="text is-right is-size-875">мес.</span>
                                        </p>
                                        <p class="control control-month-range">
                                            <input type="number" class="input is-size-875"
                                                   v-model="form.payback.value[1]">
                                            <span class="text is-left is-size-875">до&nbsp;</span>
                                            <span class="text is-right is-size-875">мес.</span>
                                        </p>

                                    </div>
                                    <vue-slider v-model="form.payback.value"
                                                :tooltip="form.payback.optionSlider.tooltip"
                                                :min="form.payback.optionSlider.min"
                                                :max="form.payback.optionSlider.max">

                                    </vue-slider>
                                </div>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item">
                                    <div class="buttons">
                                        <div class="button is-light-cyan is-size-875"
                                             @click="form.payback.value = form.payback.addValues.add1">до 12
                                        </div>
                                        <div class="button is-light-cyan is-size-875"
                                             @click="form.payback.value = form.payback.addValues.add2">до 24
                                        </div>
                                        <div class="button is-light-cyan is-size-875"
                                             @click="form.payback.value = form.payback.addValues.add3">до 36
                                        </div>
                                    </div>
                                </div>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item">
                                    <div class="buttons">
                                        <div class="button is-size-875 is-info h-3 has-text-weight-bold is-flex-1"
                                             @click="form.payback.empty = false">
                                            Применить
                                        </div>
                                        <div class="button is-clear is-clear_close is-size-875 h-3 is-flex-1"
                                             @click="form.payback.empty = true">
                                            <span class="icon-close">×</span>
                                            <span class="has-text-decoration-underline">Очистить</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-one-fifth">
                    <div class="button-wrap">
                        <button class="button is-link has-text-weight-bold is-fullwidth" type="submit">Найти бизнес</button>
                    </div>
                </div>
            </div>
        </form>
        <!--Modal-->
        <div class="modal modal-select-category" :class="modalCategoryActive" id="modal-select-categories">
            <div class="modal-background" @click="modalCategoryShow = !modalCategoryShow"></div>
            <div class="modal-card modal-card_big">
                <header class="modal-card-head modal-card-head_bb">
                    <p class="modal-card-title">Выберите категорию</p>
                    <button class="delete close-modal" @click="modalCategoryShow = !modalCategoryShow"
                            aria-label="close"></button>
                </header>
                <section class="modal-card-body is-paddingless">
                    <ul class="category-list">
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item disabled">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item is-active">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                        <li class="category-list__item">
                            <figure class="category-list__item__icon">
                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                            </figure>
                            <span>Автомойки, сервисы, СТО</span>
                        </li>
                    </ul>
                    <div class="subcategory-wrap">
                        <div class="subcategory-header">
                            <h3>Выберите подкатегорию</h3>
                            <div class="toggle-list">
                                <span class="toggle-list__item">Выбрать все</span>
                                <span class="toggle-list__item">Отменить все</span>
                            </div>
                        </div>
                        <ul class="subcategory-list">
                            <li class="subcategory-list__item">
                                <span>Автомойки, сервисы, СТО</span>
                            </li>
                            <li class="subcategory-list__item is-active">
                                <span>Автомойки, сервисы, СТО</span>
                            </li>

                        </ul>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-info save is-size-875 has-text-weight-bold">Сохранить категорию</button>
                    <button class="button clear is-size-875"><img src="/svg/icons/ic_close.svg" alt=""
                                                                  class="svg"><span>Сбросить</span></button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import vueSlider from 'vue-slider-component';

    export default {
        name: "ExampleFormShort",
        components: {Multiselect, vueSlider},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],
                modalCategoryShow: false,
                form: {
                    city: {
                        selected: null,
                        placeholder: 'Город',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'moscow', name: 'Москва'},
                            {id: 'belgorod', name: 'Белгород'},
                            {id: 'kazan', name: 'Казань'},
                            {id: 'voronezh', name: 'Воронеж'}
                        ]
                    },
                    region: {
                        selected: null,
                        placeholder: 'Регион',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Region 1'},
                            {id: '2', name: 'Region 2'},
                            {id: '3', name: 'Region 3'},
                            {id: '4', name: 'Region 4'}
                        ]
                    },
                    // category: {
                    //     selected: null,
                    //     placeholder: 'Категория',
                    //     selectedLabel: 'Выбрано',
                    //     selectLabel: '',
                    //     deselectLabel: '',
                    //     options: [
                    //         {id: '1', name: 'Cat 1'},
                    //         {id: '2', name: 'Cat 2'},
                    //         {id: '3', name: 'Cat 3'},
                    //         {id: '4', name: 'Cat 4'}
                    //     ]
                    // },
                    payback: {
                        value: [
                            0,
                            12
                        ],
                        addValues: {
                            add1: [
                                0,
                                12
                            ],
                            add2: [
                                0,
                                24
                            ],
                            add3: [
                                0,
                                36
                            ],
                        },
                        optionSlider: {
                            tooltip: false,
                            min: 0,
                            max: 48
                        },
                        empty: true
                    },
                },
                show: true,
            }
        },
        methods: {
            submit() {
                console.log('submit!');
            },
        },
        computed: {
            modalCategoryActive: function () {
                if (this.modalCategoryShow) {
                    return 'is-active';
                } else {
                    return '';
                }
            }
        }
    }
</script>

<style scoped>

</style>
