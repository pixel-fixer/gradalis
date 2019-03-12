<template>

    <div class="field">
        <label class="label"><span>Фотографии бизнеса</span></label>
        <div class="dropzone-previews">

        </div>

        <vue-dropzone ref="dropzone" id="dropzone-photo-business" :options="dropzoneOptions"
                      :useCustomSlot=true
                      v-on:vdropzone-success="attachListener"
                      v-on:vdropzone-removed-file="removeFile"
                      v-on:vdropzone-upload-progress="uploadProgress"
        >
            <div class="dropzone-custom-content">
                <figure>
                    <img src="/svg/icons/ic_add_files.svg" alt="" class="svg">
                </figure>
                <div>
                    <div class="dropzone-custom-content__title">Загрузите фотографии</div>
                    <div class="dropzone-custom-content__subtitle">1000x1000 пикселей, до 8 Мб</div>
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
        props: {
            value: {default: null},
        },
        data: function () {
            return {
                images: [],
                initialized: false,
                dropzoneOptions: {
                    url: '/business-image-upload',
                    thumbnailWidth: 40,
                    maxFilesize: 8,
                    maxFiles: 10,
                    acceptedFiles: 'image/jpg,image/jpeg',
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                    },
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
                    <figure class="dz-image">
                            <img data-dz-thumbnail />
                            <div class="tooltip vue-tooltip-theme">
                                <div class="tooltip-arrow"></div>
                                <div class="tooltip-inner">Сделать обложкой</div>
                            </div>
                    </figure>
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
            attachListener: function (file, response) {
                this.images.push(response.image);
                this.$emit('input', this.images);
                file.previewElement.querySelector('.dz-image').addEventListener("click", function (e) {
                    // Логика установки картинки обложкой
                    console.log('click');
                    console.log(e);
                });

            },
            removeFile: function (file, error, xhr) {
                let name = '';
                if (file.xhr) {
                    let image = JSON.parse(file.xhr.response).image;
                    name = image;
                    this.images.indexOf(image);
                } else {
                    let image = this.images.indexOf(file.image);
                    name = file.image;
                    this.images.splice(image, 1);
                }
                axios.post('/business-image-remove/', {
                    image: name
                }).then(responce => {
                });

            },
            uploadProgress: function (file, progress, bytesSent) {
                var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
                progressElement.closest(".dz-progress-wrap").querySelector(".dz-progress-text").textContent = Math.round(progress) + "%";
            },
            getAllFiles() {
                return this.$refs['dropzone'].getQueuedFiles();
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    this.images = value;
                }

            },
            images: {
                //TODO: это место вызывает ошибку
                // immediate: true,
                // handler(value) {
                //     console.log(this.value);
                //     if (this.value.length > 0 && !this.initialized) {
                //         console.log(this.value);
                //         value.forEach(el => {
                //             var file = {size: el.size, name: el.name, type: el.type, image: el.image};
                //             var url = el.url;
                //             this.$refs.dropzone.manuallyAddFile(file, url);
                //         });
                //         this.initialized = true;
                //     }
                // }
            }
        }
    }
</script>


<style>

</style>