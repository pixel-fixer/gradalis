<template>
    <div>
        <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">{{trans('services.buyCompany.title')}}</h1>
        </section>
        <section class="section pt-0 px-0">
            <div class="buttons mb-2">
                <a href="#" class="button is-info h-3 is-size-875 has-text-weight-bold px-1">
                    <span class="icon has-flip-horizontally"><img src="/svg/icons/ic_arrow_right.svg" alt=""
                                                                  class="svg"></span>
                    <span>Вернуться к форме</span>
                </a>
            </div>
            <div>
                <div class="tabs-wrap">
                    <div class="tabs is-size-875 is-marginless">
                        <ul>
                            <li class="tab is-active"
                                onclick="openTab(event,'tab-results')">
                                <a class="h-3 px-1-5">
                                    <span>Результаты покупки</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="">
                        <div id="tab-results" class="content-tab box px-0 pb-0">
                            <div class="px-1-5">
                                <h3 class="mb-1 is-flex has-align-items-center">
                                    <span>Купленные юр. лица</span>
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
                                <tbody v-for="document in documents">
                                <tr>
                                    <td class="has-text-weight-bold">{{document.title}}</td>
                                    <td class="has-text-basic">{{document.date}}</td>
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
                                <tr class="service-tr-add-action" v-show="document.showDetails">
                                    <td colspan="4" class="is-paddingless">
                                        <div class="p-1-5 is-flex has-align-items-center mr-1">
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
                                                <input type="file" name="nameDoc" style="display: none;">
                                            </label>
                                            <div
                                                class="has-text-basic service-tr-add-action__document-info ml-1 is-flex has-align-items-center">
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
                </div>
            </div>
        </section>
        <section class="section pt-0 px-0">
            <div class="buttons">
                <a href="#" class="button is-size-875 h-3 is-info is-outlined has-text-weight-bold px-1">
                    <span class="icon"><img src="/svg/icons/ic_ask_question.svg" alt="" class="svg"></span>
                    <span>Написать менеджеру продукта</span>
                </a>
                <a href="#" class="button is-size-875 h-3 is-info is-outlined has-text-weight-bold px-1">
                    <span>Оставить отзыв</span>
                </a>
            </div>
        </section>

    </div>
</template>

<script>

    export default {
        components: {

        },
        props: ['user'],
        data: () => ({
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
