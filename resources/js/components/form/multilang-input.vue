<template>
     <div :class="size" class="column multilang-field">
        <label class="label" :class="{ 'label_req': required }">
            <span>{{label}}</span>
            <div class="input__lang-switch">
                <a href=""
                v-for="(lang,i) in this.inputValue"
                :class="[{'active': lang.lang == currentLang}, {'is-empty': lang.value == ''}]"
                @click.prevent="currentLang = lang.lang"
                >{{lang.lang}}</a>
            </div>
        </label>
        <div :class="{'has-addons':prevText}" class="field">

            <p v-if="prevText" class="control">
                <span class="button is-static is-size-875">
                   {{prevText}}
                </span>
            </p>
            <div :class="{'is-expanded':prevText,'has-icons-right has-icons-right_1':iconRight,'has-icons-left has-icons-left_1':iconLeft}"
                class="control">

                <div v-for="lang in inputValue">  
                    <input type="text"
                    class="input is-size-875"
                    v-model="lang.value"
                    v-show="lang.lang == currentLang"
                    @input="change">
                </div>
               
                <!-- <input :type="type"
                       class="input is-size-875"
                       v-model="inputValue"
                       @input="inputChange"
                       v-on:keydown="keyMonitor"
                       :required="required ? true: false"
                       :placeholder="placeholder"> -->

                <div v-if="iconLeft" class="icons is-left">
                  <span class="icon is-small">
                    <img :src="iconLeft" class="svg" alt="">
                  </span>
                </div>

                <div v-if="iconRight" class="icons is-right">
                  <span class="icon is-small" v-tooltip="tooltip">
                    <img :src="iconRight" class="svg" alt="">
                  </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'multilang-input',
    props: {
        type: {default: 'text'},
        iconLeft: {default: null},
        iconRight: {default: null},
        prevText: {default: null},
        size: {default: 'is-3'},
        tooltip: {default: null},
        value: '',
        label: '',
        placeholder: {default: ''},
        required: {default: false}
    },
    data() {
        return {
            inputValue: [],
            currentLang: this.$store.state.languages[0],
            languages: this.$store.state.languages
        }
    },
    mounted(){
        this.setValues()
    },
    methods:{
        setValues(){
            for(let v of this.languages){
                if(this.value.hasOwnProperty(v)){
                   this.inputValue.push({ lang: v, value: this.value[v] })
                }else{
                    this.inputValue.push({ lang: v, value: ''}) 
                }
            }
        },
        change(){         
            let formattedResult = this.inputValue.reduce(function(result, item, index, array) {
                result[item.lang] = item.value; 
                return result;
                }, {})
            this.$emit('input', formattedResult);
        }
    }
}   
</script>

<style>

</style>
