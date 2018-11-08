<template>
    <div class="mt-1">
        <div v-if="isIssueListNotEmpty">
            <perfect-scrollbar ref="ps" class="scroll-area mx-2" :settings="settings" @ps-y-reach-end="loadMoreResults">
                <div id="issue-scroll">
                    <issue v-for="issue in issues" :key="issue.id" :issue="issue" :selectedIssue="selectedIssue"></issue>
                    <div v-if="isMoreResultExists" class="my-8 text-center">Loading more...</div>
                </div>
            </perfect-scrollbar>
        </div>

        <div v-else>
            <div class="text-center mt-4">There is no result with these criterias...</div>
        </div>
    </div>
</template>

<script>
    // Import necessary NodeJs packages
    import { throttle } from 'lodash'
    import { mapGetters } from 'vuex'

    // Import necessary VueJs components
    import Issue from './Issue'

    export default {
        props: {
            'issues': {
                type: Array
            },

            'isMoreResultExists': {
                type: Boolean,
                default: false
            }
        },

        components: {
            Issue
        },

        data() {
            return {
                settings: {
                    maxScrollbarLength: 60
                },
            }
        },

        computed: {
            // Map Vuex getters selected issue which returns the selected issue object
            ...mapGetters({
				selectedIssue: 'issue/selectedIssue'
            }),

            // Check the issue object is empty or not
            isIssueListNotEmpty() {
                return this.issues && this.issues.length > 0;
            }
        },

        methods: {
            // Load more issues if it is possible for the infinite loop, use throttle
            // to catch every 500 event
            loadMoreResults: throttle(function (e) {
                if (this.isMoreResultExists) {
                    this.$emit('scrolled');
                    this.$refs.ps.update();
                }
            }, 500, { 'trailing': false })
        }
    }
</script>

<style scoped>
    .scroll-area {
        height: 760px;
    }
</style>
