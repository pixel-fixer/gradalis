<template>
    <modal v-if="show" @close="$emit('close')" class="modal-franchise-review">
        <div slot="header">
            <div class="modal-franchise-review__author is-flex has-align-items-center">
                <figure class="modal-franchise-review__author__thumb">
                    <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg" alt="">
                </figure>
                <div class="modal-franchise-review__author__info">
                    <h4>Полина Рожкова</h4>
                    <div class="is-size-7 has-text-basic">
                        CEO, руководитель компании
                    </div>
                </div>
            </div>
        </div>

        <div slot="body">
            <div class="content">
                <figure class="modal-franchise-review__thumb is-marginless">
                    <video class="w-full has-border-radius has-box-shadow mb-2" controls="">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4"
                                type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </figure>
                <h3 class="mt-1 mb-0">Тренд на дедолларизацию.</h3>
                <time class="is-size-7 modal-franchise-review__date">10 января 2019</time>
                <blockquote class="blockquote-v2 is-size-6">
                    Франшиза "Персональное решение" оправдала мои ожидания , бизнес развивается быстро
                </blockquote>
                <div class="review-modal__documents is-size-875 mt-1">
                    <div>
                        <a href="#" class="link-with-icon">
                            <img src="/svg/icons/files/ic_pdf.svg">
                            <span class="has-text-decoration-underline">Документы к отзыву</span></a>
                    </div>
                    <div>
                        <a href="#" class="link-with-icon">
                            <img src="/svg/icons/files/ic_pdf.svg">
                            <span class="has-text-decoration-underline">Документы к отзыву</span></a>
                    </div>
                </div>
                <div class="is-size-875 mt-1">
                    <p>
                        Задача сотрудников отдела телефонных продаж — общаться с клиентами и продвигать продукты
                        HeadHunter.
                        Размер заработка зависит от активности менеджера и результатов его работы. Есть оклад, который
                        гарантированно получает каждый сотрудник. И есть ежемесячные и ежеквартальные премии, которые
                        рассчитываются в зависимости от выполнения плана по продажам.
                    </p>
                    <p>
                        Если в каком-то месяце сотрудник «просел», всегда есть шанс наверстать упущенное за счет
                        оставшихся
                        двух месяцев и получить квартальный бонус.
                    </p>
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">


        </div>
    </modal>
</template>

<script>
    import Modal from './../Modal';


    export default {
        name: "ModalShowReviewFranchise",
        components: {
            Modal
        },
        props: {
            show: {default: false}
        },
        data: () => ({

        })
    }
</script>

<style scoped>

</style>
