<script>
import Header from "./components/partials/Header.vue";
import Footer from "./components/partials/Footer.vue";

export default {
    components: {
        Header,
        Footer,
    },
};
</script>

<template>
    <Header />
    <router-view></router-view>
    <Footer />
</template>
