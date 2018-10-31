<template>
    <div class="w-full flex">

		<div class="w-1/6">
			<projects></projects>
		</div>

		<div class="w-5/6 flex">

            <div class="w-1/4">

				<div class="ml-4">
					<issue-types></issue-types>
				</div>

			</div>

		</div>

	</div>
</template>

<script>
    import Projects from './Sidebar/Projects'
    import IssueTypes from './Lists/IssueTypes'

    export default {
        components: {
            Projects,
            IssueTypes
        }
    }
</script>
