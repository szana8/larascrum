<template>
    <div>
        <div v-if="this.issues && this.issues.length > 0">
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
    import { throttle } from 'lodash'
    import { EventBus } from '../../../../event-bus.js'

    import Issue from './Cards/Issue'

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
                scrollPosition: 100,
                selectedIssue: null,
                settings: {
                    maxScrollbarLength: 60
                },
            }
        },

        mounted() {
            EventBus.$on('issueSelected', this.setSelectedIssue)
        },

        methods: {
            // Set the selected issue, change the style and load the details
            setSelectedIssue(id) {
                this.selectedIssue = id
            },

            // Load more issues if it is possible for the infinite loop
            loadMoreResults: throttle(function (e) {
                if (this.isMoreResultExists) {
                    EventBus.$emit('loadMore')
                    this.$refs.ps.update()
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
