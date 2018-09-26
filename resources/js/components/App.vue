<template>
	<div class="" v-if="user.authenticated">
		<div class="flex">
			<div class="md:w-1/6 md:h-screen h-auto border-r border-grey-lighter hidden md:block">
				<sidebar></sidebar>
			</div>
			<div class="md:w-5/6 block">
				<navigation></navigation>
				<div class="flex">
			 		<router-view></router-view>
				</div>
			</div>
		</div>
	</div>

	<div class="w-full" v-else>
		<router-view></router-view>
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
            })
        }
    }
</script>
