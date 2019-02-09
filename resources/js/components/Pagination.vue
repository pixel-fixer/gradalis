<template>
    <div class="columns is-centered">
        <div class="column is-narrow has-text-centered">
            <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                <a v-if="pagination.current_page > 1" v-on:click.prevent="changePage(pagination.current_page - 1)"
                   class="pagination-previous pagination-nav button" disabled="true">
                            <span class="pagination-nav__icon"><img src="/svg/icons/ic_arrow_right.svg"
                                                                    class="svg"/></span>
                    <span class="pagination-nav__title">Предыдущая страница</span>
                </a>
                <a v-if="pagination.current_page < pagination.last_page" v-on:click.prevent="changePage(pagination.current_page + 1)" class="pagination-next pagination-nav button is-link">
                    <span class="pagination-nav__title">Следующая страница</span>
                    <span class="pagination-nav__icon"><img src="/svg/icons/ic_arrow_right.svg"
                                                            class="svg"/></span></a>

                <!--<ul class="pagination-list">-->
                    <!--<li><a class="pagination-link" aria-label="Goto page 1">1</a></li>-->
                    <!--<li><span class="pagination-ellipsis">&hellip;</span></li>-->
                    <!--<li><a class="pagination-link" aria-label="Goto page 45">45</a></li>-->
                    <!--<li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a>-->
                    <!--</li>-->
                    <!--<li><a class="pagination-link" aria-label="Goto page 47">47</a></li>-->
                    <!--<li><span class="pagination-ellipsis">&hellip;</span></li>-->
                    <!--<li><a class="pagination-link" aria-label="Goto page 86">86</a></li>-->
                <!--</ul>-->
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pagination",
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        },
        methods: {
            changePage(page) {
                this.pagination.current_page = page;
                this.$emit('paginate');
            }
        }
    }
</script>

<style scoped>

</style>
