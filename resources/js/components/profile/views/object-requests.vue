<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">Запросы на просмотр</h1>
        <table class="table is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Названия объекта</th>
                    <th>От кого</th>
                    <th>Комментарии</th>
                    <th>Дата и время</th>
                    <th>Статус</th>
                </tr>
                </thead>
                
                <tbody class="box is-paddingless">
                <tr v-for="request in requests">
                    <td class="has-text-basic">
                        <a :href="'/' + request.object.type + '/' + request.object.id" class="link-with-icon has-text-decoration-underline">
                            {{$t(request.object.name)}}
                        </a>
                    </td>
                    <td>
                        <div><b>Имя:</b> {{request.user.full_name}}</div>
                        <div><b>Город:</b>  {{request.user.city.name}}</div>
                        <div><b>Бюджет:</b>  €{{request.user.sum_to}}</div>
                        
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
                    <td class="has-text-warning has-vertical-align-middle">
                        <div class="has-vertical-align-middle" :class="getStatusСlass(request.status)" v-if="request.status != 1">
                            {{getStatusText(request.status)}}
                        </div>
                        <div class="buttons">
                            <template v-if="request.status == 1">
                                <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                        @click="setStatus(request.id, 'accepted')">Одобрить
                                </button>
                                <button class="button is-clear is-clear_close is-size-875"><span
                                        class="icon-close">×</span><span
                                        class="has-text-decoration-underline"  @click="ui.rejectReasonModal = true;form.id = request.id">Отклонить</span></button>
                            </template>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            
            <modal v-if="ui.rejectReasonModal" @close="ui.rejectReasonModal = false">
                <div slot="header">
                    <p class="modal-card-title mb-0">Причина октаза</p>
                </div>
                <div slot="body">
                    <div class="content">
                        <form-errors :errors="form.errors.errors"></form-errors>
                        <div class="columns is-multiline">
                            <g-g-textarea :size="'is-12'" v-model="form.reject_reason"
                                            label="Причина отказа"
                                            placeholder=""
                                            :required="true"></g-g-textarea>
                        </div>
                    </div>
                </div>
                <div class="content w-full" slot="footer">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <button @click="submitReject"
                                    class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                Отправить запрос на просмотр
                            </button>
                        </div>
                    </div>
                </div>
            </modal>


    </section>
</template>


<script>
import {Form} from './../../../form'
import Modal from '../../Modal'
import GGTextarea from '../../form/GGTextarea'
import FormErrors from './../../form-errors'

export default {
    components: {
        Modal,
        GGTextarea,
        FormErrors
    },
    data: () =>({
        requests: [],
        form: new Form({
            reject_reason: '',
            id: null
        }),
        ui:{
            rejectReasonModal: false
        },
        firstLoad: true
    }),
    mounted(){
        this.getData()
    },
    methods:{
        getData(){
            axios.get('/profile/requests/' + this.$route.params.type).then( res => {
                this.firstLoad = false;
                this.requests = res.data
            }).catch(e => {
                alert(e.response.data.message)
            })
        },
        setStatus(id, status){
            axios.patch('/profile/request/' + id + '/status/' + status)
                .then(res => {
                    this.$swal({ type: 'success', text: res.data.message });
                    this.getData();
                }).catch(e => {
                    this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
                })
                
        },
        submitReject(){
            axios.patch('/profile/request/' + this.form.id + '/reject', {
                    reject_reason: this.form.reject_reason
                })
                .then(res => {
                    this.$swal({ type: 'success', text: res.data.message });
                    this.ui.rejectReasonModal = false;
                    this.getData();
                }).catch(e => {
                    this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
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

</style>
