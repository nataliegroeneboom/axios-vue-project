<template>
  <div id="app">
<p>Upload File: images only</p>
<input type="file" accept="image/*" ref="file" multiple/>
<button @click="upload">Upload Image</button>
  </div>
</template>

<script>

import axios from 'axios';
import qs from 'qs';
export default {
 methods: {
   upload(){
     let formData = new FormData();
     console.log(this.$refs);
   }
 }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
