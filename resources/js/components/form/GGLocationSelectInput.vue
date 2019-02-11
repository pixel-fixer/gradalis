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
                    <template slot="singleLabel" slot-scope="{ option }">{{ option.name }}</template>
                </multiselect>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: "GGLocationSelectInput",
        components: {Multiselect},
        props: {
            value: null,
            searchable:{default:true},
            allowempty:{default:false},
            size:{default:'is-3'},
            type:{default:'country'},
            placeholder: {default: 'Выберите'},
            label: {default: 'Страна'},

        },
        data() {
            return {
                selectedValue: null,
                selectedLabel: 'Выбрано',
                selectLabel: '',
                deselectLabel: '',
                options:[]
            }
        },

        methods: {
            selectChange() {
                this.$emit('input', this.selectedValue.id);
            }
        },
        mounted() {
            let vm = this;
            if(this.type === 'country') {
                axios.get('/location-get-countries').then(responce => {
                    vm.options = responce.data;
                })
            }else if(this.type === 'city'){
                axios.get('/location-get-cities').then(responce => {
                    vm.options = responce.data;
                })
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
