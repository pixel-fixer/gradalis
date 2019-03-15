<template>
    <section class="is-paddingless mb-1-75">
         <h3>Запланированные просмотры объектов</h3>
            <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Названия объекта</th>
                    <th>Комментарии</th>
                    <th>Дата и время</th>
                    <th>Статус</th>
                </tr>
                </thead>
                
                <tbody class="box is-paddingless">
                <tr v-for="request in viewRequests">
                    <td class="has-text-basic">
                        <a :href="'/' + request.object.type + '/' + request.object.id" class="link-with-icon has-text-decoration-underline">
                            {{request.object.name}}
                        </a>
                    </td>
                    <td class="has-text-basic has-vertical-align-middle">
                        <p v-if="request.buyer_comment">{{request.buyer_comment}}</p>
                        <p v-if="request.reject_reason">
                            <b style="color: red">Причина отклонения:</b>
                            <div>{{request.reject_reason}}</div>
                        </p>
                        <i v-if="!request.buyer_comment && !request.reject_reason" class="has-text-grey-light no-wrap">Нет комментариев</i>
                    </td>
                    <td class="has-text-basic no-wrap has-vertical-align-middle">
                        {{$getDateTime(request.view_at)}} в {{request.view_at.slice(11, 16)}}
                        </td>
                    <td class="has-vertical-align-middle" :class="getStatusСlass(request.status)">
                        {{getStatusText(request.status)}}
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4" class="has-text-centered">
                        <button class="button is-info is-outlined h-3 is-rounded px-1"
                                @click="ui.showObjectRequestForm = true">
                            <span class="mr-0-5 is-size-4">+</span><span class="is-size-875">Добавить просмотр</span>
                        </button>

                        <modal v-if="ui.showObjectRequestForm" @close="ui.showObjectRequestForm = false">
                            <div slot="header">
                                <p class="modal-card-title mb-0">Запрос на просмотр</p>
                            </div>

                            <div slot="body">
                                <div class="content">
                                    <form-errors :errors="form.errors.errors"></form-errors>
    Из-за смешивания бизнесов и франшиз, если выбрана франшиза, то отображается неверное название. Нужно переписать логику компонента 
                                    <div class="columns is-multiline">
                                        <g-g-select-input :size="'is-12'" v-model="object_id"
                                                          :placeholder="formNewRequestView.object.placeholder"
                                                          :label="formNewRequestView.object.title" :searchable="true"
                                                          :options="formNewRequestView.object.options"
                                                          :withImg="true" :option-is-value="true"
                                                          @input-option="form.object_id = $event.id;form.object_type = $event.type">
                                        </g-g-select-input>


                                        <g-g-date-input v-model="form.date"
                                                        :label="formNewRequestView.date.title"
                                                        :placeholder="formNewRequestView.date.placeholder"
                                                        :required="formNewRequestView.date.required"
                                                        :size="'is-6'">
                                        </g-g-date-input>
                                        <g-g-date-input v-model="form.time"
                                                        :label="formNewRequestView.time.title"
                                                        :placeholder="formNewRequestView.time.placeholder"
                                                        :required="formNewRequestView.time.required"
                                                        :size="'is-6'"
                                                        :config="formNewRequestView.time.config">
                                        </g-g-date-input>
                                        <g-g-textarea :size="'is-12'" v-model="form.buyer_comment"
                                                      :label="formNewRequestView.comment.title"
                                                      :placeholder="formNewRequestView.comment.placeholder"
                                                      :required="formNewRequestView.comment.required"></g-g-textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="content w-full" slot="footer">
                                <div class="columns is-multiline">
                                    <div class="column is-12">
                                        <button @click="submitRequest"
                                                class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                            Отправить запрос на просмотр
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </modal>

                    </td>
                </tr>
                </tbody>
            </table>
    </section>
</template>

<script>
import {Form} from './../../../../form'
import Modal from '../../../Modal'
import GGDateInput from '../../../form/GGDateInput'
import GGTextarea from '../../../form/GGTextarea'
import GGSelectInput from '../../../form/GGSelectInput'
import FormErrors from './../../../form-errors'

export default {
    components: {
        Modal,
        GGDateInput,
        GGTextarea,
        GGSelectInput,
        FormErrors
    },
    name: 'objects-view',
    props: ['viewRequests', 'travelId'],
    data: function(){
        return {
            ui: {
                showObjectRequestForm: false
            },
            object_id: null,
            form: new Form({
                object_type: null,
                object_id: null,
                date: null,
                time: '12:00',
                buyer_comment: '',
                travel_id: this.travelId
            }),
            formNewRequestView: {
                    object: {
                        selected: null,
                        title: 'Укажите объект для просмотра',
                        placeholder: 'Поиск бизнеса или франшизы',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        noResult: 'Ничего не найдено',
                        options: []
                    },
                    date: {
                        title: 'Желаемая дата просмотра',
                        placeholder: '25.05.2019',
                        value: '',
                        required: true
                    },
                    time: {
                        title: 'Желаемое время просмотра',
                        placeholder: '12:00',
                        value: '',
                        required: true,
                        config: {
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: "H:i",
                            time_24hr: true
                        },
                    },
                    comment: {
                        title: 'Комментарий для продавца',
                        placeholder: 'Укажите комментарий',
                        value: '',
                        required: true
                    }
                },
            objects: []
        }
    },
    mounted() {
        this.getObjects();
    },
    methods:{
        submitRequest(){
            this.form.post('/profile/api/trip/view').then((res)=>{
                this.ui.showObjectRequestForm = false;
                this.$emit('update');
            })
        },
        getObjects(serach = null){
            axios.get('/profile/api/objects/search').then( res => {
                this.formNewRequestView.object.options = res.data
            })
        },
        getStatusText(status_id){
            switch (status_id) {
                case 1:
                    return 'новый'
                    break;
                case 2:
                    return 'принят'
                    break;
                case 3:
                    return 'отклонен'
                    break;
            }
        },
        getStatusСlass(status_id){
            switch (status_id) {
                case 1:
                    return 'has-text-info'
                    break;
                case 2:
                    return 'has-text-success'
                    break;
                case 3:
                    return 'has-text-danger'
                    break;
            }
        }
    }
}
</script>

<style>
.form-errors{
    text-align: left;
    margin-bottom: 10px;
}
    .form-errors__field{
        margin-bottom: 0 !important;
        
    }
</style>

