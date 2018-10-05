<template>
<div>
    <div class="fixed z-40 pin overflow-auto bg-smoke-dark flex" v-if="isActive">

    </div>
     <div class="w-auto absolute shadow-md rounded bg-white shadow z-50 mt-6" v-if="isActive" v-click-outside="hide">
           <h5 class="p-2 border-b border-grey-light text-grey text-sm mx-2">Change status to</h5>
           <li class="list-reset my-4"><a href="#" class="no-underline text-blue-dark hover:text-blue-light p-2">Stop Progress</a></li>
           <li class="list-reset my-4"><a href="#" class="no-underline text-blue-dark hover:text-blue-light p-2">Resolve Issue</a></li>
           <li class="list-reset my-4"><a href="#" class="no-underline text-blue-dark hover:text-blue-light p-2">Close Issue</a></li>
        </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                isActive: true
            }
        }
    }
</script>
