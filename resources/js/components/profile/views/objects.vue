<template>
    <div>
    <section class="section pt-1 pb-0 px-0">
            <h1 class="section-title mb-1-75">Ваши объекты</h1>
            <div class="buttons has-addons">
                <label :class="{'is-active': filter == 'active'}" class="button is-outlined is-info is-size-875 has-text-weight-bold h-3">
                    Активные объекты
                    <input type="radio" v-model="filter" value="active" style="display: none">
                </label>
                <label :class="{'is-active': filter == 'sold'}" class="button is-outlined is-info is-size-875 has-text-weight-bold h-3">Проданные
                    объекты
                    <input type="radio" v-model="filter" value="sold" style="display: none">
                </label>
            </div>
            <div class="columns is-multiline">
                <div class="column is-12">
                    <!-- Example Layout card service -->
                    <article class="box card-object-pa is-paddingless" v-for="object in objectsMapped">
                        <div class="tag is-danger is-rounded card-object-pa__count-notifications">10</div>
                        <div class="card-object-pa__body p-1-5">
                            <div class="columns is-multiline">
                                <div class="column is-4">
                                    <figure class="card-object-pa__thumb">
                                        <img
                                            src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg"
                                            alt="">
                                    </figure>
                                </div>
                                <div class="column is-8">
                                    <div class="card-object-pa__header is-flex">
                                        <h3 class="card-object-pa__title">{{object.name}}</h3>
                                        <a :href="`/business/${object.id}/edit`" class="card-object-pa__link-edit is-size-875 is-flex link-with-icon">
                                            &nbsp;<img src="/svg/icons/ic_edit.svg" class="svg"
                                                    alt="Edit">
                                            <span class="has-text-decoration-underline">Изменить</span>
                                        </a>
                                    </div>
                                    <address class="is-size-875 is-flex">
                                        <img src="/svg/icons/ic_location.svg" class="svg"
                                                alt="Location">
                                        <span>&nbsp;{{$t(object.city.country.translation)}}, {{$t(object.city.translation)}}</span>
                                    </address>
                                    <div class="card-object-pa__price is-flex">
                                        <div class="price-info">
                                            <div class="price">${{object.price}}</div>
                                        </div>
                                        <a href="#" class="has-text-decoration-underline is-size-875">Опустить
                                            цену</a>
                                    </div>
                                    <div class="card-object-pa__progress">
                                        <!-- TODO добавить на бэк время изменения статуса? -->
                                        <div class="card-object-pa__progress__title is-size-875">{{ object.status_labels[object.status] }}</div>
                                        <div class="card-object-pa__progress__bar">
                                            <progress :class="getObjectProgessBarClass(object.status)"
                                                    class="progress is-success is-small"
                                                    :value="(object.status + 1) * 25"
                                                    max="100">
                                            </progress>
                                        </div>
                                    </div>
                                    <div class="card-object-pa__statistics is-flex is-size-875">
                                        <div class="card-object-pa__statistics__item is-flex">
                                            <img src="/svg/icons/ic_eye.svg" class="svg"
                                                    alt="Eye">
                                            <span> {{ object.show_count }} просмотров</span>
                                        </div>
                                        <div class="card-object-pa__statistics__item is-flex">
                                            <img src="/svg/icons/ic_favorites-2.svg" class="svg"
                                                    alt="Favorites">
                                            <span>{{ object.favorites_count }} в избранном</span>
                                        </div>
                                        <div class="card-object-pa__statistics__item is-flex">
                                            <img src="/svg/icons/ic_document.svg" class="svg"
                                                    alt="Document">
                                            <span>3 документа</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="button is-outlined is-danger h-3 has-text-weight-bold is-size-875"
                                            @click="showModal('modal-documentation-requests-1')">
                                            10 запросов на документацию
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-object-pa__footer p-1-5">
                            <div class="buttons">
                                <div class="dropdown">
                                    <div class="dropdown-trigger">
                                        <button class="button is-warning is-size-875 h-3 has-text-weight-bold"
                                                aria-haspopup="true"
                                                aria-controls="dropdown-services-1">
                                            <span>Услуги</span>
                                            <div class="multiselect__select"></div>
                                        </button>
                                    </div>
                                    <div class="dropdown-menu" id="dropdown-services-1" role="menu">
                                        <div class="dropdown-content is-paddingless">
                                            <a class="dropdown-item" href="#">Item</a>
                                            <hr class="dropdown-divider is-marginless">
                                            <a class="dropdown-item" href="#">Item</a>
                                            <hr class="dropdown-divider is-marginless">
                                            <a class="dropdown-item" href="#">Item</a>
                                        </div>
                                    </div>
                                </div>

                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold" @click="setStatusSold(object.type, object.id)">Продано</a>
                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold">Загрузить
                                    документы</a>
                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold">Подключить
                                    агенство</a>
                            </div>
                            <div class="card-object-pa__services is-flex">
                                <a href="#" class="card-object-pa__services__item"
                                    v-tooltip="'Перевод документов'">
                                    <img src="/svg/icons/services/ic_translate.svg" alt="">
                                </a>
                                <a href="#" class="card-object-pa__services__item" v-tooltip="'VIP'">
                                    <img src="/svg/icons/services/ic_vip.svg" alt="">
                                </a>
                                <a href="#" class="card-object-pa__services__item"
                                    v-tooltip="'Быстрая продажа'">
                                    <img src="/svg/icons/services/ic_law.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- <article class="box card-object-pa is-paddingless">
                        <div class="card-object-pa__body p-1-5">
                            <div class="columns is-multiline">
                                <div class="column is-4">
                                    <figure class="card-object-pa__thumb">
                                        <img
                                            src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg"
                                            alt="">
                                    </figure>
                                </div>
                                <div class="column is-8">
                                    <div class="card-object-pa__header is-flex">
                                        <h3 class="card-object-pa__title">
                                            Мини-отель в собственность с видом
                                            на Невский проспект</h3>
                                        <a href="#"
                                            class="card-object-pa__link-edit is-size-875 is-flex link-with-icon">
                                            <img src="/svg/icons/ic_edit.svg" class="svg"
                                                    alt="Edit">
                                            <span class="has-text-decoration-underline">Изменить</span>
                                        </a>
                                    </div>
                                    <address class="is-size-875 is-flex">
                                        <img src="/svg/icons/ic_location.svg" class="svg"
                                                alt="Location">
                                        <span>Россия, г. Ростов-на-Дону</span>
                                    </address>
                                    <div class="card-object-pa__price is-flex">
                                        <div class="price-info">
                                            <span class="tag is-danger price-sale">-15%</span>
                                            <div class="price">$2 500 000</div>
                                            <span class="price-old">$2 000 000</span>
                                        </div>
                                        <a href="#" class="has-text-decoration-underline is-size-875">Опустить
                                            цену</a>
                                    </div>
                                    <div class="card-object-pa__progress">
                                        <div class="card-object-pa__progress__title is-size-875">
                                            На модерации до 12 марта 2019
                                        </div>
                                        <div class="card-object-pa__progress__bar">
                                            <div class="columns is-gapless">
                                                <div class="column is-6">
                                                    <progress class="progress is-warning is-small" value="100" max="100">
                                                        60%
                                                    </progress>
                                                </div>
                                                <div class="column is-3">
                                                    <progress class="progress is-success is-small" value="0" max="100">
                                                        60%
                                                    </progress>
                                                </div>
                                                <div class="column is-3">
                                                    <progress class="progress is-success is-small" value="0" max="100">
                                                        60%
                                                    </progress>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-object-pa__statistics is-flex is-size-875">
                                        <div class="card-object-pa__statistics__item is-flex">
                                            <img src="/svg/icons/ic_eye.svg" class="svg"
                                                    alt="Eye">
                                            <span>289 просмотров</span>
                                        </div>
                                        <div class="card-object-pa__statistics__item is-flex">
                                            <img src="/svg/icons/ic_favorites-2.svg" class="svg"
                                                    alt="Favorites">
                                            <span>15 в избранном</span>
                                        </div>
                                        <div class="card-object-pa__statistics__item is-flex is-ok">
                                            <img src="/svg/icons/ic_document.svg" class="svg"
                                                    alt="Document">
                                            <span>5 документов</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="button is-outlined h-3 has-text-weight-bold is-size-875" disabled>
                                            Нет новых запросов
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-object-pa__footer p-1-5">
                            <div class="buttons">
                                <div class="dropdown">
                                    <div class="dropdown-trigger">
                                        <button class="button is-warning is-size-875 h-3 has-text-weight-bold"
                                                aria-haspopup="true"
                                                aria-controls="dropdown-services-1">
                                            <span>Услуги</span>
                                            <div class="multiselect__select"></div>
                                        </button>
                                    </div>
                                    <div class="dropdown-menu" id="dropdown-services-1" role="menu">
                                        <div class="dropdown-content is-paddingless">
                                            <a class="dropdown-item" href="#">Item</a>
                                            <hr class="dropdown-divider is-marginless">
                                            <a class="dropdown-item" href="#">Item</a>
                                            <hr class="dropdown-divider is-marginless">
                                            <a class="dropdown-item" href="#">Item</a>
                                        </div>
                                    </div>
                                </div>

                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold">Продано</a>
                            </div>
                        </div>
                    </article> -->
                </div>
            </div>
        </section>
        <object-stats></object-stats>
    </div>
