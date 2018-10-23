<template>
    <div>
        <div class="fixed z-40 pin overflow-auto bg-smoke-dark flex" v-if="isActive"></div>

        <slide-y-down-transition :duration="500">
            <div class="w-1/2 z-50 fixed pin-b pin-x mx-auto flex-col flex bg-white border-t-2 border-r-2 border-l-2 border-blue p-6 shadow-md rounded-t" v-show="isActive">
                <div class="w-full py-4 text-grey-darker border-b border-grey-light font-bold">
                    <svg version="1.1" viewBox="0 0 384 384" class="w-4 h-4 text-grey-dark" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                        <path d="M149.333,117.333V32L0,181.333l149.333,149.333V243.2C256,243.2,330.667,277.333,384,352
                            C362.667,245.333,298.667,138.667,149.333,117.333z" fill="currentColor" />
                    </svg>
                    Reply to <span class="text-blue uppercase">{{ this.title }}</span>
                </div>
                <div class="py-2 border-b border-grey-light">
                    <textarea class="w-full h-32 focus:outline-none text-grey-darkest resize-none" placeholder="But here's the thing..." v-model="reply" ref="reply"></textarea>
                </div>
                <div class="text-grey-darker py-4 flex justify-between">
                    <span class="text-xs mt-2">Use Markdown with <a href="#" class="text-blue no-underline">Github flavored</a> code blocks.</span>
                    <div class="flex">
                        <button class="bg-white text-grey-darkest border border-grey-darker rounded-full px-4 py-2 text-sm  hover:border-blue hover:text-blue uppercase font-semibold focus:outline-none" @click="closeReply">Cancel</button>
                        <button class="bg-blue text-grey-lightest border border-blue rounded-full px-4 py-2 text-sm hover:bg-blue-dark hover:border-blue-dark uppercase mx-2 font-semibold focus:outline-none" @click="postReply">Post</button>
                    </div>
                </div>
            </div>
        </slide-y-down-transition>

    </div>
</template>

<script>
    import { EventBus } from '../../../../event-bus.js'
    import { SlideYDownTransition } from 'vue2-transitions'

    export default {
        components: {
            SlideYDownTransition
        },

        data() {
            return {
                isActive: false,
                reply: null,
                id: null,
                title: null,
                mode: 'insert'
            }
        },

        mounted() {
            EventBus.$on('openNewReplyPopup', this.openNewReplyPopup);
            EventBus.$on('editReply', this.editReply);
        },

        methods: {
            openNewReplyPopup(id, title) {
                this.id = id;
                this.title = title;
                this.isActive = true;

                this.$nextTick(() => this.$refs.reply.focus())
            },

            closeReply() {
                this.id = null;
                this.title = null;
                this.reply = null;
                this.mode = 'insert';
                this.isActive = false;
            },

            postReply() {
                if (!this.reply)
                    return

                if (this.mode === 'update') {
                    return axios.put('api/replies/' + this.id, {
                        text: this.reply
                    }).then((response) => {
                        this.$emit('updated', this.id, this.reply);
                        this.closeReply();
                    }).catch((error) => {
                        console.log(error)
                    })
                }


                axios.post('api/issues/' + this.id + '/reply', {
                    text: this.reply
                }).then((response) => {
                    this.$emit('posted', response.data);
                    this.closeReply();
                }).catch((error) => {
                    console.log(error)
                })

            },

            editReply(reply) {
                this.mode = 'update';
                this.reply = reply.text;

                this.openNewReplyPopup(reply.id, reply.title);
            }
        }
    }
</script>
