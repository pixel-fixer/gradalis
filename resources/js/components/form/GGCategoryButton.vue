<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label">{{label}}</label>
            <div class="control">
                <div :class="(selected === null)?'inputbox-val':''" class="input h-3"
                     @click="modalCategoryShow = !modalCategoryShow">{{selectedName}}
                    <!--Modal-->
                    <portal to="modals">
                        <div class="modal modal-select-category" :class="modalCategoryActive"
                             id="modal-select-categories">
                            <div class="modal-background" @click="modalCategoryShow = !modalCategoryShow"></div>
                            <div class="modal-card modal-card_big">
                                <header class="modal-card-head modal-card-head_bb">
                                    <p class="modal-card-title">{{trans('strings.select_category')}}</p>
                                    <button class="delete close-modal" @click="modalCategoryShow = !modalCategoryShow"
                                            aria-label="close"></button>
                                </header>
                                <section class="modal-card-body is-paddingless">
                                    <ul class="category-list">
                                        <li :class="(category.id === selected)?'is-active':''"
                                            @click="setCategory(category.id,category.translation.ru)"
                                            v-for="category in categories"
                                            class="category-list__item">
                                            <figure class="category-list__item__icon">
                                                <img src="/svg/icons/ic_info.svg" class="svg" alt="">
                                            </figure>
                                            <span>{{category.translation.ru}}</span>
                                        </li>
                                    </ul>
                                    <div v-if="subShow" class="subcategory-wrap">
                                        <div class="subcategory-header">
                                            <h3>{{trans('strings.select_sub_category')}}</h3>
                                            <div class="toggle-list">
                                                <span class="toggle-list__item">{{trans('strings.select_all')}}</span>
                                                <span class="toggle-list__item">{{trans('strings.drop')}}</span>
                                            </div>
                                        </div>
                                        <ul class="subcategory-list">
                                            <li :class="(category.id === selected)?'is-active':''"
                                                @click="setCategory(category.id,category.translation.ru)"
                                                v-for="category in subCategories"
                                                class="subcategory-list__item">
                                                <span>{{category.translation.ru}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                                <footer class="modal-card-foot">
                                    <button @click="save" class="button is-info save is-size-875 has-text-weight-bold">
                                        {{trans('strings.select')}}
                                    </button>
                                    <button @click="reset" class="button clear is-size-875"><img
                                        src="/svg/icons/ic_close.svg" alt=""
                                        class="svg"><span>{{trans('strings.drop')}}</span>
                                    </button>
                                </footer>
                            </div>
                        </div>
                    </portal>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GGCategoryButton",
        props: {
            size: {default: ' is-3'},
            value: null,
            label: {default: trans('business.category')},
        },
        data() {
            return {
                defaultName: trans('business.index.category'),
                selected: null,
                selectedName: trans('business.index.category'),
                modalCategoryShow: false,
                categories: [],
                subCategories: [],
                subShow: false
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    this.selected = value;
                }
            }
        },
        computed: {
            modalCategoryActive: function () {
                if (this.modalCategoryShow) {
                    return 'is-active';
                } else {
                    return '';
                }
            }
        },
        mounted() {
            let vm = this;
            axios.get('/business-get-categories').then(responce => {
                vm.categories = responce.data;
                if(this.value){
                    this.selected = this.value;
                    this.selectedName = vm.categories[this.selected].name;
                }
            })
        },
        methods: {
            setCategory(id, name) {
                this.selected = id;
                this.selectedName = name;
            },
            save() {
                this.modalCategoryShow = !this.modalCategoryShow;
                this.$emit('input', this.selected);
            },
            reset() {
                this.value = null;
                this.selected = null;
                this.selectedName = this.defaultName;
                this.save();
            }
        }
    }
</script>

<style scoped>

</style>
