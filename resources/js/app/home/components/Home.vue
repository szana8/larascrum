<template>
	<div class="flex">
		<div class="w-1/4">
			<filters></filters>

			<div class="ml-4">
				<list></list>
			</div>
		</div>

		<div class="w-1/2">
			<issue-details></issue-details>
		</div>

		<div class="w-1/4">
			<issue-right></issue-right>
		</div>
	</div>
</template>

<script>
	import filters from './Filters';
	import list from './List'
	import IssueDetails from './IssueDetails'
	import IssueRight from './IssueRight'

	export default {
		components: {
			filters: filters,
			list: list,
			IssueDetails: IssueDetails,
			IssueRight: IssueRight
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
