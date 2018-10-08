<template>
    <div class="md:flex min-h-screen">
        <div class="w-1/3 md:w-2/3 flex items-center justify-left" style="background: url('storage/images/planning.jpg') no-repeat; background-size: 200%;">
            <div class="m-8 hidden">
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

        <div class="w-2/3 flex md:w-1/3 items-center justify-left">
            <div class="m-12 w-full">
                <div class="text-blue">
                    <h1 class="text-5xl mb-2">Sign in</h1>
                    <small class="text-lg text-grey-dark">Enter your email and password</small>
                    <form class="mt-12" method="POST" @submit.prevent="submit">
                        <div class="bg-grey-lighter border-b border-grey mb-6 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="m-4"><path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/></svg>
                            <input class="w-full bg-grey-lighter py-5 px-4 text-grey-darker border border-grey-lighter leading-tight focus:border-grey-lighter" type="text" v-bind:class="{ 'border-red' : errors.email }" placeholder="Email Address" v-model="email">
                            <p v-if="errors.email" class="text-red text-xs italic">{{ errors.email[0] }}</p>
                        </div>
                        <div class="bg-grey-lighter border-b border-grey mb-6 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="m-4"><path d="M16 2c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zm0-2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm-5.405 16.4l-1.472 1.6h-3.123v2h-2v2h-2v-2.179l5.903-5.976c-.404-.559-.754-1.158-1.038-1.795l-6.865 6.95v5h6v-2h2v-2h2l2.451-2.663c-.655-.249-1.276-.562-1.856-.937zm7.405-11.4c.551 0 1 .449 1 1s-.449 1-1 1-1-.449-1-1 .449-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"/></svg>
                            <input class="appearance-none block w-full bg-grey-lighter py-5 px-4 outline:none text-grey-darker leading-tight" type="password" placeholder="Password" v-bind:class="{ 'border-red' : errors.password }" v-model="password">
                            <p v-if="errors.password" class="text-red text-xs italic">{{ errors.password[0] }}</p>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                 <input class="mr-2 leading-tight" type="checkbox" name="remember">
                                  <span class="font-bold text-blue hover:text-blue-dark cursor-pointer">
                                    Remember me
                                  </span>
                            </div>
                            <div>
                                <a href="#" class="font-bold no-underline text-blue hover:text-blue-dark">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="w-full py-6 rounded bg-blue shadow-md text-white uppercase font-bold hover:bg-blue-dark"  :class="{'bg-blue-dark': this.loading}">
                                <img src="gif/three-bar-loader.gif" alt="" class="w-16 h-16 absolute -m-8" v-if="this.loading" :disabled="this.loading">
                                <span v-else>Log In</span>
                            </button>
                        </div>
                        <div class="mt-6">
                            <span class="text-grey-dark font-bold">Don't have any account?</span>
                            <span>
                                <router-link class="font-bold no-underline text-blue hover:text-blue-dark" to="/register" exact>Sign up!</router-link>
                            </span>
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
                login: 'auth/login'
            }),

            submit() {
                this.loading = true;
                this.error = null;
                this.errors = [];

                this.login({
                    payload: {
                        email: this.email,
                        password: this.password
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
