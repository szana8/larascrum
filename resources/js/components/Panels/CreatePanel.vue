<template>
    <div>
        <div class="fixed z-40 pin overflow-auto bg-smoke-dark flex" v-if="isActive"></div>
        <slide-y-up-transition :duration="500">
            <div class="fixed p-8 bg-white w-full max-w-xl mt-20 mx-auto my-auto pin-x flex-col flex rounded shadow z-50 h-204" v-if="isActive" v-click-outside="hide">

                <div class="flex justify-between">
                    <h3 class="text-3xl text-blue-darker">Create</h3>
                    <div class="text-right">
                        <a href="#" class="text-grey-light hover:text-grey-dark" @click="hide">
                            <img src="storage/icons/close.svg" width="20" height="20">
                        </a>
                    </div>
                </div>

                <div class="h-180">
                    <div class="flex justify-between flex-wrap mt-10 px-4" v-if="!nextStep">
                        <create-panel-card :key="panel.name" v-for="panel in panels" :name="panel.name" :image="panel.image" @selected="refresh" />
                    </div>

                    <div class="flex justify-between flex-wrap mt-10 px-4" v-if="nextStep == 'project'">
                        <label for="">Project Name</label>
                        <input type="text" class="text-xl rounded border border-grey" />
                    </div>

                </div>


                <div class="flex justify-end mt-0 px-4">
                    <button class="bg-white hover:bg-grey rounded text-grey-dark border border-grey px-3 py-2 font-semibold cursor-pointer mr-4" @click="setLastStep" v-if="nextStep">Previous</button>
                    <button class="bg-blue hover:bg-blue-dark rounded text-blue-lightest px-3 py-2 font-semibold cursor-pointer" @click="setNextStep">Next</button>
                </div>

            </div>
        </slide-y-up-transition>
    </div>
</template>

<script>
    import CreatePanelCard from './CreatePanelCard'

    import ClickOutside from 'vue-click-outside'
    import { EventBus } from '../../event-bus.js'
    import { SlideYUpTransition } from 'vue2-transitions'

    export default {
        components: {
            CreatePanelCard,
            SlideYUpTransition
        },

        data() {
            return {
                isActive: false,
                isChecked: null,
                nextStep: null,
                selected: null,
                panels: [
                    {
                        'name': 'project',
                        'image': 'storage/images/boy_pc_export.png'
                    },
                    {
                        'name': 'team',
                        'image': 'storage/images/team.png'
                    },
                    {
                        'name': 'issue',
                        'image': 'storage/images/issue.png'
                    },
                    {
                        'name': 'board',
                        'image': 'storage/images/board.jpg'
                    },
                    {
                        'name': 'report',
                        'image': 'storage/images/report.png'
                    },
                    {
                        'name': 'dashboard',
                        'image': 'storage/images/board.png'
                    },
                ]
            }
        },

        mounted() {
            EventBus.$on('openCreatePanel', this.open);
        },

        methods: {
            /** Open the create modal dialog window */
            open() {
                this.isActive = true;
            },

            /** Close the modal dialog window */
            hide() {
                this.isActive = false;
            },

            refresh(type) {
                this.selected = type;
            },

            setNextStep() {
                this.nextStep = this.selected;
            },

            setLastStep() {
                this.nextStep = null;
            }
        },

        directives: {
		    ClickOutside
		}
    }
</script>
