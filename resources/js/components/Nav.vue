<template>
    <header>
        <div class="container px-4 py-2 flex flex-wrap justify-between items-baseline">
            <div class="text-lg">Boolpress</div>
            <ul class="flex">
                <li v-for="(link, index) in navLinks" :key="index" class="px-2">
                    <router-link :to="{ name: link.name }">{{ link.text }}</router-link>
                </li>
            </ul>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            navLinks: [
                {
                    text: 'Home',
                    name: 'home'
                },
                {
                    text: 'Chi siamo',
                    name: 'about-us'
                },
                {
                    text: 'Contatti',
                    name: 'contact-us'
                },
                {
                    text: 'Blog',
                    name: 'posts.index'
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

</style>