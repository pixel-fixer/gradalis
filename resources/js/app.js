/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

import Vue from 'vue';

window.Vue = Vue;

import VTooltip from 'v-tooltip'

Vue.use(VTooltip)

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

Vue.component('example-form-short', require('./components/ExampleFormShort.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
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

