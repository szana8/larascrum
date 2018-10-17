<template>
    <div class="my-4 bg-grey-lighter rounded p-4 border-l-4 w-90" :class="[this.issue.id == this.selectedIssue ? 'bg-white shadow' : 'bg-grey-lighter shadow-md hover:bg-grey-lightest hover:shadow-lg cursor-pointer', 'border-' + this.issue.type.color_code]" @click="openIssue(issue.id)">
        <div class="flex">
           <img :src="issue.reporter.avatar_url" class="block rounded-full mb-4 w-8 h-8">
            <div class="ml-4 w-full">
                <div class="flex justify-between">
                    <div class="no-underline text-blue uppercase font-semibold">{{ issue.project.slug }}-{{ issue.id }}</div>
                    <div class="flex items-stretch" v-if="hidden">
                        <div class="self-center w-2 h-2 rounded-full mr-2" :class="calculatedEstimateColor"></div>
                        <div class="self-center text-sm text-grey-darkest font-semibold">{{ this.estimateTime }}%</div>
                    </div>
                </div>

                <h5 class="text-grey-darkest">{{ issue.title }}</h5>
            </div>
        </div>
        <div class="flex mt-4" v-if="! hidden">
            <div class="text-grey-dark text-sm">Type</div>
            <div class="ml-5 flex items-stretch">
                <img :src="issue.type.icon" class="w-4 h-4 self-center">
                <h5 class="mx-2 text-grey-darkest self-center">{{ issue.type.name }}</h5>
            </div>
        </div>
        <div class="flex mt-2" v-if="! hidden">
            <div class="text-grey-dark text-sm">Due</div>
            <div class="ml-6">
                <h5 class="inline-block text-grey-darkest">{{ this.due_date_ago }}</h5>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import { EventBus } from '../../../../../event-bus.js'

    export default {

        props: [
            'issue',
            'selectedIssue'
        ],

        data() {
            return {
                selected: null,
                estimateTime: null,
            }
        },

        computed: {
            due_date_ago() {
                return moment(this.issue.due_date).format("MMM Do YYYY")
            },

            hidden() {
                return this.issue.original_estimate_time && this.issue.remaining_estimate_time;
            },

            calculatedEstimateColor() {
                if (this.estimateTime > 75)
                    return 'bg-green'

                if (this.estimateTime > 50)
                    return 'bg-orange'

                return 'bg-red'
            },

            calculatedEstimateRate() {
                return Number(((this.issue.original_estimate_time - this.issue.remaining_estimate_time) / this.issue.original_estimate_time) * 100).toFixed(1)
            }

        },

        mounted() {
            this.getEstimateTime();
        },

        methods: {
            openIssue(id) {
                EventBus.$emit('issueSelected', id);
            },

            getEstimateTime() {
                if (!this.issue.original_estimate_time || !this.issue.remaining_estimate_time)
                    return

               this.estimateTime = Number(((this.issue.original_estimate_time - this.issue.remaining_estimate_time) / this.issue.original_estimate_time) * 100).toFixed(1)

            }
        }
    }
</script>
