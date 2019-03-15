<template>
    <nav class="aside-nav">
        <h3>Категории</h3>
        <ul>
            <li class="aside-nav__item" v-for="category in categories">
                <a href="#" @click="changeCategory(category.id)">
                    <img :src="'/svg/icons/'+category.icon" class="svg"/>
                    <span class="aside-nav__item__title">{{category.title[$store.state.lang]}}</span>
                    <span class="aside-nav__item__count">{{category.count}}</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>

    export default {
        name: "NewsFilter",
        components: {},
        data() {
            return {
                categories: null,
                category: null,
            }
        },
        created() {
            this.fetchCategories();
        },
        methods: {
            fetchCategories() {
                let vm = this;
                axios.get('/news-get-categories').then(responce => {
                    vm.categories = responce.data;
                })
            },
            changeCategory() {
                this.$emit('input', this.category);
            },
            clearFilter() {
                this.category = null;
            }
        },
    }
</script>

<style scoped>

</style>
