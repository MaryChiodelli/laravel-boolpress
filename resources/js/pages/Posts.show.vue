<template>
    <div class="container">
        <h1>Pagina di dettaglio</h1>
        <div>{{ slug }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            slug: null
        }
    },
    methods: {
        fetchPost() {
            const { slug } = this.$route.params;
            this.slug = slug;
            console.log(slug);
        }
    },
    created() {
        this.fetchPost();
    }
}
</script>

<style lang="scss" scoped>

</style>