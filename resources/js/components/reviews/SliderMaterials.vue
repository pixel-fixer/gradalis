<template>
    <!-- ... -->
    <div class="swiper-reviews-media-wrap">
        <div class="swiper-container swiper-reviews-media">
            <div class="swiper-wrapper">
                <!-- It is important to set "left" style prop on every slide -->
                <div class="swiper-slide"
                     v-for="(slide, index) in virtualData.slides"
                     :key="index"
                     :style="{left: `${virtualData.offset}px`}"
                >
                    <a :href="slide.full"><img :src="slide.thumb" alt=""></a>
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-reviews-media-next"></div>
        <div class="swiper-button-prev swiper-reviews-media-prev"></div>
    </div>
    <!-- ... -->
</template>
<script>
    import Swiper from 'swiper/dist/js/swiper.esm.bundle';

    export default {
        data() {
            return {
                // dummy slides data
                slides: (function () {
                    // var slides = [];
                    // for (var i = 0; i < 600; i += 1) {
                    //     slides.push('Slide ' + (i + 1));
                    // }
                    let slides = [
                        {
                            thumb: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                            full: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                        },
                        {
                            thumb: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                            full: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                        },
                        {
                            thumb: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                            full: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                        },
                        {
                            thumb: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                            full: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                        },
                        {
                            thumb: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                            full: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                        },
                        {
                            thumb: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                            full: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                        },
                        {
                            thumb: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                            full: 'https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200',
                        },
                        {
                            thumb: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                            full: 'https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg',
                        },
                    ];
                    return slides;
                }()),
                // virtual data
                virtualData: {
                    slides: [],
                },
            }
        },
        mounted() {
            const self = this;
            const swiper = new Swiper('.swiper-reviews-media', {
                slidesPerView: 4,
                spaceBetween: 0,
                simulateTouch: false,
                navigation: {
                    nextEl: '.swiper-reviews-media-next',
                    prevEl: '.swiper-reviews-media-prev',
                },
                virtual: {
                    slides: self.slides,
                    renderExternal(data) {
                        // assign virtual slides data
                        self.virtualData = data;
                    },
                    cache: false
                },
            });
        },
    };
</script>
