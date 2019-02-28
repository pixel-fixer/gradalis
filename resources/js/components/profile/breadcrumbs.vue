<template>
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <router-link
            :to="link.to" v-for="link in linksMapped"
            :class="{'is-active': link.isLast}"
            tag="li"
            :key="link.path">
                <a href="/"><span>{{link.label}}</span></a>
            </router-link>
        </ul>
    </nav>
 </template>

<script>
export default {
    name: 'breadcrumbs',
    data:() => ({
        links: []
    }),
    mounted(){
        this.getPath(this.$route);
    },
    computed:{
        linksMapped: function(){
            if(this.links.length == 0)
                return [];
            let links = this.links;
            links[0].isLast = true;
            return links.reverse()
        }
    },
    watch:{
        '$route': function(){
            this.links = [];
            this.getPath(this.$route)
        }
    },
    methods:{
        getPath(route){
            if(typeof route.meta.breadcrumb == 'undefined')
                return;
            
            //TODO get dynamic data from component
            // if(typeof route.matched !== 'undefined')
            //     console.log(route.matched[0].components.default.breadcrumb)

            this.links.push({
                label: route.meta.breadcrumb.label,
                to: route.path
            });
                    
            if(typeof route.meta.breadcrumb.parent !== 'undefined'){
                let parent_route = _.find(this.$router.options.routes, i => i.name == route.meta.breadcrumb.parent)
                if(parent_route){
                    this.getPath(parent_route)
                }
            }
        }
    },
}
</script>

<style>

</style>
