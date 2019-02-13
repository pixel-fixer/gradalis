<template>
    <div :class="size" class="column">
        <div class="field">
            <label
                class="label label_req"><span>{{label}}</span></label>
            <div class="field has-addons ">
                <p :class="{'is-expanded': size === 'is-6'}" class="control control-text-left control-text-left_3em">
                    <input type="number" class="input is-size-875"
                           v-model="from">
                    <span class="text is-left is-size-875">{{textFrom}}&nbsp;</span>
                </p>
                <p :class="{'is-expanded': size === 'is-6'}" class="control control-text-left control-text-left_3em">
                    <input type="number" class="input is-size-875"
                           v-model="to">
                    <span class="text is-left is-size-875">{{textTo}} </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "GGFromToInput",
        props: {
            textFrom:{default:'от'},
            textTo:{default:'до'},
            size: {default: 'is-3'},
            tooltip: {default: null},
            from: null,
            to: null,
            label: '',
        },
        data() {
            return {
                inputValue: [0, 0]
            }
        },
        watch: {
            from: {
                immediate: true,
                handler(value) {
                    this.inputValue[0] = value;
                }
            },
            to: {
                immediate: true,
                handler(value) {
                    this.inputValue[0] = value;
                }
            }
        },
        methods: {
            keyMonitor(event) {
                if (event.keyCode == 69 || event.keyCode == 189 || event.keyCode == 188 || event.keyCode == 190 || event.keyCode == 187)
                    event.preventDefault();
            },

            inputChange() {
                this.$emit('input', this.inputValue);
            }
        }
    }
</script>

<style scoped>

</style>
