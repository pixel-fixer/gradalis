<template>
    <div class="box">
        <form @submit.prevent="submit">
            <h3 class="mb-1">
                Изменение пароля
            </h3>
            <form-errors :errors="form.errors.errors"></form-errors>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label label_req"><span>Ваш старый пароль</span></label>
                        <div class="control">
                            <input id="password-old" type="password"
                                   class="input is-size-875" name="password-old"
                                   v-model="form.old_password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-6">
                    <div class="field">
                        <label class="label label_req"><span>Новый пароль</span></label>
                        <div class="control">
                            <input id="password-new" type="password"
                                   class="input is-size-875" name="password"
                                   v-model="form.password">
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label label_req"><span>Повторите пароль</span></label>
                        <div class="control">
                            <input id="password-new-repeat" type="password"
                                   class="input is-size-875" name="repeat"
                                   v-model="form.password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <div class="control">
                            <button type="submit"
                                    class="button is-info is-fullwidth has-text-weight-bold h-3">
                                Сохранить изменения пароля
                            </button>
                        </div>
                    </div>
                </div>
                <!-- <div class="column is-6">
                    <div class="field">
                        <div class="control">
                            <button class="button is-clear is-clear_close is-size-875 h-3" type="reset">
                                <span class="has-text-decoration-underline">Отменить изменения</span>
                            </button>
                        </div>
                    </div>
                </div> -->
            </div>
        </form>
    </div>
</template>

<script>
import { Form } from './../../form'
import FormErrors from './../form-errors'

export default {
    name: "form-settings-password",
    components: { FormErrors },
    data:() =>({
        form: new Form({
            old_password: '',
            password: '',
            password_confirmation: ''
        })
    }),
    methods: {
        submit() {
            this.form.post('/profile/password')
        }
    }
}
</script>