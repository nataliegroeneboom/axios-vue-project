<template>
  <div id="app">
<p>Upload File: images only</p>
<input type="file" accept="image/*" ref="file" multiple/>
<button @click="upload_multiple">Upload Multiple Image</button>
  </div>
</template>

<script>

import axios from 'axios';
import qs from 'qs';
export default {
 methods: {
   upload_multiple(){
     let formData = new FormData();
     let length = this.$refs.file.files.length;
     for(var i = 0; i < length; i++){
       formData.append(i, this.$refs.file.files[i] )
     }
        axios.post('/backend', formData)
     .then(function(response){
       if(response.data){
         alert(response.data)
       }else{
         alert('image was not uploaded')
       }
     })
     .catch(function(error){
       
     })
   },
   upload(){
     let formData = new FormData();
     formData.append(0, this.$refs.file.files[0])
     axios.post('/backend', formData)
     .then(function(response){
       if(response.data){
         alert('image uploaded')
       }else{
         alert('image was not uploaded')
       }
     })
     .catch(function(error){
       
     })
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
