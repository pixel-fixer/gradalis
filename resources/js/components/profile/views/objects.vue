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
                    <article class="box card-object-pa is-paddingless" v-for="object in objectsMapped" :key="object.id">
                        <div v-if="getObjectNotificationCount(object)" class="tag is-danger is-rounded card-object-pa__count-notifications">
                            {{getObjectNotificationCount(object)}}
                        </div>
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
                                        <h3 class="card-object-pa__title">{{object.name[$store.state.lang]}}</h3>
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
                                        <button v-if="object.doc_request.length > 0"
                                            class="button is-outlined is-danger h-3 has-text-weight-bold is-size-875"
                                            @click="ui.showDocumentsModal=true; doc_requests = object.doc_request;">
                                            {{object.doc_request.length}} запросов на документацию
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-object-pa__footer p-1-5">
                            <div class="buttons">
                            <!-- <div class="dropdown">
                                    <div class="dropdown-trigger">
                                        <button @click="object.ui.showServices = !object.ui.showServices" class="button is-outlined is-info is-size-875 h-3 has-text-weight-bold"
                                                :class="{'is-warning': object.ui.showServices}"
                                                aria-haspopup="true">
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
                                </div> -->
                                <button @click="object.ui.showServices = !object.ui.showServices; updateObjects()"
                                :class="{'is-warning': object.ui.showServices}"
                                        class="button is-outlined is-info is-size-875 h-3 has-text-weight-bold"
                                        
                                        aria-haspopup="true">
                                    <span>Услуги</span>
                                </button> 
                             
                    
                            
                                <a v-if="object.status !== 3" class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold" @click="setStatusSold(object.type, object.id)">Продано</a>
                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold">Загрузить
                                    документы</a>
                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold">Подключить
                                    агенство</a>
                                <a class="button is-size-875 is-outlined is-info h-3 has-text-weight-bold"
                                @click="object.ui.showStat = !object.ui.showStat; updateObjects()" :class="{'is-warning': object.ui.showStat}">Статистика</a>
                            </div>
                            <transition name="fade">
                                <div class="card-object-pa__services is-flex" v-if="object.ui.showServices">
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
                            </transition>
                            <transition name="fade">
                                <object-stats v-if="object.ui.showStat" :object-id="object.id" :type="object.type"></object-stats>
                            </transition>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <modal v-if="ui.showDocumentsModal" @close="ui.showDocumentsModal = false" width="55rem">
            <div slot="header">
                <p class="modal-card-title mb-0">Запросы документации</p>
            </div>
            <div slot="body">
                <object-requests-table :request_list="doc_requests" @close="ui.showDocumentsModal=false"></object-requests-table>
            </div>
        </modal>
        
    </div>
</template>

<script>
import ObjectStats from './objects/object-stats'
import Modal from './../../Modal';
import ObjectRequestsTable from './objects/object-requests-table'

export default {
    components: { ObjectStats, Modal, ObjectRequestsTable },
    data:() => ({
        filter: 'active',
        ui: {
            showDocumentsModal: false
        },
        objects: [],
        doc_requests: [],
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
            }).map(item => {
                if(typeof item.ui == 'undefined')
                    item.ui = {
                        showStat: false,
                        showServices: false
                    }
                return item
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
        },
        //TODO Пока плюсую только запросы на просмотр и документацию.
        getObjectNotificationCount(object){
            return object.doc_request.length + object.view_request.length
        },
        updateObjects(){
            this.objects = this.objects.slice()
        }
    }
}
</script>

<style>

</style>
