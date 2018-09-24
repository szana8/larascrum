<template>
	<p>Home</p>
</template>

<script>
	export default {
		data() {
			return {
				index: null
			}
		},

		mounted () {
			axios.get('api/issues').then((response) => {
				this.index = response.data.data
			})
		}
	}
</script>
