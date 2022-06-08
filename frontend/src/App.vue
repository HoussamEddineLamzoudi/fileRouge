<template>
  <div>
    <Navbar />
    <router-view/>
    <Footer />
  </div>
</template>

<style>
  h1{
    color:rgb(97, 127, 225)
  }
</style>

<script>

import Navbar from './components/navbar'
import Footer from './components/footer'

export default {

    name: 'App',
    components: {
      Navbar,
      Footer,
    }
}
</script>
