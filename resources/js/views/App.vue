<template>
    <div>
        <h1>{{ title }}</h1>

        <ul>
            <li v-for="post in posts" :key="post.id">
                <h3>{{ post.title }}</h3>
                <div>updated at: {{ post.updated_at }}</div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: 'Articoli',
            posts: []
        }
    },
    methods: {
        fetchPosts() {
            axios.get('/api/posts').then((res) => {
                console.log(res);
                const { posts } = res.data;
                this.posts = posts;
            });
        }
    },
    created() {
        this.fetchPosts();
    }
}
</script>

<style lang="scss" scoped>

</style>