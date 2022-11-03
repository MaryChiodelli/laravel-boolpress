<template>
    <div v-if="post">
        <div class="container">
            <h1>{{ post.title }}</h1>
            <p>{{ post.content }}</p>
            <div v-if="post.category">Categoria: {{ post.category.name }}</div>
        </div>
    </div>
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