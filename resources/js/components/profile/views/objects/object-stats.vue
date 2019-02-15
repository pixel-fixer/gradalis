<template>
    <section class="section pt-1 mt-1 px-0">
        <h3 class="mb-1">
            Статистика моих объектов
        </h3>
        <table class="table is-fullwidth is-size-875">
            <thead>
            <tr>
                <th>Название объекта</th>
                <th>Просмотры</th>
                <th>Звонки</th>
                <th>Запросы</th>
                <th>Сообщения</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="box is-paddingless">
            <tr>
                <td class="has-text-weight-bold has-vertical-align-middle">Мини-отель в собственность с видом на Невский проспект</td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_eye.svg" class="svg"
                                alt="">
                        <span>20 670</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_phone.svg" class="svg"
                                alt="">
                        <span>1 290</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_document.svg" class="svg"
                                alt="">
                        <span>20 670</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_messages.svg" class="svg"
                                alt="">
                        <span>20 670</span>
                    </div>
                </td>
                <td class="has-text-basic no-wrap has-vertical-align-middle">
                    <a class="link-with-icon">
                        <img src="/svg/icons/ic_details.svg" class="svg"
                                alt="">
                        <span class="has-text-decoration-underline">Посмотреть</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="has-text-weight-bold has-vertical-align-middle">Мини-отель в собственность с видом на Невский проспект</td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_eye.svg" class="svg"
                                alt="">
                        <span>20 670</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_phone.svg" class="svg"
                                alt="">
                        <span>1 290</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_document.svg" class="svg"
                                alt="">
                        <span>20 670</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_messages.svg" class="svg"
                                alt="">
                        <span>20 670</span>
                    </div>
                </td>
                <td class="has-text-basic no-wrap has-vertical-align-middle">
                    <a class="link-with-icon">
                        <img src="/svg/icons/ic_details.svg" class="svg"
                                alt="">
                        <span class="has-text-decoration-underline">Посмотреть</span>
                    </a>
                </td>
            </tr>

            </tbody>
        </table>
    </section>
</template>

<script>
export default {
    name: 'object-stats',
    props: ['data']
}
</script>

<style>

</style>
