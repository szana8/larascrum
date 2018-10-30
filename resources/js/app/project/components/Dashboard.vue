<template>
    <div class="w-full flex">

		<div class="w-1/6">
			<projects></projects>
		</div>

		<div class="w-5/6 flex">

			Project Details

		</div>

	</div>
</template>

<script>
    import Projects from './Sidebar/Projects'

    export default {
        components: {
            Projects
        }
    }
</script>
