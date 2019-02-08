<template>
    <div class="modal modal-create-offer-link" id="modal-create-offer-link">
        <div class="modal-background" @click="$root.hideModal('modal-create-offer-link')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title mb-0">Создать ссылку</p>
                <button class="delete close-modal" @click="$root.hideModal('modal-create-offer-link')"
                        aria-label="close"></button>
            </header>
            <section class="modal-card-body">

                <div class="field">
                    <label class="label"><span>Оффер</span></label>
                    <div class="control">
                        <div class="field-control-offer-link is-flex">
                            <figure>
                                <img src="https://photo.hotellook.com/image_v2/crop/2272683466/1200/630.auto"
                                         alt="">
                            </figure>
                            <span class="is-size-875">Банк Хоум Кредит: Дебетовая карта Польза</span>
                            <div class="icons is-right">
                                 <span class="icon is-small" v-tooltip="'Go to offer'">
                                     <a href="#">
                                             <img src="/svg/icons/ic_details.svg" class="svg" alt="">
                                     </a>
                                  </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label
                        class="label"><span>{{form.title.title}}</span></label>
                    <div class="control">
                        <multiselect
                            v-model="form.title.selected"
                            :deselect-label="form.title.deselectLabel"
                            track-by="name"
                            label="name"
                            openDirection="bottom"
                            :placeholder="form.title.placeholder"
                            :options="form.title.options"
                            :searchable="true"
                            :allow-empty="false"
                            :selectLabel="form.title.selectLabel"
                            :selectedLabel="form.title.selectedLabel">
                            <template slot="singleLabel" slot-scope="{ option }">{{ option.name
                                }}
                            </template>
                        </multiselect>
                    </div>
                </div>

                <div class="field">
                    <label class="label"><span>Субаакаунт</span></label>
                    <div class="columns is-multiline list-wrap list-subaccount"
                         v-for="(item, index) in form.listSubAccount">
                        <div class="column">
                            <div class="field">
                                <div class="control has-icons-right has-icons-right_1">
                                    <input type="text"
                                           class="input is-size-875"
                                           v-model="form.listSubAccount[index].value"
                                           :placeholder="form.listSubAccount[index].placeholder"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="column is-narrow">
                            <button class="button is-warning is-outlined button-remove"
                                    v-tooltip="'Удалить'"
                                    @click="removeSubAccount()"
                            >
                                &times;<span class="is-size-875 is-hidden-tablet">Удалить</span>
                            </button>
                            <button class="button is-info is-outlined button-add"
                                    v-tooltip="'Добавить'"
                                    @click="addSubAccount">
                                +<span class="is-size-875 is-hidden-tablet">Добавить</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label"><span>{{form.targetLink.title}}</span></label>
                    <div class="control has-icons-right has-icons-right_1">
                        <input type="text"
                               class="input is-size-875"
                               v-model="form.targetLink.value"
                               :placeholder="form.targetLink.placeholder"
                        >
                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="form.targetLink.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label
                        class="label"><span>{{form.linkToOffer.title}}</span></label>
                    <div class="control has-icons-right has-icons-right_1">
                                <textarea class="textarea is-size-875" v-model="form.linkToOffer.value"
                                          :placeholder="form.linkToOffer.placeholder"></textarea>
                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="form.linkToOffer.tooltip">
                                    <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                  </span>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-info is-fullwidth h-3 is-size-875 has-text-weight-bold">Скопировать код
                </button>
            </footer>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';

    export default {
        name: "ModalCreateLink",
        components: {
            Multiselect
        },
        data() {
            return {
                form: {
                    linkToOffer: {
                        value: "",
                        title: "Ссылка на оффер",
                        placeholder: "Ссылка на оффер",
                        tooltip: "tooltip text"
                    },
                    targetLink: {
                        value: "",
                        title: "Целевая ссылка",
                        placeholder: "utm_code",
                        tooltip: "tooltip text"
                    },
                    title: {
                        selected: null,
                        title: 'Название',
                        placeholder: 'Выберите',
                        selectedLabel: '',
                        selectLabel: '',
                        deselectLabel: '',
                        options: [
                            {id: '1', name: 'Item 1'},
                            {id: '2', name: 'Item 2'},
                            {id: '3', name: 'Item 3'},
                            {id: '4', name: 'Item 4'},
                        ],
                        noResult: 'Ничего не найдено'
                    },
                    listSubAccount: [
                        {
                            value: "",
                            placeholder: "sub_account"
                        }
                    ]
                }
            }
        },
        methods: {
            addSubAccount() {
                // Добавление SubAccount
            },
            removeSubAccount(index) {
                // Удаление SubAccount
            },
        }
    }
</script>

<style scoped>

</style>
