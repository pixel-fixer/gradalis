<template>
    <section class="user-setting section pt-1 px-0">
        <div class="user-setting__header is-flex">
            <figure class="user-setting__avatar" ref='avatar'>
                <img v-if="user.avatar" :src="user.avatar" alt="">
            </figure>
            <div>
                <h2>{{user.full_name}}</h2>
                <div class="is-flex">
                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="resume" ref="avatar_input" @change="handleAvatarUpload($event)">
                            <div class="button is-outlined is-info is-size-875 has-text-weight-bold h-3">
                                <template v-if="user.avatar.length > 0">Загрузить новую фотографию профиля</template>
                                <template v-else>Загрузить фотографию профиля</template> 
                            </div>
                        </label>
                    </div>
                    <div class="help-desc is-size-875">
                        Оптимальный размер 160x160 пикселей, до 2 Мб.
                    </div>
                </div>
            </div>
        </div>
        <form-settings :user="user"></form-settings>
        <form-settings-password :user="user"></form-settings-password>
    </section>
</template>

<script>
import FormSettings from './../form-settings'
import FormSettingsPassword from './../form-settings-password'

export default {
    name: 'profile-settings',
    components: { FormSettings, FormSettingsPassword },
    props: ['user'],
    methods:{
        handleAvatarUpload($event){
            let formData = new FormData()
            formData.append('file', $event.target.files[0])
            axios.post('/profile/avatar', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                .then(res => {
                    this.$refs.avatar.querySelector('img').src = res.data.avatar;
                    this.$swal({ type: 'success', text: res.data.message });
                }).catch(e => {
                    this.$swal({ type: 'error', title: e.response.status, text: e.response.data.message });
                })
        }
    }
}
</script>
