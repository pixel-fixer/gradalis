<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">Ваши поездки</h1>
        <table class="table is-fullwidth is-size-875">
            <thead>
            <tr>
                <th style="padding-right: 0;">№</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Объектов</th>
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="box is-paddingless">
                <tr v-for="trip in trips">
                    <td class="has-text-basic">1</td>
                    <td class="has-text-weight-bold">
                        {{trip.name}}
                    </td>
                    <td class="has-text-basic"> {{trip.date}}</td>
                    <td class="has-text-weight-bold">
                        {{trip.object_view.length}}
                    </td>
                    <td class="has-text-warning">
                        Черновик
                    </td>
                    <td>
                        <router-link :to="'/profile/trips/' + trip.id">
                            <img src="/svg/icons/ic_details.svg" alt="Details">
                            <span class="has-text-decoration-underline">Посмотреть</span>
                        </router-link>
                    </td>
                </tr>
                <!-- <tr>
                    <td class="has-text-basic">2</td>
                    <td class="has-text-weight-bold">
                        Тариф «Шпион»
                    </td>
                    <td class="has-text-basic">12 марта 2019</td>
                    <td class="has-text-weight-bold">
                        12
                    </td>
                    <td class="has-text-success">
                        Запланирован
                    </td>
                    <td>
                        <a href="#" class="link-with-icon">
                            <img src="/svg/icons/ic_details.svg" alt="Details">
                            <span class="has-text-decoration-underline">Посмотреть</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="has-text-basic">3</td>
                    <td class="has-text-weight-bold">
                        Тариф «Шпион»
                    </td>
                    <td class="has-text-basic">12 марта 2019</td>
                    <td class="has-text-weight-bold">
                        12
                    </td>
                    <td class="has-text-danger">
                        Отклонен
                    </td>
                    <td>
                        <a href="#" class="link-with-icon">
                            <img src="/svg/icons/ic_details.svg" alt="Details">
                            <span class="has-text-decoration-underline">Посмотреть</span>
                        </a>
                    </td>
                </tr> --> 
            </tbody>
        </table>
        <p>
            <button class="button is-info" @click="ui.showAddTripModal = true">Добавить поездку</button>
        </p>

        <modal v-if="ui.showAddTripModal" @close="ui.showAddTripModal = false">
            <div slot="header">
                <p class="modal-card-title mb-0">Добавить новую поездку</p>
            </div>
            <div slot="body">
                <form @submit.prevent="addTrip">
                    <div class="columns is-multiline">
                        <g-g-input :type="'text'" :size="'is-6'"
                            v-model="form.name"
                            placeholder=""
                            :required="true"
                            :label="'Название'"></g-g-input>
                        <g-g-date-input v-model="form.date"
                                        label="Дата"
                                        placeholder=""
                                        :required="true"
                                        :size="'is-6'">
                        </g-g-date-input>
                      </div>
                    <button class="button is-info">Добавить поездку</button>
                </form>
            </div>
        </modal>

    </section>
</template>

<script>
import Modal from '../../Modal'
import {Form} from './../../../form'
import GGInput from './../../form/GGInput';
import GGTextarea from './../../form/GGTextarea';
import GGSelectInput from './../../form/GGSelectInput';
import GGDateInput from '../../form/GGDateInput'

export default {
    components: {
        Modal,
        GGInput,
        GGTextarea,
        GGSelectInput,
        GGDateInput
    },
    data: () => ({
        trips: [],
        products: [],
        ui:{
            showAddTripModal: false
        },
        modal:{
            time:{
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            },
        },
        form: new Form({
            name: '',
            date: '',
            time: ''
        })
    }),
    mounted(){
        this.getTips();
    },
    methods:{
        getTips(){
            axios.get('/profile/api/trips').then(res => {
                    this.trips = res.data
                }).catch(err => {
                    this.$swal({ type: 'error', title: err.response.status, text: err.response.data.message });
                })
        },
        addTrip(){
            this.form.post('/profile/api/trip').then(()=>{
                this.ui.showAddTripModal = false;
                this.getTips();
            })
        }
    }
}   
</script>

<style>

</style>
