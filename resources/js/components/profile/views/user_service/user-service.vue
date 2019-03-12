<template>
    <section class="section pt-1 px-0" v-if="isLoaded">
        <h1 class="section-title mb-1-75">{{ $t(service.name) }}</h1>
        <div class="columns is-multiline">
            <multilang-input v-model="form.name" size="is-6" label="Название" :required="true"></multilang-input>
            <g-g-select-input v-model="form.category_id" :size="'is-6'"
                label="Категория"
                placeholder=""
                :options="service_categories"></g-g-select-input>
            <g-g-select-input v-model="form.type" :size="'is-6'"
                    label="Для кого" placeholder=""
                    :options="types"></g-g-select-input>
            <g-g-input type="number" :size="'is-6'"
                v-model="form.price_pln"
                placeholder=""
                label="Цена(PLN)"></g-g-input>                    
            <g-g-input type="number" :size="'is-6'"
                v-model="form.price_eur"
                placeholder=""
                label="Цена(EUR)"></g-g-input>
            <!-- <g-g-input type="text" :size="'is-6'"
                v-model="form.price_for"
                placeholder="единицу услуги"
                label="Цена за"></g-g-input> -->
            <multilang-input v-model="form.price_for" size="is-6" label="Цена за"></multilang-input>
            <g-g-textarea :size="'is-12'"
                v-model="form.preview_text"
                placeholder=""
                label="Аннотация"></g-g-textarea>       

        </div>
         <div class="tabs">
            <ul>
                <li :class="{'is-active': ui.active_tab == 'process'}" @click="ui.active_tab = 'process'"><a>Процесс</a></li>
                <li :class="{'is-active': ui.active_tab == 'portfolio'}" @click="ui.active_tab = 'portfolio'"><a>Портфолио</a></li>
                <li :class="{'is-active': ui.active_tab == 'team'}"  @click="ui.active_tab = 'team'"><a>О команде</a></li>
                <li :class="{'is-active': ui.active_tab == 'promo_video'}"  @click="ui.active_tab = 'promo_video'"><a>Промо-видео</a></li>
                <li :class="{'is-active': ui.active_tab == 'detail_text'}"  @click="ui.active_tab = 'detail_text'"><a>Подробнее</a></li>
            </ul>
        </div>
        <div class="tabs-content">
            <transition-group name="fade" mode="out-in">
                <div v-show="ui.active_tab == 'process'" key="process">
                    process
                </div>
                <div v-show="ui.active_tab == 'portfolio'" key="portfolio">
                    portfolio
                </div>
                <div v-show="ui.active_tab == 'team'" key="team">
                    <team></team>
                </div>
                <div v-show="ui.active_tab == 'promo_video'" key="promo_video">
                    <g-g-input type="text" :size="'is-12'"
                        v-model="form.promo_video.link"
                        placeholder=""
                        label="Ссылка на youtube"></g-g-input>       
                    <g-g-textarea :size="'is-12'"
                        v-model="form.promo_video.description"
                        placeholder=""
                        label="Описание"></g-g-textarea>       
                </div>
                <div v-show="ui.active_tab == 'detail_text'" key="detail_text">
                    <quill-editor ref="myTextEditor"
                      v-model="form.detail_text"
                      :options="editorOptions"></quill-editor>
                </div>
            </transition-group> 
        </div> 
        <form @submit.prevent="save">
            <button class="button is-primary">Сохранить</button>
            <button class="button is-primary" @click.prevent="publish">Опубликовать</button>
        </form>
    </section>
</template>

<script>
import {Form} from './../../../../form'
import GGInput from './../../../form/GGInput'
import GGTextarea from './../../../form/GGTextarea'
import GGSelectInput from './../../../form/GGSelectInput'
import MultilangInput from './../../../form/multilang-input'
import Team from './team'

import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import { quillEditor } from 'vue-quill-editor'

export default {
    breadcrumb: () =>({
        label: 'Крошки',
        parent: 'profile'
    }),
    // beforeRouteEnter (to, from, next) {
    //     //TODO обработать 404
    //     axios.get('/profile/api/user-service/' + to.params.id)
    //         .then( res => {
    //              next(vm => {
    //                 vm.service = res.data
    //                 vm.form = new Form(res.data)
    //              })
    //         })
    // },
    components: {
        GGInput,
        GGTextarea,
        GGSelectInput,
        MultilangInput,
        quillEditor,
        Team
    },
    data: () => ({
        isLoaded: false,
        ui:{
            active_tab: 'team'
        },
        editorOptions: {
            modules: {
                toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'font': [] }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],
                ['clean'],
                ['link', 'image', 'video']
                ]
          },
        },
        types: [
            { id: 1, name: 'Для продавца' },
            { id: 2, name: 'Для покупателя' }
        ],
        service: null,
        service_categories: null,
        form: null,
    }),
    mounted(){
        this.getData()
    },
    methods: {
        getCategories(){
            return axios.get('/profile/api/service-categories').then(res => {
                this.service_categories = res.data
            })
        },
        getService(){
            return axios.get('/profile/api/user-service/' + this.$route.params.id)
                .then(res => {
                    this.service = res.data
                    this.form = new Form(res.data)
                })
        },
        getData(){
            axios.all([this.getCategories(), this.getService()])
            .then(()=>{
                this.isLoaded = true;
            })
        },
        save(){
            this.form.post('/profile/api/user-service/' + this.service.id)
            .then(res => {
                this.getService(this.service.id)
            })
        },
        publish(){

        }
    }
        
}
</script>

<style>
.quill-editor {
    background: #fff;
}
.tabs-content{
    margin-bottom: 20px;
}
</style>    
