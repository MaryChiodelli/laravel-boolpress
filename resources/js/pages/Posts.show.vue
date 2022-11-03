<template>
    <article v-if="post">
        <div class="container">
            <img v-if="post.cover_path" :src="post.cover_path" alt="">
        </div>

        <div class="container text-center">
            <div v-if="post.category">{{ post.category.name }}</div>
            <h1>{{ post.title }}</h1>
            <div>{{ post.update_date }}</div>
        </div>

        <div class="container">
            <p v-if="post.content">{{ post.content }}</p>
        </div>

        <div v-if="post.tags.length > 0" class="container">
            <div>Tags</div>
            <ul class="flex">
                <li v-for="tag in post.tags" :key="tag.slug" class="mr-2">{{ tag.name }}</li>
            </ul>
        </div>
    </article>
</template>

<script>
export default {
    props: ['slug'],
    data() {
        return {
            post: null
        }
    },
    methods: {
        fetchPost() {
            axios.get(`/api/posts/${this.slug}`).then((res) => {
                const { post } = res.data;
                this.post = post;
                console.log(post);
            }).catch((err) => {
                const { status } = err.response;
                if (status === 404) {
                    this.$router.replace({ name: '404' });
                }
            });
        }
    },
    created() {
        this.fetchPost();
    }
}
</script>

<style lang="scss" scoped>

</style>