<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">{{trans('services.recruiting.title')}}</h1>
        </section>


        <section class="section pt-0 px-0">
            <div class="buttons mb-2">
                <a href="#" class="button is-info h-3 is-size-875 has-text-weight-bold px-1">
                    <span class="icon has-flip-horizontally">
                        <img src="/svg/icons/ic_arrow_right.svg" alt="" class="svg">
                    </span>
                    <span>Вернуться к форме</span>
                </a>
            </div>
            <div>
                <div class="tabs-wrap">
                    <div class="tabs is-size-875 is-marginless">
                        <ul>
                            <li class="tab is-active"
                                onclick="openTab(event,'tab-candidates')">
                                <a class="h-3 px-1-5">
                                    <span>Выбор кандидатов</span>
                                </a>
                            </li>
                            <li class="tab"
                                onclick="openTab(event,'tab-recruiting')">
                                <a class="h-3 px-1-5">
                                    <span>Рекрутинг</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="">
                        <div id="tab-candidates" class="content-tab">
                            <div class="box content is-paddingless">
                                <div class="p-1-5">
                                    <h3>
                                        <span>Краткое описание процесса выбора кандидатов</span>
                                    </h3>
                                    <p class="is-size-875">
                                        В данном разделе вы можете выбрать из предложенных кандидатов на выбор.
                                        Вы можете связаться с кандидатом пригласив его на собеседование. Одобрить
                                        кандидата на вакансию
                                        или удалить. Так-же здесь можно подписать договор с кандидатом. Для управления
                                        отобранными кандидатами перейдите на вкладку рекрутинг.
                                    </p>
                                </div>
                                <div class="notification is-borderless is-warning">
                                    <div class="notification__icon">
                                        <img src="/svg/icons/notification/ic_warning_warning_tringle.svg" class="svg"
                                             alt="">
                                    </div>
                                    <div class="notification__content-wrap">
                                        <div class="is-flex-tablet has-align-items-center">
                                            <h5 class="notification__title has-text-weight-bold is-marginless">
                                                Уведомление
                                            </h5>
                                            <time class="has-text-weight-bold"><span>&nbsp;●</span> 17:00 02.03.2019
                                            </time>
                                        </div>
                                        <div class="notification__content content is-size-875">
                                            Добрый день, Андрей. Вы одобрили 2х кандидатов по вакансии "Маркетолог" Они
                                            ждут подписания договора. Перейдите на вкладку рекрутинг.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div v-for="(vacancyItem,vacancyIndex) in vacancy">
                                <div class="vacancy-list">
                                    <article>
                                        <h3 class="mb-1"><span>{{trans('services.vacancy')}} №{{vacancyIndex+1}}</span>
                                        </h3>

                                            <bulma-accordion class="vacancy-list-candidates"
                                                             :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }">
                                                <template v-for="(candidate, candidateIndex) in vacancyItem.candidates">
                                                    <bulma-accordion-item class="box is-paddingless mb-2">
                                                        <h4 slot="title">Кандидат - Маркетинг</h4>
                                                        <div slot="content">
                                                            <div class="px-1-5">
                                                                <div class="content">
                                                                    <div class="columns is-multiline">
                                                                        <div class="column is-6">
                                                                            <div
                                                                                class="vacancy-list-candidates__item__bas-info">
                                                                                <figure
                                                                                    class="vacancy-list-candidates__item__thumb is-marginless">
                                                                                    <img
                                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                                        alt="">
                                                                                </figure>
                                                                                <h3 class="vacancy-list-candidates__item__name">
                                                                                    {{candidate.name}}
                                                                                </h3>
                                                                                <div>23 года</div>
                                                                                <div class="buttons mt-1">
                                                                                    <button
                                                                                        class="button is-success is-outlined has-text-weight-bold is-size-875">
                                                                                <span class="icon">
                                                                                      <img
                                                                                          src="/svg/icons/ic_success.svg"
                                                                                          class="svg" alt="">
                                                                                </span>
                                                                                        <span>Одобрено</span>
                                                                                    </button>
                                                                                    <button
                                                                                        class="button is-danger is-outlined has-text-weight-bold is-size-875">
                                                                                <span class="icon">
                                                                                      <img
                                                                                          src="/svg/icons/ic_danger.svg"
                                                                                          class="svg" alt="">
                                                                                </span>
                                                                                        <span>Отклонить</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column is-6">
                                                                            <div
                                                                                class="vacancy-list-candidates__item__main-info">
                                                                                <div
                                                                                    class="mb-1 vacancy-list-candidates__item__main-info__item">
                                                                                    <div
                                                                                        class="is-size-875 has-text-basic vacancy-list-candidates__item__main-info__item__title">
                                                                                        Профессия
                                                                                    </div>
                                                                                    <div
                                                                                        class="has-text-dark-blue has-text-weight-bold vacancy-list-candidates__item__main-info__item__val">
                                                                                        Маркетолог
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="mb-1 vacancy-list-candidates__item__main-info__item">
                                                                                    <div
                                                                                        class="is-size-875 has-text-basic vacancy-list-candidates__item__main-info__item__title">
                                                                                        Специализация
                                                                                    </div>
                                                                                    <div
                                                                                        class="has-text-dark-blue has-text-weight-bold vacancy-list-candidates__item__main-info__item__val">
                                                                                        Интернет-маркетинг
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="mb-1 vacancy-list-candidates__item__main-info__item">
                                                                                    <div
                                                                                        class="is-size-875 has-text-basic vacancy-list-candidates__item__main-info__item__title">
                                                                                        Опыт работы по профессии
                                                                                    </div>
                                                                                    <div
                                                                                        class="has-text-dark-blue has-text-weight-bold vacancy-list-candidates__item__main-info__item__val">
                                                                                        Маркетолог
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="mb-1 vacancy-list-candidates__item__main-info__item">
                                                                                    <div
                                                                                        class="is-size-875 has-text-basic vacancy-list-candidates__item__main-info__item__title">
                                                                                        Образование
                                                                                    </div>
                                                                                    <div
                                                                                        class="has-text-dark-blue has-text-weight-bold vacancy-list-candidates__item__main-info__item__val">
                                                                                        Высшее экономическое
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="mb-1 vacancy-list-candidates__item__main-info__item">
                                                                                    <div
                                                                                        class="is-size-875 has-text-basic vacancy-list-candidates__item__main-info__item__title">
                                                                                        Гражданство
                                                                                    </div>
                                                                                    <div
                                                                                        class="has-text-dark-blue has-text-weight-bold vacancy-list-candidates__item__main-info__item__val">
                                                                                        Украина
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="mb-1 vacancy-list-candidates__item__main-info__item">
                                                                                    <div
                                                                                        class="is-size-875 has-text-basic vacancy-list-candidates__item__main-info__item__title">
                                                                                        Условия найма
                                                                                    </div>
                                                                                    <div
                                                                                        class="has-text-dark-blue has-text-weight-bold vacancy-list-candidates__item__main-info__item__val">
                                                                                        Лизинг
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="columns is-multiline">
                                                                                <div class="column is-6">
                                                                                    <a href="#"
                                                                                       class="is-size-875 has-text-decoration-underline">Посмотреть
                                                                                        резюме</a>
                                                                                </div>
                                                                                <div class="column is-6">
                                                                                    <a href="#"
                                                                                       class="is-size-875 has-text-decoration-underline">Оформите
                                                                                        договор</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <table class="table is-fullwidth is-size-875">
                                                                    <thead class="bb">
                                                                    <tr>
                                                                        <th>Название документа</th>
                                                                        <th>Дата</th>
                                                                        <th>Статус</th>
                                                                        <th>Подробности</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody v-for="document in candidate.documents">
                                                                    <tr>
                                                                        <td class="has-text-weight-bold">
                                                                            {{document.title}}
                                                                        </td>
                                                                        <td class="has-text-basic">{{document.date}}
                                                                        </td>
                                                                        <td><span
                                                                            :class="{'has-text-warning' : document.statusID===1, 'has-text-success' : document.statusID===2 }">{{document.status}}</span>
                                                                        </td>
                                                                        <td>
                                                                            <a class="has-text-info has-text-decoration-underline"
                                                                               @click="document.showDetails= !document.showDetails">
                                                                                {{showHideText(document.showDetails)}}
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="service-tr-add-action"
                                                                        v-show="document.showDetails">
                                                                        <td colspan="4" class="is-paddingless">
                                                                            <div
                                                                                class="p-1-5 is-flex has-align-items-center mr-1">
                                                                                <a href="#"
                                                                                   class="service-tr-add-action__document-action is-flex has-align-items-center">
                                        <span class="icon">
                                            <img src="/svg/icons/files/ic_pdf.svg" alt="" class="svg">
                                        </span>
                                                                                    <span>Скачать документ</span>
                                                                                </a>
                                                                                <label
                                                                                    class="service-tr-add-action__document-action is-flex has-align-items-center">
                                        <span class="icon">
                                            <img src="/svg/icons/ic_add_files.svg" alt="" class="svg">
                                        </span>
                                                                                    <span>Загрузите документ</span>
                                                                                    <input type="file" name="nameDoc"
                                                                                           style="display: none;">
                                                                                </label>
                                                                                <div
                                                                                    class="has-text-basic service-tr-add-action__document-info ml-1 is-flex has-align-items-center">
                                                                                    <span class="mr-1">12.03.2019</span>
                                                                                    <span
                                                                                        class="mr-1">filename.jpg</span>
                                                                                    <span
                                                                                        class="service-tr-add-action__document-remove">
                                             <span class="icon icon-1">
                                            <img src="/svg/icons/ic_close.svg" alt="" class="svg">
                                        </span>
                                        </span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="service-action-comment p-1-5 is-flex">
                                                                                <figure class="is-marginless mr-1">
                                                                                    <img
                                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                                        alt="">
                                                                                </figure>
                                                                                <div
                                                                                    class="service-action-comment__info">
                                                                                    <div
                                                                                        class="is-flex is-size-7 has-text-basic">
                                                                                        <div
                                                                                            class="service-action-comment__title has-text-weight-bold">
                                                                                            Исполнитель
                                                                                        </div>
                                                                                        <time
                                                                                            class="service-action-comment__time">
                                                                                            17:39
                                                                                        </time>
                                                                                    </div>
                                                                                    <div
                                                                                        class="service-action-comment__content is-size-875 has-text-dark-blue">
                                                                                        Пожалуйста, уменьшите
                                                                                        установленный
                                                                                        объем работы.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </bulma-accordion-item>
                                                </template>
                                            </bulma-accordion>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div id="tab-recruiting" class="content-tab box px-0 pb-0" style="display: none;">
                            <div class="px-1-5">
                                <h3 class="mb-1 is-flex has-align-items-center">
                                    <span>Купленные юр. лица</span>
                                    <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                                </h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

