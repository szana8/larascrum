<template>
	<div class="w-full">
		<div class="p-8">
			<h2 class="text-blue-darker">My overview</h2>

			<div class="flex mt-12">
				<div class="w-1/3 m-2 bg-white rounded border-t-2 border-orange shadow p-4">
					<h4 class="text-xl text-blue-darker">Assigned to me</h4>
					<table class="w-full mt-6 text-sm">
						<tr class="h-10">
							<td class="w1/4"></td>
							<td class="w-1/4 text-center font-semibold text-grey">NEXT-849</td>
							<td class="w-2/4 text-blue-darker">Design: opt-in ADG3 nav experience</td>
						</tr>
						<tr class="h-10">
							<td class="w1/4"></td>
							<td class="w-1/4 text-center font-semibold text-grey uppercase">JR-2725</td>
							<td class="w-2/4 text-blue-darker">Move "Import issues from CSV" to GIN meatballs </td>
						</tr>
						<tr class="h-10">
							<td class="w1/4"></td>
							<td class="w-1/4 text-center font-semibold text-grey">JDP-275</td>
							<td class="w-2/4 text-blue-darker">Investigate ways to estabilished hierarchy between issue types</td>
						</tr>
						<tr class="h-10">
							<td class="w1/4"></td>
							<td class="w-1/4 text-center font-semibold text-grey">APP-235</td>
							<td class="w-2/4 text-blue-darker">Replace Qunit with APTR</td>
						</tr>
					</table>
				</div>

				<div class="flex w-1/3 m-2 h-32 bg-white rounded border-t-2 border-blue shadow p-4">
					<h4 class="text-xl text-blue-darker">Saved filters</h4>
				</div>

				<div class="flex w-1/3 m-2 h-32 bg-white rounded border-t-2 border-green shadow p-4">
					<h4 class="text-xl text-blue-darker">Filter Statistics</h4>
				</div>
			</div>

		</div>
	</div>
</template>

<script>
	export default {
		//
	}
</script>
