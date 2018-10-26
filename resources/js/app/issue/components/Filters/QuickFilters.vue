<template>
	<div class="">
		<h4 class="text-grey-darkest p-4">Priority</h4>
		<div class="flex flex-wrap px-4 ml-4">
			<filter-button  v-for="filter in filters" :filter="filter" :key="filter.id"></filter-button>
		</div>
	</div>
</template>

<script>
	import FilterButton from './FilterButton'

	export default {
		components: {
			FilterButton
		},

		data() {
			return {
				filters: [
					{
						name: 'All',
						id: 0
					},
					{
						name: 'Blocker',
						id: 1
					},
					{
						name: 'Critical',
						id: 2
					},
					{
						name: 'Major',
						id: 3
					},
					{
						name: 'Minor',
						id: 4
					},
					{
						name: 'Trivial',
						id: 5
					},
				]
			}
		},

		methods: {
			//
		}
	}
</script>
