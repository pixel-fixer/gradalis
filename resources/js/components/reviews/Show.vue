<template>
    <modal v-if="show"
           @close="show = false"
           class="review-modal">
        <div slot="header" class="review-modal__thumb">
            <img :src="review.main" alt="">
        </div>

        <div slot="body">
            <div class="content">
                <h3 class="mt-1">{{$t(review.name)}}</h3>
                <div class="is-size-875">
                    {{$t(review.article)}}
                </div>
            </div>
        </div>
        <div class="content w-full" slot="footer">
            <!--<div class="review-modal__documents is-size-875">-->
                <!--<div>-->
                    <!--<a href="#" class="link-with-icon">-->
                        <!--<img src="/svg/icons/files/ic_pdf.svg">-->
                        <!--<span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span></a>-->
                <!--</div>-->
                <!--<div>-->
                    <!--<a href="#" class="link-with-icon">-->
                        <!--<img src="/svg/icons/files/ic_pdf.svg">-->
                        <!--<span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span></a>-->
                <!--</div>-->
            <!--</div>-->
 
            <SliderMaterials></SliderMaterials>

        </div>


    </modal>
</template>

<script>
    import Modal from '../Modal'

    import SliderMaterials from './SliderMaterials';

    export default {
        name: "modalShowReviews",
        components: {
            Modal,
            SliderMaterials
        },
        props: {
            value: {default: null},
            id: {default: null},
        },
        data: () => ({
            review: {}
        }),
        computed: {
            show: {
                get: function () {
                    return this.value;
                },
                set: function (value) {
                    this.$emit('input', value);
                },
            }
        },
        methods: {
            send() {},
        },
        watch: {
          show() {
              if (this.value) {
                  let vm = this;
                  axios.post('/review-show', {
                      id: this.id,
                  }).then(response => {
                      vm.review = response.data;
                  });
              }
          }
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
