<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label" :class="{ 'label_req': required }"><span>{{label}}</span></label>
            <div class="control">
                <multiselect v-model="selectedValue"
                             :deselect-label="deselectLabel"
                             track-by="id"
                             @input="selectChange"
                             label="name"
                             :class="{'multiselect_multiple':multiple,addClass}"
                             :multiple="multiple"
                             :placeholder="placeholder"
                             :options="options"
                             :searchable="searchable"
                             :close-on-select="closeOnSelect"
                             :allow-empty="allowempty"
                             :selectLabel="selectLabel"
                             :selectedLabel="selectedLabel">
                    <span slot="noResult">{{noResult}}</span>


                    <template v-if="!withImg" slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>

                    <template slot="singleLabel" slot-scope="props" v-if="withImg">
                        <img class="option__image" :src="props.option.img">
                        <span class="option__desc"><span class="option__title">{{ props.option.name }}</span></span>
                    </template>
                    <template slot="option" slot-scope="props" v-if="withImg">
                        <img class="option__image" :src="props.option.img">
                        <div class="option__desc"><span class="option__title">{{ props.option.name }}</span>
                        </div>
                    </template>

                </multiselect>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "GGSelectInput",
        components: {Multiselect},
        props: {
            value: null,
            searchable: {default: false},
            allowempty: {default: false},
            multiple: {default: false},
            size: {default: 'is-3'},
            placeholder: {default: 'Выберите тип'},
            label: {default: 'Выберите тип'},
            options: {default: []},
            noResult: {default: 'Результатов не найдено'},
            addClass: {default: ''},
            closeOnSelect: {default: true},
            required: {default: false},
            withImg: {default: false},
        },
        data() {
            return {
                selectedValue: null,
                selectedLabel: 'Выбрано',
                selectLabel: '',
                deselectLabel: '',
            }
        },

        methods: {
            selectChange() {
                this.$emit('input', this.selectedValue.id);
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    if (value !== null) {
                        for (const [key, val] of Object.entries(this.options)) {

                            if (val.id === this.value) {
                                this.selectedValue = val;
                            }
                        }
                    } else {
                        this.selectedValue = null;
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
