<template>
    <div>
        <comment v-for="comment in comments" :key="comment.id" :comment="comment"></comment>

        <new-comment></new-comment>

        <conditional-element :when-hidden="button">
             <button class="float bg-blue text-white shadow-lg focus:outline-none hover:bg-blue-dark" @click="openComment">
                <svg version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" class="w-6 h-6 text-white mt-1" xml:space="preserve">
                    <path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
                    v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" fill="currentColor" />
                </svg>
            </button>
        </conditional-element>

    </div>
</template>

<script>
    import Comment from './Comment'
    import NewComment from './NewComment'
    import ConditionalElement from './ConditionalElement'

    import { EventBus } from '../../../../event-bus.js'

    export default {

        components: {
            Comment,
            NewComment,
            ConditionalElement
        },

        props: ['issue'],

        data() {
            return {
                comments: this.issue.comments,
                button: '#js-issue-reply-button'
            }
        },

        methods: {
            openComment() {
                EventBus.$emit('openReply', this.issue.id, this.issue.title);
            }
        }
    }
</script>
