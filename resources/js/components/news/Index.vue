<template>
    <!-- Section business -->
    <section class="section section-list-objects pt-1">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <aside>
                        <news-filter></news-filter>
                        <!--<div class="card card-object card-object_promo">-->
                            <!--<div class="card-image">-->
                                <!--<figure class="image is-16by9">-->
                                    <!--<img-->
                                        <!--src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg"-->
                                        <!--alt="Placeholder image">-->
                                <!--</figure>-->
                                <!--<span class="tag tag-payback">-->
                            <!--<span class="name">окупаемость</span>-->
                            <!--<span class="term">38 месяцев</span>-->
                        <!--</span>-->
                                <!--<span class="info-icon object-promo">-->
                            <!--<img src="{{ asset('/svg/icons/ic_recommended.svg') }}" alt="Recommended">-->
                        <!--</span>-->
                                <!--<a href="#" class="info-icon object-favorite" v-tooltip="'Добавить в избранное'">-->
                                    <!--<img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">-->
                                <!--</a>-->

                            <!--</div>-->
                            <!--<div class="card-content">-->
                                <!--<div class="card-object__header">-->
                                    <!--<h3 class="title">Мини-отель в собственность с видом на Невский проспект</h3>-->
                                    <!--<p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}"-->
                                                             <!--alt="Fav"><span>Россия, г. Санкт-Петербург</span>-->
                                    <!--</p>-->
                                <!--</div>-->

                                <!--<div class="content card-object__content">-->
                                    <!--<div class="list-properties">-->
                                        <!--<div class="list-properties__item">-->
                                            <!--<span>Категория</span>-->
                                            <!--<span>Коммерческая</span>-->
                                        <!--</div>-->
                                        <!--<div class="list-properties__item">-->
                                            <!--<span>Выручка</span>-->
                                            <!--<span><b>$48 000</b></span>-->
                                        <!--</div>-->
                                        <!--<div class="list-properties__item">-->
                                            <!--<span>Прибыль</span>-->
                                            <!--<span><b>$23 000</b></span>-->
                                        <!--</div>-->
                                        <!--<div class="list-properties__item">-->
                                            <!--<span>Доходность</span>-->
                                            <!--<span><b>78%</b></span>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="card-object__footer">-->
                                    <!--<div class="price-info">-->
                                        <!--<div class="price">$18 000 560</div>-->
                                    <!--</div>-->
                                    <!--<a class="button is-success is-outlined is-fullwidth has-text-weight-bold">Подробнее-->
                                        <!--о-->
                                        <!--бизнесе</a>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    </aside>
                </div>
                <news-list></news-list>
            </div>
        </div>
    </section>
</template>

<script>
    import NewsFiler from './NewsFilter';
    import List from './List';
    import Pagination from 'laravel-vue-pagination';

    export default {
        components: {
            'news-list': List,
            'news-filter': NewsFiler,
            'pagination': Pagination
        },
        data() {
            return {

            }
        },
        name: "BusinessList",
        methods: {

        },
        created() {

        }
    }
</script>

<style scoped>

</style>
