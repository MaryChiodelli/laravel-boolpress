<template>
    <section>
        <div class="container py-[20px]">
            <h1>{{ title }}</h1>
        </div>

        <div class="container">
            <div class="grid grid-cols-4 gap-4">
                <router-link :to="{ name: 'posts.show', params: { slug: post.slug } }" v-for="post in posts" :key="post.id">
                    <PostCard :post="post" />
                </router-link>
            </div>
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