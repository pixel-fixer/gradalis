<template>
    <div>
        <form @submit.prevent="submit" v-if="show" class="form form-filter-objects">
            <div class="columns is-multiline">
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Тип инвестирования</label>
                        <div class="control">
                            <multiselect v-model="form.type.selected"
                                         :deselect-label="form.type.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.type.placeholder"
                                         :options="form.type.options"
                                         :searchable="false"
                                         :allow-empty="false"
                                         :selectLabel="form.type.selectLabel"
                                         :selectedLabel="form.type.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Страна</label>
                        <div class="control">
                            <multiselect v-model="form.country.selected"
                                         :deselect-label="form.country.deselectLabel"
                                         track-by="name"
                                         label="name"
                                         :placeholder="form.country.placeholder"
                                         :options="form.country.options"
                                         :searchable="true"
                                         :show-no-results="true"
                                         :allow-empty="false"
                                         :selectLabel="form.country.selectLabel"
                                         :selectedLabel="form.country.selectedLabel">
                                <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                                <span slot="noResult">Нет результатов.</span>
                            </multiselect>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Регион</label>
                        <div class="control">
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
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Категория бизнеса</label>
                        <div class="control">
                            <div class="input inputbox-val" @click="modalCategoryShow = !modalCategoryShow">Категории
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Цена</label>
                        <div class="dropdown is-flex is-full">
                            <div class="dropdown-trigger">
                                <div class="input inputbox-val is-size-875" aria-haspopup="true"
                                     aria-controls="dropdown-price">
                                    <span v-show="form.price.empty">Укажите цену</span>
                                    <span v-show="!form.price.empty" class="has-text-basic">{{'от €'+form.price.value[0]+ ' до €' + form.price.value[1]}}</span>

                                    <div class="multiselect__select"></div>
                                </div>

                            </div>
                            <div class="dropdown-menu" id="dropdown-price" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-item">
                                        <label class="label"><span>Укажите цену</span></label>
                                        <div class="field has-addons has-slider">
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.price.value[0]">
                                                <span class="text is-left is-size-875">от €</span>
                                            </p>
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.price.value[1]"
                                                >
                                                <span class="text is-left is-size-875">до €</span>
                                            </p>
                                        </div>
                                        <vue-slider v-model="form.price.value"
                                                    :tooltip="form.price.optionSlider.tooltip"
                                                    :min="form.price.optionSlider.min"
                                                    :max="form.price.optionSlider.max">

                                        </vue-slider>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.price.value = form.price.addValues.add1">до
                                                €500 тыс.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.price.value = form.price.addValues.add2">до €1
                                                млн.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.price.value = form.price.addValues.add3">до €2
                                                млн.
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-size-875 is-info h-3 has-text-weight-bold is-flex-1"
                                                 @click="form.price.empty = false">
                                                Применить
                                            </div>
                                            <div class="button is-clear is-clear_close is-size-875 h-3"
                                                 @click="form.price.empty = true">
                                                <span class="icon-close">×</span>
                                                <span class="has-text-decoration-underline">Очистить</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Чистая прибыль в месяц</label>
                        <div class="dropdown is-flex is-full">
                            <div class="dropdown-trigger">
                                <div class="input inputbox-val is-size-875" aria-haspopup="true"
                                     aria-controls="dropdown-profit">
                                    <span v-show="form.profit.empty">Желаемая прибыль</span>
                                    <span v-show="!form.profit.empty" class="has-text-basic">{{'от €'+form.profit.value[0]+ ' до €' + form.profit.value[1]}}</span>

                                    <div class="multiselect__select"></div>
                                </div>

                            </div>
                            <div class="dropdown-menu" id="dropdown-profit" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-item">
                                        <label class="label"><span>Желаемая прибыль</span></label>
                                        <div class="field has-addons has-slider">
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.profit.value[0]">
                                                <span class="text is-left is-size-875">от €</span>
                                            </p>
                                            <p class="control control-text-left control-text-left_3em">
                                                <input type="number" class="input is-size-875"
                                                       v-model="form.profit.value[1]"
                                                >
                                                <span class="text is-left is-size-875">до €</span>
                                            </p>
                                        </div>
                                        <vue-slider v-model="form.profit.value"
                                                    :tooltip="form.profit.optionSlider.tooltip"
                                                    :min="form.profit.optionSlider.min"
                                                    :max="form.profit.optionSlider.max">

                                        </vue-slider>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.profit.value = form.profit.addValues.add1">до
                                                €500 тыс.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.profit.value = form.profit.addValues.add2">до €1
                                                млн.
                                            </div>
                                            <div class="button is-light-cyan is-size-875"
                                                 @click="form.profit.value = form.profit.addValues.add3">до €2
                                                млн.
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item">
                                        <div class="buttons">
                                            <div class="button is-size-875 is-info h-3 has-text-weight-bold is-flex-1"
                                                 @click="form.profit.empty = false">
                                                Применить
                                            </div>
                                            <div class="button is-clear is-clear_close is-size-875 h-3"
                                                 @click="form.profit.empty = true">
                                                <span class="icon-close">×</span>
                                                <span class="has-text-decoration-underline">Очистить</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Окупаемость в месяцах</label>
                        <div class="dropdown is-flex is-full">
                            <div class="dropdown-trigger">
                                <div class="input inputbox-val is-size-875" aria-haspopup="true"
                                     aria-controls="dropdown-payback">
                                    <span v-show="form.payback.empty">Количество месяцев</span>
                                    <span v-show="!form.payback.empty" class="has-text-basic">{{'от '+form.payback.value[0]+ ' до ' + form.payback.value[1] + ' мес.'}}</span>

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
                                            <div class="button is-clear is-clear_close is-size-875 h-3"
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
                </div>
                <div class="column is-3">
                    <div class="field">
                        <label class="label">Название или ID</label>
                        <div class="control has-icons-left has-icons-left_1">
                            <input id="email" type="text"
                                   class="input is-size-875" name="query"
                                   :value="form.query.value"
                                   :placeholder="form.query.placeholder"
                            >
                            <div class="icons is-left">
                                  <span class="icon is-small">
                                    <img src="/svg/icons/ic_search.svg" class="svg" alt="">
                                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-6 has-align-self-center">
                            <div class="columns">
                                <div class="column is-narrow">
                                    <div class="field">
                                        <div class="control">
                                            <label class="checkbox is-size-875 is-marginless" for="check_property">
                                                <input type="checkbox" name="check_property"
                                                       id="check_property" checked>
                                                <span>В собственность</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-narrow">
                                    <div class="field">
                                        <div class="control">
                                            <label class="checkbox is-size-875 is-marginless" for="check_profit">
                                                <input type="checkbox" name="check_profit"
                                                       id="check_profit">
                                                <span>Указана прибыль</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="columns has-justify-content-end form-controls">
                                <div class="column is-narrow">
                                    <button class="button is-fullwidth is-size-875" type="reset">
                                        <span>&times;</span>
                                        Сбросить поиск
                                    </button>
                                </div>
                                <div class="column is-6">
                                    <button class="button is-link has-text-weight-bold is-fullwidth" type="submit">Найти
                                        бизнес
                                    </button>
                                </div>
                            </div>
                        </div>
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
        name: "ExampleFormFilter",
        components: {Multiselect, vueSlider},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],
                modalCategoryShow: false,
                form: {
                    type: {
                        selected: null,
                        placeholder: 'Выберите тип',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'type_1', name: 'Бизнес в продаже'},
                            {id: 'type_2', name: 'Бизнес в аренде'},
                        ]
                    },
                    country: {
                        selected: null,
                        placeholder: 'Страна',
                        selectedLabel: 'Выбрано',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: 'ru', name: 'Россия'},
                            {id: 'pl', name: 'Польша'},
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
                    //     selected: [],
                    //     placeholder: 'Категория',
                    //     selectedLabel: 'Выбрано',
                    //     selectLabel: '',
                    //     deselectLabel: '',
                    //     options: [
                    //         {
                    //             id: '1',
                    //             name: 'Cat 1',
                    //             subcategory: [
                    //                 {id: '1-1', name: 'Cat 1-1'},
                    //                 {id: '1-2', name: 'Cat 1-2'},
                    //                 {id: '1-3', name: 'Cat 1-3'},
                    //                 {id: '1-4', name: 'Cat 1-4'},
                    //                 {id: '1-5', name: 'Cat 1-5'},
                    //             ]
                    //         },
                    //         {id: '2', name: 'Cat 2'},
                    //         {id: '3', name: 'Cat 3'},
                    //         {id: '4', name: 'Cat 4'}
                    //     ]
                    // },


                    price: {
                        value: [
                            10000,
                            500000
                        ],
                        addValues: {
                            add1: [
                                0,
                                500000
                            ],
                            add2: [
                                0,
                                1000000
                            ],
                            add3: [
                                0,
                                2000000
                            ],
                        },
                        optionSlider: {
                            tooltip: false,
                            min: 0,
                            max: 2000000
                        },
                        empty: true
                    },
                    profit: {
                        value: [
                            10000,
                            500000
                        ],
                        addValues: {
                            add1: [
                                0,
                                500000
                            ],
                            add2: [
                                0,
                                1000000
                            ],
                            add3: [
                                0,
                                2000000
                            ],
                        },
                        optionSlider: {
                            tooltip: false,
                            min: 0,
                            max: 2000000
                        },
                        empty: true
                    },
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

                    query: {
                        placeholder: 'Поиск',
                        value: '',
                    }
                },
                show: true,
            }
        },
        methods: {
            submit() {
                console.log('submit!');
            },
            toggleModalCategory() {
                this.showModalCategory = true;
                console.log('asd');
                return true;
            }
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
