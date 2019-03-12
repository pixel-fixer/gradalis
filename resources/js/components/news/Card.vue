<template>
    <div class="column is-6">
        <article class="card-news">
            <figure class="card-news__thumb">
                <img
                    :src="'/storage/'+news.media[0].id+'/'+news.media[0].file_name"
                    alt="">
            </figure>
            <div class="card-news__tags">
                <a href="#" class="news-tag-cat"><img :src="'/svg/icons/'+news.category.icon" class="svg"> <span>{{news.category.title[this.$store.state.lang]}}</span></a>
            </div>
            <h3 class="card-news__title title">{{news.title[this.$store.state.lang]}}</h3>
            <div v-html="desc" class="card-news__excerpt">

            </div>
            <div class="mt-1">
                <a :href="'/news/'+news.url[this.$store.state.lang]" class="button is-info is-size-875">Подробнее</a>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: "NewsCard",
        props: {
            news: {default: null}
        },
        components: {},
        data() {
            return {}
        },
        computed:{
          desc(){
              let maxLength = 80
              let trimmedString = this.news.description[this.$store.state.lang].substr(0, maxLength);
              trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")))
              return trimmedString+'...';
          }
        },
        methods: {

        }
    }
</script>
