<template>
    <div :class="{'is-active':modal}" class="modal modal-create-offer-link" id="modal-create-offer-link">
        <div class="modal-background" @click="$root.hideModal('modal-create-offer-link')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title mb-0">Создать ссылку</p>
                <button class="delete close-modal" @click="close"
                        aria-label="close"></button>
            </header>
            <section class="modal-card-body">

                <div class="field">
                    <label class="label"><span>Оффер</span></label>
                    <div class="control">
                        <div class="field-control-offer-link is-flex">
                            <!--<figure>-->
                            <!--<img src="https://photo.hotellook.com/image_v2/crop/2272683466/1200/630.auto"-->
                            <!--alt="">-->
                            <!--</figure>-->
                            <span class="is-size-875">{{offer.name.ru}}</span>
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
                <g-g-select-input v-model="name" :size="'is-12'"
                                  :placeholder="title.placeholder"
                                  @input="updateInvitation"
                                  :label="title.title" :searchable="true"
                                  :options="nameOptions"></g-g-select-input>
                <div class="field">
                    <label class="label"><span>Субаакаунт</span></label>
                    <div class="columns is-multiline list-wrap list-subaccount"
                         v-for="(item, index) in listSubAccount">
                        <div class="column">
                            <div class="field">
                                <div class="control has-icons-right has-icons-right_1">
                                    <input type="text"
                                           class="input is-size-875"
                                           @input="updateInvitation"
                                           v-model="item.value"
                                           :placeholder="subAccountPlaceHolder"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="column is-narrow">
                            <button class="button is-warning is-outlined button-remove"
                                    v-tooltip="'Удалить'"
                                    @click="removeSubAccount(index)"
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
                    <label
                        class="label"><span>{{linkToOffer.title}}</span></label>
                    <div class="control has-icons-right has-icons-right_1">
                                <textarea class="textarea is-size-875" v-model="linkToOffer.value"
                                          :placeholder="linkToOffer.placeholder"></textarea>
                        <div class="icons is-right">
                                  <span class="icon is-small" v-tooltip="linkToOffer.tooltip">
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
    import GGSelectInput from '../../form/GGSelectInput'
    export default {
        props: {
            value: {default: false},
            offer: {default: null},
            nameId: {default: null},
        },
        name: "ModalCreateLink",
        components: {
            GGSelectInput,
        },
        data() {
            return {
                modal: false,
                country: null,
                invitation: null,
                created: false,
                linkToOffer: {
                    value: "",
                    title: "Ссылка на оффер",
                    placeholder: "Ссылка на оффер",
                    tooltip: "tooltip text"
                },
                name: null,
                nameOptions: [],
                title: {
                    title: 'Название',
                    placeholder: 'Выберите',
                },
                subAccount: [],
                listSubAccount: [{
                    value: ''
                }],
                subAccountPlaceHolder: "sub_account"
            }
        },
        methods: {

            addSubAccount() {
                this.listSubAccount.push(
                    {
                        value: ""
                    }
                )
            },
            close() {
                this.modal = false;
                this.$emit('input', this.modal);
            },
            removeSubAccount(index) {
                this.listSubAccount.splice(index, 1);
            },
            updateInvitation() {
                let vm = this;
                if (!vm.created) {
                    axios.post('/invitation-create', {
                        campaign_id: vm.offer.id,
                        resource_id: vm.name,
                    }).then(responce => {
                        vm.invitation = responce.data;
                        vm.linkToOffer.value = 'http://ref.' + domain + '/invitation/' + vm.invitation.token
                        vm.created = true;
                    });
                } else {
                    axios.post('/invitation-create', {
                        id: vm.invitation.id,
                        resource_id: vm.name,
                        sub_account: vm.listSubAccount,
                    });
                }
            },
        },
        mounted() {

            for (let index in this.offer.resources) {

                let resource = this.offer.resources[index]
                this.nameOptions.push({
                    'id': resource.id,
                    'name': resource.name.ru + '-' + resource.type + '-' + resource.resource_type
                });
                if (this.nameId) {
                    this.name = this.nameId;
                }
            }
            if (this.nameId) {
                this.name = this.nameId
            }
            this.updateInvitation();
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    this.modal = value;
                }
            },
            nameId: {
                handler(value) {
                    this.name = value;
                }
            },
        }
    }
</script>

<style scoped>

</style>
