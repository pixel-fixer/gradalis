<template>
    <gmap-map
        :center="center"
        :zoom="3"
        style="width: 100%; height: 358px"
        :options="{
           zoomControl: true,
           mapTypeControl: false,
           scaleControl: true,
           streetViewControl: false,
           rotateControl: false,
           fullscreenControl: false,
           disableDefaultUi: false
         }"
    >
        <gmap-cluster
            :zoomOnClick="true"
            :styles="clusterMarkerStyles">
            <gmap-marker
                :key="index"
                v-for="(m, index) in markers"
                :position="m.position"
                @click="showInfo(index)"
            ></gmap-marker>
        </gmap-cluster>
        <div slot="visible">
            <div class="map-info-box-object" v-show="infoBox.show">
                <a class="delete" @click="hideInfo()"></a>
                <div class="columns is-multiline is-gapless">
                    <div class="column is-3">
                        <figure class="is-marginless">
                            <img :src="infoBox.info.img" alt="">
                        </figure>
                    </div>
                    <div class="column is-9">
                        <div class="map-info-box-object__info px-1 py-1">
                            <div class="has-text-weight-bold has-text-dark-blue">{{infoBox.info.title}}</div>
                            <div class="location is-size-875 is-flex mb-0-5">
                                <span class="mr-0-5"><img src="/svg/icons/ic_location.svg" alt=""></span><span>{{infoBox.info.address}}</span>
                            </div>
                            <a :href="'#'+infoBox.info.link"
                               class="has-text-decoration-underline is-size-875">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </gmap-map>
</template>

<script>
    import GmapCluster from 'vue2-google-maps/dist/components/cluster' // replace src with dist if you have Babel issues

    export default {
        name: "MapObjects",
        components: {
            'gmap-cluster': GmapCluster
        },
        data() {
            return {
                infoBox: {
                    info: {
                        img: null,
                        title: null,
                        address: null,
                        link: null,
                    },
                    show: false
                },
                clusterMarkerStyles: [{ url: '/img/franchises/ic_cluster.png', width: 18, height: 18,  textColor: '#ffffff', textSize: 10 }],

                // default to Montreal to keep it simple
                // change this to whatever makes sense
                center: {lat: -28.024, lng: 140.887},
                markers: [
                    {
                        position: {
                            lat: -31.563910, lng: 147.154312
                        },
                        info: {
                            img: 'http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg',
                            title: 'Char-RNN 1',
                            address: 'Poland, Warsaw, Zamkowy Square 1/13, 00-262',
                            link: 'object_1'
                        }
                    },
                    {
                        position: {
                            lat: -33.718234, lng: 150.363181
                        },
                        info: {
                            img: 'http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg',
                            title: 'Char-RNN 2',
                            address: 'Russia, Moscow, Ilinka 1/13, 00-262',
                            link: 'object_2'
                        }
                    },
                ],
                places: [],
                currentPlace: null
            };
        },
        mounted() {
        },
        methods: {
            showInfo: function (index) {
                this.infoBox.info = this.markers[index].info;
                this.infoBox.show = true;
            },
            hideInfo: function () {
                this.infoBox.show = false;
            },
        }
    }
</script>

<style scoped>

</style>
