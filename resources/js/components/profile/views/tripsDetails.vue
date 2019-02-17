<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">
            <img src="/svg/icons/services/ic_spy.svg" alt="">
            <span>Тариф «Шпион»</span>
        </h1>
        <section class="is-paddingless mb-1-75">
            <h3>Запланированные просмотры объектов</h3>
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Названия объекта</th>
                    <th>Комментарии</th>
                    <th>Дата и время</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td class="has-text-basic">
                        <a href="#" class="link-with-icon has-text-decoration-underline">
                            Суши-магазин в Невском районе. Выручка от 1,1 млн/мес
                        </a>
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <i class="has-text-grey-light no-wrap">Нет комментариев</i>
                    </td>
                    <td class="has-text-basic no-wrap has-vertical-align-middle">12.03.2018 в 16:00</td>
                    <td class="has-text-danger has-vertical-align-middle">
                        Отклонен
                    </td>
                </tr>
                <tr>
                    <td class="has-text-basic">
                        <a href="#" class="link-with-icon has-text-decoration-underline">
                            Суши-магазин в Невском районе. Выручка от 1,1 млн/мес
                        </a>
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">
                        Отличный объект. Идеально подходит для целей бизнеса.
                    </td>
                    <td class="has-text-basic no-wrap has-vertical-align-middle">12.03.2018 в 16:00</td>
                    <td class="has-text-success has-vertical-align-middle">
                        Подтвержден
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="has-text-centered">
                        <button class="button is-info is-outlined h-3 is-rounded px-1"
                                @click="ui.modalRequestView.show = true">
                            <span class="mr-0-5 is-size-4">+</span><span class="is-size-875">Добавить просмотр</span>
                        </button>

                        <modal v-if="ui.modalRequestView.show" @close="ui.modalRequestView.show = false">
                            <div slot="header">
                                <p class="modal-card-title mb-0">{{ui.modalRequestView.header}}</p>
                            </div>

                            <div slot="body">
                                <div class="content">
                                    <div class="columns is-multiline">
                                        <g-g-select-input v-model="formNewRequestView.object.selected" :size="'is-12'"
                                                          :placeholder="formNewRequestView.object.placeholder"
                                                          :label="formNewRequestView.object.title" :searchable="true"
                                                          :options="formsOptions.objects.options"
                                                          :withImg="true">
                                        </g-g-select-input>


                                        <g-g-date-input v-model="formNewRequestView.date.value"
                                                        :label="formNewRequestView.date.title"
                                                        :placeholder="formNewRequestView.date.placeholder"
                                                        :required="formNewRequestView.date.required"
                                                        :size="'is-6'">
                                        </g-g-date-input>
                                        <g-g-date-input v-model="formNewRequestView.time.value"
                                                        :label="formNewRequestView.time.title"
                                                        :placeholder="formNewRequestView.time.placeholder"
                                                        :required="formNewRequestView.time.required"
                                                        :size="'is-6'"
                                                        :config="formNewRequestView.time.config">
                                        </g-g-date-input>
                                        <g-g-textarea :size="'is-12'" v-model="formNewRequestView.comment.value"
                                                      :label="formNewRequestView.comment.title"
                                                      :placeholder="formNewRequestView.comment.placeholder"
                                                      :required="formNewRequestView.comment.required"></g-g-textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="content w-full" slot="footer">
                                <div class="columns is-multiline">
                                    <div class="column is-12">
                                        <button @click="createRequestView"
                                                class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                            Отправить запрос на просмотр
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </modal>

                    </td>
                </tr>
                </tbody>
            </table>
            <div class="content">
                <h3 class="mb-0">Ваши пожелания</h3>
                <time class="is-size-7 has-text-basic">12 марта в 17:40</time>
                <div class="is-size-875 mb-1-75">
                    <p>Убедитесь, что сделка будет совершена без последствий. Вопреки законам математики, в жизни от
                        перемены мест все меняется. Меняются наши внутренние ощущения, мировоззрение, отношение к жизни,
                        —
                        и, что
                        самое интересное, только в лучшую сторону.</p>
                </div>
                <div class="buttons">
                    <button class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span class="icon icon-1"><img src="/svg/icons/ic_ask_question.svg" class="svg" alt=""></span>
                        <span>Задать вопрос брокеру</span>
                    </button>
                    <button class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span>Добавить пожелания</span>
                    </button>
                </div>
            </div>
        </section>
        <hr class="hr-basic">
        <section class="is-paddingless">
            <div class="content">
                <h3>Ваши перелеты</h3>
                <div class="box is-paddingless">
                    <div class="p-1-5 card-flight">
                        <div class="card-flight__title mb-1 has-text-weight-bold">Киев — Лондон, 22 марта 2018</div>
                        <div class="card-flight__info columns is-multiline">
                            <div class="column is-5">
                                <div class="card-flight__star-end is-flex">
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">20:05</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Вылет из
                                            KBP
                                        </div>
                                    </div>
                                    <div class="card-flight__icon-from-to icon icon-1">
                                        <img src="/svg/icons/ic_arrow_right.svg" class="svg" alt="">
                                    </div>
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">21:35</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Прилет в
                                            LGW
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="card-flight__short-data">
                                    <div class="card-flight__short-data__content has-text-weight-bold">BP2456</div>
                                    <div class="card-flight__short-data__title has-text-basic is-size-875">Номер рейса
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="card-flight__contact is-flex">
                                    <figure class="mb-0">
                                        <img src="/svg/icons/ic_phone-call.svg" class="svg" alt="">
                                    </figure>
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">Дмитрий</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Будет
                                            встречать Вас
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-flight__hotel-wrap">
                            <div class="card-flight__title has-text-weight-bold">Гостиница</div>
                            <div class="card-flight__hotel columns is-multiline">
                                <div class="column is-3">
                                    <figure class="card-flight__hotel__thumb is-marginless">
                                        <img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="column is-9">
                                    <div class="card-flight__hotel__info">
                                        <div class="is-flex">
                                            <a href="#" class="card-flight__hotel__link has-text-decoration-underline">Norfolk
                                                Towers Paddington</a>
                                            <div class="card-flight__hotel__stars">
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>

                                            </div>
                                        </div>
                                        <div class="card-flight__hotel__desc is-size-875 has-text-basic">
                                            34 Norfolk Place, Paddington, Вестминстер, Лондон, W2 1QW, Великобритания
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-basic is-marginless">
                    <div class="p-1-5 card-flight">
                        <div class="card-flight__title mb-1 has-text-weight-bold">Лондон — Киев, 26 марта 2018</div>
                        <div class="card-flight__info columns is-multiline">
                            <div class="column is-5">
                                <div class="card-flight__star-end is-flex">
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">20:05</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Вылет из
                                            KBP
                                        </div>
                                    </div>
                                    <div class="card-flight__icon-from-to icon icon-1">
                                        <img src="/svg/icons/ic_arrow_right.svg" class="svg" alt="">
                                    </div>
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">21:35</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Прилет в
                                            LGW
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="card-flight__short-data">
                                    <div class="card-flight__short-data__content has-text-weight-bold">BP2456</div>
                                    <div class="card-flight__short-data__title has-text-basic is-size-875">Номер рейса
                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="card-flight__contact is-flex">
                                    <figure class="mb-0">
                                        <img src="/svg/icons/ic_phone-call.svg" class="svg" alt="">
                                    </figure>
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">Алексей</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Будет Вас
                                            провожать
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <h3 class="mb-0">Ваши пожелания</h3>
                <time class="is-size-7 has-text-basic">12 марта в 17:40</time>
                <div class="is-size-875 mb-1-75">
                    <p>Убедитесь, что сделка будет совершена без последствий. Вопреки законам математики, в жизни от
                        перемены мест все меняется. Меняются наши внутренние ощущения, мировоззрение, отношение к жизни,
                        —
                        и, что
                        самое интересное, только в лучшую сторону.</p>
                </div>
                <div class="buttons">
                    <button class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span class="icon icon-1"><img src="/svg/icons/ic_aircraft.svg" class="svg" alt=""></span>
                        <span>Добавить перелет</span>
                    </button>
                    <button class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span>Добавить пожелания</span>
                    </button>
                </div>
            </div>
        </section>
        <hr class="hr-basic">
        <section class="is-paddingless">
            <h3>Запланированные консультации</h3>
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Названия объекта</th>
                    <th>Тематика</th>
                    <th>Дата и время</th>

                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td class="has-text-basic">
                        <a href="#" class="link-with-icon has-text-decoration-underline">
                            Суши-магазин в Невском районе. Выручка от 1,1 млн/мес
                        </a>
                    </td>
                    <td class="has-text-basic no-wrap has-vertical-align-middle">Обсуждение переспектив покупки,
                        возможные риски
                    </td>
                    <td class="has-text-basic no-wrap has-vertical-align-middle">12.03.2018 в 16:00</td>
                </tr>
                </tbody>
            </table>
            <div class="content">
                <h3 class="mb-0">Ваши пожелания</h3>
                <time class="is-size-7 has-text-basic">12 марта в 17:40</time>
                <div class="is-size-875 mb-1-75">
                    <p>Убедитесь, что сделка будет совершена без последствий. Вопреки законам математики, в жизни от
                        перемены мест все меняется. Меняются наши внутренние ощущения, мировоззрение, отношение к жизни,
                        —
                        и, что
                        самое интересное, только в лучшую сторону.</p>
                </div>
                <div class="buttons">
                    <button class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span class="icon icon-1"><img src="/svg/icons/ic_ask_question.svg" class="svg" alt=""></span>
                        <span>Задать вопрос брокеру</span>
                    </button>
                    <button class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span>Добавить пожелания</span>
                    </button>
                </div>
            </div>
        </section>
        <hr class="hr-basic">
        <section class="is-paddingless">
            <h3 class="mb-1">Список необходимых документов</h3>

            <ol class="trips-list-required-documents ml-1 is-size-875 mb-1">
                <li><span>Чек об оплате услуг вашим предприятием</span><span
                    class="has-text-success has-text-weight-bold">Загружено</span></li>
                <li><span>Уникальный договор на обслуживание</span><span class="has-text-success has-text-weight-bold">Загружено</span>
                </li>
                <li><span>Регистрация предприятия</span><span
                    class="has-text-success has-text-weight-bold">Загружено</span></li>
                <li><span>Договор купли и продажи</span></li>
            </ol>
            <div class="box px-0 pb-0">
                <UploadDocuments class="px-1-5"></UploadDocuments>
                <table class="table is-fullwidth is-size-875">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Название документа</th>
                        <th>Дата</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="has-text-basic">1</td>
                        <td class="has-text-weight-bold">
                            Чек об оплате услугу нашим предприятием.jpg
                        </td>
                        <td class="has-text-basic">12 марта 2019</td>
                        <td>
                            <a href="#" class="link-with-icon">
                                <img src="/svg/icons/ic_close.svg">
                                <span class="has-text-decoration-underline">Удалить</span>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </section>
    </section>
