<template>
    <div :class="size" class="column">
        <label class="label"><span>{{label}}</span>
            <a
                class="inline-block font-bold cursor-pointer mr-2 animate-text-color select-none border-primary"
                :class="{ 'text-60': localeKey !== currentLocale, 'text-primary border-b-2': localeKey === currentLocale }"
                :key="`a-${localeKey}`"
                v-for="(locale, localeKey) in locales.locales"
                v-if="locales.length > 1"
                @click="changeTab(localeKey)"
            >
                {{ locale }}
            </a>
        </label>
        <div class="field">

            <div
                class="control">

                <input v-if="type == 'text'"
                       type="text"
                       class="input is-size-875"
                       :id="label"
                       @input="inputChange"
                       :placeholder="placeholder"
                       v-model="inputValue[currentLocale]"
                       @keydown.tab="handleChange">

                <textarea v-if="type == 'textarea'" type="text"
                          class="textarea is-size-875"
                          v-model="inputValue[currentLocale]"
                          @input="inputChange"
                          :placeholder="placeholder"
                          @keydown.tab="handleChange">
                </textarea>

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            value: {default: null},
            label: '',
            size: {default: 'is-3'},
            type: {default: 'text'},
            placeholder: {default: 'Поиск'},
        },

        data() {
            return {
                inputValue: {},
                locales: window.locales,
                currentLocale: null,
                field: {
                    name: 'asdasd',
                },
            }
        },
        watch: {
            value: {
                immediate: true,
                handler(value) {
                    this.inputValue = value;
                }
            }
        },
        created() {
            this.currentLocale = this.locales.indexLocale || null;
            this.setInitialValue();
        },

        methods: {

            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                this.inputValue = this.value || {};
            },
            inputChange() {
                this.$emit('input', this.inputValue);
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.$emit('input', this.inputValue);
            },

            changeTab(locale) {
                this.$parent.$children.forEach(function (field) {
                    field.currentLocale = locale;
                    field.$nextTick(() => {
                        if (field.field && field.field.trix) {
                            field.$refs.field.update()
                        }
                    })
                })
            },

            handleTab(e) {
                const currentIndex = this.locales.indexOf(this.currentLocale);
                if (!e.shiftKey) {
                    if (currentIndex < this.locales.length - 1) {
                        e.preventDefault();
                        this.changeTab(this.locales[currentIndex + 1])
                    }
                } else {
                    if (currentIndex > 0) {
                        e.preventDefault();
                        this.changeTab(this.locales[currentIndex - 1])
                    }
                }
            }
        },
    }
</script>
<style>
    .animate-text-color {
        -webkit-transition: color .5s;
        transition: color .5s;
    }

    .select-none {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .text-primary {
        color: #4857CE;
        border-bottom: solid;
    }

    .mr-2 {
        margin-left: .5rem;
    }

    .text-60 {
        color: var(--60);
    }

    .font-black, .font-bold, .font-extrabold {
        font-weight: 800;
    }

    .inline-block {
        display: inline-block;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .border-b-2 {
        border-bottom-width: 2px;
    }

    .border-primary {
        border-color: #4857CE;
    }

    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }
</style>
