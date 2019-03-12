<template>

    <div class="field">
        <label class="label label_req"><span>Фотографии и документы</span></label>
        <div class="dropzone-previews">

        </div>

        <vue-dropzone ref="dropzone" id="dropzone" :options="dropzoneOptions" :useCustomSlot=true
                      v-on:vdropzone-upload-progress="uploadProgress"
        >
            <div class="dropzone-custom-content">
                <figure>
                    <img src="/svg/icons/ic_add_files.svg" alt="" class="svg">
                </figure>
                <div>
                    <div class="dropzone-custom-content__title">Загрузите материалы</div>
                    <div class="dropzone-custom-content__subtitle">1000x1000 пикселей, JPG, PNG, PDF, до 8 Мб</div>
                </div>
            </div>
        </vue-dropzone>

    </div>

</template>


<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone
        },
        data: function () {
            return {
                dropzoneOptions: {
                    url: 'https://httpbin.org/post',
                    thumbnailWidth: 40,
                    maxFilesize: 8,
                    headers: {"My-Awesome-Header": "header value"},
                    previewTemplate: this.template(),
                    previewsContainer: ".dropzone-previews",
                    addRemoveLinks: false,
                    autoProcessQueue: false,
                    dictCancelUploadConfirmation: "Вы уверены, что хотите отменить загрузку?"
                },
            }
        },
        methods: {
            template: function () {
                return `
                <div class="dropzone-previews-item dz-preview dz-file-preview">
                    <div class="dz-preview__info">
                        <div class="dz-filename"><span data-dz-name></span></div>

                          <div class="dz-details">
                            <div class="dz-progress-wrap">
                                <span class="dz-progress-text"></span>
                                <div class="dz-progress">
                                    <span class="dz-upload" data-dz-uploadprogress></span>
                                </div>
                            </div>
                            <div class="dz-size"><span data-dz-size=""></span></div>
                            <div class="dz-error-message"><span class="has-text-danger" data-dz-errormessage=""></span></div>
                        </div>

                    </div>
                    <div class="dz-buttons">
                        <button class="button is-clear is-clear_close is-size-875 dz-delete-file" data-dz-remove><span
                            class="icon-close">×</span><span class="has-text-decoration-underline">Удалить</span>
                        </button>
                    </div>
                </div>`;
            },
            uploadProgress: function (file, progress, bytesSent) {
                var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
                progressElement.closest(".dz-progress-wrap").querySelector(".dz-progress-text").textContent = Math.round(progress) + "%";
            },
            getAllFiles() {
                return this.$refs['dropzone'].getQueuedFiles();
            }
        }
    }
</script>


<style>

</style>
