<template>
    <div>
        <reply v-for="reply in replies" :key="reply.id" :reply="reply" @deleted="deleteReplyFromList"></reply>

        <new-reply @posted="addNewReplyToList" @updated="updateReply"></new-reply>

        <conditional-element :when-hidden="button">
             <button class="float bg-blue text-white shadow-lg focus:outline-none hover:bg-blue-dark" @click="openReply">
                <svg version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" class="w-6 h-6 text-white mt-1" xml:space="preserve">
                    <path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
                    v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" fill="currentColor" />
                </svg>
            </button>
        </conditional-element>

    </div>
</template>

<script>
    import Reply from './Reply'
    import NewReply from './NewReply'
    import ConditionalElement from './ConditionalElement'

    import { EventBus } from '../../../../event-bus.js'

    export default {

        components: {
            Reply,
            NewReply,
            ConditionalElement
        },

        props: {
            'issue': {
                type: Object
            }
        },

        data() {
            return {
                replies: this.issue.replies,
                button: '#js-issue-reply-button'
            }
        },

        methods: {
            openReply() {
                EventBus.$emit('openReply', this.issue.id, this.issue.title);
            },

            addNewReplyToList(reply) {
                this.replies.push(reply)
            },

            deleteReplyFromList(reply) {
                var index = this.replies.findIndex(rep => rep.id === reply);
                this.replies.splice(this.replies.indexOf(index), 1);
            },

            updateReply(reply, text) {
                var index = this.replies.findIndex(rep => rep.id === reply);
                this.replies[index].text = text;
            }
        }
    }
</script>
