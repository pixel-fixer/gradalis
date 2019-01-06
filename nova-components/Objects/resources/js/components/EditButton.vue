<template>
    <div>
        <button class="btn btn-default btn-icon bg-primary" @click="editObject">
            <slot>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="edit" role="presentation" class="fill-current text-white" style="margin-top: -2px; margin-left: 3px;"><path d="M4.3 10.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H5a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM6 14h2.59l9-9L15 2.41l-9 9V14zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h6a1 1 0 1 1 0 2H2v14h14v-6z"></path></svg>
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
                    + this.id + "/edit";
            }
        },
    }
</script>
