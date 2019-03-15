<template>
    <div>
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
            <tr v-for="request in requests" :key="request.id">
                <td class="has-text-basic has-vertical-align-middle">12.03.2019 в 12:00</td>
                <td class="has-text-weight-bold has-vertical-align-middle">{{request.user.full_name}}</td>
                <td class="has-text-basic has-vertical-align-middle">{{request.user.city.name}}</td> 
                <td class="has-text-weight-bold has-vertical-align-middle">€{{request.user.sum_to}}</td>
                <td style="white-space: nowrap"><a :href="'/business/'+ $t(request.object.url)">{{request.object.name}}</a></td>
                <td class="has-text-warning has-vertical-align-middle">
                    <div class="buttons">
                        <template v-if="request.status == 1">
                            <button class="button is-outlined is-success is-size-875 has-text-weight-bold"
                                    @click="setStatus(request.id, 'accepted')">Одобрить
                            </button>
                            <button class="button is-clear is-clear_close is-size-875"><span
                                    class="icon-close">×</span><span
                                    class="has-text-decoration-underline"  @click="setStatus(request.id, 'rejected')">Отклонить</span></button>
                        </template>
                        <button v-if="request.status == 2" class="button is-outlined is-success is-size-875 has-text-weight-bold">Одобрен</button>
                        <button v-if="request.status == 3" class="button is-outlined is-danger is-size-875 has-text-weight-bold">Отклонен</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-if="!firstLoad && requests.length == 0">Запросов нет</div>
    </div>
</template>

<script>
export default {
    name: 'object-requests-table',
    props: {
        request_list: {
            default: function(){
                return [];
            }
        },
    },
    data: () =>({
        requests: [],
        firstLoad: true
    }),
    mounted(){
        if(this.request_list.length > 0)
            this.requests = this.request_list
        else
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
            axios.patch('/profile/request/' + id + '/' + status)
                .then(res => {
                    this.$swal({ type: 'success', text: res.data.message });
                    if(this.request_list.length > 0)
                        this.$emit('')  
                    else
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
