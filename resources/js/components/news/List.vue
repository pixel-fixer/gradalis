<template>
    <div class="column is-8">
        <main>
            <h1 class="section-title">Последние новости</h1>

            <div class="card-news-list columns is-multiline">
                <news-card v-for="item in news.data" v-bind:key="item.id" :news="item"></news-card>
            </div>
        </main>
        <!-- Pagination -->
        <pagination :data="news" :show-disabled="true" @pagination-change-page="fetchNews">
            <a :disabled="prevDisabled" slot="prev-nav" class="pagination-previous pagination-nav button is-link">
                         <span class="pagination-nav__icon">
                             <img src="/svg/icons/ic_arrow_right.svg" class="svg"/>
                         </span>
                <span class="pagination-nav__title">Предыдущая страница</span>
            </a>
            <a :disabled="nextDisabled" slot="next-nav" class="pagination-next pagination-nav button is-link">
                <span class="pagination-nav__title">Следующая страница</span>
                <span class="pagination-nav__icon">
                             <img src="/svg/icons/ic_arrow_right.svg" class="svg"/></span>
            </a>
        </pagination>
    </div>
</template>

<script>
    import NewsCard from './Card';
    import Pagination from 'laravel-vue-pagination';

    export default {
        components: {
            'news-card': NewsCard,
            'pagination': Pagination
        },
        data() {
            return {
                news: {},
                form: {
                    category: null
                },
                loaderNews: false,
                prevDisabled: false,
                nextDisabled: false
            }
        },
        name: "NewsList",
        methods: {
            changeFilter(data) {
                this.form = data;
                this.fetchNews();
            },
            fetchNews(page = 1) {
                let vm = this;
                vm.loaderNews = true;
                axios.get('/news-get?page=' + page, {params: vm.form}).then(responce => {
                    if (page === 1) {
                        vm.prevDisabled = true;
                    } else {
                        vm.prevDisabled = false;
                    }
                    if (page === responce.data.last_page) {
                        vm.nextDisabled = true;
                    } else {
                        vm.nextDisabled = false;
                    }

                    vm.loaderNews = false;
                    vm.news = responce.data;
                    vm.changeHisory(page);
                })
            },
            changeHisory(page) {
                const params = new URLSearchParams(location.search);
                if (page > 1) {
                    params.set('page', page);
                } else {
                    params.delete('page');
                }

                for (const [key, value] of Object.entries(this.form)) {
                    if (value !== null) {
                        params.set(key, value);
                    }
                }

                let url = '';
                if ([...params.entries()].length > 0) {
                    url += '?' + params.toString();
                }
                history.pushState(null, null, '/news' + url);
            }
        },
        created() {
            const params = new URLSearchParams(location.search);
            let page = 1;
            if (params.has('page')) {
                page = params.get('page');
            }
            for (const [key, value] of Object.entries(this.form)) {
                if (params.has(key)) {
                    this.form[key] = value;
                }
            }
            this.fetchNews(page);
        }
    }
</script>

<style scoped>

</style>
