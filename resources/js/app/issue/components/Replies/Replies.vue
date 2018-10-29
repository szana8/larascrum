<template>
    <div>
        <reply v-for="reply in replies" :key="reply.id" :reply="reply"></reply>

        <new-reply></new-reply>

        <conditional-element :when-hidden="button" :parent="parent">
             <button class="float bg-blue text-white shadow-lg focus:outline-none hover:bg-blue-dark" @click="openNewReplyPopup">
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
    import { mapGetters } from 'vuex';

    export default {

        components: {
            Reply,
            NewReply,
            ConditionalElement
        },

        data() {
            return {
                parent: '#container',
                button: '#js-issue-reply-button',
            }
        },

        computed: {
            ...mapGetters({
                issue: 'issue/issue',
                replies: 'issue/replies',
            })
        },

        methods: {
            // Open the new reply form
            openNewReplyPopup() {
                EventBus.$emit('openNewReplyPopup', this.issue.id, this.issue.title);
            },
        }
    }
</script>
