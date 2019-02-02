<template>
    <section class="section pt-1 px-0">
        <h1 class="section-title mb-1-75">Сообщения</h1>
        <chat :user="user"></chat>
    </section>
</template>

<script>
import Chat from './../../chat'

export default {
    props: ['user'],
    components: { Chat }
}
</script>
