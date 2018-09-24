<template>
	<div class="">
		<a href="#" class="float">
		<i class="fa fa-plus my-float"></i>
		</a>
		<nav class="bg-blue-darker border-b border-grey-light py-6">
			<div class="flex">
				<div class="w-1/4 felx items-center">

				</div>
				<div class="w-1/2 felx items-center">
					<router-link :to="{ name: 'home' }" class="no-underline text-grey-dark mr-8">Home</router-link>
					<router-link :to="{ name: 'home' }" class="no-underline text-grey-dark mr-8">Inventory</router-link>
					<router-link :to="{ name: 'home' }" class="no-underline text-grey-dark mr-8">Items</router-link>
					<router-link :to="{ name: 'home' }" class="no-underline text-grey-dark mr-8">Reservations</router-link>
					<router-link :to="{ name: 'home' }" class="no-underline text-grey-dark mr-8">Settings</router-link>
				</div>
				<div class="w-1/4 text-right">
					<router-link :to="{ name: 'logout' }" class="inline-block no-underline text-grey-dark mr-8">Logout</router-link>
					<router-link :to="{ name: 'login' }" class="inline-block no-underline text-grey-dark mr-8">Login</router-link>
					<router-link :to="{ name: 'logout' }" class="inline-block no-underline text-grey-dark mr-8">Register</router-link>
				</div>
			</div>
		</nav>
	</div>
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
