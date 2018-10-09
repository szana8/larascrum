<template>
    <div class="mb-2">
        <div class="bg-white text-center py-4 flex cursor-pointer" :class="{ 'shadow hover:shadow-md': !isOpen }" @click="open(project.id)">
            <div class="text-center">
                <img :src="project.icon" class="w-10 h-10 ml-12 rounded-full">
			</div>
                <div class="text-left ml-4 flex items-stretch">
                    <div class="self-center">
                        <p class="text-grey-darkest mb-1 capitalize text-base font-semibold" v-text="project.name"></p>
                        <p class="text-blue-light uppercase text-xs font-semibold" v-text="project.slug"></p>
                    </div>
                </div>
            </div>
            <div class="mt-5 mb-4" v-if="isOpen">
                <div class="project-card">

                    <div class="ml-12">
                        <a class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue cursor-pointer" @click="isIssueOpen = !isIssueOpen">
							<img src="svg/align-left.svg" class="w-4 h-4 mr-4">
							Issues
						</a>
                    </div>

                    <div v-if="isIssueOpen" tag="div" @click="navigate('all')" class="py-2 text-sm text-grey-dark pl-24 flex project-card no-underline text-grey-dark cursor-pointer">
                        <div class="inline-block w-24">All</div>
                        <div class="inline-block" v-text="project.allIssuesInThisProjectCount"></div>
                    </div>

                    <div v-if="isIssueOpen" tag="div" class="py-2 text-sm text-grey-dark pl-24 flex project-card no-underline text-grey-dark cursor-pointer" @click="navigate('my')">
                        <div class="inline-block w-24">My</div>
                        <div class="inline-block" v-text="project.myIssuesInThisProjectCount"></div>
                    </div>

                </div>
                <div class="mt-4">
                    <div class="ml-12">
                        <div class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue cursor-pointer">
							<img src="svg/reports.png" class="w-4 h-4 mr-4">
							Reports
						</div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="ml-12">
                        <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/rocket.png" class="w-4 h-4 mr-4">
							Releases
						</a>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="ml-12">
                        <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/copy.png" class="w-4 h-4 mr-4">
							Components
						</a>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="ml-12">
                        <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/clock.png" class="w-4 h-4 mr-4">
							Timesheets
						</a>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="ml-12">
                        <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/signal.png" class="w-4 h-4 mr-4">
							Tests
						</a>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="ml-12">
                        <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/database.png" class="w-4 h-4 mr-4">
							Add-ons
						</a>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
import { EventBus } from '../../../../../event-bus.js'

export default {
    props: ['project'],

    data() {
        return {
            isOpen: false,
            isIssueOpen: false
        }
    },

    mounted() {
        EventBus.$on('closeEveryOpenProjectCard', this.close)
    },

    methods: {
        open(project_id) {
        	if (project_id == this.project.id && this.isOpen === true)
        		return this.close();

			EventBus.$emit('closeEveryOpenProjectCard');
            this.isOpen = true;
        },

        close() {
            this.isOpen = false;
        },

        navigate(type) {
            this.$router.replace({name: 'issues_with_project', params: {project: this.project.slug, type: type}})
            EventBus.$emit('refreshList');
        }
    }
}

</script>
<style scoped>
.slide-fade-enter-active {
    transition: all .3s ease;
}

.slide-fade-leave-active {
    transition: all .2s ease;
}

.slide-fade-enter {
    transform: translateY(-50px);
    opacity: 0;
}

.slide-fade-leave-to {
    transform: translateY(-50px);
    opacity: 0;
}
.project-card > .router-link-active {
  @apply bg-white border-r-4 border-blue rounded-r
}
</style>
