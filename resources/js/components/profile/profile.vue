<template>
    <div class="profile">
        <breadcrumbs></breadcrumbs>
        <div class="columns">
            <div class="column is-4">
                <profile-aside></profile-aside>
                <router-link to="/settings">Перейти к Foo</router-link>
            </div>
            <div class="column is-8">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from './breadcrumbs'
import Aside from './aside'

export default {
    props: ['user'],
    components: { Breadcrumbs, Aside },
    data: () => ({

    })
}
</script>

<style>

</style>

