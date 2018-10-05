<template>
	<div class="flex overflow:hidden">

		<div class="w-2/3">

			<perfect-scrollbar class="scroll-area w-full mt-2 pr-4" :settings="settings">

				<div class="bg-white rounded">

					<div class="border-b border-grey-lighter">
						<div class="flex justify-between">
							<div>
								<a href="#" class="inline-block py-5 no-underline font-semibold text-sm text-blue px-8 border-b border-grey-lighter hover:border-b hover:border-blue">Edit</a>

								<a href="#" class="inline-block py-5 no-underline font-semibold text-sm text-blue px-8 border-b border-grey-lighter hover:border-b hover:border-blue">Assign</a>

								<a href="#" class="inline-block py-5 no-underline font-semibold text-sm text-blue px-8 border-b border-grey-lighter hover:border-b hover:border-blue">
									In Progress
								</a>

								<a href="#" class="inline-block py-5 no-underline font-semibold text-sm text-blue px-8 border-b border-grey-lighter hover:border-b hover:border-blue">More</a>
							</div>

							<div>
								<button class="mr-6 mt-4 bg-white border border-grey-light shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">Export</button>
							</div>
						</div>




					</div>

					<div class="px-8 py-8">

						<div class="flex">

							<img src="storage/images/logo.png" class="w-12 h-12">

							<div class="ml-8">

								<div class="flex">

									<a href="#" class="text-sm text-blue no-underline font-semibold hover:text-blue-light">Marketing</a>

									<span class="px-2 text-grey-dark">/</span>

									<a href="#" class="text-sm text-blue no-underline font-semibold uppercase hover:text-blue-light">MRKT-310</a>

								</div>

								<div>

									<h3 class="text-2xl font-semibold">Brand new Swag concept</h3>

								</div>

							</div>

						</div>

					</div>

					<div class="px-8 pb-6 leading-normal display-block" :class="[this.isMore ? 'h-auto' : 'h-32 overflow-hidden']">

						<p class="relative">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque id eros vel sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ornare rhoncus diam, tincidunt interdum diam auctor

								sit amet. Pellentesque dapibus, lacus ac gravida blandit, nisl ligula porta felis, gravida vulputate enim mi quis tortor. Mauris justo velit, scelerisque nec facilisis nec, dapibus a turpis. Aenean euismod lorem non faucibus interdum. Fusce sed

								justo vitae massa tincidunt mollis vitae in sapien. Cras ultricies quis metus sit amet pulvinar. Phasellus in egestas mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
							</p>


							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque id eros vel sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ornare rhoncus diam, tincidunt interdum diam auctor

								sit amet. Pellentesque dapibus, lacus ac gravida blandit, nisl ligula porta felis, gravida vulputate enim mi quis tortor. Mauris justo velit, scelerisque nec facilisis nec, dapibus a turpis. Aenean euismod lorem non faucibus interdum. Fusce sed

								justo vitae massa tincidunt mollis vitae in sapien. Cras ultricies quis metus sit amet pulvinar. Phasellus in egestas mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
							</p>

						</p>



					</div>

					<p class="text-center mt-8 border-t border-grey-lighter py-6" v-if="!isMore">
						<a href="#" class="text-blue no-underline text-sm font-semibold hover:text-blue-light"  @click="isMore = true">More</a>
					</p>

				</div>



				<div class="flex mt-4 mb-10">

					<button class="bg-blue-darkest text-sm text-white rounded-full py-1 w-24 mx-4">Comments</button>

					<button class="bg-white shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">Work Log</button>

					<button class="bg-white shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">History</button>

					<button class="bg-white shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">Activity</button>

				</div>





				<div class="mt-4">


					<comment-card></comment-card>


					<div class="h-32"></div>

				</div>

			</perfect-scrollbar>



		</div>



		<div class="w-1/3">

			<issue-attributes-panel></issue-attributes-panel>

		</div>

	</div>
</template>

<script>
	import IssueAttributesPanel from './IssueAttributesPanel'
	import CommentCard from './CommentCard'
	import StatusCard from './StatusCard'
	import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

	export default {

		components: {
			IssueAttributesPanel: IssueAttributesPanel,
			PerfectScrollbar: PerfectScrollbar,
			CommentCard: CommentCard,
			StatusCard: StatusCard
		},


		data() {
			return {
				settings: {
					maxScrollbarLength: 60
				},
				isMore: false
			}
		},

		methods: {
			showMore() {
				this.isMore = true;
			},

			moreClass() {
				if (this.isMore === true)
					return 'h-auto';

				return 'h-32';
			}
		}

	}
</script>

<style lang="scss">
	.scroll-area {

		height: 100vh;

	}
</style>
