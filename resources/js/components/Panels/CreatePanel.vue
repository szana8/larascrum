<template>
    <div>
        <div class="fixed z-40 pin overflow-auto bg-smoke-dark flex" v-if="isActive">
            <transition name="slide">
                <div class="relative p-8 bg-white w-full max-w-xl m-auto flex-col flex rounded shadow z-50" v-if="isActive" v-click-outside="hide">
                    <div class="flex justify-between">
                        <h3 class="text-3xl text-blue-darker">Create</h3>
                        <div class="text-right">
                            <a href="#" class="text-grey-light hover:text-grey-dark" @click="hide">
								<img src="storage/icons/close.svg" width="20" height="20">
							</a>
                        </div>
                    </div>
                    <div class="flex justify-between flex-wrap mt-12 px-4">

                        <create-panel-card :name="'project'" :image="'storage/images/boy_pc_export.png'" />
                        <create-panel-card :name="'team'" :image="'storage/images/team.png'" />
                        <create-panel-card :name="'issue'" :image="'storage/images/issue.png'" />
                        <create-panel-card :name="'board'" :image="'storage/images/board.jpg'" />
                        <create-panel-card :name="'report'" :image="'storage/images/report.png'" />
                        <create-panel-card :name="'dashboard'" :image="'storage/images/board.png'" />

                    </div>

                    <div class="flex justify-end mt-4 px-4">
                        <button class="bg-blue-dark hover:bg-blue-darker rounded text-blue-lightest px-3 py-2 font-semibold cursor-pointer">Next</button>
                    </div>

                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../../event-bus.js'
    import ClickOutside from 'vue-click-outside'
    import CreatePanelCard from './CreatePanelCard'

    export default {
        components: {
            CreatePanelCard
        },

        data() {
            return {
                isActive: false,
                isChecked: null
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

        },

        directives: {
		    ClickOutside
		}
    }
</script>

<style scoped>
.slide-leave-active,
.slide-enter-active {
    transition: 0.5s;
}

.slide-enter {
    transform: translate(-100%, 0);
}

.slide-leave-to {
    transform: translate(-100%, 0);
}

</style>
