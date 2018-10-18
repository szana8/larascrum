<template>
	<div>
		<div class="flex overflow:hidden" v-if="this.issue && !this.loading">
			<div class="w-2/3">
				<perfect-scrollbar @ps-scroll-y="fireScrollEvent" class="scroll-area w-full mt-2 pr-4" :settings="settings">
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
										<a href="#" class="text-sm text-blue no-underline font-semibold hover:text-blue-light">{{ this.issue.project.name }}</a>
										<span class="px-2 text-grey-dark">/</span>
										<a href="#" class="text-sm text-blue no-underline font-semibold uppercase hover:text-blue-light">{{ this.issue.project.slug }}-{{ this.issue.id }}</a>
									</div>

									<div>
										<h3 class="text-2xl font-semibold">
											{{ this.issue.title }}
										</h3>
									</div>
								</div>
							</div>
						</div>

						<div class="px-8 pb-6 leading-normal display-block">

							<div class="relative">
								<p>
									{{ this.issue.body }}
								</p>
							</div>

						</div>

						<div class="mt-4 px-8">
							<p class="py-6 border-t border-grey-lighter text-grey text-sm">
								{{ this.issue.replies.length }} replies
							</p>
						</div>

						<!-- <p class="text-center mt-8 border-t border-grey-lighter py-6" v-if="!showMore">
							<a href="#" class="text-blue no-underline text-sm font-semibold hover:text-blue-light" @click="showMore = true">More</a>
						</p> -->

					</div>

					<div class="flex justify-between mt-4 mb-10">

						<div class="flex">
							<button class="focus:outline-none bg-blue-darkest text-sm text-white rounded-full py-1 w-24 mx-4">Comments</button>

							<button class="focus:outline-none bg-white shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">Work Log</button>

							<button class="focus:outline-none bg-white shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">History</button>

							<button class="focus:outline-none bg-white shadow text-grey-darkest text-sm rounded-full py-1 w-24 hover:bg-blue hover:text-white mx-4">Activity</button>
						</div>


						<div class="">
							<button id="js-issue-reply-button" class="focus:outline-none bg-blue shadow text-white text-sm rounded-full py-1 w-24 hover:bg-blue-dark hover:text-white mx-4 font-semibold tracking-wide" @click="openReply">
								 <svg version="1.1" viewBox="0 0 384 384" class="w-3 h-3 text-white" style="enable-background:new 0 0 384 384;" xml:space="preserve">
									<path d="M149.333,117.333V32L0,181.333l149.333,149.333V243.2C256,243.2,330.667,277.333,384,352
										C362.667,245.333,298.667,138.667,149.333,117.333z" fill="currentColor" />
								</svg>
								Reply
							</button>
						</div>

					</div>

					<div class="mt-4">
						<comments :issue="this.issue"></comments>
						<div class="h-32"></div>
					</div>
				</perfect-scrollbar>
			</div>

			<div class="w-1/3">
				<attributes :issue="this.issue"></attributes>
			</div>
		</div>
		<div v-else>
			<p class="text-center mt-4">Loading...</p>
		</div>
	</div>

</template>

<script>
	import Attributes from './Attributes'
	import Comments from '../Comments/Comments'

	import { EventBus } from '../../../../event-bus.js'

	export default {

		components: {
			Comments,
			Attributes
		},

		props: ['issueId'],

		data() {
			return {
				settings: {
					maxScrollbarLength: 60
				},
				issue: null,
				loading: true,
				showMore: false,
			}
		},

		computed: {
			// Show more details,
			showMoreClass() {
				return this.showMore === true ? 'h-auto' : 'h-32 overflow-hidden'
			}
		},

		mounted() {
			EventBus.$on('issueSelected', this.loadDetails);
		},

		methods: {
			// Load the issue details based on the issue id
			loadDetails(id) {
				this.loading = true

				axios.get('api/issues/' + id).then((response) => {
					this.issue = response.data
					this.loading = false
				})
			},

			// Open the reply form
			openReply() {
				EventBus.$emit('openReply', this.issue.id, this.issue.title);
			},

			// Fire a scroll event to show/hide the floating action button
			fireScrollEvent() {
				EventBus.$emit('scrollIssue');
			}

		}

	}
</script>

<style lang="scss" scoped>
	.scroll-area {
		height: 100vh;
	}
</style>
