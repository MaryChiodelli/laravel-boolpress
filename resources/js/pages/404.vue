<template>
    <div>
        <div class="container text-center py-6">
            <h1 class="text-[250px] leading-[250px]">404</h1>
            <div class="text-4xl mb-4">Page Not Found</div>
            <p class="text-lg mb-2">La pagina che stai cercando non esiste</p>
            <router-link :to="{ name: 'home' }" class="inline-block px-4 py-2 rounded bg-sky-500 text-white">Torna alla Home</router-link>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

</style>