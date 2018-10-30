<template>
    <div class="w-full flex">

		<div class="w-1/6">
			<projects></projects>
		</div>

		<div class="w-5/6 flex">

            <div class="w-1/4 p-2">
                <div class="bg-white shadow p-4 rounded h-64 flex flex-wrap content-between">
                    <div class="w-full">
                        <div class="flex pb-4 items-stretch">
                            <img src="storage/icons/copy.png" class="w-12 h-12">
                            <div class="self-center">
                                <h4 class="font-normal ml-4">Issue Types</h4>
                            </div>
                        </div>
                        <div class="text-sm mt-3">
                            Keep track of different types of issues, such as bugs or tasks. Each issue types can be configured differently.
                        </div>
                        <div class="text-sm mt-4">
                            Scheme: <a href="#" class="no-underline font-semibold text-blue hover:text-blue-light">Simple SCRUM issue type scheme</a>
                        </div>
                    </div>

                    <div class="w-full mt-4 text-right">
                        <button class="bg-white text-black border border-grey-darker rounded-full px-5 py-2 hover:border-blue hover:text-blue focus:outline-none text-sm">Default</button>
                        <button class="bg-blue text-white rounded-full px-5 py-2 border border-blue hover:bg-blue-light hover:border-blue-light focus:outline-none text-sm ">Change</button>
                    </div>
                </div>
            </div>
            <div class="w-1/4 p-2 h-64">
                <div class="bg-white shadow p-4 rounded h-64 flex flex-wrap content-between">
                     <div class="w-full">
                          <div class="flex pb-4 items-stretch">
                            <img src="storage/icons/branch.svg" class="w-12 h-12">
                            <div class="self-center">
                                <h4 class="font-normal ml-4">Workflows</h4>
                            </div>
                        </div>
                        <div class="text-sm mt-3">
                            Issue can follow processes that mirror your team's practices. A workflow defines the sequence of steps than an issue will follow, e.g "In Progress", "Resolved"
                        </div>
                        <div class="text-sm mt-4">
                            Workflow: <a href="#" class="no-underline font-semibold text-blue hover:text-blue-light">Default workflow</a>
                        </div>
                     </div>

                    <div class="w-full mt-4 text-right">
                        <button class="bg-white text-black border border-grey-darker rounded-full px-5 py-2 hover:border-blue hover:text-blue focus:outline-none text-sm">Default</button>
                        <button class="bg-blue text-white rounded-full px-5 py-2 border border-blue hover:bg-blue-light hover:border-blue-light focus:outline-none text-sm ">Change</button>
                    </div>
                </div>
            </div>

		</div>

	</div>
</template>

<script>
    import Projects from './Sidebar/Projects'

    export default {
        components: {
            Projects
        }
    }
</script>
