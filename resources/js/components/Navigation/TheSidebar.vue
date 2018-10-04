<template>
	<div>
		<div class="py-6 border-b border-blue-darker text-center bg-blue-darker">
			<li class="list-reset text-white font-semibold">
				<img src="storage/images/logo.png" class="w-10 h-10 absolute -mt-2 -ml-12">
				European Demo Facility
				<a href="#" class="inline-block absolute ml-4 mt-1 text-blue-lighter hover:text-white" @click="openSearchProjectModal">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="14" height="14">
			    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" fill="currentcolor"/>
				</svg>
			</a>
			</li>

		</div>

		<div>
			<perfect-scrollbar class="scroll-area w-full mt-2" :settings="settings">
				<project-card v-for="project in projects" :key="project.id" :project="project" /></project-card>
			</perfect-scrollbar>
		</div>
	</div>
</template>

<script>
	import { EventBus } from '../../event-bus.js'
	import ProjectCard from './ProjectCard'
	import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

	export default {
		components: {
			ProjectCard: ProjectCard,
			PerfectScrollbar: PerfectScrollbar
		},

		data() {
			return {
				isIssueOpen: false,
				projects: null,
				settings: {
					maxScrollbarLength: 60
				}
			}
		},

		mounted() {
			axios.get('/api/projects').then((response) => {
				console.log(response)
				this.projects = response.data
			}).catch((error) => {
				console.log(error)
			})
		},

		methods: {
			openSearchProjectModal () {
            	EventBus.$emit('showProjectSearch');
            },

            calculateBorderColor(color_code) {
            	return 'border-' + color_code;
            }
		}
	}
</script>

<style lang="scss">
	.scroll-area {
		height: 100vh;
	}
</style>
