<template>
    <div>
        <perfect-scrollbar class="scroll-area mx-2" :settings="settings">
            <issue v-for="issue in issues" :key="issue.id" :issue="issue" :selectedIssue="selectedIssue" @selected="setSelectedIssue"></issue>
        </perfect-scrollbar>
    </div>
</template>
<script>
    import { EventBus } from '../../../../event-bus.js'
    import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

    import Issue from './Cards/Issue'

    export default {

        props: {
            'issues': {
                type: Object,
                required: true
            }
        },

        components: {
            Issue,
            PerfectScrollbar
        },

        data() {
            return {
                settings: {
                    maxScrollbarLength: 60
                },
                scrollPosition: 100,
                selectedIssue: null
            }
        },

        methods: {
            setSelectedIssue(id) {
                this.selectedIssue = id
            }
        }
    }
</script>

<style scoped>
    .scroll-area {
        height: 760px;
    }
</style>
