<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">Ваши показы</h1>
        <table class="table is-fullwidth is-size-875">
            <thead>
            <tr>
                <th style="padding-right: 0;">№</th>
                <th>Продукт</th>
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
                        Тариф «Шпион»
                    </td>
                    <td class="has-text-basic">12 марта 2019</td>
                    <td class="has-text-weight-bold">
                        12
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
    </section>
</template>

<script>
export default {
    data: () => ({
        trips: [],
        products: []
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
        }
    }
}   
</script>

<style>

</style>
