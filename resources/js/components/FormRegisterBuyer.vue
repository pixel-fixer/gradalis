<template>
    <form @submit.prevent="submit">
        <div class="columns is-multiline">
            <div class="column is-6">
                <div class="field">
                    <label for="name"
                           class="label label_req"><span>Ваше имя</span></label>
                    <div class="control">
                        <input type="text"
                               id="name" class="input is-size-875" name="name"
                               value="" placeholder="Введите Ваше имя" required>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label for="surname"
                           class="label label_req"><span>Ваша фамилия</span></label>
                    <div class="control">
                        <input type="text"
                               id="surname" class="input is-size-875" name="surname"
                               value="" placeholder="Введите Вашу фамилию" required>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label for="email"
                           class="label label_req"><span>Контактный email</span></label>
                    <div class="control">
                        <input id="email" type="email"
                               class="input is-size-875" name="email"
                               value="" placeholder="Введите email" required>

                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field is-expanded">
                    <label for="tel"
                           class="label label_req"><span>Контактный телефон</span></label>
                    <div class="field has-addons">
                        <p class="control">
                            <a class="button is-static is-size-875">
                                +48
                            </a>
                        </p>
                        <p class="control is-expanded">
                            <input type="tel"
                                   id="tel" class="input is-size-875" name="tel"
                                   value="" placeholder="(456) 566-09-23" required>
                        </p>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field is-expanded">
                    <label class="label label_req"><img src="/svg/icons/ic_coins.svg" alt=""><span>Сумма покупки</span></label>
                    <div class="field has-addons has-slider">
                        <p class="control control-purchase-amount">
                            <input type="number" class="input is-size-875" v-model="form.purchaseAmount[0]">
                            <span class="text is-left is-size-875">от €</span>
                        </p>
                        <p class="control control-purchase-amount">
                            <input type="number" class="input is-size-875" v-model="form.purchaseAmount[1]">
                            <span class="text is-left is-size-875">до €</span>
                        </p>
                    </div>
                    <vue-slider v-model="form.purchaseAmount"
                                :tooltip="optionSliderPurchaseAmount.tooltip"
                                :min="optionSliderPurchaseAmount.min"
                                :max="optionSliderPurchaseAmount.max">

                    </vue-slider>
                </div>
            </div>
            <div class="column is-6">
                <div class="field is-expanded">
                    <label class="label label_req"><img src="/svg/icons/ic_time.svg" alt=""><span>Ориентировочное время до покупки</span></label>
                    <div class="field has-addons has-slider">
                        <p class="control control-time-purchase">
                            <input type="number" class="input is-size-875" v-model="form.timePurchase[0]">
                            <span class="text is-left is-size-875">от&nbsp;</span>
                            <span class="text is-right is-size-875">мес.</span>
                        </p>
                        <p class="control control-time-purchase">
                            <input type="number" class="input is-size-875" v-model="form.timePurchase[1]">
                            <span class="text is-left is-size-875">до&nbsp;</span>
                            <span class="text is-right is-size-875">мес.</span>
                        </p>
                    </div>
                    <vue-slider v-model="form.timePurchase"
                                :tooltip="optionSliderTimePurchase.tooltip"
                                :min="optionSliderTimePurchase.min"
                                :max="optionSliderTimePurchase.max">

                    </vue-slider>
                </div>
            </div>
            <div class="column is-12">
                <div class="field">
                    <div class="control">
                        <label class="checkbox is-link" for="remember">
                            <input type="checkbox" name="remember"
                                   id="remember" checked>
                            <span>С <a href="#" class="has-text-info is-link">условиями предоставления услуг</a> ознакомлен</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="column is-12">
                <div class="field">
                    <div class="control">
                        <button type="submit"
                                class="button is-link is-fullwidth has-text-weight-bold">
                            Подтвердить регистрацию продаца
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import vueSlider from 'vue-slider-component';

    export default {
        name: "form-register-buyer",
        components: {vueSlider},
        data() {
            return {
                selected: null,
                options: ['list', 'of', 'options'],

                form: {
                    purchaseAmount: [
                        1000,
                        5000
                    ],
                    timePurchase: [
                        12,
                        36
                    ],
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
                },
                optionSliderPurchaseAmount: {
                    tooltip: false,
                    min: 0,
                    max: 20000
                },
                optionSliderTimePurchase: {
                    tooltip: false,
                    min: 0,
                    max: 48
                }
            }
        },
        methods: {
            submit() {
                console.log('submit!');
            },
        }
    }
</script>

<style scoped>

</style>
