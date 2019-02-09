<template>
    <section class="section pt-1 px-0">
                    <h1 class="section-title mb-1-75">Запросы на просмотр</h1>
                    <table class="table is-fullwidth is-size-875">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Имя покупателя</th>
                            <th>Страна</th>
                            <th>Бюджет</th>
                            <th>Действия с запросом</th>
                        </tr>
                        </thead>
                        <tbody class="box">
                        <tr>
                            <td class="has-text-basic has-vertical-align-middle">12.03.2019 в 12:00</td>
                            <td class="has-text-weight-bold has-vertical-align-middle">Евгений</td>
                            <td class="has-text-basic has-vertical-align-middle">Россия</td>
                            <td class="has-text-weight-bold has-vertical-align-middle">€ 18 000 000</td>
                            <td class="has-text-warning has-vertical-align-middle">
                                <div class="buttons">
                                    <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                            v-tooltip="'Требуется перевод документов'">Одобрить
                                    </button>
                                    <button class="button is-clear is-clear_close is-size-875"><span
                                            class="icon-close">×</span><span
                                            class="has-text-decoration-underline">Отклонить</span></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="has-text-basic has-vertical-align-middle">06.03.2019 в 14:00</td>
                            <td class="has-text-weight-bold has-vertical-align-middle">Дмитрий</td>
                            <td class="has-text-basic has-vertical-align-middle">Польша</td>
                            <td class="has-text-weight-bold has-vertical-align-middle">€ 18 000 000</td>
                            <td class="has-text-warning has-vertical-align-middle">
                                <div class="buttons">
                                    <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                            v-tooltip="'Требуется перевод документов'">Одобрить
                                    </button>
                                    <button class="button is-clear is-clear_close is-size-875"><span
                                            class="icon-close">×</span><span
                                            class="has-text-decoration-underline">Отклонить</span></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="has-text-basic has-vertical-align-middle">02.03.2019 в 10:00</td>
                            <td class="has-text-weight-bold has-vertical-align-middle">Олег</td>
                            <td class="has-text-basic has-vertical-align-middle">Украина</td>
                            <td class="has-text-weight-bold has-vertical-align-middle">€ 18 000 000</td>
                            <td class="has-text-warning has-vertical-align-middle">
                                <div class="buttons">
                                    <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                            v-tooltip="'Требуется перевод документов'">Одобрить
                                    </button>
                                    <button class="button is-clear is-clear_close is-size-875"><span
                                            class="icon-close">×</span><span
                                            class="has-text-decoration-underline">Отклонить</span></button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </section>
</template>

<script>
export default {

}
</script>

<style>

</style>
