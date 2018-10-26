<template>
    <div class="mb-2">
        <div class="bg-white text-center py-4 flex cursor-pointer" :class="{ 'shadow hover:shadow-md': !isOpen }" @click="setSelectedProject(project.id)">
            <div class="text-center">
                <img :src="project.icon" class="w-10 h-10 ml-12 rounded-full">
			</div>
            <div class="text-left ml-4 flex items-stretch">
                <div class="self-center">
                    <p class="text-grey-darkest mb-1 capitalize text-base font-semibold" v-text="project.name"></p>
                    <p class="text-blue-light uppercase text-xs font-semibold" v-text="project.slug"></p>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-4" v-if="isOpen">
            <div class="project-card">
                <div class="ml-12">
                    <a class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue cursor-pointer" @click="isIssueOpen = !isIssueOpen">
					    <img src="svg/align-left.svg" class="w-4 h-4 mr-4">
						Issues
					</a>
                </div>

                <div v-if="isIssueOpen" tag="div" @click="selectIssueType('all')" class="py-2 my-1 text-sm text-grey-dark pl-24 flex project-card no-underline text-grey-dark cursor-pointer hover:bg-grey-lightest" :class="isActiveClass('all')">
                    <div class="inline-block w-24">All</div>
                    <div class="inline-block" v-text="project.allIssuesInThisProjectCount"></div>
                </div>

                <div v-if="isIssueOpen" tag="div" @click="selectIssueType('my')" class="py-2 my-1 text-sm text-grey-dark pl-24 flex project-card no-underline text-grey-dark cursor-pointer hover:bg-grey-lightest" :class="isActiveClass('my')">
                    <div class="inline-block w-24">My</div>
                    <div class="inline-block" v-text="project.myIssuesInThisProjectCount"></div>
                </div>

            </div>
            <div class="mt-4">
                <div class="ml-12">
                    <div class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue cursor-pointer">
					    <img src="svg/reports.png" class="w-4 h-4 mr-4">
						Reports
					</div>
                </div>
            </div>
            <div class="mt-4">
                <div class="ml-12">
                    <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
					    <img src="svg/rocket.png" class="w-4 h-4 mr-4">
						Releases
					</a>
                </div>
            </div>
            <div class="mt-4">
                <div class="ml-12">
                    <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
                        <img src="svg/copy.png" class="w-4 h-4 mr-4">
                        Components
                    </a>
                </div>
            </div>
            <div class="mt-4">
                <div class="ml-12">
                    <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
                        <img src="svg/clock.png" class="w-4 h-4 mr-4">
                        Timesheets
                    </a>
                </div>
            </div>
            <div class="mt-4">
                <div class="ml-12">
                    <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
                        <img src="svg/signal.png" class="w-4 h-4 mr-4">
                        Tests
                    </a>
                </div>
            </div>
            <div class="mt-4">
                <div class="ml-12">
                    <a href="#" class="no-underline text-grey-darkest font-semibold text-sm hover:text-blue">
                        <img src="svg/database.png" class="w-4 h-4 mr-4">
                        Add-ons
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapMutations, mapGetters } from 'vuex'

    export default {
        props: {
            'project': {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                isIssueOpen: false
            }
        },

        computed: {
            // Map Vuex getters
            ...mapGetters({
				selectedProject: 'issue/selectedProject'
            }),

            // Check the selected project is open or not, if not open it
            // and close the other opened projects on the sidebar.
            isOpen() {
                return this.selectedProject == this.project.id;
            }
        },

        methods: {
            // Map Vuex axtions
			...mapActions({
				fetchIssuesByProject: 'issue/fetchIssuesByProject'
            }),

            // Map Vuex mutations
            ...mapMutations({
				setSelectedProject: 'issue/setSelectedProject'
            }),

            /* Select the issue type than filter the list and set the proper url */
            selectIssueType(type) {
                this.$router.replace({
					name: 'issues_with_project',
					params: {
						project: this.project.slug,
						by: type
					}
                });

                this.$emit('selected', type);
            },

            /* Set the submenu active class depends on the url */
            isActiveClass(param) {
                return this.$route.params.project == this.project.slug && this.$route.params.by == param ? 'border-r-4 border-blue bg-white rounded shadow' : '';
            }
        }
    }

</script>

<style scoped>
.project-card > .router-link-active {
  @apply bg-white border-r-4 border-blue rounded-r
}
</style>
