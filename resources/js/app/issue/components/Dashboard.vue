<template>
	<div class="flex">
		<div class="w-1/4">
			<quick-filters></quick-filters>

			<div class="ml-4">
				<search-list></search-list>
			</div>
		</div>

		<div class="w-3/4">
			<issue-details></issue-details>
		</div>

	</div>
</template>

<script>
	import QuickFilters from './QuickFilters';
	import SearchList from './SearchList'
	import IssueDetails from './IssueDetails'
	//import IssueRight from './IssueRight'

	export default {
		components: {
			SearchList: SearchList,
			QuickFilters: QuickFilters,
			IssueDetails: IssueDetails
			//IssueRight: IssueRight
		},

		data() {
			return {
				index: null
			}
		},

		mounted () {

		}
	}
</script>
