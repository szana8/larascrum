<template>
	<div>
		<perfect-scrollbar class="scroll-area w-full mt-2" :settings="settings">
			<project-card v-for="project in projects" :key="project.id" :project="project" />
		</perfect-scrollbar>
	</div>
</template>

<script>
	import { EventBus } from '../../event-bus.js'
	import ProjectCard from './Project/ProjectCard'
	import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

	export default {
		components: {
			ProjectCard: ProjectCard,
			PerfectScrollbar: PerfectScrollbar
		},

		data() {
			return {
				projects: null,
				isIssueOpen: false,
				settings: {
					maxScrollbarLength: 60
				}
			}
		},

		mounted() {
			this.getProjects();
		},

		methods: {


			/* Call the project API to get all of the relevant projects */
			getProjects() {
				axios.get('/api/projects').then((response) => {
					this.projects = response.data;
				}).catch((error) => {
					console.log(error);
				});
			}

		}
	}
</script>

<style lang="scss">
	.scroll-area {
		height: 100vh;
	}
</style>
