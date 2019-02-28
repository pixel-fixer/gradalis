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
        </div>
         <div class="tabs">
            <ul>
                <li :class="{'is-active': active_tab == 'process'}" @click="active_tab = 'process'"><a>Процесс</a></li>
                <li :class="{'is-active': active_tab == 'portfolio'}" @click="active_tab = 'portfolio'"><a>Портфолио</a></li>
                <li :class="{'is-active': active_tab == 'team'}"  @click="active_tab = 'team'"><a>О команде</a></li>
                <li :class="{'is-active': active_tab == 'promovideo'}"  @click="active_tab = 'promovideo'"><a>Промо-видео</a></li>
                <li :class="{'is-active': active_tab == 'more'}"  @click="active_tab = 'more'"><a>Подробнее</a></li>
            </ul>
        </div>
        <div>
            <transition name="fade" mode="out-in">
                <div v-if="active_tab == 'process'" key="process">
                    process
                </div>
                <div v-if="active_tab == 'portfolio'" key="portfolio">
                    portfolio
                </div>
            </transition> 
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

export default {
    breadcrumb: () =>({
        label: this.title,
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
        MultilangInput
    },
    data: () => ({
        isLoaded: false,
        types: [
            { id: 1, name: 'Для продавца' },
            { id: 2, name: 'Для покупателя' }
        ],
        service: null,
        service_categories: null,
        title: 'Название услуги',
        form: null,
        active_tab: 'portfolio'
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

</style>
