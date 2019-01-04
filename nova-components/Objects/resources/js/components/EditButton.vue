<template>
    <div>
        <button class="btn btn-default" @click="editObject('ru')">
            <slot>
                Edit ru
            </slot>
        </button>
        <button class="btn btn-default" @click="editObject('en')">
            <slot>
                Edit en
            </slot>
        </button>
        <button class="btn btn-default" @click="editObject('pl')">
            <slot>
                Edit pl
            </slot>
        </button>
    </div>
</template>

<script>
    //import router from 'router'
    export default {
        props: ['id', 'resource'],
        methods: {
            editObject(lang) {
                window.location = Nova.config.base
                    + "/resources/"
                    + this.resource + "/"
                    + this.id + "/edit"
                    + "?lang=" + lang;
            }
        },
    }
</script>
