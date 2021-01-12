<template>
  <div class="container-fluid">
    <Navbar />
   
    <div class="container">
      <router-view />
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar"

export default {
  name: "App",
  components: {
    Navbar: Navbar
  },
};
</script>
<style lang="scss" scoped>
.container-fluid {
    padding: 0;
}
</style>