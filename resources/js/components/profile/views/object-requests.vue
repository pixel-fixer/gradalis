<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75" v-if="$route.params.type == 'view'">Запросы на просмотр</h1>
        <h1 class="section-title mb-1-75" v-if="$route.params.type == 'doc'">Запросы документации</h1>
       <object-requests-table></object-requests-table>
    </section>
</template>

<script>
import ObjectRequestsTable from './objects/object-requests-table'

export default {
    components: {ObjectRequestsTable}
}
</script>
