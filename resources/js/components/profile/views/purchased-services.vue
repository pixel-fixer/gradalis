<template>
    <section class="section pt-1 px-0">
                    <h1 class="section-title mb-1-75">Купленные продукты</h1>
                    <table class="table is-fullwidth is-size-875">
                        <thead>
                        <tr>
                            <th style="padding-right: 0;">№</th>
                            <th>Назавание продукта</th>
                            <th>Статус</th>
                            <th>Результат</th>
                        </tr>
                        </thead>
                        <tbody class="box is-paddingless">
                            <tr v-for="orderedService in services"> 
                                <td class="has-text-basic">1</td>
                                <td>
                                    <div class="is-flex card-service_table">
                                        <figure class="card-service_table__icon" v-if="orderedService.service.icon">
                                            <img :src="orderedService.service.icon" alt="">
                                        </figure>
                                        <div class="card-service_table__info">
                                            <h4>{{ $t(orderedService.service.name) }}</h4>
                                            <time>{{ getDateTime(orderedService.created_at)}}</time>
                                        </div>
                                    </div>
                                </td>
                                <td :class="getStatusClass(orderedService.status)">{{getStatusLabel(orderedService.status)}}</td>
                                <td>
                                    <router-link :to="'/profile/purchased-services/' + orderedService.id" :breadcrumb="orderedService.name" class="link-with-icon">
                                        <img src="/svg/icons/ic_details.svg" alt="Details">
                                        <span class="has-text-decoration-underline">Посмотреть результат</span>
                                    </router-link>
                                </td>
                            </tr>
                     </tbody>
                    </table>
                </section>
</template>

<script>
export default {
    data: () => ({
        services: [],
        statusLabels: ['Оплачен', 'Подготовка', 'В процессе', 'Выполнен']
    }),
    mounted(){
        this.getServices()
    },
    methods:{
        getServices(){
            axios.get('/profile/purchased_services').then(res => {
                this.services = res.data;
            })
        },
        getStatusClass(status_id){
            switch (status_id) {
                case 1:
                    return 'has-text-primary'
                    break;
                case 2:
                    return 'has-text-info'
                    break;
                case 3:
                    return 'has-text-warning'
                    break;
                case 4:
                    return 'has-text-success'
                    break;
            }
        },
        getStatusLabel(status_id){
            return this.statusLabels[status_id-1]
        },
        getDateTime(dbDateTime){
            var monthNames = [
                'Январь',
                'Февраль',
                'Март',
                'Апрель',
                'Май',
                'Июнь',
                'Июль',
                'Август',
                'Сентябрь',
                'Ноябрь',
                'Декабрь',
            ];

            var date =  new Date(Date.parse(dbDateTime.replace('-','/','g')));
            return date.getDate() + '-' + ('0' + date.getMonth()).slice(-2) + '-' + date.getFullYear()
        }
    }
}
</script>

<style>

</style>
