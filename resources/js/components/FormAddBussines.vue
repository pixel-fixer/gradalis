<template>
    <div class="stepper">
        <!--<v-stepper ref="stepper" :steps="steps" v-model="step">-->
        <!--<template>-->
        <!--<template slot="step-1-index" slot-scope="scope">-->
        <!--<div class="step-index"><span v-tooltip="'Основная информация'">{{ scope.displayIndex }}</span></div>-->
        <!--</template>-->
        <!--<template slot="step-1"> step 1 title</template>-->
        <!--</template>-->
        <!--<template>-->
        <!--<template slot="step-2-index" slot-scope="scope">-->
        <!--<div class="step-index"> {{ scope.displayIndex }}</div>-->
        <!--</template>-->
        <!--<template slot="step-2"> step 2 title</template>-->
        <!--</template>-->
        <!--<template>-->
        <!--<template slot="step-3-index" slot-scope="scope">-->
        <!--<div class="step-index"> {{ scope.displayIndex }}</div>-->
        <!--</template>-->
        <!--<template slot="step-3"> step 2 title</template>-->
        <!--</template>-->


        <!--</v-stepper>-->


        <div class="stepper__nav is-hidden-mobile">
            <template v-for="(item, index) in steps">
                <div class="stepper__nav__item" :class="{ 'is-active' : item.active, 'is-ok' : item.success }">
                    <div class="stepper__nav__item__button" v-tooltip="item.title" @click="toggleStep(index)">
                        {{index}}
                    </div>
                    <div class="stepper__nav__item__title">{{item.title}}</div>
                </div>
            </template>
        </div>

        <div class="stepper__nav stepper__nav_mobile is-hidden-tablet">
                <div class="stepper__nav__item is-active">
                    <div class="stepper__nav__item__button">
                        {{step}}/8
                    </div>
                    <div class="stepper__nav__item__title">{{steps[step].title}}</div>
                </div>
        </div>

        <template v-if="step === 1">
            <div class="box">
                Step 1 Content
            </div>
        </template>
        <template v-if="step === 2">
            <div class="box">
                Step 2 Content
            </div>
        </template>
        <template v-if="step === 3">
            <div class="box">
                Step 3 Content
            </div>
        </template>
        <template v-if="step === 4">
            <div class="box">
                Step 4 Content
            </div>
        </template>
        <template v-if="step === 5">
            <div class="box">
                Step 5 Content
            </div>
        </template>
        <template v-if="step === 6">
            <div class="box">
                Step 6 Content
            </div>
        </template>
        <template v-if="step === 7">
            <div class="box">
                Step 7 Content
            </div>
        </template>
        <template v-if="step === 8">
            <div class="box">
                Step 8 Content
            </div>
        </template>

        <!-- Stepper Controls -->
        <!--<button type="button" @click="$refs.stepper.previous()">Previous</button>-->
        <!--<button type="button" @click="$refs.stepper.next()">Next</button>-->
        <!--<button type="button" @click="$refs.stepper.reset()">Reset</button>-->
    </div>
</template>

<script>
    import {VStepper} from 'vue-stepper-component'

    export default {
        name: "form-add-bussines",
        components: {
            VStepper
        },
        data() {
            return {
                // steps: 3,
                step: 1,
                steps: {
                    1: {
                        title: "Основная информация",
                        active: true,
                        success: false
                    },
                    2: {
                        title: "Финансовые показатели",
                        active: false,
                        success: false
                    },
                    3: {
                        title: "Недвижимость",
                        active: false,
                        success: false
                    },
                    4: {
                        title: "Бизнес-процессы",
                        active: false,
                        success: false
                    },
                    5: {
                        title: "Материальные активы",
                        active: false,
                        success: false
                    },
                    6: {
                        title: "Нематериальные активы",
                        active: false,
                        success: false
                    },
                    7: {
                        title: "Целевая аудитория",
                        active: false,
                        success: false
                    },
                    8: {
                        title: "Юридическое состояние",
                        active: false,
                        success: false
                    },
                }
            }
        },
        methods: {
            submit() {
                console.log('submit!');
            },
            toggleStep(index) {
                let vm = this;

                Object.keys(this.steps).forEach(function (item) {
                    // console.log(item); // key
                    // console.log(vm.steps[item]); // value
                    vm.steps[item].active = false;
                });

                // console.log(index);
                this.step = parseInt(index, 10);

                this.steps[index].active = true;
            },
        }
    }
</script>

<style scoped>

</style>
