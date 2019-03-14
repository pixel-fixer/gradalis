<template>
    <gmap-map
        :center="center"
        :zoom="12"
        class="contacts-map"
        :options="{
           zoomControl: true,
           mapTypeControl: true,
           scaleControl: true,
           streetViewControl: false,
           rotateControl: false,
           fullscreenControl: false,
           disableDefaultUi: false
         }"
    >
        <gmap-marker
            :key="index"
            v-for="(m, index) in markers"
            :position="m.position"
            @click="center=m.position"
        ></gmap-marker>
    </gmap-map>
</template>

<script>


    export default {
        name: "Map",
        data() {
            return {
                // default to Montreal to keep it simple
                // change this to whatever makes sense
                center: { lat: 52.1603, lng: 21.0913 },
                markers: [],
                places: [],
                currentPlace: null
            };
        },
        mounted() {

        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
