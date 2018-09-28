<template>
	<div>
		<perfect-scrollbar class="scroll-area w-full" :settings="settings" @ps-scroll-y="scrollHanle" >
			<div>
				<div :id="setCardId(itemObjKey)" @click="logPosition(itemObjKey)" class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 w-90 ml-4 border-purple hover:bg-grey-lightest hover:shadow-lg cursor-pointer" v-for="(issue, itemObjKey) in issues">
					<div class="flex">
						<img src="storage/avatars/3/avatar.png" class="w-8 h-8 hidden lg:block">
						<div class="lg:ml-4">
							<a href="#" class="no-underline text-blue uppercase font-semibold text-sm lg:text-normal" v-text="issue.slug"></a>
							<h5 class="text-grey-darkest text-xs lg:text-normal" v-text="issue.title"></h5>
						</div>
					</div>
					<div class="flex mt-4" :class="isHiddenItem(itemObjKey)">
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
			</div>

		</perfect-scrollbar>
	</div>
</template>

<script>
	import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

	export default {
		components: {
		 	PerfectScrollbar: PerfectScrollbar
		 },

		data() {
			return {
				settings: {
		       		maxScrollbarLength: 60
		      	},
		      	scrollPosition: 100,
				issues: null
			}
		},

		mounted () {
			axios.get('api/issues').then((response) => {
				//console.log(response);
				this.issues = response.data
			});
		},

		methods: {
			setCardId(id) {
				return 'issue-card-' + id
			},

			isHiddenItem(item) {
				if (((item + 1) * 100 - 200) < this.scrollPosition)
					return 'block';

				return 'lg:hidden';
			},

			scrollHanle(evt) {
      			console.log(evt.srcElement.scrollTop);
      			this.scrollPosition = evt.srcElement.scrollTop;
    		},

    		logPosition(el) {
    			console.log(document.getElementById('issue-card-' + el).offsetTop)
    		}
		}
	}
</script>

<style lang="scss">
.scroll-area {
  height: 760px;
}
</style>
