<template>
    <div class="w-full flex">

		<div class="w-1/6">
			<projects></projects>
		</div>

		<div class="w-5/6 flex">

            <div class="w-1/4">

				<div class="ml-4">
					<schemas></schemas>
				</div>

			</div>

            <div class="w-3/4">

                <h4 class="text-grey-darkest py-4">Types ({{ this.types.length }})</h4>

                <div class="py-4">
                    <div class="shadow bg-white border-l-4 border-blue p-4 text-xs text-grey-darker mr-4 rounded leading-normal">
                        As an administrator, you can group issue types into issue type schemes to make it easier for your team to select the right type when creating issues in their project. Issue type schemes can also minimize the maintenance work required when administering several projects.
                    </div>
                </div>

                <div class="flex justify-end mr-4">
                    <button class="focus:outline-none bg-blue shadow text-white text-sm rounded-full py-1 w-24 hover:bg-blue-dark hover:text-white mx-4 font-semibold tracking-wide">Save</button>
                </div>

                <div class="py-2">
                    <div v-for="type in types" :key="type.id" class="flex text-grey-darker bg-white text-sm py-4 my-2 shadow rounded mr-4 font-semibold">
                        <div class="w-1/5 flex justify-center">
                            <span class="border rounded-full border-grey flex items-center cursor-pointer w-8" :class="subscriptionClass(type.id)">
                                <span class="rounded-full border w-4 h-4 border-grey shadow-inner shadow bg-white" >
                                </span>
                            </span>
                        </div>
                        <div class="w-1/5">{{ type.name }}</div>
                        <div class="w-1/2 text-xs text-grey-dark">{{ type.description }}</div>
                    </div>

                    <button class="float bg-blue text-white shadow-lg focus:outline-none hover:bg-blue-dark">
                        <svg version="1.1" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" class="w-6 h-6 text-white mt-1" xml:space="preserve">
                            <path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
                            v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" fill="currentColor" />
                        </svg>
                    </button>

                </div>

            </div>

		</div>

	</div>
</template>

<script>
    import Projects from './Sidebar/Projects'
    import Schemas from './Lists/Schemas'

    export default {
        components: {
            Projects,
            Schemas
        },

        data() {
            return {
                types: [],
                tmp: [1,4,5]
            }
        },

        computed: {

        },

        mounted() {
            axios.get('api/types').then((response) => {
                this.types = response.data.data;
            });
        },

        methods: {
            // Set the necessary subscription class based on the user subscribion.
			subscriptionClass(id) {
				return this.tmp.indexOf(id) != -1 ? 'justify-end bg-blue' : 'justify-start bg-white';
			},
        }
    }
</script>
