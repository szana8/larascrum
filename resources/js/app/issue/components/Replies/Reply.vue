<template>

    <div class="bg-white rounded shadow my-4" @mouseover="checkEditable" @mouseleave="isEditable = false">

         <div class="flex py-4 px-4 w-full justify-between">
            <div class="flex">
                <img :src="this.reply.owner.avatar_url" class="w-8 h-8 mx-4 rounded-full">
                <a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold hover:text-blue-light">{{ this.reply.owner.name }}</a>
                <span class="mt-2 text-sm text-grey-dark">Posted</span>
                <span class="mt-2 text-sm text-grey-dark font-semibold ml-1">{{ replyDate }}</span>
            </div>

            <div>
                <div class="text-grey-light cursor-pointer hover:text-grey-dark mt-1" v-show="isEditable" @click="isClicked = !isClicked">
                    <button class="text-xs text-grey-light hover:text-grey inline-block mx-2" @click="editReply(reply)">Edit</button>
                    <button class="text-xs text-grey-light hover:text-grey inline-block mx-2" @click="deleteReply(reply.id)">Delete</button>

                </div>
            </div>

        </div>

        <p class="px-8 pb-8 leading-normal">
            {{ this.reply.text }}
        </p>

    </div>



</template>

<script>
    import moment from 'moment'
    import { EventBus } from '../../../../event-bus';
import { mapActions } from 'vuex';

    export default {

        props: {
            reply: {
                type: Object
            }
        },

        data() {
            return {
                isClicked: false,
                isEditable: false,
            }
        },

        computed: {
            replyDate() {
				return moment(this.reply.created_at).fromNow();
			}
        },

        methods: {
            ...mapActions({
                deleteReply: 'issue/deleteReply'
            }),

            checkEditable() {
                this.isEditable = true;
            },

            editReply(reply) {
                EventBus.$emit('editReply', reply);
            },


        }

    }
</script>
