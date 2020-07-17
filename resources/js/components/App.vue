<template>
  <div id="app">
    <google-map />
  </div>
</template>

<script>
import GoogleMap from "./constants/GoogleMap.vue"; 

export default {
  name: "App",
  components: {
    GoogleMap
  }
};
</script>