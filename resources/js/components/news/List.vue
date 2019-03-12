<template>
    <div class="column is-8">
        <main>
            <h1 class="section-title">Последние новости</h1>

            <div class="card-news-list columns is-multiline">
                <news-card v-for="item in news" v-bind:key="item.id" :news="item"></news-card>
            </div>
        </main>
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
                news: null,
                form: {
                    category: null
                },
                loaderNews: false,
                prevDisabled: false,
                nextDisabled: false
            }
        },
        name: "BusinessList",
        methods: {
            changeFilter(data) {
                this.form = data;
                this.fetchNews();
            },
            fetchNews(page = 1) {
                let vm = this;
                vm.loaderNews = true;
                axios.get('/news-get?page=' + page, {params: vm.form}).then(responce => {
                    if (page == 1) {
                        vm.prevDisabled = true;
                    } else {
                        vm.prevDisabled = false;
                    }
                    if (page == responce.data.last_page) {
                        vm.nextDisabled = true;
                    } else {
                        vm.nextDisabled = false;
                    }

                    vm.loaderNews = false;
                    vm.news = responce.data.data
                    console.log(vm.news);
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
