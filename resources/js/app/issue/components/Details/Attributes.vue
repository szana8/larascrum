<template>
	<div class="w-5/6 ml-8">
		<div class="text-center flex justify-center mt-4 text-grey-darkest border-b-2 border-grey pb-8">
			<div class="">
				<h4>3h 38m 14s</h4>
				<div class="flex mt-4 ml-2">
					<div class="w-4 h-4 bg-grey mt-2 mr-8 hover:bg-blue-light cursor-pointer"></div>
					<div class="w-4 h-4 border-l border-grey border-r mt-2 hover:border-blue-light cursor-pointer"></div>
				</div>
			</div>
		</div>

		<attachments></attachments>

		<div class="mt-4 border-b-2 border-grey pb-2">
			<h4 class="mb-8 text-grey-darkest">Details</h4>
			<div class="flex">
				<div class="text-grey-dark text-sm w-1/4">Type</div>
				<div class="flex w-3/4">
					<img :src="this.issue.type.icon" :alt="this.issue.type.name" class="mr-2">
					<h5 class="inline-block text-grey-darkest">{{ this.issue.type.name }}</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm w-1/4">Priority</div>
				<div class="flex w-3/4">
					<img :src="this.issue.priority.icon" :alt="this.issue.priority.name" class="mr-2">
					<h5 class="inline-block text-grey-darkest">{{ this.issue.priority.name }}</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm w-1/4">Labels</div>
				<div class="flex w-3/4">
					<h5 class="inline-block text-grey-darkest">None</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm w-1/4">Status</div>
				<div class="flex w-3/4">
					<h5 class="inline-block text-grey-darkest">TO DO</h5>
				</div>
			</div>

			<div class="flex my-4">
				<div class="text-grey-dark text-sm w-1/4">Resolution</div>
				<div class="flex w-3/4">
					<h5 class="inline-block text-grey-darkest">Unresolved</h5>
				</div>
			</div>
		</div>

		<div class="mt-4">
			<h4 class="mb-8 text-grey-darkest">People</h4>
			<div class="flex my-5">
				<h4 class="text-grey font-normal text-sm w-1/4">Assignee</h4>
				<div class="flex -mt-2 w-3/4">
					<img :src="this.issue.assignee.avatar_url" class="w-8 h-8 mx-4 rounded-full border-2 border-white">
					<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold hover:text-blue-light">{{ this.issue.assignee.name }}</a>
				</div>
			</div>

			<div class="flex my-5">
				<h4 class="text-grey font-normal text-sm w-1/4">Reporter</h4>
				<div class="flex -mt-2 w-3/4">
					<img :src="this.issue.reporter.avatar_url" class="w-8 h-8 mx-4 rounded-full border-2 border-white">
					<a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold hover:text-blue-light">{{ this.issue.reporter.name }}</a>
				</div>
			</div>

			<div class="flex my-5">
				<h4 class="text-grey font-normal text-sm w-1/4">Subscribe</h4>
				<div class="flex -mt-2 w-3/4 justify-content">
					<div class="ml-4">
						<span class="border rounded-full border-grey flex items-center cursor-pointer w-12" :class="subscriptionClass" @click="toggleSubscribe">
							<span class="rounded-full border w-6 h-6 border-grey shadow-inner shadow bg-white" >
							</span>
						</span>
					</div>
				</div>
			</div>

			<div class="flex mt-10">
				<h4 class="text-grey font-normal text-sm w-1/4">Subscribers</h4>
				<div class="flex -mt-2 w-3/4 justify-content">
					<img :src="subscription.user.avatar_url" class="w-8 h-8 ml-4 rounded-full border-2 border-white" v-for="(subscription, index) in this.issue.subscriptions" :class="[index === 0 ? 'ml-4' : '-ml-3']" :key="subscription.id" v-if="index < 5">

					<span class="ml-1 self-end" v-if="this.issue.subscriptions.length > 5"><a href="#" class="text-blue no-underline text-xs font-semibold">...and {{ this.issue.subscriptions.length - 5 }} more</a></span>
				</div>
			</div>

		</div>
	</div>
</template>

<script>
	import Attachments from '../Attachments/Attachments'
	import { mapGetters } from 'vuex'


	export default {

		components: {
			Attachments
		},

		props: {
			'issue': {
				type: Object
			}
		},

		data() {
			return {
				isSubscribed: false
			}
		},

		mounted() {
			this.isSubscribed = this.issue.isSubscribedTo;
		},

		computed: {
			subscriptionClass() {
				return this.isSubscribed ? 'justify-end bg-blue' : 'justify-start bg-white';
			},

			...mapGetters({
            	user: 'auth/user',
        	})
		},

		methods: {

			toggleSubscribe() {
				if (this.isSubscribed) {
					return this.unScubscribe();
				}

				return this.subscribe();
			},

			unScubscribe() {
				axios.delete('api/issues/' + this.issue.id + '/unscubscribe').then((response) => {
					var index = this.issue.subscriptions.findIndex(sub => sub.user_id === this.user.id && sub.issue_id === this.issue_id);
					this.issue.subscriptions.splice(this.issue.subscriptions.indexOf(index), 1);

					this.isSubscribed = false;
				});
			},

			subscribe() {
				axios.post('api/issues/' + this.issue.id + '/subscribe').then((response) => {
					this.isSubscribed = true;
					this.issue.subscriptions = response.data
				});
			}
		}

	}
</script>
