<template>
	<nav class="flex">
		<create-panel></create-panel>

		<div class="w-1/6 border-r border-grey-lighter hidden md:block">
			<div class="py-6 border-b border-blue text-center bg-blue">
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
		</div>


		<div class="w-5/6">
			<div class="bg-blue w-full px-4 flex justify-between">
				<div class="flex w-1/4 items-stretch">
					<div class="flex self-center">
						<img :src="user.data.avatar_url" class="w-10 h-10 ml-2 inline-block self-center rounded-full">
						<a href="#" class="text-blue-lighter font-semibold ml-4 no-underline hover:text-blue-lightest self-center" v-text="user.data.name"></a>
					</div>
				</div>

				<div class="flex w-1/2 items-stretch" id="navbar">
					<li class="list-reset px-4 self-center"><a href="#" class="text-blue block bg-white rounded-full py-1 px-8 font-semibold no-underline border hover:bg-blue hover:border-white hover:text-white" @click="openCreatePanel()">Create</a></li>
					<router-link tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" :to="{ name: 'home' }" exact>Dashboards</router-link>
					<router-link tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" :to="{ name: 'issues' }">Issues</router-link>
					<router-link tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" to="/boards" exact>Boards</router-link>
					<router-link tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" to="/calendar" exact>Calendar</router-link>
					<router-link tag="li" class="list-reset py-6 px-4 text-blue-lighter font-semibold no-underline hover:text-blue-lightest cursor-pointer" to="/settings" exact>Settings</router-link>
				</div>

				<div class="flex w-1/4 justify-end">
					<div>
						<input type="text" name="search" placeholder="Search..." class=" w-64 appearance-none text-grey-darkest shadow px-6 py-2 rounded-full mt-4 -ml-10">
					</div>
					<div>
						<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter hover:text-blue-lightest font-semibold no-underline" 	@click="signout">Logout</a></li>
					</div>
				</div>
			</div>

		</div>


	</nav>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import CreatePanel from '../QuickLinks/CreatePanel'
	import { EventBus } from '../../event-bus.js'


    export default {
		components: {
			CreatePanel
		},

        computed: mapGetters({
            user: 'auth/user',
        }),

        methods: {
            ...mapActions({
                logout: 'auth/logout'
            }),

            signout () {
                this.logout().then(() => {
                    this.$router.replace({ name: 'login' })
                })
            },

			/* Fiure an event to open the search side modal to find a specific issue or peoject */
			openSearchProjectModal () {
            	EventBus.$emit('showProjectSearch');
			},

			openCreatePanel() {
				EventBus.$emit('openCreatePanel');
			}
        }
    }
</script>

<style>
#navbar > .router-link-active {
  @apply text-white border-b border-white
}
</style>
