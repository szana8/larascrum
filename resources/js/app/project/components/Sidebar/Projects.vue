<template>
	<div>
		<perfect-scrollbar class="scroll-area w-full mt-2" :settings="settings">
			<project v-for="project in projects" :key="project.id" :project="project" @selected="selected" />
		</perfect-scrollbar>
	</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'
	import { PerfectScrollbar } from 'vue2-perfect-scrollbar'
	import { EventBus } from '../../../../event-bus'

	import Project from './Project'

	export default {
		components: {
			Project,
			PerfectScrollbar
		},

		data() {
			return {
				settings: {
					maxScrollbarLength: 60
				}
			}
		},

		 computed: {
			 // Mat Vuex getters
			...mapGetters({
            	projects: 'project/projects'
			})
		},

		mounted() {
			/* Call the project API to get all of the relevant projects */
			this.fetchProjects();
			EventBus.$on('project-created', this.fetchProjects);
		},

		methods: {
			// Mat the Vuex actions
			...mapActions({
                fetchProjects: 'project/fetchProjects'
			}),

			// Fire a selected event when the user select a menu item
			// from the sidebar projects
			selected() {
				this.$emit('selected');
			}
		}
	}
</script>

<style lang="scss" scoped>
	.scroll-area {
		height: 100vh;
	}
</style>
