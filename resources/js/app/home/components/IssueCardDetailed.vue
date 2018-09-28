<template>
	<div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 w-90 hover:bg-grey-lightest hover:shadow-lg cursor-pointer" v-bind:class="getBorderColor">
		<div class="flex">
			<img src="storage/avatars/3/avatar.png" class="w-8 h-8 hidden lg:block">
			<div class="lg:ml-4">
				<a href="#" class="no-underline text-blue uppercase font-semibold text-sm lg:text-normal" v-text="issue.slug"></a>
				<h5 class="text-grey-darkest text-xs lg:text-normal" v-text="issue.title"></h5>
			</div>
		</div>
		<div class="flex mt-4">
			<div class="text-grey-dark text-xs lg:text-sm">Type</div>
			<div class="ml-5">
				<img src="storage/icons/bug.png" class="w-3 h-3 lg:w-4 lg:h-4">
				<h5 class="inline-block text-grey-darkest text-xs lg:text-sm">Bug</h5>
			</div>
		</div>
		<div class="flex mt-2">
			<div class="text-grey-dark text-xs lg:text-sm">Due</div>
			<div class="ml-6">
				<h5 class="inline-block text-grey-darkest text-xs lg:text-sm">14-Feb-2018</h5>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['issue'],

		data() {
			return {

			}
		},

		methods: {
			getBorderColor(): {
				return 'border-' + this.issue.issueColor ? : 'purple';
			}
		}
	}
</script>
