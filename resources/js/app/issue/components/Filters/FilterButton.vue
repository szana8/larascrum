<template>
    <div class="w-1/2 xl:w-1/3 my-2">
        <button class="focus:outline-none text-xs lg:text-sm rounded-full py-1 w-16 xl:w-24" :class="isFilterActive" @click="setFilter(name)">{{ this.name }}</button>
    </div>
</template>

<script>
    export default {
        props: ['name', 'active'],

        computed: {
            isFilterActive() {
                return this.name === this.active ? 'bg-blue-darker text-white' : 'bg-white hover:bg-blue hover:text-white text-grey-darkest shadow-md'
            }
        },

        methods: {
            setFilter(filter) {
                this.$emit('updated', filter)
            }
        }
    }
</script>