</template>

<script>
import ObjectStats from './objects/object-stats'

export default {
    components: { ObjectStats },
    data:() => ({
        filter: 'active',
        objects: [],
        firstLoad: true
    }),
    mounted(){
        this.getData()
    },
    computed:{
        objectsMapped(){
            return this.objects.filter(item => {
                if(this.filter == 'sold')
                    return item.status == 3
                else
                   return item.status !== 3
            });
        },
    },
    methods:{
        getData(){
            axios.get('/profile/api/objects').then( res => {
                this.firstLoad = false;
                this.objects = res.data;
            }).catch(e => {
                this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
            })
        },
        setStatus(id, status){
            axios.patch('/profile/view_request/' + id + '/' + status)
                .then(res => {
                    this.$swal({ type: 'success', text: res.data.message });
                    this.getData();
                }).catch(e => {
                    this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
                })
        },
        getObjectProgessBarClass(status){
            switch (status) {
                case 0:
                    return 'is-warning'
                case 1:
                    return 'is-success'
                case 2:
                    return 'is-success'
                case 3:
                    return 'is-success'
                case 4:
                    return 'is-danger'
            }
        },
        setStatusSold(type, id, status = 3){
            axios.patch(`/profile/api/object/${type}/${id}/status/${status}`)
                .then(res => {  
                     this.$swal({ type: 'success', text: res.data.message });
                    this.getData()
                }).catch(e => {
                    this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
                })
        }
    }
}
</script>

<style>

</style>
