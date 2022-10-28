<template>
    <section>
        <div class="container py-[20px]">
            <h1>{{ title }}</h1>
        </div>

        <div class="container">
            <ul class="grid grid-cols-4 gap-4">
                <PostCard v-for="post in posts" :key="post.id" :post="post" />
            </ul>
        </div>
    </section>
</template>

<script>
import PostCard from '../components/PostCard.vue';

export default {
    components: {
        PostCard
    },
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