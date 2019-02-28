<template>
     <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">Ваши услуги</h1>
        <table class="table is-fullwidth is-size-875" v-if="services.length > 0">
            <thead>
            <tr>
                <th style="padding-right: 0;">№</th>
                <th>Назавание продукта</th>
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="box is-paddingless">
                <tr v-for="(service, i) in services"> 
                    <td class="has-text-basic">{{i+1}}</td>
                    <td>
                        <div class="is-flex card-service_table">
                            <figure class="card-service_table__icon" v-if="service.icon">
                                <img :src="service.icon" alt="">
                            </figure>
                            <div class="card-service_table__info">
                                <h4>{{ service.name }}</h4>
                                <time>{{ $getDateTime(service.created_at)}}</time>
                            </div>
                        </div>
                    </td>
                    <td :class="getStatusClass(service.status)">{{getStatusLabel(service.status)}}</td>
                    <td>
                        <router-link :to="'/profile/user-service/' + service.id" :breadcrumb="service.name" class="link-with-icon">
                            <img src="/svg/icons/ic_details.svg" alt="Details">
                            <span class="has-text-decoration-underline">Редактировать</span>
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else style="margin: 20px 0;">
            Услуг не найдено
        </div>

        <button class="button is-info" @click="ui.showAddServiceModal = true">Добавить услугу</button>

        <modal v-if="ui.showAddServiceModal" @close="ui.showAddServiceModal = false">
            <div slot="header">
                <p class="modal-card-title mb-0">Добавить новую услугу</p>
            </div>
            <div slot="body">
                <form @submit.prevent="addService">
                    <div class="columns is-multiline">
                        <g-g-input :type="'text'" :size="'is-12'"
                            v-model="form.name"
                            placeholder=""
                            :required="true"
                            :label="'Название'"></g-g-input>
                        <g-g-select-input v-model="form.category_id" :size="'is-12'"
                            label="Категория"
                            placeholder=""
                            :options="categories"></g-g-select-input>
                        <g-g-select-input v-model="form.type" :size="'is-12'"
                                label="Для кого" placeholder=""
                                :options="types"></g-g-select-input>
                        <g-g-input type="number" :size="'is-12'"
                            v-model="form.price_pln"
                            placeholder=""
                            label="Цена(PLN)"></g-g-input>                    
                        <g-g-input type="number" :size="'is-12'"
                            v-model="form.price_eur"
                            placeholder=""
                            label="Цена(EUR)"></g-g-input>
                        <g-g-input type="text" :size="'is-12'"
                            v-model="form.price_for"
                            placeholder="единицу услуги"
                            label="Цена за"></g-g-input>
                    </div>
                    <button class="button is-info">Добавить услугу</button>
                </form>
            </div>
        </modal>
     </section>
</template>

<script>
import Modal from '../../../Modal'
import {Form} from './../../../../form'
import GGInput from './../../../form/GGInput';
import GGTextarea from './../../../form/GGTextarea';
import GGSelectInput from './../../../form/GGSelectInput';

export default {
    components: {
        Modal,
        GGInput,
        GGTextarea,
        GGSelectInput
    },
    data: () => ({
        services: [],
        categories: [],
        types: [
            { id: 1, name: 'Для продавца' },
            { id: 2, name: 'Для покупателя' }
        ],
        status_labels: null,
        ui: {
            showAddServiceModal: false
        },
        form: new Form({
            name: '',
            category_id: '',
            type: null,
            price_pln: null,
            price_eur: null,
            price_for: ''
        })
    }),
    mounted(){
        this.getData()
    },
    methods: {
        getData(){
            axios.get('/profile/api/user-service').then(res => {
                this.categories = res.data.categories;
                this.services = res.data.services.length > 0 ? res.data.services : [];
                this.status_labels = res.data.status_labels
            })
        },
        addService(){
            this.form.post('/profile/api/user-service').then( res => {
                alert(1);
            })
        },
        getStatusClass(status_id){
            switch (status_id) {
                case 0:
                    return 'has-text-warning'
                    break;
                case 1:
                    return 'has-text-info'
                    break;
                case 2:
                    return 'has-text-danger'
                    break;
                case 3:
                    return 'has-text-success'
                    break;
            }
        },
        getStatusLabel(id){
            return this.status_labels[id]
        }
    }
}
</script>

<style>

</style>
