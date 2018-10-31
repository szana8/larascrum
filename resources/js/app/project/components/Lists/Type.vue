<template>
    <div>
        {{type.name }}
    </div>
</template>

<script>
    // Import necessary NodeJs packages
    import moment from 'moment';
    import { mapActions } from 'vuex';

    export default {
        props: {
            'type': {
                type: Object
            },

        },

        data() {
            return {
                //
            }
        },

        computed: {
           //
        },

        mounted() {
            //
        },

        methods: {
            //
        }
    }
</script>
