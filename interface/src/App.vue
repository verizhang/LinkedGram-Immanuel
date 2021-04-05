<template>
  <div id="app">
    <Navbar/>
    <router-view class="mt-5 pt-3"/>
  </div>
</template>
<script>
import Navbar from '@/components/Navbar.vue';
export default {
  components:{
    Navbar,
  }
}
</script>