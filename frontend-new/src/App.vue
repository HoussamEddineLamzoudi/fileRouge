<template>
  <div>
    <Navbar />
    <router-view />
    <Footer />
  </div>
</template>

<style lang="scss">
h1 {
  color: rgb(97, 127, 225);
}
</style>

<script>
import Navbar from "./components/navbar.vue";
import Footer from "./components/footer.vue";

export default {
  name: "App",
  components: {
    Navbar,
    Footer,
  },
};
</script>
