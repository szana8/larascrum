<template>
	<div class="animated fadeIn fixed z-50 pin overflow-auto bg-smoke-dark flex" v-if="isActive">
		<div class="w-1/3 fixed h-screen bg-white broder-r border-grey-darker">
			<div class="p-12">
				<h4 class="uppercase text-grey text-sm">Recent issues</h4>
				<div class="mt-4">
					<li class="list-reset">
						<div class="flex">
							<img src="storage/avatars/3/avatar.png" class="w-8 h-8">
							<div class="text-sm text-blue-darker ml-2">
								<div>
									Design special onboarding experience
								</div>
								<div class="text-xs text-grey font-semibold">
									JPD-225
								</div>
							</div>
						</div>
					</li>
				</div>
			</div>
		</div>
	</div>

</template>

<script>

	export default {
		data() {
			return {
				isActive: false
			}
		}
	}
</script>
