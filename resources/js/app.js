require('./bootstrap');

import Vue from 'vue';
import VTooltip from 'v-tooltip'
import Vuebar from 'vuebar'
import Vuelidate from 'vuelidate'
import VueRouter from 'vue-router'
import PortalVue from 'portal-vue'
import VueSweetalert2 from 'vue-sweetalert2';
import router from './routes'
import store from './store'
import lodash from 'lodash';

window.Vue = Vue;
window.trans = (string) => _.get(window.i18n, string);
Vue.prototype.trans = (string, args) => {
    let value = _.get(window.i18n, string);

    _.eachRight(args, (paramVal, paramKey) => {
        value = _.replace(value, `:${paramKey}`, paramVal);
    });
    return value;
};

Vue.use(VueSweetalert2)
Vue.use(VueRouter)
Vue.use(VTooltip)
Vue.use(PortalVue)
Vue.use(Vuebar)
Vue.use(Vuelidate)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('business-list', require('./components/business/List.vue').default);
Vue.component('chat', require('./components/chat.vue').default);

Vue.component('example-form-short', require('./components/ExampleFormShort.vue').default);
Vue.component('example-form-filter', require('./components/business/FormFilter.vue').default);
Vue.component('example-form-change-password', require('./components/ExampleFormChangePassword.vue').default);
Vue.component('example-form-profile-spa', require('./components/ExampleFormProfileSPA.vue').default);
Vue.component('example-ui-form', require('./components/ExampleUiForm.vue').default);
Vue.component('example-file-upload-vue', require('./components/ExampleFileUploadVue.vue').default);

Vue.component('form-register-seller', require('./components/FormRegisterSeller').default);
Vue.component('form-register-buyer', require('./components/FormRegisterBuyer').default);
Vue.component('form-add-business', require('./components/FormAddBusiness').default);
Vue.component('upload-photo-business', require('./components/UploadPhotoBusiness.vue').default);

Vue.component('profile', require('./components/profile/profile').default);

/**
 * Глобальный mixin для полей с переводом. Текущий язык берется из атрибута lang.
 */
Vue.mixin({
    methods:{
        $t(translatableObject){
            return translatableObject[this.$store.state.lang]
        }
    }
})


Vue.component('broker-offers-modal-create-link', require('./components/broker/offers/ModalCreateLink').default);
Vue.component('broker-summary-indicators', require('./components/broker/SummaryIndicators').default);
Vue.component('broker-real-time-indicators', require('./components/broker/RealTimeIndicators').default);

const app = new Vue({
    el: '#app',
    data: {
        object: {
            // Переменные, используемые на странице объекта
            showDetailedInformation: false
        }
    },
    router,
    store,
    methods: {
        showModal(id) {
            document.getElementById(id).classList.add('is-active');
        },
        hideModal(id) {
            document.getElementById(id).classList.remove('is-active');
        }
    }
});

import inlineSVG from 'inline-svg';

inlineSVG.init({
    svgSelector: 'img.svg', // the class attached to all images that should be inlined
    initClass: 'js-inlinesvg', // class added to <html>
}, function () {
    console.log('All SVGs inlined');
});


import Swiper from 'swiper';

/**
 * Слайдер новостей на главной
 */
var newsHomeSwiper = new Swiper('.swiper-news-home', {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

/**
 * Слайдер информационный на главной (слева)
 */
var swiperHomeInfoLeft = new Swiper('.swiper-home-info-left', {
    spaceBetween: 30,
    effect: 'fade',
    loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
    },
});

/**
 * Слайдер информационный на главной (Правый)
 */
var swiperHomeInfoRight = new Swiper('.swiper-home-info-right', {
    spaceBetween: 30,
    effect: 'fade',
    loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
    },
});

/**
 * Слайдер на странице объекта (основной)
 */
var swiperObjectThumbs = new Swiper('.swiper-object-thumbs', {
    spaceBetween: 16,
    slidesPerView: 5,
    // loop: true,
    // freeMode: false,
    // loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});
var swiperObjectMain = new Swiper('.swiper-object-main', {
    spaceBetween: 0,
    // loop:true,
    // loopedSlides: 5, //looped slides should be the same
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: swiperObjectThumbs,
    },
});

/**
 * Слайдер услуг на странице объекта
 */
var swiperObjectServices = new Swiper('.swiper-object-services', {
    slidesPerView: 3,
    spaceBetween: 8,
    loop: true,
    navigation: {
        nextEl: '.swiper-object-services-next',
        prevEl: '.swiper-object-services-prev',
    },
});

/**
 * Слайдер услуг на странице объекта
 */
var swiperBrokerDataIndicators = new Swiper('.swiper-broker-data-indicators', {
    slidesPerView: 'auto',
    spaceBetween: 0,
    loop: false,
    navigation: {
        nextEl: '.swiper-broker-data-indicators-next',
        prevEl: '.swiper-broker-data-indicators-prev',
    },
});


/**
 *  Functions
 */
function getAll(selector) {
    return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
}


/**
 *  Dropdowns
 */
var $dropdowns = getAll('.dropdown:not(.is-hoverable)');

if ($dropdowns.length > 0) {
    $dropdowns.forEach(function ($el) {
        $el.addEventListener('click', function (event) {
            let target = event.target;
            if ((!target.closest('.dropdown-trigger')) && (target.closest('.dropdown.is-active'))) {
                return;
            } else {
                event.stopPropagation();
                $el.classList.toggle('is-active');
            }
        });
    });

    document.addEventListener('click', function (event) {
        let target = event.target;
        if (!target.closest('.dropdown.is-active')) {
            closeDropdowns();
        }
    });
}

function closeDropdowns() {
    $dropdowns.forEach(function ($el) {
        $el.classList.remove('is-active');
    });
}
