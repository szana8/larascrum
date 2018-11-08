<template>
    <div>
        <!-- Smokey background -->

        <div class="fixed z-40 pin overflow-auto bg-smoke-dark flex" v-if="isActive"></div>
         <slide-x-left-transition :duration="500">
            <div class="w-1/3 fixed h-screen bg-white broder-r border-grey-darker z-50" v-if="isActive" v-click-outside="hide">
                <div class="p-12">
                    <div class="text-right">
                        <a href="#" class="text-grey hover:text-grey-darker" @click="hide">
                            <img src="storage/icons/close.svg" width="20" height="20">
                        </a>
                    </div>
                    <div class="border-b-2 border-grey-light mb-12 mt-12">
                    	<input type="text" name="search" class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2 leading-tight focus:outline-none text-2xl" placeholder="Search">
                    </div>
                    <h4 class="uppercase text-grey text-sm">Recent issues</h4>
                    <div class="mt-4">
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/avatars/3/avatar.png" class="w-10 h-10">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div>
                                        Design special onboarding experience
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        JPD-225
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/avatars/5/avatar.png" class="w-10 h-10">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div class="">
                                        As Customer Operation Support Team, we need to have a process to proactively resolve WF Issues
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        COBAIT-427
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <h4 class="uppercase text-grey text-sm mt-12">Recent projects</h4>
                    <div class="mt-4">
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/avatars/6/avatar.png" class="w-10 h-10">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div>
                                            Emerging Markets Shared Service Center
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        EMSSC
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/avatars/7/avatar.png" class="w-10 h-10">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div class="">
                                        IT Call Center
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        ITCC
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/avatars/9/avatar.png" class="w-10 h-10">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div class="">
                                       Account Data Management
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        ADM
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <h4 class="uppercase text-grey text-sm mt-12">Recent filters</h4>
                    <div class="mt-4">
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/icons/star.svg" class="w-10 h-10 p-1 bg-blue rounded">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div class="">
                                       My speciel, bothersome issues
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        in Josie Lambert's filter
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-reset my-4">
                            <div class="flex items-stretch">
                                <img src="storage/icons/star.svg" class="w-10 h-10 p-1 bg-blue rounded">
                                <div class="text-sm text-blue-darker ml-2 self-center">
                                    <div class="">
                                       Especially nasty chatbot bugs
                                    </div>
                                    <div class="text-xs text-grey font-semibold">
                                        in Gennie Castillo's filter
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
         </slide-x-left-transition>
    </div>
</template>
<script>
	import { EventBus } from '../../event-bus.js'
    import ClickOutside from 'vue-click-outside'
    import { SlideXLeftTransition } from 'vue2-transitions'

	export default {
        components: {
            SlideXLeftTransition
        },

	    name: 'SidebarSearchPanel',

	    data() {
	        return {
	            isActive: false
	        }
	    },

	    mounted() {
	        EventBus.$on('showProjectSearch', this.show)
	    },

	    methods: {
	        show() {
	            this.isActive = true
	        },

	        hide() {
	        	if (this.isActive === true)
	            	return this.isActive = false

	            return;
	        }
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
