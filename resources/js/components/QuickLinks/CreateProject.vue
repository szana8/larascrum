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
                                <v-select :options="users" label="name" v-model="owner_id" id="user" class="shadow">
                                    <template slot="option" slot-scope="option" class="flex items-stretch">
                                        <img :src="option.avatar_url" class="w-5 h-5 self-center rounded-full">
                                        <span class="self-center font-normal">{{ option.name }}</span>
                                    </template>
                                </v-select>
                            </div>

                        </div>

                        <div class="flex my-2 items-stretch">
                            <div for="" class="w-32 text-right self-center text-sm text-grey-darker">Project Type</div>
                            <div class="ml-4">
                                <div class="inline-block relative w-64">
                                    <v-select :options="project_types" label="label" v-model="type" id="project" class="shadow">
                                        <template slot="option" slot-scope="option" class="flex items-stretch">
                                            <img :src="option.icon" class="w-5 h-5 self-center">
                                            <span class="self-center font-normal">{{ option.label }}</span>
                                        </template>
                                    </v-select>
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
    import ProjectNameSlugify from '../../helpers/ProjectNameSlugify'
    import vSelect from 'vue-select'
    import {EventBus} from '../../event-bus'


    export default {
        components: {
            vSelect
        },

        data() {
            return {
                name: null,
                key: null,
                owner_id: null,
                type: null,
                description: null,
                slugify: new ProjectNameSlugify(),
                users: [],
                project_types: [
                    {
                        id: 'business',
                        label: 'Business',
                        icon: 'storage/icons/project/business.svg'
                    },
                    {
                        id: 'software',
                        label: 'Software',
                        icon: 'storage/icons/project/software.svg'
                    },
                    {
                        id: 'service_desk',
                        label: 'Service Desk',
                        icon: 'storage/icons/project/service_desk.svg'
                    }
                ]
            }
        },

        watch: {
            name() {
                this.key = this.slugify.generateKey(this.name);
            }
        },

        mounted() {
            axios.get('api/users').then((response) => {
                this.users = response.data.data;
            });
        },

        methods: {
            save() {
                axios.post('api/projects', {
                    name: this.name,
                    slug: this.key,
                    owner_id: this.owner_id.id,
                    type: this.type.id,
                    description: this.description
                }).then((response) => {
                    this.name = null;
                    this.slug = null;
                    this.owner_id = null;
                    this.type = null;
                    this.description = null;

                    EventBus.$emit('project-created', response);
                })
            }
        }
    }
</script>
