<template>
    <div class="bg-white rounded shadow my-4" @mouseover="checkEditable" @mouseleave="isEditable = false">

        <div class="flex py-4 px-4 w-full justify-between">
            <div class="flex">
                <img src="storage/avatars/3/avatar.png" class="w-8 h-8 mx-4">
                <a href="#" class="text-blue no-underline text-sm mt-2 mr-2 font-semibold hover:text-blue-light">Grace Parkinson</a>
                <span class="mt-2 text-sm text-grey-dark">added a comment - </span>
                <span class="mt-2 text-sm text-grey-dark">Yesterday</span>
            </div>

            <div>
                <div class="text-grey-light cursor-pointer hover:text-grey-dark mt-1" v-show="isEditable" @click="isClicked = !isClicked">
                    <svg height="20" viewBox="0 -135 369.91339 369" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m369.277344 42.027344c4.367187 26.945312-13.933594 52.328125-40.878906 56.695312-26.945313 4.371094-52.328126-13.933594-56.695313-40.875-4.367187-26.945312 13.933594-52.328125 40.878906-56.695312 26.945313-4.367188 52.328125 13.933594 56.695313 40.875zm0 0" fill="currentcolor" /><path d="m234.421875 49.886719c0 27.296875-22.128906 49.429687-49.429687 49.429687-27.296876 0-49.425782-22.132812-49.425782-49.429687 0-27.300781 22.128906-49.429688 49.425782-49.429688 27.300781 0 49.429687 22.128907 49.429687 49.429688zm0 0" fill="currentcolor"/><path d="m84.382812 14.933594c19.304688 19.304687 19.304688 50.601562 0 69.90625-19.304687 19.304687-50.601562 19.304687-69.90625 0-19.300781-19.304688-19.300781-50.601563 0-69.90625 19.304688-19.300782 50.601563-19.300782 69.90625 0zm0 0" fill="currentcolor"/></svg>
                </div>
            </div>

        </div>

        <p class="px-8 pb-8 leading-normal">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque id eros vel sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ornare rhoncus diam, tincidunt interdum diam auctor
            sit amet. Pellentesque dapibus, lacus ac gravida blandit, nisl ligula porta felis, gravida vulputate enim mi quis tortor.
        </p>

    </div>
</template>

<script>
export default {
    data() {
        return {
            isEditable: false,
            isClicked: false
        }
    },

    methods: {
        checkEditable() {
            this.isEditable = true;
        }
    }
}
</script>
