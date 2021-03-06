require('./bootstrap');

import Vue from 'vue';
import VTooltip from 'v-tooltip'
import Vuebar from 'vuebar'
import Vuelidate from 'vuelidate'
import PortalVue from 'portal-vue'
import VueSweetalert2 from 'vue-sweetalert2';
import router from './routes'
import store from './store'
import * as VueGoogleMaps from 'vue2-google-maps'
import inlineSVG from 'inline-svg';
import Swiper from 'swiper';
import VueMomentTz from 'vue-moment-tz';
import VueMq from 'vue-mq'
import VSwitch from 'v-switch-case';

import Sticky from 'sticky-js';

let sticky = new Sticky('.sticky');

import {BulmaAccordion, BulmaAccordionItem} from "vue-bulma-accordion";

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDs7VrVm9-Uc98tTj0eYIRgNkisaLQsWlg',
        libraries: 'places', // This is required if you use the Autocomplete plugin
    },
});

Vue.use(VueMq, {
    breakpoints: {
        mobile: 768,
        tablet: 1024,
        desktop: 1215,
    }
});

window.Vue = Vue;

window.trans = (string) => _.get(window.i18n, string);
window.lang = document.documentElement.lang;
Vue.prototype.trans = (string, args) => {
    let value = _.get(window.i18n, string);

    _.eachRight(args, (paramVal, paramKey) => {
        value = _.replace(value, `:${paramKey}`, paramVal);
    });
    return value;
};

Vue.use(VueSweetalert2);
Vue.use(VTooltip);
Vue.use(PortalVue);
Vue.use(Vuebar);
Vue.use(VSwitch);
Vue.use(VueMomentTz);
Vue.use(Vuelidate);

// TODO !! Это дело плохо работает с классом form.js !! переписать или там, или тут

// function errorResponseHandler(error) {
//     // check for errorHandle config
//     if (error.config.hasOwnProperty('errorHandle') && error.config.errorHandle === false) {
//         return Promise.reject(error);
//     }

//     if (error.response) {
//     //Если это не ошибка валидации ларавела
//     //TODO добавить редирект на login, если авторизация истекла
//     if(error.response.status !== 422)
//         Vue.swal({type: 'error', title: error.response.status, text: error.response.data.message});
//     }
// }

// apply interceptor on response
// window.axios.interceptors.response.use(
//     response => response,
//     errorResponseHandler
// );

Vue.component('business-list', require('./components/business/List.vue').default);
Vue.component('news-index', require('./components/news/Index.vue').default);
Vue.component('news-filter', require('./components/news/NewsFilter.vue').default);
Vue.component('reserve-button', require('./components/ReserveButton.vue').default);
Vue.component('main-list', require('./components/business/MainList.vue').default);
Vue.component('chat', require('./components/chat/chat.vue').default);
Vue.component('chat-widget', require('./components/chat/chat-widget.vue').default);

Vue.component('example-form-short', require('./components/ExampleFormShort.vue').default);
Vue.component('example-form-filter', require('./components/business/FormFilter.vue').default);
Vue.component('example-form-change-password', require('./components/ExampleFormChangePassword.vue').default);
Vue.component('example-form-profile-spa', require('./components/ExampleFormProfileSPA.vue').default);
Vue.component('example-ui-form', require('./components/ExampleUiForm.vue').default);
Vue.component('example-file-upload-vue', require('./components/ExampleFileUploadVue.vue').default);

Vue.component('form-register-seller', require('./components/register/FormRegisterSeller').default);
Vue.component('form-register-buyer', require('./components/register/FormRegisterBuyer').default);
const FormRegisterExecutor = () => import('./components/register/FormRegisterExecutor');
Vue.component('form-register-executor', FormRegisterExecutor);
const FormRegisterMediaBuyer = () => import('./components/register/FormRegisterMediaBuyer');
Vue.component('form-register-media-buyer', FormRegisterMediaBuyer);
const FormRegisterBroker = () => import('./components/register/FormRegisterBroker');
Vue.component('form-register-broker', FormRegisterBroker);

Vue.component('form-add-business', require('./components/FormAddBusiness').default);
Vue.component('upload-photo-business', require('./components/UploadPhotoBusiness.vue').default);

Vue.component('profile', require('./components/profile/profile').default);

/**
 * Глобальные миксины
 */
Vue.mixin({

    destroyed() {
        console.log("I've been destroyed");
    },
    methods: {
        $t(translatableObject) {
            return translatableObject[this.$store.state.lang]
        },
        $userCan(permission) {
            if (!this.$store.state.user)
                return false;
            return _.find(this.$store.state.user.permissions, item => {
                return item.name == permission
            })
        },
        $userIs(role) {
            if (!this.$store.state.user)
                return false;
            return _.find(this.$store.state.user.roles, item => {
                return item.name == role
            })
        },
        $getDateTime(dbDateTime) {
            var monthNames = [
                'Январь',
                'Февраль',
                'Март',
                'Апрель',
                'Май',
                'Июнь',
                'Июль',
                'Август',
                'Сентябрь',
                'Ноябрь',
                'Декабрь',
            ];

            var date = new Date(Date.parse(dbDateTime.replace('-', '/', 'g')));
            return date.getDate() + '-' + ('0' + date.getMonth()).slice(-2) + '-' + date.getFullYear()
        }
    }
})

