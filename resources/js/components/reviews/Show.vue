<template>
    <modal v-if="show"
           @close="show = false"
           class="review-modal">
        <div slot="header" class="review-modal__thumb">
            <img src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                 alt="">
        </div>

        <div slot="body">
            <div class="content">
                <h3 class="mt-1">Полина Рожкова</h3>
                <div class="is-size-875">
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
            <div class="review-modal__documents is-size-875">
                <div>
                    <a href="#" class="link-with-icon">
                        <img src="/svg/icons/files/ic_pdf.svg">
                        <span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span></a>
                </div>
                <div>
                    <a href="#" class="link-with-icon">
                        <img src="/svg/icons/files/ic_pdf.svg">
                        <span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span></a>
                </div>
            </div>

            <SliderMaterials></SliderMaterials>

        </div>


    </modal>
</template>

<script>
    import Modal from '../Modal'
    import GGInput from '../form/GGInput'
    import GGTextarea from '../form/GGTextarea'
    import UploadFiles from './UploadFiles'

    import SliderMaterials from './SliderMaterials';

    export default {
        name: "modalAddReview",
        components: {
            Modal,
            GGTextarea,
            GGInput,
            UploadFiles,
            SliderMaterials
        },
        props: {
            value: {default: null},
        },
        data: () => ({
            title: 'Оставить отзыв о нашей работе',
            form: {
                name: {
                    title: 'Ваше имя',
                    placeholder: 'Введите ваше имя',
                    value: '',
                    required: true
                },
                phone: {
                    title: 'Контактный телефон',
                    placeholder: '+38 (456) 566-09-23',
                    value: '',
                    required: true
                },
                email: {
                    title: 'Контактный email',
                    placeholder: 'Введите ваш email',
                    value: '',
                    required: true
                },
                company: {
                    title: 'Название компании',
                    placeholder: 'Введите название',
                    value: '',
                    required: true
                },
                comment: {
                    title: 'Опишите ваши впечатления',
                    placeholder: 'Текст вашего отзыва',
                    value: '',
                    required: true
                }
            },
        }),
        computed: {
            show: {
                get: function () {
                    return this.value
                },
                set: function (value) {
                    this.$emit('input', value);
                },
            }
        },
        methods: {
            send() {
                console.log('send');
            },
        },
        mounted() {
            this.$nextTick(function () {
                // Код, который будет запущен только после
                // отображения всех представлений
            });
        }
    }
</script>

<style scoped>

</style>
