<template>
	<div class="w-full flex">

		<div class="w-1/6">
			<projects @selected="refreshList"></projects>
		</div>

		<div class="w-5/6 flex">

			<div class="w-1/4">
				<quick-filters @updated=""></quick-filters>

				<div class="ml-4">
					<filtered-issues :issues="issues.data"
						:is-more-result-exists="isMoreResultExists"
						@scrolled="loadMore">
					</filtered-issues>
				</div>

			</div>

			<div class="w-3/4">
				<issue-details></issue-details>
			</div>

		</div>

	</div>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'
	import { EventBus } from '../../../event-bus.js'

	import Projects from './Sidebar/Projects'
	import IssueDetails from './Details/Details'
	import QuickFilters from './Filters/QuickFilters'
	import FilteredIssues from './Lists/FilteredIssues'

	export default {
		components: {
			Projects,
			QuickFilters,
			IssueDetails,
			FilteredIssues,
		},

		data() {
			return {
				priority: null,
			}
		},

		computed: {
			// Map the Vuex getters
			...mapGetters({
				issues: 'issue/issues',
				selectedPriority: 'issue/selectedPriority'
			}),

			// Return a boolean value based on there is more result or not
			isMoreResultExists() {
				return this.issues.meta && this.issues.meta.pagination.current_page !== this.issues.meta.pagination.total_pages;
			}
		},

		mounted() {
			// Get the first group of the issues when the user load the page
			// or change the project
			this.fetchIssues({
				payload: {
					page: 1,
					by: this.$route.params.by,
					priority: this.priority,
					project: this.$route.params.project
				}
			});

			// Set the global event bus listeners
			EventBus.$on('refreshList', this.refreshList);

			// Set the quick filter and update the list, and load the first
			// element of the list to the details tab
			this.$store.subscribe(mutation => {
				if (mutation.type == 'issue/setSelectedPriority') {
					this.refreshList();
				}
			});
        },

        methods: {
			// Map Vuex axtions
			...mapActions({
				fetchIssues: 'issue/fetchIssues',
				loadIssuesNextPage: 'issue/loadIssuesNextPage'
			}),

			// Calculate the next page number based on the current page
			// and the total page number.
			calculatePage() {
				return this.issues.meta.pagination.current_page !== this.issues.meta.pagination.total_pages ? this.issues.meta.pagination.current_page + 1 : this.issues.meta.pagination.current_page;
			},

			// Load the next page of the issues and add to the issues object
			// for the infinite loop
			loadMore() {
				this.loadIssuesNextPage({
					payload: {
						page: this.calculatePage(),
						by: this.$route.params.by,
						priority: this.priority,
						project: this.$route.params.project
					}
				});
			},

			// Refresh the list of the issues based on the selected project
			// and project type
			refreshList() {
				this.$nextTick(() => {
					this.fetchIssues({
						payload: {
							page: 1,
							by: this.$route.params.by,
							priority: this.selectedPriority,
							project: this.$route.params.project
						}
					});
				});
			}
        }
	}
</script>
