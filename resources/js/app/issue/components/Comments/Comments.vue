<template>
    <div>
        <comment v-for="comment in comments" :key="comment.id" :comment="comment"></comment>

        <new-comment></new-comment>

    </div>
</template>

<script>
    import Comment from './Comment'
    import NewComment from './NewComment'

    export default {

        components: {
            Comment,
            NewComment
        },

        props: ['comments']

    }
</script>
