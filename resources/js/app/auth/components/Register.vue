<template>
    <div class="md:flex min-h-screen">
        <div class="w-full md:w-1/2 bg-blue-darker flex items-center justify-left">
            <div class="m-8">
                <div class="text-white">
                    <h1 class="text-5xl">Let's get to business!</h1>
                    <li class="list-reset mt-12">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 items-center p-3 text-white fill-current"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z" /></svg>
                            <div class="ml-4 mt-2">
                                <h3 class="mb-2 text-xl">Easy to use</h3>
                                <div class="text-blue-lighter text-md">Create recuring invoices and receive updates when they're opened.</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-reset mt-12">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 items-center p-3 text-white fill-current"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z" /></svg>
                            <div class="ml-4 mt-2">
                                <h3 class="mb-2 text-xl">Multi currency</h3>
                                <div class="text-blue-lighter text-md">Recognize foregign currency accounts, with exchange rules updated hourly.</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-reset mt-12">
                        <div class="flex">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 items-center p-3 text-white fill-current"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z" /></svg>
                            <div class="ml-4 mt-2">
                                <h3 class="mb-2 text-xl">Expanses</h3>
                                <div class="text-blue-lighter text-md">Handle personal experiences with easy. Just review and approve receipts.</div>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </div>

        <div class="w-full flex md:w-1/2 items-center justify-left">
            <div class="m-12 w-full">
                <div class="text-blue-darker">
                    <h1 class="text-5xl mb-2">Sign up</h1>
                    <small class="text-lg text-grey-dark">Fill the registration form with your credentials.</small>
                    <form class="mt-12" method="POST" @submit.prevent="submit">
                        <div class="bg-grey-lighter border-b border-grey mb-6 flex">
                                <svg version="1.1" width="24" height="24" class="m-4" viewBox="0 0 482.9 482.9">
                                    <path d="M239.7,260.2c0.5,0,1,0,1.6,0c0.2,0,0.4,0,0.6,0c0.3,0,0.7,0,1,0c29.3-0.5,53-10.8,70.5-30.5
                                        c38.5-43.4,32.1-117.8,31.4-124.9c-2.5-53.3-27.7-78.8-48.5-90.7C280.8,5.2,262.7,0.4,242.5,0h-0.7c-0.1,0-0.3,0-0.4,0h-0.6
                                        c-11.1,0-32.9,1.8-53.8,13.7c-21,11.9-46.6,37.4-49.1,91.1c-0.7,7.1-7.1,81.5,31.4,124.9C186.7,249.4,210.4,259.7,239.7,260.2z
                                        M164.6,107.3c0-0.3,0.1-0.6,0.1-0.8c3.3-71.7,54.2-79.4,76-79.4h0.4c0.2,0,0.5,0,0.8,0c27,0.6,72.9,11.6,76,79.4
                                        c0,0.3,0,0.6,0.1,0.8c0.1,0.7,7.1,68.7-24.7,104.5c-12.6,14.2-29.4,21.2-51.5,21.4c-0.2,0-0.3,0-0.5,0l0,0c-0.2,0-0.3,0-0.5,0
                                        c-22-0.2-38.9-7.2-51.4-21.4C157.7,176.2,164.5,107.9,164.6,107.3z"/>
                                    <path d="M446.8,383.6c0-0.1,0-0.2,0-0.3c0-0.8-0.1-1.6-0.1-2.5c-0.6-19.8-1.9-66.1-45.3-80.9c-0.3-0.1-0.7-0.2-1-0.3
                                        c-45.1-11.5-82.6-37.5-83-37.8c-6.1-4.3-14.5-2.8-18.8,3.3c-4.3,6.1-2.8,14.5,3.3,18.8c1.7,1.2,41.5,28.9,91.3,41.7
                                        c23.3,8.3,25.9,33.2,26.6,56c0,0.9,0,1.7,0.1,2.5c0.1,9-0.5,22.9-2.1,30.9c-16.2,9.2-79.7,41-176.3,41
                                        c-96.2,0-160.1-31.9-176.4-41.1c-1.6-8-2.3-21.9-2.1-30.9c0-0.8,0.1-1.6,0.1-2.5c0.7-22.8,3.3-47.7,26.6-56
                                        c49.8-12.8,89.6-40.6,91.3-41.7c6.1-4.3,7.6-12.7,3.3-18.8c-4.3-6.1-12.7-7.6-18.8-3.3c-0.4,0.3-37.7,26.3-83,37.8
                                        c-0.4,0.1-0.7,0.2-1,0.3c-43.4,14.9-44.7,61.2-45.3,80.9c0,0.9,0,1.7-0.1,2.5c0,0.1,0,0.2,0,0.3c-0.1,5.2-0.2,31.9,5.1,45.3
                                        c1,2.6,2.8,4.8,5.2,6.3c3,2,74.9,47.8,195.2,47.8s192.2-45.9,195.2-47.8c2.3-1.5,4.2-3.7,5.2-6.3
                                        C447,415.5,446.9,388.8,446.8,383.6z"/>
                            </svg>
                            <input class="w-full bg-grey-lighter py-5 px-4 text-grey-darker border border-grey-lighter leading-tight focus:outline-none" type="text" v-bind:class="{ 'border-red' : errors.name }" placeholder="Name" v-model="name">
                            <p v-if="errors.name" class="text-red text-xs italic">{{ errors.name[0] }}</p>
                        </div>
                        <div class="bg-grey-lighter border-b border-grey mb-6 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="m-4"><path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/></svg>
                            <input class="w-full bg-grey-lighter py-5 px-4 text-grey-darker border border-grey-lighter leading-tight focus:outline-none" type="text" v-bind:class="{ 'border-red' : errors.email }" placeholder="Email Address" v-model="email">
                            <p v-if="errors.email" class="text-red text-xs italic">{{ errors.email[0] }}</p>
                        </div>
                        <div class="bg-grey-lighter border-b border-grey mb-6 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="m-4"><path d="M16 2c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zm0-2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm-5.405 16.4l-1.472 1.6h-3.123v2h-2v2h-2v-2.179l5.903-5.976c-.404-.559-.754-1.158-1.038-1.795l-6.865 6.95v5h6v-2h2v-2h2l2.451-2.663c-.655-.249-1.276-.562-1.856-.937zm7.405-11.4c.551 0 1 .449 1 1s-.449 1-1 1-1-.449-1-1 .449-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"/></svg>
                            <input class="appearance-none block w-full bg-grey-lighter py-5 px-4 outline:none text-grey-darker leading-tight focus:outline-none" type="password" placeholder="Password" v-bind:class="{ 'border-red' : errors.password }" v-model="password">
                            <p v-if="errors.password" class="text-red text-xs italic">{{ errors.password[0] }}</p>
                        </div>
                        <div class="bg-grey-lighter border-b border-grey mb-6 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="m-4"><path d="M16 2c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zm0-2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm-5.405 16.4l-1.472 1.6h-3.123v2h-2v2h-2v-2.179l5.903-5.976c-.404-.559-.754-1.158-1.038-1.795l-6.865 6.95v5h6v-2h2v-2h2l2.451-2.663c-.655-.249-1.276-.562-1.856-.937zm7.405-11.4c.551 0 1 .449 1 1s-.449 1-1 1-1-.449-1-1 .449-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"/></svg>
                            <input class="appearance-none block w-full bg-grey-lighter py-5 px-4 outline:none text-grey-darker leading-tight focus:outline-none" type="password" placeholder="Password Confirm" v-bind:class="{ 'border-red' : errors.password_confirmation }" v-model="password_confirmation">
                            <p v-if="errors.password_confirmation" class="text-red text-xs italic">{{ errors.password_confirmation[0] }}</p>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="w-full py-6 rounded bg-blue-darker text-white uppercase font-bold hover:bg-blue-dark focus:outline-none" :class="{'bg-blue-dark': this.loading}">
                                <img src="gif/three-bar-loader.gif" alt="" class="w-16 h-16 absolute -m-8" v-if="this.loading" :disabled="this.loading">
                                <span v-else>Log In</span>
                            </button>
                        </div>
                        <div class="mt-6">
                            <span class="text-grey-dark font-bold">You have an account?</span> <span><router-link class="font-bold no-underline text-blue hover:text-blue-dark" to="/login" exact>Sign in!</router-link></span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    import localforage from 'localforage'
    import { isEmpty } from 'lodash'

    export default {
        data() {
            return {
                email: null,
                password: null,
                password_confirmation: null,
                name: null,
                errors: [],
                loading: false,
                isDisable: false,
                error: null
            }
        },

        watch: {
            loading: function() {
                if (this.loading) {
                    isDisable: true
                }
                else {
                    isDisable: false
                }
            }
        },

        methods: {
            ...mapActions({
                register: 'auth/register'
            }),

            submit() {
                this.loading = true;
                this.error = null;
                this.errors = [];

                this.register({
                    payload: {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    },
                    context: this
                }).then(() => {
                    localforage.getItem('intended').then((name) => {
                        this.loading = false
                        if (isEmpty(name)) {
                            this.$router.replace({name: 'home'})
                            return
                        }

                        this.$router.replace({name: name})
                    })
                }).catch((error) => {
                    this.loading = false
                    this.error = error
                })
            }
        }
    }
</script>
