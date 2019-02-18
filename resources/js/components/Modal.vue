<template>
    <transition name="modal">
        <div class="modal is-active">
            <div class="modal-background" @click="$emit('close')"></div>
            <div class="modal-card">
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
        name: "modal",
    }
</script>

<style scoped>
    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
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
