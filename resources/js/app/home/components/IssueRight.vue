<template>
	<div class="w-5/6 ml-8">
		<div class="text-center flex justify-center mt-4 text-grey-darkest border-b-2 border-grey pb-8">
			<div class="">
				<h4>3h 38m 14s</h4>
				<div class="flex mt-4 ml-2">
					<div class="w-4 h-4 bg-grey mt-2 mr-8"></div>
					<div class="w-4 h-4 border-l border-grey border-r mt-2"></div>
				</div>
			</div>
		</div>

		<div class="mt-8 border-b-2 border-grey pb-2">
			<h4 class="text-grey-darkest">Attachments</h4>
			<div class="bg-white border border-dashed border-grey py-12 mt-8 text-center font-semibold text-grey-dark">
				Drop files or <a href="#" class="no-underline text-blue hover:text-blue-light">browse</a>
			</div>

			<div class="mt-12">
				<div class="flex mb-4">
					<img src="storage/icons/file.png" class="w-8 h-8">
					<div class="ml-2 text-sm">
						<a href="#" class="text-blue no-underline font-semibold hover:text-blue-light">Specification.doc</a>
						<div class="text-grey">12.01.18</div>
					</div>
				</div>
				<div class="flex mb-4">
					<img src="storage/icons/image.png" class="w-8 h-8">
					<div class="ml-2 text-sm">
						<a href="#" class="text-blue no-underline font-semibold hover:text-blue-light">HodieConcept.png</a>
						<div class="text-grey">12.01.18</div>
					</div>
				</div>
			</div>

		</div>

		<div class="mt-4 border-b-2 border-grey pb-2">
			<h4 class="mb-8 text-grey-darkest">Details</h4>
			<div class="flex">
				<div class="text-grey-dark text-sm">Type</div>
				<div class="ml-12">
					<img src="storage/icons/improvement.png">
					<h5 class="inline-block text-grey-darkest">Improvements</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm">Priority</div>
				<div class="ml-8">
					<div class="mr-1 w-4 h-4 bg-orange rounded-full inline-block"></div>
					<h5 class="inline-block text-grey-darkest">Normal</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm">Labels</div>
				<div class="ml-10">
					<h5 class="inline-block text-grey-darkest">None</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm">Status</div>
				<div class="ml-10">
					<h5 class="inline-block text-grey-darkest">TO DO</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm">Resolution</div>
				<div class="ml-4">
					<h5 class="inline-block text-grey-darkest">Unresolved</h5>
				</div>
			</div>

		</div>

		<div class="mt-4">
			<h4 class="mb-8 text-grey-darkest">People</h4>
			<div class="flex my-5">
				<h4 class="text-grey font-normal text-sm">Assignee</h4>
				<div class="flex -mt-2">
					<img src="storage/avatars/3/avatar.png" class="w-8 h-8 mx-4">
					<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold hover:text-blue-light">Grace Parkinson</a>
				</div>
			</div>
			<div class="flex my-5">
				<h4 class="text-grey font-normal text-sm">Reporter</h4>
				<div class="flex -mt-2">
					<img src="storage/avatars/5/avatar.png" class="w-8 h-8 mx-4">
					<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold hover:text-blue-light">Bill Zuchmenn</a>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
	export default {

	}
</script>
