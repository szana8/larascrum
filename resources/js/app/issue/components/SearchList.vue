<template>
    <div>
        <perfect-scrollbar class="scroll-area w-full" :settings="settings">
            <div>
                <div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-purple w-90 hover:bg-grey-lightest hover:shadow-lg cursor-pointer">
                    <div class="flex">
                        <div><img src="storage/avatars/3/avatar.png" class="w-8 h-8"></div>
                        <div class="ml-4">
                            <a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-426</a>
                            <h5 class="text-grey-darkest">Contact web page error</h5>
                        </div>
                    </div>
                    <div class="flex mt-4">
                        <div class="text-grey-dark text-sm">Type</div>
                        <div class="ml-5">
                            <img src="storage/icons/bug.png">
                            <h5 class="inline-block text-grey-darkest">Bug</h5>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="text-grey-dark text-sm">Due</div>
                        <div class="ml-6">
                            <h5 class="inline-block text-grey-darkest">14-Feb-2018</h5>
                        </div>
                    </div>
                </div>

                <div class="my-4 bg-white rounded shadow-md p-4 border-l-4 border-orange w-90">
                    <div class="flex">
                        <div><img src="storage/avatars/1/avatar.png" class="w-8 h-8"></div>
                        <div class="ml-4">
                            <a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-310</a>
                            <h5 class="text-grey-darkest">Brand new Swag concept</h5>
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <div class="text-grey-dark text-sm">Type</div>
                        <div class="ml-5">
                            <img src="storage/icons/improvement.png">
                            <h5 class="inline-block text-grey-darkest">Improvements</h5>
                        </div>
                    </div>

                    <div class="flex mt-2">
                        <div class="text-grey-dark text-sm">Due</div>
                        <div class="ml-6">
                            <h5 class="inline-block text-grey-darkest">24-Mar-2018</h5>
                        </div>
                    </div>

                </div>

                <div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-green w-90 hover:bg-grey-lightest hover:shadow-lg cursor-pointer">
                    <div class="flex">
                        <div><img src="storage/avatars/4/avatar.png" class="w-8 h-8"></div>
                        <div class="ml-4">
                            <a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-526</a>
                            <h5 class="text-grey-darkest">FB adds target audience</h5>
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <div class="text-grey-dark text-sm">Type</div>
                        <div class="ml-5">
                            <img src="storage/icons/epic.png">
                            <h5 class="inline-block text-grey-darkest">Epic</h5>
                        </div>
                    </div>

                    <div class="flex mt-2">
                        <div class="text-grey-dark text-sm">Due</div>
                        <div class="ml-6">
                            <h5 class="inline-block text-grey-darkest">10-Mar-2018</h5>
                        </div>
                    </div>
                </div>

                <div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-blue w-90 hover:bg-grey-lightest hover:shadow-lg cursor-pointer">
                    <div class="flex">
                        <div><img src="storage/avatars/5/avatar.png" class="w-8 h-8"></div>
                        <div class="ml-4 w-5/6">
                            <div class="flex justify-between">
                                <a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-527</a>
                                <div class="">
                                    <div class="inline-block w-2 h-2 bg-green rounded-full"></div>
                                    <div class="inline-block text-sm text-grey-darkest">75%</div>
                                </div>
                            </div>
                            <h5 class="text-grey-darkest">ITGM competitors</h5>
                        </div>
                    </div>
                </div>

                <div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-red w-90 hover:bg-grey-lightest hover:shadow-lg cursor-pointer">
                    <div class="flex">
                        <div><img src="storage/avatars/6/avatar.png" class="w-8 h-8"></div>
                        <div class="ml-4 w-5/6">
                            <div class="flex justify-between">
                                <a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-528</a>
                                <div class="">
                                    <div class="inline-block w-2 h-2 bg-orange rounded-full"></div>
                                    <div class="inline-block text-sm text-grey-darkest">23%</div>
                                </div>
                            </div>
                            <h5 class="text-grey-darkest">Affix company seals on...</h5>
                        </div>
                    </div>
                </div>

                <div class="my-4 bg-grey-lighter rounded shadow-md p-4 border-l-4 border-purple w-90 hover:bg-grey-lightest hover:shadow-lg cursor-pointer">
                    <div class="flex">
                        <div><img src="storage/avatars/4/avatar.png" class="w-8 h-8"></div>
                        <div class="ml-4 w-5/6">
                            <div class="flex justify-between">
                                <a href="#" class="no-underline text-blue uppercase font-semibold">MRKT-538</a>
                                <div class="">
                                    <div class="inline-block w-2 h-2 bg-green rounded-full"></div>
                                    <div class="inline-block text-sm text-grey-darkest">80%</div>
                                </div>
                            </div>
                            <h5 class="text-grey-darkest">As Data Generation Tool User...</h5>
                        </div>
                    </div>
                </div>
            </div>
        </perfect-scrollbar>
    </div>
</template>
<script>
    import { PerfectScrollbar } from 'vue2-perfect-scrollbar'

    export default {

        components: {
            PerfectScrollbar: PerfectScrollbar
        },

        data() {
            return {
                settings: {
                    maxScrollbarLength: 60
                },
                scrollPosition: 100,
                issues: null
            }
        },

        mounted() {
            axios.get('api/issues').then((response) => {
                this.issues = response.data
            });
        },

        methods: {
            //
        }

    }
</script>

<style lang="scss">
    .scroll-area {
        height: 760px;
    }
</style>
