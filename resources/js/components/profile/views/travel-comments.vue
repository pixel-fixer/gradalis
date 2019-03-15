<template>
    <div class="content">
        <h3 class="mb-0">Ваши пожелания</h3>
        <div v-if="comments.length > 0" class="comments">
            <div v-for="comment in comments" :key="comment.id" >
                <time class="is-size-7 has-text-basic">{{formatTime(comment.created_at) }}</time>
                <div class="is-size-875 mb-1-75">
                    <p>{{comment.text}}</p>
                </div>
                
            </div>
        </div>
        <div v-else>Пожелайний нет</div>
        <div class="buttons">
            <a href="/profile/chat" class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                <span class="icon icon-1"><img src="/svg/icons/ic_ask_question.svg" class="svg" alt=""></span>
                <span>Задать вопрос брокеру</span>
            </a>
            <button @click="ui.showModal = true" class="button is-info is-outlined h-3 px-1 is-size-875 has-text-weight-bold px-1-5">
                <span>Добавить пожелания</span>
            </button>
        </div>


        <modal v-if="ui.showModal" @close="ui.showModal = false">
            <div slot="header">
                <p class="modal-card-title mb-0" >Добавить пожелание</p>
            </div>

            <div slot="body">
                <form @submit.prevent="submit">
                    <div class="content">
                        <form-errors :errors="form.errors.errors"></form-errors>
                        <div class="columns is-multiline">

                            <g-g-textarea  :size="'is-12'" v-model="form.text"
                                            label="Сообщение"
                                            :required="true"></g-g-textarea>
                        </div>
                    </div>
                    <div class="content w-full">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <button
                                        class="button is-info is-fullwidth has-text-weight-bold h-3 is-size-875">
                                    Добавить пожелание
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
  
        </modal>

    </div>
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
    props: ['comments', 'travelId'],
    data: function(){
        return {
            form: new Form({
                text: '',
                travel_id: this.travelId
            }),
            ui: {
                showModal: false
            }
        }
    },
    methods: {
        submit(){
            this.form.post('/profile/api/trip/comment').then((res)=>{
                this.ui.showModal = false;
                this.$emit('update');
            })
        },
        formatTime(time){
            return this.$getDateTime(time) + ' в ' + time.slice(11, 16)
        }
    }
}
</script>

<style scoped>
    .comments{
        margin-bottom: 20px;
    }
</style>
