<template>
	<div class="w-full flex">

		<div class="w-1/6">
			<sidebar></sidebar>
		</div>

		<div class="w-5/6 flex">

			<div class="w-1/4">
				<quick-filters @updated="updateQuickFilter"></quick-filters>

				<div class="ml-4">
					<filtered-issue-list :issues="issues.data" :is-more-result-exists="isMoreResult"></filtered-issue-list>
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

	import Sidebar from './Sidebar/Sidebar'
	import IssueDetails from './Details/Details'
	import QuickFilters from './Filters/QuickFilters'
	import FilteredIssueList from './Lists/FilteredIssueList'

	export default {
		components: {
			Sidebar,
			QuickFilters,
			IssueDetails,
			FilteredIssueList,
		},

		data() {
			return {
				issueId: null,
				quickFilter: null,
			}
		},

		computed: {
			...mapGetters({
				issues: 'issue/issues'
			}),

			isMoreResult() {
				if(! this.issues.meta)
					return true

				return this.issues.meta.pagination.current_page !== this.issues.meta.pagination.total_pages
			}
		},

		mounted() {
			this.getIssues();

			// Set the event listeners for global events.
        	EventBus.$on('loadMore', this.loadMore)
        	EventBus.$on('refreshList', this.getIssues)
        },

        methods: {
			...mapActions({
				fetchIssues: 'issue/fetchIssues',
				loadIssuesNextPage: 'issue/loadIssuesNextPage'
			}),

			calculatePage() {
				return this.issues.meta.pagination.current_page !== this.issues.meta.pagination.total_pages ? this.issues.meta.pagination.current_page++ : this.issues.meta.pagination.current_page;
			},

			// Get the first group of the issues when the user load the page
			// or change the project
            getIssues() {
				this.$nextTick(() => {
					this.fetchIssues({
						payload: {
							project: this.$route.params.project,
							by: this.$route.params.by,
							priority: this.quickFilter,
							page: 1
						}
					}).then(() => {
						if (this.issues.data[0])
							EventBus.$emit('issueSelected', this.issues.data[0].id);
					})
				})
			},

			// Load the next page of the issues and add to the issues object
			// for the infinite loop
			loadMore() {
				this.loadIssuesNextPage({
					payload: {
						project: this.$route.params.project,
						by: this.$route.params.by,
						priority: this.quickFilter,
						page:this.calculatePage()
					}
				});
			},

			// Set the quick filter and update the list, and load the first
			// element of the list to the details tab
			updateQuickFilter(filter) {
				this.quickFilter = filter

				this.fetchIssues({
					payload: {
						project: this.$route.params.project,
						by: this.$route.params.by,
						priority: this.quickFilter,
						page: 1
					}
				}).then(() => {
					if (this.issues.data[0])
						EventBus.$emit('issueSelected', this.issues.data[0].id);
				})
			}
        }
	}
</script>
