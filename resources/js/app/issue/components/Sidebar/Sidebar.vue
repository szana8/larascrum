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
	import { mapActions, mapGetters } from 'vuex'

	export default {
		components: {
			Project,
			PerfectScrollbar
		},

		data() {
			return {
				isIssueOpen: false,
				settings: {
					maxScrollbarLength: 60
				}
			}
		},

		 computed: {
			...mapGetters({
            	projects: 'issue/projects'
			})
		},

		mounted() {
			/* Call the project API to get all of the relevant projects */
			this.fetch();
		},

		methods: {
			...mapActions({
                fetch: 'issue/fetchProjects'
			})
		}
	}
</script>

<style lang="scss" scoped>
	.scroll-area {
		height: 100vh;
	}
</style>
