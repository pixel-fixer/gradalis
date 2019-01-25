<template>
    <div class="box">
        <form @submit.prevent="submit">
            <h3 class="mb-1">
                Изменение пароля
            </h3>
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label label_req"><span>Ваш старый пароль</span></label>
                        <div class="control">
                            <input id="password-old" type="password"
                                   class="input is-size-875" name="password-old"
                                   value=""
                                   placeholder="*******"
                            >
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
                                   value=""
                                   placeholder="*******"
                            >
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label label_req"><span>Повторите пароль</span></label>
                        <div class="control">
                            <input id="password-new-repeat" type="password"
                                   class="input is-size-875" name="repeat"
                                   value=""
                                   placeholder="*******"
                            >
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
                <div class="column is-6">
                    <div class="field">
                        <div class="control">
                            <button class="button is-clear is-clear_close is-size-875 h-3" type="reset">
                                <span class="has-text-decoration-underline">Отменить изменения</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "ExampleFormChangePassword",
        methods: {
            submit() {
                console.log('submit!');
            },
        }
    }
</script>

<style scoped>

</style>
