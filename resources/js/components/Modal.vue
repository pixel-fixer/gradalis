<template>
    <transition name="modal">
        <div class="modal is-active">
            <div class="modal-background" @click="$emit('close')"></div>
            <div class="modal-card" :style="style">
                <header class="modal-card-head">
                    <slot name="header">
                        default header
                    </slot>
                    <button class="delete close-modal" @click="$emit('close')"
                            aria-label="close"></button>
                </header>

                <section class="modal-card-body">
                    <slot name="body">
                        default body
                    </slot>
                </section>

                <footer class="modal-card-foot">
                    <slot name="footer"></slot>
                </footer>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            width: {
                default: ''
            }
        },
        name: "modal",
        computed: {
            style: function(){
                let style = {}
                if(this.width){
                    style.width = this.width;    
                }
                return style;
            }
        }
    }
</script>

<style scoped>
    /*
     * Transition
     */
    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-card,
    .modal-leave-active .modal-card {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