</template>

<script>
    import UploadDocuments from '../../UploadDocuments'
    import Modal from '../../Modal'
    import GGDateInput from '../../form/GGDateInput'
    import GGTextarea from '../../form/GGTextarea'
    import GGSelectInput from '../../form/GGSelectInput';

    export default {
        components: {
            UploadDocuments,
            Modal,
            GGDateInput,
            GGTextarea,
            GGSelectInput
        },
        data: () => ({
            ui: {
                modalRequestView: {
                    show: false,
                    header: "Запрос на просмотр"
                }
            },
            formNewRequestView: {
                object: {
                    selected: null,
                    title: 'Укажите объект для просмотра',
                    placeholder: 'Выберите',
                    selectedLabel: '',
                    selectLabel: '',
                    deselectLabel: '',
                    noResult: 'Ничего не найдено'
                },
                date: {
                    title: 'Желаемая дата просмотра',
                    placeholder: '25.05.2019',
                    value: '',
                    required: true
                },
                time: {
                    title: 'Желаемое время просмотра',
                    placeholder: '12:00',
                    value: '',
                    required: true,
                    config: {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true
                    },
                },
                comment: {
                    title: 'Комментарий для продавца',
                    placeholder: 'Укажите комментарий',
                    value: '',
                    required: true
                }
            },
            formsOptions: {
                objects: {
                    options: [
                        {
                            id: '1',
                            name: 'Item 1',
                            img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                        },
                        {
                            id: '2',
                            name: 'Item 2',
                            img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                        },
                        {
                            id: '3',
                            name: 'Item 3',
                            img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                        },
                        {
                            id: '4',
                            name: 'Item 4',
                            img: 'https://vue-multiselect.js.org/static/posters/trading_post.png'
                        },
                    ]
                },
            }
        }),
        mounted() {

        },
        methods: {
            createRequestView() {
                console.log('createRequestView');
            },
        }
    }
</script>

<style>

</style>
