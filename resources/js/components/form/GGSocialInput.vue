<template>
    <div class="columns is-multiline">
        <div class="column is-12 pb-0">
            <h3>{{trans('business.create.socNetItems.title')}}</h3>
        </div>
        <g-g-select-input :size="'is-6'" v-model="form.saleGroupsSocNet"
                          :label="trans('business.create.saleGroupsSocNet.title')"
                          :placeholder="trans('business.create.saleGroupsSocNet.placeholder')"
                          :options="trans('business.create.yn.options')"></g-g-select-input>
        <template v-if="form.saleGroupsSocNet == 1">
            <g-g-select-input :allowempty="true" :multiple="true" :size="'is-6'" :type="'number'"
                              v-model="form.socNetList"
                              @select="addSocials"
                              @remove="removeSocials"
                              :label="trans('business.create.socNetList.title')"
                              :placeholder="trans('business.create.socNetList.placeholder')"
                              :options="options"></g-g-select-input>

            <template v-for="(item, index) in form.socNetItems">
                <div class="column is-12">
                    <div class="columns is-multiline">
                        <div class="column is-12 pb-0">
                            <h3>Группа в {{item.title}}</h3>
                        </div>
                        <g-g-input @input="inputChange" :size="'is-6'" v-model="item.link"
                                   :label="trans('business.create.socNetItems.link.title')"
                                   :placeholder="trans('business.create.socNetItems.link.placeholder')"></g-g-input>
                        <g-g-input @input="inputChange" :size="'is-6'" :type="'number'" v-model="item.countUsers"
                                   :label="trans('business.create.socNetItems.countUsers.title')"
                                   :placeholder="trans('business.create.socNetItems.countUsers.placeholder')"></g-g-input>
                        <g-g-select-input @input="inputChange" :size="'is-6'" :type="'number'" v-model="item.haveIncome"
                                          :label="trans('business.create.socNetItems.haveIncome.title')"
                                          :placeholder="trans('business.create.socNetItems.haveIncome.placeholder')"
                                          :options="trans('business.create.yn.options')"></g-g-select-input>

                        <g-g-input @input="inputChange" :prevText="'zt'" :type="'number'" v-model="item.incomeYear"
                                   :label="trans('business.create.socNetItems.incomeYear.title')"
                                   :placeholder="trans('business.create.socNetItems.incomeYear.placeholder')"></g-g-input>
                        <g-g-input @input="inputChange" :prevText="'zt'" :type="'number'" v-model="item.incomeQuarter"
                                   :label="trans('business.create.socNetItems.incomeQuarter.title')"
                                   :placeholder="trans('business.create.socNetItems.incomeQuarter.placeholder')"></g-g-input>
                        <g-g-input @input="inputChange" :prevText="'zt'" :type="'number'" v-model="item.turnoverYear"
                                   :label="trans('business.create.socNetItems.turnoverYear.title')"
                                   :placeholder="trans('business.create.socNetItems.turnoverYear.placeholder')"></g-g-input>
                        <g-g-input @input="inputChange" :prevText="'zt'" :type="'number'" v-model="item.turnoverQuarter"
                                   :label="trans('business.create.socNetItems.turnoverQuarter.title')"
                                   :placeholder="trans('business.create.socNetItems.turnoverQuarter.placeholder')"></g-g-input>
                        <g-g-input @input="inputChange" :prevText="'zt'" :type="'number'" v-model="item.expensesYear"
                                   :label="trans('business.create.socNetItems.expensesYear.title')"
                                   :placeholder="trans('business.create.socNetItems.expensesYear.placeholder')"></g-g-input>
                        <g-g-input @input="inputChange" :prevText="'zt'" :type="'number'" v-model="item.expensesQuarter"
                                   :label="trans('business.create.socNetItems.expensesQuarter.title')"
                                   :placeholder="trans('business.create.socNetItems.expensesQuarter.placeholder')"></g-g-input>

                        <g-g-select-input @input="inputChange" :size="'is-6'" :type="'number'" v-model="item.themes"
                                          :multiple="true"
                                          :label="trans('business.create.socNetItems.themes.title')"
                                          :placeholder="trans('business.create.socNetItems.themes.placeholder')"
                                          :options="trans('business.create.socNetItems.themes.options')"></g-g-select-input>
                        <g-g-select-input @input="inputChange" :size="'is-6'" :type="'number'" v-model="item.lang"
                                          :label="trans('business.create.socNetItems.lang.title')"
                                          :placeholder="trans('business.create.socNetItems.lang.placeholder')"
                                          :options="trans('business.create.socNetItems.lang.options')"></g-g-select-input>
                        <g-g-select-input @input="inputChange" :size="'is-6'" :type="'number'"
                                          v-model="item.methodTransferGroup"
                                          :multiple="true"
                                          :label="trans('business.create.socNetItems.methodTransferGroup.title')"
                                          :placeholder="trans('business.create.socNetItems.methodTransferGroup.placeholder')"
                                          :options="trans('business.create.socNetItems.methodTransferGroup.options')"></g-g-select-input>

                    </div>
                </div>
            </template>
        </template>
    </div>
</template>

<script>
    import GGInput from './GGInput'
    import GGSelectInput from './GGSelectInput'

    export default {
        name: "GGSocialInput",
        components: {GGInput, GGSelectInput},
        props: {
            value: {default: null},
            label: '',
            placeholder: {default: 'Поиск'}
        },
        data() {
            return {
                options: trans('business.create.socNetList.options'),
                form: {
                    saleGroupsSocNet: 2,
                    socNetList: null,
                    socNetItems: [{
                        title: null,
                        countUsers: null,
                        incomeYear: null,
                        incomeQuarter: null,
                        turnoverYear: null,
                        turnoverQuarter: null,
                        expensesYear: null,
                        expensesQuarter: null,
                        themes: null,
                        lang: null,
                        methodTransferGroup: null,

                    }],
                },
            }
        },

        watch: {
            value: {
                immediate: true,
                handler(value) {
                    if (value) {
                        this.form = value;
                    } else {
                        this.form = {
                            saleGroupsSocNet: 1,
                            socNetList: null,
                            socNetItems: {}
                        }
                    }
                }
            }
        },
        methods: {
            addSocials(value) {
                this.addItem(value.name, value.id);
            },
            removeSocials(value) {
                console.log(this.form.socNetItems);
                this.removeItem(value.id)
            },
            inputChange() {
                this.$emit('input', this.form);
            },
            addItem(title, id) {
                this.form.socNetItems[id] = {
                    title: title,
                    countUsers: null,
                    incomeYear: null,
                    incomeQuarter: null,
                    turnoverYear: null,
                    turnoverQuarter: null,
                    expensesYear: null,
                    expensesQuarter: null,
                    themes: null,
                    lang: null,
                    methodTransferGroup: null,

                };
            },
            removeItem(id){
                delete this.form.socNetItems[id];
            },
        }
    }
</script>

<style scoped>

</style>
