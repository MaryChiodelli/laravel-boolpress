<template>
    <li class="bg-slate-50 rounded-md p-4">
        <h3 class="text-2xl">{{ post.title }}</h3>
        <div>aggiornato il: {{ post.update_date }}</div>

        <ul class="flex" v-if="post.tags">
            <li class="mr-2 bg-amber-200 rounded text-sm px-3 py-1" v-for="tag in post.tags" :key='tag.slug'>{{ tag.name }}</li>
        </ul>

        <span class="text-sm px-3 py-1 bg-green-200 rounded" v-if="post.category">
            {{ post.category.name }}
        </span>
    </li>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>

</style>