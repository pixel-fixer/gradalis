<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">{{trans('services.buyCompany.title')}}</h1>
        </section>


        <section class="section pt-0 px-0">

            <div ref="buy-company-form" class="stepper">
                <div class="stepper__nav is-hidden-mobile">
                    <template v-for="(item, index) in steps">
                        <div class="stepper__nav__item" :class="{ 'is-active' : item.active, 'is-ok' : item.success }">
                            <div class="stepper__nav__item__button" v-tooltip="item.title" @click="toggleStep(index)">
                                {{index}}
                            </div>
                            <div class="stepper__nav__item__title">{{item.title}}</div>
                        </div>
                    </template>
                </div>

                <div class="stepper__nav stepper__nav_mobile is-hidden-tablet">
                    <div class="stepper__nav__item is-active">
                        <div class="stepper__nav__item__button">
                            {{step}}/{{Object.keys(steps).length}}
                        </div>
                        <div class="stepper__nav__item__title">{{steps[step].title}}</div>
                    </div>
                </div>

                <div v-show="step === 1">
                    <div class="box step">
                        <div class="step__header mb-2">
                            <h3><span>{{steps[1].title}}</span></h3>
                        </div>

                        <div class="columns is-multiline">

                            <g-g-input :size="'is-6'" v-model="form.surname"
                                       :label="trans('services.create.surname.title')"
                                       :placeholder="trans('services.create.surname.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.name"
                                       :label="trans('services.create.name.title')"
                                       :placeholder="trans('services.create.patronymic.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.patronymic"
                                       :label="trans('services.create.patronymic.title')"
                                       :placeholder="trans('services.create.patronymic.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.address"
                                       :label="trans('services.create.address.title')"
                                       :placeholder="trans('services.create.address.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.phone" :label="trans('services.create.phone.title')"
                                       :placeholder="trans('services.create.phone.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.phonePoland"
                                       :label="trans('services.create.phonePoland.title')"
                                       :placeholder="trans('services.create.phonePoland.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.email" :label="trans('services.create.email.title')"
                                       :placeholder="trans('services.create.email.placeholder')"></g-g-input>
                            <g-g-input :size="'is-6'" v-model="form.skype" :label="trans('services.create.skype.title')"
                                       :placeholder="trans('services.create.skype.placeholder')"></g-g-input>


                        </div>

                        <div class="step__footer">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="buttons">
                                        <button
                                            class="button button-next is-info is-size-875 h-3 has-text-weight-bold px-1"
                                            @click="toggleStep(2)">
                                            <span>{{trans('strings.step')}} 2: {{steps[2].title}}</span>
                                            <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                                        </button>
                                        <button class="button is-clear is-clear_close is-size-875 h-3">
                                            <span
                                                class="has-text-decoration-underline">{{trans('strings.cancel')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>


    </div>
</template>

<script>
    import GGInput from '../../../../form/GGInput';

    export default {
        components: {
            GGInput
        },
        props: ['user'],
        data: () => ({
            step: 1,
            steps: {
                1: {
                    title: "Основная информация",
                    active: true,
                    success: false,
                },
                2: {
                    title: "Данные юридического лица",
                    active: false,
                    success: false,
                    labelReturnInvestment: trans('business.create.labelReturnInvestment')
                },
                3: {
                    title: "Формирование заказа",
                    active: false,
                    success: false,
                },
            },
            form: {
                //region Step 1
                name: null,
                surname: null,
                patronymic: null,
                phone: null,
                phonePoland: null,
                address: null,
                email: null,
                skype: null,

                //endregion
            }
        }),
        mounted() {

        },
        methods: {
            toggleStep(index) {
                let vm = this;
                Object.keys(this.steps).forEach(function (item) {
                    vm.steps[item].active = false;
                });
                this.step = parseInt(index, 10);

                this.steps[index].active = true;
            },
        }
    }
</script>

<style>

</style>
