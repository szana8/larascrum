<template>
	<div class="w-full flex">
		<div class="w-1/6">
			<sidebar></sidebar>
		</div>
		<div class="w-5/6 flex">
			<div class="w-1/4">
				<quick-filters></quick-filters>
				<div class="ml-4">
					<filtered-issue-list></filtered-issue-list>
				</div>
			</div>
			<div class="w-3/4">
				<issue-details></issue-details>
			</div>
		</div>
	</div>
</template>

<script>
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
				index: null
			}
		}
	}
</script>
