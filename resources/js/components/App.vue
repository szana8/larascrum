<template>
	<div>
		<sidebar-search-panel v-if="user.authenticated"></sidebar-search-panel>

		<div :class="[user.authenticated? 'flex' : '']">
			<div :class="[user.authenticated ? 'w-full block md:h-screen h-auto' : '']">
				<navigation v-if="user.authenticated"></navigation>
				<div :class="[user.authenticated ? 'flex' : '']">
					<router-view></router-view>
				</div>
			</div>
		</div>
	</div>

</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        computed: {
			...mapGetters({
            	user: 'auth/user'
			})
		},

        methods: {
            ...mapActions({
                logout: 'auth/logout'
			}),
        }
    }
</script>
