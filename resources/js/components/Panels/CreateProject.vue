<template>
    <div>
        <div class="flex mt-10 px-4 h-172">
            <div>
                <div class="flex mt-6">
                    <div class="w-1/2">
                        <div class="flex my-2 items-stretch">
                            <div for="" class="w-32 text-right self-center text-sm text-grey-darker">Project Name</div>
                            <div class="ml-4 w-64">
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" v-model="name" />
                            </div>

                        </div>

                        <div class="flex my-2 items-stretch">
                            <div for="" class="w-32 text-right self-center text-sm text-grey-darker">Project Key</div>
                            <div class="ml-4 w-64">
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline uppercase" v-model="key" />
                            </div>

                        </div>

                        <div class="flex my-2 items-stretch">
                            <div for="" class="w-32 text-right self-center text-sm text-grey-darker">Project Lead</div>
                            <div class="ml-4 w-64">
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outliney" v-model="owner_id" />
                            </div>

                        </div>

                        <div class="flex my-2 items-stretch">
                            <div for="" class="w-32 text-right self-center text-sm text-grey-darker">Project Type</div>
                            <div class="ml-4">
                                <div class="inline-block relative w-64">
                                    <select class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" v-model="type">
                                        <option value="">Please Select One...</option>
                                        <option value="business">Business</option>
                                        <option value="software">Software</option>
                                        <option value="service_desk">Service Desk</option>
                                    </select>
                                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                                <div class="text-xs text-grey mt-1"></div>
                            </div>

                        </div>

                        <div class="flex my-4 items-stretch">
                            <div for="" class="w-32 text-right self-start text-sm text-grey-darker">Project Description</div>
                            <div class="ml-4 w-64">
                                <textarea type="text" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline resize-none" v-model="description" />
                            </div>

                        </div>

                    </div>

                    <div class="w-1/2">
                        <div class="container">
                            <div class="text-blue font-semibold mb-2">Simple issue tracking</div>
                            <p class="mb-4 text-grey-darker text-normal leading-normal">
                                The project provides you with a quick an easy way to get Larascrum up and running for simmple
                                issue tracking. You can keep things simple with, and you can optionally configure the settings later.
                            </p>
                            <p class="mb-4 text-grey-darker text-normal leading-normal">
                                Specify a descriptive name and key for your project. For example the name of the application that you are tracking issue for.
                            </p>
                            <p class="text-grey-darker text-normal leading-normal">
                                If you have more than one user, you also need to choose a project lead. This should be the person that manages issue tracking for this project.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-end mt-0 px-4">
            <button class="bg-white text-grey-darkest border border-grey-darker rounded-full px-4 py-2 text-sm  hover:border-blue hover:text-blue uppercase font-semibold focus:outline-none">Previous</button>
            <button class="bg-blue text-grey-lightest border border-blue rounded-full px-4 py-2 text-sm hover:bg-blue-dark hover:border-blue-dark uppercase mx-2 font-semibold focus:outline-none" @click="save">Finish</button>
        </div>

    </div>

</template>
<script>
    export default {
        data() {
            return {
                name: null,
                key: null,
                owner_id: null,
                type: null,
                description: null
            }
        },

        methods: {
            save() {
                axios.post('api/projects', {
                    name: this.name,
                    slug: this.key,
                    owner_id: this.owner_id,
                    type: this.type,
                    description: this.description
                }).then((response) => {
                    console.log(response);
                })
            }
        }
    }
</script>
