<template>
	<div class="">
		<h4 class="text-grey-darkest p-4">Priority</h4>
		<div class="flex flex-wrap px-4 ml-4">
			<filter-button  v-for="filter in filters"
							:name="filter.name"
							:key="filter.name"
							:active="activeFilter"
							@updated="setFilter">
			</filter-button>
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
				activeFilter: 'All2',
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
