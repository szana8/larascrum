<template>
    <div class="mt-1">
        <div v-if="isTypeListNotEmpty">
            <type v-for="type in types" :key="type.id" :type="type"></type>
        </div>

        <div v-else>
            <div class="text-center mt-4">There is no result with these criterias...</div>
        </div>
    </div>
</template>

<script>

    // Import necessary VueJs components
    import type from './Type'

    export default {

        components: {
            type
        },

        data() {
            return {
                settings: {
                    maxScrollbarLength: 60
                },
                types: null
            }
        },

        computed: {
            // Check the issue object is empty or not
            isTypeListNotEmpty() {
                return true;
            }
        },

        mounted() {
            this.getIssueTypes();
        },

        methods: {

            getIssueTypes() {
                axios.get('api/types/schemas').then((response) => {
                    this.types = response.data.data
                });
            }

        }
    }
</script>

<style scoped>
    .scroll-area {
        height: 760px;
    }
</style>
