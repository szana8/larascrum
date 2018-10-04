<template>
	<nav class="bg-blue-darker w-full px-4 flex justify-between">

		<div class="flex w-1/4 items-stretch">
			<div class="flex self-center">
				<img src="storage/avatars/3/avatar.png" class="w-10 h-10 ml-2 inline-block self-center">
				<a href="#" class="text-blue-lighter font-semibold ml-4 no-underline hover:text-blue-lightest self-center">Grace Parkinson</a>
			</div>
		</div>

		<div class="flex w-1/2" id="navbar">
			<li class="list-reset px-4 py-6"><a href="#" class="text-blue bg-white rounded-full py-2 px-8 font-semibold no-underline border hover:bg-blue-darker hover:border-white hover:text-white">Create</a></li>
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

	</nav>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

    export default {
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

            navBarRedirect (page) {
                this.$router.replace({ name: page })
            }
        }
    }
</script>

<style>
#navbar > .router-link-active {
  @apply text-white border-b border-white
}
</style>
