<template>
    <div class="profile">
        <breadcrumbs></breadcrumbs>
        <div class="columns">
            <div class="column is-4">
                <profile-aside></profile-aside>
            </div>
            <div class="column is-8">
                <router-view :user="user"></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from './breadcrumbs'
import ProfileAside from './profile-aside'

export default {
    props: ['user'],
    components: { Breadcrumbs, ProfileAside },
    data: () => ({

    })
}
</script>

<style>

</style>

