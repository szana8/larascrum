<template>
    <div class="my-4 rounded p-4 border-l-4 border-purple w-90" :class="[type.id == 2 ? 'bg-white shadow' : 'bg-grey-lighter hover:shadow-lg cursor-pointer shadow-md hover:bg-grey-lightest']">
        <div class="flex items-stretch">
            <img src="storage/icons/undraw/undraw_messages1_9ah2.svg" class="block rounded-full border-2 border-white w-10 h-10">
            <div class="w-full self-center ml-2">
                <div class="no-underline text-blue uppercase font-semibold">{{ type.name }}</div>
                <h5 class="text-grey-darker capitalize">{{ type.description.substring(0, 30) }}...</h5>
                <div class="flex justify-content ml-2 mt-2">
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
