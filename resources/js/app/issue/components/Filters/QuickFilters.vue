<template>
	<div class="">
		<h4 class="text-grey-darkest p-4">Priority</h4>
		<div class="flex flex-wrap px-4 ml-4">
			<filter-button :name="filter.name" :active="activeFilter" :key="filter.name" v-for="filter in filters" @updated="setFilter"></filter-button>
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
				activeFilter: 'Blocker',
				filters: [
					{
						name: 'All'
					},
					{
						name: 'Blocker'
					},
					{
						name: 'Critical'
					},
					{
						name: 'Major'
					},
					{
						name: 'Minor'
					},
					{
						name: 'Trivial'
					},
				]
			}
		},

		computed: {

		},

		methods: {
			isFilterActive(filter) {
				return this.activeFilter === filter
			},

			setFilter(filter) {
				this.activeFilter = filter
			}
		}
	}
</script>