Vue.component('broker-offers-modal-create-link', require('./components/broker/offers/ModalCreateLink').default);

Vue.component('broker-real-time-indicators', require('./components/broker/RealTimeIndicators').default);
Vue.component('broker', require('./components/broker/broker').default);

const VacancyResponce = () => import('./components/reviews/Add');

Vue.component('vacancy-response', VacancyResponce);


// review
Vue.component('add-review', require('./components/reviews/Add').default);
Vue.component('show-review', require('./components/reviews/Show').default);
// end 

// services
const ServicesFilter = () => import('./components/services/Filter');
Vue.component('services-filter', ServicesFilter);

// account
Vue.component('account', require('./components/account/Account').default);

// map
const Map = () => import('./components/Map');
Vue.component('google-map', Map);

// franchise
const ModalBuyFranchise = () => import('./components/franchises/ModalBuyFranchise');
Vue.component('modal-buy-franchise', ModalBuyFranchise);
const ModalAddReviewFranchise = () => import('./components/franchises/ModalAddReview');
Vue.component('modal-add-review-franchise', ModalAddReviewFranchise);
const ModalAddObjectFranchise = () => import('./components/franchises/ModalAddObject');
Vue.component('modal-add-object-franchise', ModalAddObjectFranchise);
const ModalAddNewsFranchise = () => import('./components/franchises/ModalAddNews');
Vue.component('modal-add-news-franchise', ModalAddNewsFranchise);
const ModalShowReviewFranchise = () => import('./components/franchises/ModalShowReview');
Vue.component('modal-show-review-franchise', ModalShowReviewFranchise);
const MapObjectsFranchises = () => import('./components/franchises/MapObjects');
Vue.component('map-objects-franchises', MapObjectsFranchises);
Vue.component('franchises-list', require('./components/franchises/List.vue').default);


const app = new Vue({
    el: '#app',
    components: {
        BulmaAccordion,
        BulmaAccordionItem
    },
    data: {
        object: {
            // Переменные, используемые на странице объекта
            showDetailedInformation: false
        },
        vacancy: {
            // Переменные, используемые на страницах вакансий
            showResponseModal: false
        },
        reviews: {
            // Переменные, используемые на страницах отзывов
            showAddReviewModal: false,
            showSingleReviewModal: false,
            showSingleReviewModalID: null
        },
        franchise: {
            // Переменные, используемые на странице франшизы
            showModalBuy: false,
            showModalAddReview: false,
            showModalAddObject: false,
            showModalAddNews: false,
            showModalShowReview: false
        },
    },
    router,
    store,
    mounted(){
        //Подписка на уведомления
        if(this.$store.state.user){
            //Имя канала для уведомлений можно поменять, надо смотреть как https://github.com/laravel/ideas/issues/202
            window.Echo.private('App.Models.Auth.User.' + this.$store.state.user.id)
                .notification((notification) => {
                    this.$store.commit('add_notification', notification);
                });
        }
    },
    methods: {
        showModal(id) {
            document.getElementById(id).classList.add('is-active');
        },
        hideModal(id) {
            document.getElementById(id).classList.remove('is-active');
        },
        showSingleReviewModal(id) {
            this.reviews.showSingleReviewModal = true;
            this.reviews.showSingleReviewModalID = id;
        },
        toggleClassActive(event) {
            let el = null;
            if (event.target.tagName === 'a') {
                el = event.target;
            } else {
                el = event.target.closest('a');
            }
            el.classList.toggle("is-active");
            el.classList.toggle("has-text-weight-bold");
        },
        /**
         * @param {integer} id
         * @param {string} type - business или franchise
         */
        toggleFavorite(id, type) {
            axios.post('/profile/favorites/' + type + '/' + id)
                .then(res => {
                    this.$swal({type: 'success', text: res.data.message});
                    this.$emit('fetch-data');
                }).catch(e => {
                this.$swal({type: 'error', title: e.response.status, text: e.response.data.message});
            })
        }
    }
});

inlineSVG.init({
    svgSelector: 'img.svg', // the class attached to all images that should be inlined
    initClass: 'js-inlinesvg', // class added to <html>
}, function () {
    console.log('All SVGs inlined');
});

window.Swiper = Swiper;

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
 * Слайдер отзывов на странице франшизы
 */
var swiperFranchiseReviews = new Swiper('.swiper-franchise-reviews', {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 0,
    loop: false,
    freeMode: false,
    width: 700,
    navigation: {
        nextEl: '.swiper-franchise-reviews-next',
        prevEl: '.swiper-franchise-reviews-prev',
    },
});

/**
 * Слайдер на страницах брокера
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
 * Слайдер на странице баланса брокера
 */
var swiperBrokerDataBalanceMonth = new Swiper('.swiper-broker-data-balance-month', {
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
            if ((!target.closest('.dropdown-trigger')) && (target.closest('.dropdown.is-active')) && !target.classList.contains('is-info') && !target.classList.contains('is-clear')) {
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


/**
 *  Tabs
 */
window.openTab = function openTab(evt, tabName) {
    let i, x, tablinks;
    let target = evt.target;
    let tabsWrap = target.closest(".tabs-wrap");
    x = tabsWrap.querySelectorAll(".content-tab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = tabsWrap.querySelectorAll(".tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" is-active", "");
    }
    tabsWrap.querySelector('#' + tabName).style.display = "block";
    evt.currentTarget.className += " is-active";
};
