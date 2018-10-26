<template>
    <div class="w-1/2 xl:w-1/3 my-2">
        <button class="focus:outline-none text-xs lg:text-sm rounded-full py-1 w-16 xl:w-24" :class="isFilterActive" @click="setSelectedPriority(filter.id)">{{ filter.name }}</button>
    </div>
</template>

<script>

    import { mapMutations, mapGetters } from 'vuex';

    export default {
        props: {
            'filter': {
                type: Object
            },
        },

        computed: {
            // Map Vuex getters, selectedPriority returns back the selected priority filter id
            ...mapGetters({
                selectedPriority: 'issue/selectedPriority'
            }),

            // Calculate the style of the filter button based on the active flag
            isFilterActive() {
                return this.filter.id === this.selectedPriority ? 'bg-blue-darker text-white' : 'bg-white hover:bg-blue hover:text-white text-grey-darkest shadow-md'
            }
        },

        methods: {
            // Map Vuex mutation to mutate a selected priority
            ...mapMutations({
                setSelectedPriority: 'issue/setSelectedPriority'
            })
        }
    }
</script>
