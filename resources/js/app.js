require('./bootstrap');

// window.Vue = require('vue');

import Vue from 'vue';
import VTooltip from 'v-tooltip'
import Vuebar from 'vuebar'
import Vuelidate from 'vuelidate'
import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2';
import router from './routes'

window.Vue = Vue;
Vue.use(VueSweetalert2)
Vue.use(VTooltip)
Vue.use(Vuebar)
Vue.use(Vuelidate)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat', require('./components/chat.vue').default);

Vue.component('example-form-short', require('./components/ExampleFormShort.vue').default);
Vue.component('example-form-filter', require('./components/ExampleFormFilter.vue').default);
Vue.component('example-form-change-password', require('./components/ExampleFormChangePassword.vue').default);
Vue.component('example-form-profile-spa', require('./components/ExampleFormProfileSPA.vue').default);
Vue.component('example-ui-form', require('./components/ExampleUiForm.vue').default);
Vue.component('example-file-upload-vue', require('./components/ExampleFileUploadVue.vue').default);

Vue.component('form-register-seller', require('./components/FormRegisterSeller').default);
Vue.component('form-register-buyer', require('./components/FormRegisterBuyer').default);
Vue.component('form-add-bussines', require('./components/FormAddBussines').default);

Vue.component('profile', require('./components/profile/profile').default);
// Vue.component('profile-settings', require('./components/profile/settings').default);

const app = new Vue({
    el: '#app',
    data: {
        object: {
            // Переменные, используемые на странице объекта
            showDetailedInformation: false
        }
    },
    router,
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
