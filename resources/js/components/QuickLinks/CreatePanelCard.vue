<template>
    <div class="text-center">
        <img :src="image" :alt="this.name" class="w-64 border border-grey-light rounded p-2 cursor-pointer hover:border-grey shadow hover:shadow-md" :class="isActiveType(name)" @click="selectCard(name)">
        <div class="flex justify-end" v-if="isSelected == name">
            <div class="bg-blue rounded-full w-12 h-12 absolute -mt-8 ml-6 shadow-md text-white">
                <svg x="0px" y="0px" viewBox="0 0 512 512" width="20" height="20" class="mt-3">
                    <path d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0    c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7    C514.5,101.703,514.499,85.494,504.502,75.496z" fill="currentcolor"/>
                </svg>
            </div>
        </div>
        <div class="text-blue font-semibold my-4 uppercase text-sm" :class="isActiveType(name)" v-text="name" />
    </div>
</template>

<script>
    import { EventBus } from '../../event-bus.js'

    export default {
        props: ['image', 'name'],

        data() {
            return {
                isSelected: null,
            }
        },

        mounted() {
            EventBus.$on('setSelectedProperty', this.setSelectedProperty);
        },

        methods: {
            selectCard(param) {
                EventBus.$emit('setSelectedProperty', param);
            },

             /** Set the is checked property to show the checkmark on the selected element */
            setSelectedProperty(param) {
                if (this.isSelected == null || this.isSelected != param) {
                    this.isSelected = param;
                    this.$emit('selected', param);
                    return;
                }

                this.$emit('selected', null);
                this.isSelected = null;
            },

            /** If the user selected an element set the other elemets opacity to 25 */
            isActiveType(param) {
                if (this.isSelected != null && this.isSelected != param)
                    return 'opacity-25';

                return 'opacity-100';
            }
        }
    }
</script>
