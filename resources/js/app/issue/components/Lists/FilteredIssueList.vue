<template>
    <div>
        <perfect-scrollbar class="scroll-area mx-2" :settings="settings">
            <issue v-for="issue in issues" :key="issue.id" :issue="issue"></issue>
        </perfect-scrollbar>
    </div>
</template>
<script>
    import Issue from './Cards/Issue'

    import { PerfectScrollbar } from 'vue2-perfect-scrollbar'
    import { EventBus } from '../../../../event-bus.js'

    export default {

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
                issues: null
            }
        },

        mounted() {
           this.getIssues();
            EventBus.$on('refreshList', this.getIssues);
        },

        methods: {
            getIssues() {
                 axios.get('api/issues', { params: {
                    'project': this.$route.params.project,
                    'type': this.$route.params.type ? this.$route.params.type : 'all'
                }}).then((response) => {
                    this.issues = response.data
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
