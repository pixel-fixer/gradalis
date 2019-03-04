<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">Покупка юридического лица</h1>
        </section>
        <section class="section pt-0 px-0">
            <div class="buttons mb-2">
                <a href="#" class="button is-info h-3 is-size-875 has-text-weight-bold px-1">
                    <span class="icon has-flip-horizontally"><img src="/svg/icons/ic_arrow_right.svg" alt=""
                                                                  class="svg"></span>
                    <span>Вернуться назад</span>
                </a>
            </div>
            <div>
                <div class="box px-0 pb-0">
                    <div class="px-1-5">
                        <h3 class="mb-1 is-flex has-align-items-center">
                            <span>Документы по оформлению</span>
                            <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                        </h3>
                    </div>
                    <table class="table is-fullwidth is-size-875">
                        <thead class="bb">
                        <tr>
                            <th>Название документа</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th>Подробности</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="has-text-weight-bold">Договор найма</td>
                            <td class="has-text-basic">12 марта 2019</td>
                            <td><span class="has-text-warning">Изменен</span></td>
                            <td><span class="has-text-info has-text-decoration-underline">Посмотреть</span></td>
                        </tr>
                        <tr class="service-tr-add-action">
                            <td colspan="4" class="is-paddingless">
                                <div class="p-1-5 is-flex has-align-items-center mr-1">
                                    <a href="#" class="service-tr-add-action__document-action is-flex has-align-items-center">
                                        <span class="icon">
                                            <img src="/svg/icons/files/ic_pdf.svg" alt="" class="svg">
                                        </span>
                                        <span>Скачать документ</span>
                                    </a>
                                    <label class="service-tr-add-action__document-action is-flex has-align-items-center">
                                        <span class="icon">
                                            <img src="/svg/icons/ic_add_files.svg" alt="" class="svg">
                                        </span>
                                        <span>Загрузите документ</span>
                                        <input type="file" name="nameDoc" style="display: none;">
                                    </label>
                                    <div class="has-text-basic service-tr-add-action__document-info ml-1 is-flex has-align-items-center">
                                        <span class="mr-1">12.03.2019</span>
                                        <span class="mr-1">filename.jpg</span>
                                        <span class="service-tr-add-action__document-remove">
                                             <span class="icon icon-1">
                                            <img src="/svg/icons/ic_close.svg" alt="" class="svg">
                                        </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="service-action-comment p-1-5 is-flex">
                                    <figure class="is-marginless mr-1">
                                        <img
                                            src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                            alt="">
                                    </figure>
                                    <div class="service-action-comment__info">
                                        <div class="is-flex is-size-7 has-text-basic">
                                            <div class="service-action-comment__title has-text-weight-bold">
                                                Исполнитель
                                            </div>
                                            <time class="service-action-comment__time">17:39</time>
                                        </div>
                                        <div class="service-action-comment__content is-size-875 has-text-dark-blue">
                                            Пожалуйста, уменьшите установленный объем работы.
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="buttons mt-2">
                <a href="#" class="button is-info h-3 is-size-875 has-text-weight-bold px-1">
                    <span>Оформить доверенность</span>
                    <span class="icon"><img src="/svg/icons/ic_arrow_right.svg" alt=""
                                            class="svg"></span>
                </a>
            </div>
        </section>


        <button class="button" @click="modalsShow.payment = true">Оплатить</button>
        <button class="button" @click="modalsShow.paymentSuccess = true">Успешная оплата</button>


        <modal v-if="modalsShow.payment" @close="modalsShow.payment = false">
            <div slot="header">
                <p class="modal-card-title mb-0">Оплата услуги</p>
            </div>

            <div slot="body">
                <div class="content">
                    <div class="columns is-multiline">
                        <g-g-select-input v-model="formPayment.type" :size="'is-6'"
                                          :label="'Предпочитаемый тип оплаты'" :searchable="true"
                                          :options="typesPayment"
                                          :withImg="true">
                        </g-g-select-input>
                        <g-g-select-input v-model="formPayment.currency" :size="'is-6'"
                                          :placeholder="'Выберите'"
                                          :label="'Валюта счета'" :searchable="true"
                                          :options="typesCurrency">
                        </g-g-select-input>
                    </div>
                    <hr class="hr-basic">
                    <div class="is-size-875 has-text-centered">Общая стоимость</div>
                    <div class="has-text-centered has-text-weight-bold is-size-5">€2000</div>
                </div>
            </div>
            <div class="content w-full" slot="footer">
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <button
                            class="button is-link is-fullwidth has-text-weight-bold h-3 is-size-875">
                            Оплатить
                        </button>
                    </div>
                </div>
            </div>


        </modal>
        <modal v-if="modalsShow.paymentSuccess" @close="modalsShow.paymentSuccess = false">
            <div slot="header">

            </div>

            <div slot="body">
                <div class="content">
                    <div class="has-text-centered has-text-weight-bold">
                        <img src="/svg/icons/notification/ic_thankyou.svg" alt="">
                    </div>
                    <div class="has-text-centered has-text-weight-bold is-size-4">Успешная оплата</div>
                    <div class="is-size-875 has-text-centered has-text-basic">Спасибо, что пользуетесь нашими услугами
                    </div>
                </div>
            </div>
            <div slot="footer">

            </div>


        </modal>
    </div>
</template>

<script>
    import Modal from '../../../../Modal'
    import GGSelectInput from '../../../../form/GGSelectInput'

    export default {
        components: {
            Modal,
            GGSelectInput
        },
        props: ['user'],
        data: () => ({
            modalsShow: {
                payment: false,
                paymentSuccess: false,
            },
            formPayment: {
                type: null,
                currency: null,
            },
            typesPayment: [
                {
                    id: 1,
                    name: 'Item 1',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
                {
                    id: 2,
                    name: 'Item 2',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
                {
                    id: 3,
                    name: 'Item 3',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
                {
                    id: 4,
                    name: 'Item 4',
                    img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                },
            ],
            typesCurrency: [
                {
                    id: 1,
                    name: 'Item 1',
                },
                {
                    id: 2,
                    name: 'Item 2',
                },
                {
                    id: 3,
                    name: 'Item 3',
                },
                {
                    id: 4,
                    name: 'Item 4',
                },
            ]
        }),
        mounted() {

        },
        methods: {

        }
    }
</script>

<style>

</style>
