<template>
	<div>
		<div class="" v-if="user.authenticated">
			<sidebar-search-panel></sidebar-search-panel>

			<div class="flex">
				<div class="w-full block md:h-screen h-auto">
					<navigation></navigation>
					<div class="flex">
						<router-view v-if="user.authenticated"></router-view>
					</div>
				</div>
			</div>
		</div>

		<div v-else>
			<router-view></router-view>
		</div>
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
