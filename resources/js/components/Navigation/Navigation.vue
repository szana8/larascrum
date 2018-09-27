<template>
	<nav class="bg-blue-darker w-full px-4 flex justify-between">

		<div class="flex">
			<div class="py-6">
				<img src="storage/avatars/3/avatar.png" class="w-10 h-10 absolute -mt-2 ml-2 inline-block">
				<a href="#" class="text-blue-lighter font-semibold ml-16 no-underline hover:text-blue-lightest">Grace Parkinson</a>
			</div>
		</div>

		<div class="flex">
			<li class="list-reset px-4 py-6"><a href="#" class="text-blue bg-white rounded-full py-2 px-8 font-semibold no-underline border hover:bg-blue-darker hover:border-white hover:text-white">Create</a></li>
			<li class="list-reset py-6 px-4 border-b border-white"><a href="#" class="text-white font-semibold no-underline">Teams</a></li>
			<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter font-semibold no-underline hover:text-blue-lightest">Boards</a></li>
			<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter font-semibold no-underline hover:text-blue-lightest">Calendar</a></li>
			<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter font-semibold no-underline hover:text-blue-lightest">Settings</a></li>
		</div>
		<div class="md:flex hidden md:block">
			<input type="text" name="search" placeholder="Search..." class=" w-64 appearance-none text-grey-darkest shadow px-6 py-2 rounded-full absolute mt-4 -ml-6">
		</div>
		<div class="flex">
			<li class="list-reset py-6 px-4"><a href="#" class="text-blue-lighter hover:text-blue-lightest font-semibold no-underline" @click="signout">Logout</a></li>
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
