<template>
	<div>
		<div class="py-6 border-b border-blue-darker text-center bg-blue-darker">
			<li class="list-reset text-white font-semibold">
				<img src="storage/images/logo.png" class="w-10 h-10 absolute -mt-2 -ml-12">
				European Demo Facility
				<a href="#" class="inline-block absolute ml-4 mt-1 text-blue-lighter hover:text-white" @click="openSearchProjectModal">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="14" height="14">
			    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" fill="currentcolor"/>
				</svg>
			</a>
			</li>

		</div>

		<div>
			<div class="bg-white text-center py-4 flex">
				<div class="text-center">
					<img src="svg/flask.svg" class="w-10 h-10 ml-12 border rounded-full border-grey-darkest">
				</div>
				<div class="text-left ml-4">
					<h4 class="text-grey-darkest mb-1">Marketing</h4>
					<h5 class="text-blue uppercase">mkrt</h5>
				</div>
				<div></div>
			</div>
			<div class="mt-10">
				<div class="">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue" @click="isIssueOpen = !isIssueOpen">
							<img src="svg/align-left.svg" class="w-4 h-4 mr-4">
							Issues
						</a>
					</div>
					<div class="py-2 bg-white list-reset text-sm text-grey-dark pl-24 mt-2 flex border-r-4 border-blue rounded-r" v-if="isIssueOpen">
						<a href="#" class="no-underline text-grey-dark">
							<div class="inline-block w-24">All</div>
							<div class="inline-block">74</div>
						</a>
					</div>
					<div class="py-2 list-reset text-sm text-grey-dark pl-24 flex" v-if="isIssueOpen">
						<a href="#" class="no-underline text-grey-dark">
							<div class="inline-block w-24">My</div>
							<div class="inline-block">12</div>
						</a>
					</div>
				</div>

				<div class="mt-4">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/reports.png" class="w-4 h-4 mr-4">
							Reports
						</a>
					</div>
				</div>

				<div class="mt-4">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/rocket.png" class="w-4 h-4 mr-4">
							Releases
						</a>
					</div>
				</div>

				<div class="mt-4">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/copy.png" class="w-4 h-4 mr-4">
							Components
						</a>
					</div>
				</div>

				<div class="mt-4">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/clock.png" class="w-4 h-4 mr-4">
							Timesheets
						</a>
					</div>
				</div>

				<div class="mt-4">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/signal.png" class="w-4 h-4 mr-4">
							Tests
						</a>
					</div>
				</div>

				<div class="mt-4">
					<div class="ml-12">
						<a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
							<img src="svg/database.png" class="w-4 h-4 mr-4">
							Add-ons
						</a>
					</div>
				</div>

			</div>

			<div class="bg-white my-2 text-center py-4 flex mt-10 shadow hover:shadow-md cursor-pointer">
				<div class="text-center">
					<img src="svg/two-tubes.svg" class="w-10 h-10 ml-12 border rounded-full border-grey-darkest">
				</div>
				<div class="text-left ml-4">
					<h4 class="text-grey-darkest mb-1">Sales Marketing</h4>
					<h5 class="text-blue uppercase">slsmkt</h5>
				</div>
				<div></div>
			</div>

			<div class="bg-white my-2 text-center py-4 flex shadow hover:shadow-md cursor-pointer">
				<div class="text-center">
					<img src="svg/creative.png" class="w-10 h-10 ml-12 rounded-full bg-blue">
				</div>
				<div class="text-left ml-4">
					<h4 class="text-grey-darkest mb-1">Marketing Aerodefense</h4>
					<h5 class="text-blue uppercase">Mrdfn</h5>
				</div>
			</div>

		</div>
	</div>
</template>

<script>
	import { EventBus } from '../../event-bus.js'

	export default {
		data() {
			return {
				isIssueOpen: false
			}
		},

		methods: {
			openSearchProjectModal () {
            	EventBus.$emit('showProjectSearch');
            }
		}
	}
</script>
