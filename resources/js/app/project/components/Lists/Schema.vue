<template>
    <div class="my-4 rounded w-90 trans-slow border-l-2 border-purple" :class="[type.id == 2 ? 'bg-white shadow' : 'bg-grey-lighter hover:shadow-lg cursor-pointer shadow-md hover:bg-grey-lightest']">
        <div class="flex items-stretch">
            <div class="rounded-l flex flex-col justify-center px-10 py-10 items-center">
                <img src="storage/icons/undraw/undraw_messages1_9ah2.svg" class="absolute rounded-full border-2 antialiased border-white w-12 h-12 p-1">
            </div>

            <div class="w-full self-center ml-4 py-2">
                <div class="no-underline text-blue uppercase font-semibold text-xs">{{ type.name.substring(0,10) }}</div>
                <h5 class="text-grey-darker capitalize text-xs">{{ type.description.substring(0, 25) }}...</h5>
                <div class="flex justify-content ml-2 mt-5">
                    <img src="storage/icons/project/avatars/bird.svg" class="w-6 h-6 ml-4 rounded-full border-2 border-white -ml-3">
                    <img src="storage/icons/project/avatars/coffee.svg" class="w-6 h-6 ml-4 rounded-full border-2 border-white -ml-3">
                    <img src="storage/icons/project/avatars/code.svg" class="w-6 h-6 ml-4 rounded-full border-2 border-white -ml-3">
                    <img src="storage/icons/project/avatars/dog.svg" class="w-6 h-6 ml-4 rounded-full border-2 border-white -ml-3">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // Import necessary NodeJs packages
    import moment from 'moment';
    import { mapActions, mapGetters } from 'vuex';

    export default {
        props: {
            'type': {
                type: Object
            },

        },

        computed: {
           ...mapGetters({
               project: 'project/project'
           })
        }
    }
</script>
