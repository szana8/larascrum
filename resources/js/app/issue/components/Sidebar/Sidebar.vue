<template>
	<div>
		<perfect-scrollbar class="scroll-area w-full mt-2" :settings="settings">
			<project v-for="project in projects" :key="project.id" :project="project" />
		</perfect-scrollbar>
	</div>
</template>

<script>
	import Project from './Cards/Project'

	import { EventBus } from '../../../../event-bus.js'
	import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

	export default {
		components: {
			Project,
			PerfectScrollbar
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

<style lang="scss" scoped>
	.scroll-area {
		height: 100vh;
	}
</style>
