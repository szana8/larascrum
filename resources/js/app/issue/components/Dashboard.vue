<template>
	<div class="w-full flex">

		<div class="w-1/6">
			<sidebar></sidebar>
		</div>

		<div class="w-5/6 flex">

			<div class="w-1/4">
				<quick-filters></quick-filters>
				<div class="ml-4">
					<filtered-issue-list :issues="issues" :is-more-result-exists="isMoreResult"></filtered-issue-list>
				</div>
			</div>

			<div class="w-3/4">
				<issue-details></issue-details>
			</div>

		</div>

	</div>
</template>

<script>
	import { mapActions } from 'vuex'
	import { EventBus } from '../../../event-bus.js'

	import Sidebar from './Sidebar/Sidebar'
	import IssueDetails from './Cards/Details'
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
				page: 1,
				lastPage: 1,
				issues: null
			}
		},

		computed: {
			isMoreResult() {
				return this.page !== this.lastPage
			}
		},

		mounted() {
			this.getIssues();

        	EventBus.$on('refreshList', this.getIssues)
        	EventBus.$on('loadMore', this.loadMore)
        },

        methods: {
			...mapActions({
                fetchIssues: 'issue/fetchIssues'
			}),

			// Get the first group of the issues when the user load the page
			// or change the project
            getIssues() {
				this.resetPages();

				this.$nextTick(() => {
					this.fetchIssues({
						payload: {
							project: this.$route.params.project,
							by: this.$route.params.by,
							page: this.page
						}
					}).then((response) => {
						this.lastPage = response.last_page
						this.issues = response.data
					})
				})
			},

			// Load the next page of the issues and add to the issues object
			// for the infinite loop
			loadMore() {
				if (this.page < this.lastPage) {
					this.page++;

					this.fetchIssues({
						payload: {
							project: this.$route.params.project,
							by: this.$route.params.by,
							page: this.page
						}
					}).then((response) => {
						this.issues = this.issues.concat(response.data)
					})

				}
			},

			// Reset the page metadata when the user change the project
			resetPages() {
				this.page = 1;
				this.lastPage = 1;
			},

        }
	}
</script>
