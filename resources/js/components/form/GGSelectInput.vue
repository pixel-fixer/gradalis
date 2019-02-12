<template>
    <div :class="size" class="column">
        <div class="field">
            <label class="label">{{label}}</label>
            <div class="control">
                <multiselect v-model="selectedValue"
                             :deselect-label="deselectLabel"
                             track-by="id"
                             @input="selectChange"
                             label="name"
                             :placeholder="placeholder"
                             :options="options"
                             :searchable="searchable"
                             :allow-empty="allowempty"
                             :selectLabel="selectLabel"
                             :selectedLabel="selectedLabel">
                    <span slot="noResult">{{noResult}}</span>
                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
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
            searchable:{default:false},
            allowempty:{default:false},
            size:{default:'is-3'},
            placeholder: {default: 'Выберите тип'},
            label: {default: 'Выберите тип'},
            options: {default: []},
            noResult: {default: 'Результатов не найдено'},
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
                    }else{
                        this.selectedValue = null;
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
