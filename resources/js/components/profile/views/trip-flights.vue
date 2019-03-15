<template>
 <section class="is-paddingless">
            <div class="content">
                <h3>Ваши перелеты</h3>
                <div class="box is-paddingless">
                    <div class="p-1-5 card-flight" v-for="flight in flights">
                        <div class="card-flight__title mb-1 has-text-weight-bold">{{flight.out_city}}, {{$getDateTime(flight.out_time)}} — {{flight.in_city}}, {{$getDateTime(flight.in_time)}}</div>
                        <div class="card-flight__info columns is-multiline">
                            <div class="column is-6">
                                <div class="card-flight__star-end is-flex">
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">{{flight.out_time.slice(11, 16)}}</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Вылет из
                                            {{flight.out_city}}
                                        </div>
                                    </div>
                                    <div class="card-flight__icon-from-to icon icon-1">
                                        <img src="/svg/icons/ic_arrow_right.svg" class="svg" alt="">
                                    </div>
                                    <div class="card-flight__short-data">
                                        <div class="card-flight__short-data__content has-text-weight-bold">{{flight.in_time.slice(11, 16)}}</div>
                                        <div class="card-flight__short-data__title has-text-basic is-size-875">Прилет в
                                            {{flight.in_city}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="card-flight__short-data">
                                    <div class="card-flight__short-data__content has-text-weight-bold">{{flight.flight_number}}</div>
                                    <div class="card-flight__short-data__title has-text-basic is-size-875">Номер рейса
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <hr class="hr-basic is-marginless">
               
                </div>
                <div class="box card-flight__hotel-wrap">
                    <div class="card-flight__title has-text-weight-bold">Гостиницы</div>
                    <div class="card-flight__hotel columns is-multiline">

                        <div class="column is-12">
                            <div class="card-flight__hotel__info" v-for="hotel in travel.hotels">
                   
                                    <div>
                                        <a :href="hotel.url" class="card-flight__hotel__link has-text-decoration-underline">
                                            {{hotel.url}}</a>
                                    </div>
                                        <div class="has-text-weight-bold">
                                        Заезд - {{$getDateTime(hotel.check_in_date)}} {{hotel.check_in_date.slice(11, 16)}}, 
                                        Выезд - {{$getDateTime(hotel.check_out_date)}} {{hotel.check_out_date.slice(11, 16)}}, 
                                        </div>
                      

                            </div>
                        </div>
                    </div>
                </div>

                  <!-- <div class="box card-flight__hotel-wrap">
                            <div class="card-flight__title has-text-weight-bold">Гостиница</div>
                            <div class="card-flight__hotel columns is-multiline">
                                <div class="column is-3">
                                    <figure class="card-flight__hotel__thumb is-marginless">
                                        <img src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="column is-9">
                                    <div class="card-flight__hotel__info">
                                        <div class="is-flex">
                                            <a href="#" class="card-flight__hotel__link has-text-decoration-underline">Norfolk
                                                Towers Paddington</a>
                                            <div class="card-flight__hotel__stars">
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>
                                                <span class="icon icon-1">
                                                     <img src="/svg/icons/ic_favorites-3.svg" alt="" class="svg">
                                                </span>

                                            </div>
                                        </div>
                                        <div class="card-flight__hotel__desc is-size-875 has-text-basic">
                                            34 Norfolk Place, Paddington, Вестминстер, Лондон, W2 1QW, Великобритания
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                <div class="buttons">
                    <button @click="ui.showModal = true" class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span class="icon icon-1"><img src="/svg/icons/ic_aircraft.svg" class="svg" alt=""></span>
                        <span>Добавить перелет</span>
                    </button>
                    <button @click="ui.showModalHotel = true" class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                        <span>Добавить гостиницу</span>
                    </button>
                </div>
            </div>


            <modal v-if="ui.showModalHotel" @close="ui.showModalHotel = false">
            <div slot="header">
                <p class="modal-card-title mb-0" >Добавить гостиницу</p>
            </div>
            <div slot="body">
                <form @submit.prevent="submitHotel">
                    <div class="content">
                        <form-errors :errors="formHotel.errors.errors"></form-errors>
                        <div class="columns is-multiline">
                            <g-g-input :type="'text'" :size="'is-12'"
                                v-model="formHotel.url"
                                placeholder=""
                                :required="true"
                                :label="'Ссылка на сайт'"></g-g-input>
                                
                        <g-g-date-input v-model="formHotel.check_in_date"
                                        label="Дата и время заезда"
                                        placeholder=""
                                        :required="true"
                                        :size="'is-6'"
                                        :config="config.dateTimeInput"></g-g-date-input>
                                        
                        <g-g-date-input v-model="formHotel.check_out_date"
                                        label="Дата и время выезда"
                                        placeholder=""
                                        :required="true"
                                        :size="'is-6'"
                                        :config="config.dateTimeInput"></g-g-date-input>

                        </div>
                    </div>
                    <div class="content w-full">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <button
                                        class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                    Добавить гостиницу
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </modal>

        <modal v-if="ui.showModal" @close="ui.showModal = false">
            <div slot="header">
                <p class="modal-card-title mb-0" >Добавить перелет</p>
            </div>
            <div slot="body">
                <form @submit.prevent="submit">
                    <div class="content">
                        <form-errors :errors="form.errors.errors"></form-errors>
                        <div class="columns is-multiline">
                        <g-g-input :type="'text'" :size="'is-6'"
                            v-model="form.out_city"
                            placeholder=""
                            :required="true"
                            :label="'Город вылета'"></g-g-input>

                        <g-g-input :type="'text'" :size="'is-6'"
                            v-model="form.in_city"
                            placeholder=""
                            :required="true"
                            :label="'Город прилета'"></g-g-input>

                        <g-g-date-input v-model="form.out_time"
                                        label="Дата и время вылета"
                                        placeholder=""
                                        :required="true"
                                        :size="'is-6'"
                                        :config="config.dateTimeInput"></g-g-date-input>

                        <g-g-date-input v-model="form.in_time"
                                        label="Дата и время прилета"
                                        placeholder=""
                                        :required="true"
                                        :size="'is-6'" 
                                         :config="config.dateTimeInput"></g-g-date-input>

                        <g-g-input :type="'text'" :size="'is-6'"
                                        v-model="form.flight_number"
                                        placeholder=""
                                        :required="true"
                                        :label="'Номер рейса'"></g-g-input>
                        </div>
                    </div>
                    <div class="content w-full">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <button
                                        class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                    Добавить перелет
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </modal>

        </section>
</template>


<script>
import {Form} from './../../../form'
import Modal from '../../Modal'
import GGInput from '../../form/GGInput'
import GGDateInput from '../../form/GGDateInput'
import GGTextarea from '../../form/GGTextarea'
import FormErrors from './../../form-errors'

export default {
    name: 'trip-flights',
    props: ['flights', 'travelId', 'travel'],
    components: {
        Modal,
        GGDateInput,
        GGTextarea,
        GGInput,
        FormErrors
    },
    data: function(){
        return {
            form: new Form({
                out_city: '',
                in_city: '',
                out_time: '',
                in_time: '',
                flight_number: '',
                travel_id: this.travelId
            }),
            formHotel: new Form({
                url: '',
                check_in_date: '',
                check_out_date: '',
                travel_id: this.travelId
            }),
            ui: {
                showModal: false,
                showModalHotel: false
            },
            config:{
                dateTimeInput: {
                    enableTime: true,
                    time_24hr: true,
                    dateFormat: 'Y-m-d H:i',
                }
            }
        }
    },
    methods:{
        submit(){
            this.form.post('/profile/api/trip/flight').then((res)=>{
                this.ui.showModal = false;
                this.$emit('update');
            })
        },
        submitHotel(){
            this.formHotel.post('/profile/api/trip/hotel').then((res)=>{
                this.ui.showModalHotel = false;
                this.$emit('update');
            })
        },
    }

}
</script>

<style>

</style>
