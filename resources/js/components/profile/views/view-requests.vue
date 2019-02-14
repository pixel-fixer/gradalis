<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">Запросы на просмотр</h1>
        <table v-if="requests.length > 0" class="table is-fullwidth is-size-875">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Имя покупателя</th>
                <th>Страна</th>
                <th>Бюджет</th>
                <th>Объект</th>
                <th>Действия с запросом</th>
            </tr>
            </thead>
            <tbody class="box">
            <tr v-for="request in requests">
                <td class="has-text-basic has-vertical-align-middle">12.03.2019 в 12:00</td>
                <td class="has-text-weight-bold has-vertical-align-middle">{{request.user.full_name}}</td>
                <td class="has-text-basic has-vertical-align-middle">{{request.user.city.name}}</td> 
                <td class="has-text-weight-bold has-vertical-align-middle">€{{request.user.sum_to}}</td>
                <td style="white-space: nowrap"><a :href="'/business/'+ $t(request.object.url)">{{ $t(request.object.name) }}</a></td>
                <td class="has-text-warning has-vertical-align-middle">
                    <div class="buttons">
                        <template v-if="request.status == 'new'">
                            <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                    @click="setStatus(request.id, 'accepted')">Одобрить
                            </button>
                            <button class="button is-clear is-clear_close is-size-875"><span
                                    class="icon-close">×</span><span
                                    class="has-text-decoration-underline"  @click="setStatus(request.id, 'rejected')">Отклонить</span></button>
                        </template>
                        <button v-if="request.status == 'accepted'" class="button is-outlined is-success is-size-875 has-text-weight-bold">Одобрен</button>
                        <button v-if="request.status == 'rejected'" class="button is-outlined is-danger is-size-875 has-text-weight-bold">Отклонен</button>
                    </div>
                </td>
            </tr>
            <!-- <tr>
                <td class="has-text-basic has-vertical-align-middle">06.03.2019 в 14:00</td>
                <td class="has-text-weight-bold has-vertical-align-middle">Дмитрий</td>
                <td class="has-text-basic has-vertical-align-middle">Польша</td>
                <td class="has-text-weight-bold has-vertical-align-middle">€ 18 000 000</td>
                <td class="has-text-warning has-vertical-align-middle">
                    <div class="buttons">
                        <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                v-tooltip="'Требуется перевод документов'">Одобрить
                        </button>
                        <button class="button is-clear is-clear_close is-size-875"><span
                                class="icon-close">×</span><span
                                class="has-text-decoration-underline">Отклонить</span></button>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="has-text-basic has-vertical-align-middle">02.03.2019 в 10:00</td>
                <td class="has-text-weight-bold has-vertical-align-middle">Олег</td>
                <td class="has-text-basic has-vertical-align-middle">Украина</td>
                <td class="has-text-weight-bold has-vertical-align-middle">€ 18 000 000</td>
                <td class="has-text-warning has-vertical-align-middle">
                    <div class="buttons">
                        <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                v-tooltip="'Требуется перевод документов'">Одобрить
                        </button>
                        <button class="button is-clear is-clear_close is-size-875"><span
                                class="icon-close">×</span><span
                                class="has-text-decoration-underline">Отклонить</span></button>
                    </div>
                </td>
            </tr> -->
            </tbody>
        </table>
        <div v-if="!firstLoad && requests.length == 0">Запросов нет</div>
    </section>
</template>

<script>
export default {
    props: ['user'],
    data: () =>({
        requests: [],
        firstLoad: true
    }),
    mounted(){
        this.getData()
    },
    methods:{
        getData(){
            axios.get('/profile/view_requests').then( res => {
                console.log(res.data);
                this.firstLoad = false;
                this.requests = res.data
            }).catch(e => {
                alert(e.response.data.message)
            })
        },
        setStatus(id, status){
            axios.patch('/profile/view_request/' + id + '/' + status)
                .then(res => {
                    this.$swal({ type: 'success', text: res.data.message });
                    this.getData();
                }).catch(e => {
                    this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
                })
        }
    }
}
</script>

<style>

</style>
