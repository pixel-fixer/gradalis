<template>
    <section class="section pt-1 px-0" v-if="travel">
        <h1 class="section-title mb-1-75">
            <span>{{travel.name}}</span>
        </h1>
    
        <objects-view
            :view-requests="travel.object_view"
            :travel-id="travel.id"
            @update="getTrip($route.params.id);">
        </objects-view>

        <hr class="hr-basic">

        <trip-flights
            :flights="travel.flights"
            :travel-id="travel.id"
            @update="getTrip($route.params.id);">
        </trip-flights>

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
    import ObjectsView from './objects/objects-view'
    import TripFlights from './trip-flights'

    export default {
        components: {
            UploadDocuments,
            ObjectsView,
            TripFlights
        },
        data: () => ({
            travel: null,
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
        mounted(){
            this.getTrip(this.$route.params.id);
        },
        methods: {
            createRequestView() {
                console.log('createRequestView');
            },
            getTrip(id){
                axios.get('/profile/api/travel/' + id).then(res => {
                    this.travel = res.data
                })
            }
        }
    }
</script>

<style>

</style>