<script>

    import {BulmaAccordion, BulmaAccordionItem} from "vue-bulma-accordion";

    export default {
        components: {
            BulmaAccordion,
            BulmaAccordionItem
        },
        props: ['user'],
        data: () => ({


            // modalsShow: {
            //     payment: false,
            //     paymentSuccess: false,
            // },
            vacancy: [
                {
                    name: '',
                    candidates: [
                        {
                            name: 'Иванова Наталья Сергеевна',
                            documents: [
                                {
                                    title: 'Договор найма',
                                    date: '12 марта 2019',
                                    statusID: 1,
                                    status: 'Изменен',
                                    showDetails: false,
                                },
                                {
                                    title: 'Пошлина',
                                    date: '12 марта 2019',
                                    statusID: 2,
                                    status: 'Одобрен',
                                    showDetails: false,
                                },
                                {
                                    title: 'Страховка',
                                    date: '12 марта 2019',
                                    statusID: 2,
                                    status: 'Одобрен',
                                    showDetails: false,
                                },
                            ],
                        },
                        {
                            name: 'Петрова Наталья Сергеевна',
                            documents: [
                                {
                                    title: 'Договор найма',
                                    date: '12 марта 2019',
                                    statusID: 1,
                                    status: 'Изменен',
                                    showDetails: false,
                                },
                                {
                                    title: 'Пошлина',
                                    date: '12 марта 2019',
                                    statusID: 2,
                                    status: 'Одобрен',
                                    showDetails: false,
                                },
                                {
                                    title: 'Страховка',
                                    date: '12 марта 2019',
                                    statusID: 2,
                                    status: 'Одобрен',
                                    showDetails: false,
                                },
                            ],
                        }
                    ],
                }
            ],
        }),
        mounted() {

        },
        methods: {
            showHideText(status) {
                if (status == false) {
                    return 'Просмотреть';
                } else {
                    return 'Скрыть';
                }
            }
        }
    }
</script>

<style>

</style>
