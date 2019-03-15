<template>
    <div>
        <preloader v-if="isLoading"></preloader>
        <table v-else class="table is-fullwidth is-size-875">
            <thead>
            <tr>
                <th>Просмотры</th>
                <th>Звонки</th>
                <th>Запросы</th>
                <th>Сообщения</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="box is-paddingless">
            <tr>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_eye.svg" class="svg"
                                alt="">
                        <span>{{stats.showCount}}</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_phone.svg" class="svg"
                                alt="">
                        <span>{{stats.callsCount}}</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_document.svg" class="svg"
                                alt="">
                        <span>{{stats.requests}}</span>
                    </div>
                </td>
                <td class="has-text-basic has-text-weight-bold no-wrap has-vertical-align-middle">
                    <div class="text-with-icon">
                        <img src="/svg/icons/ic_messages.svg" class="svg"
                                alt="">
                        <span>{{stats.messages}}</span>
                    </div>
                </td>
                <td class="has-text-basic no-wrap has-vertical-align-middle">
                    <a class="link-with-icon">
                        <img src="/svg/icons/ic_details.svg" class="svg"
                                alt="">
                        <span class="has-text-decoration-underline">Что под этой кнопкой?</span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Preloader from './../../../preloader'

export default {
    name: 'object-stats',
    components: { Preloader },
    props: ['objectId', 'type'],
    data: () => ({
        isLoading: true,
        stats: []
    }),
    mounted(){
        this.getData()
    },
    methods:{
        getData(){
            axios.get('/profile/api/object/' + this.type + '/' + this.objectId)
            .then(res => {
                this.stats = res.data
                this.isLoading = false                
            })
        }
    }
}
</script>

<style>

</style>
