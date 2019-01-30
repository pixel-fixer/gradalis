<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-close" @click="$emit('close')"></div>
                    <div class="modal-header">
                        <slot name="header">
                            default header
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            default body
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer"></slot>
                    </div>
                </div>
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
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }
    .modal-close{
        background: rgba(0, 0, 0, 0.4);
        border-radius: 0px 3px 0px 3px;
        position: absolute;
        top: 0;
        right: 0;
        border-color: rgba(0, 0, 0, 0.4);
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        position: relative;
        width: 545px;
        margin: 0px auto;
        padding: 25px 25px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        border-radius: 3px;
    }

    .modal-header h3 {
        font-style: normal;
        font-weight: 900;
        line-height: 32px;
        font-size: 24px;
        color: #1C2940;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

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

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>