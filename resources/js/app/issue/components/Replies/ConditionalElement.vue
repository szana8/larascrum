<template>
    <fade-transition>
        <div v-show="isVisible">
            <slot></slot>
        </div>
    </fade-transition>
</template>

<script>
    import inViewport from 'in-viewport'
    import { EventBus } from '../../../../event-bus.js'
    import { FadeTransition } from 'vue2-transitions'

    export default {
        components: {
            FadeTransition
        },

        props: {
            'whenHidden': {
                type: String
            },
            'parent': {
                type: String
            }
        },

        computed: {
            // Check the element is on the parent.
            checkDisplay() {
                return !inViewport(document.querySelector(this.whenHidden), { container: document.querySelector(this.parent) });
            }
        },

        mounted() {
            EventBus.$on('scrollIssue', this.checkDisplay);
        },

    }
</script>
