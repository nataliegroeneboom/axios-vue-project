<template>
  <div id="app">
<p>Upload File: images only</p>
<input type="file" accept="image/*" ref="file" multiple/>
<button @click="upload_multiple">Upload Multiple Image</button>
<p v-if="progress">Uploaded: {{progress}}%</p>
<progress max="100" v-bind:value='progress'></progress>
  </div>
</template>

<script>

import axios from 'axios';
import qs from 'qs';
import vue from 'vue';
vue.prototype.custom_axios = custom_axios
let custom_axios = axios.create({});
export default {
 data: function(){
    return{
      progress: 0
    }
 },  
 methods: {
   upload_multiple(){
     let formData = new FormData();
     let length = this.$refs.file.files.length;
     let vm = this;
     for(var i = 0; i < length; i++){
       formData.append(i, this.$refs.file.files[i] )
     }
        this.custom_axios.post('/backend', formData, {
          onUploadProgress:function(uploadevent){
            console.log(Math.round(uploadevent.loaded/uploadevent.total *100))
            vm.progress = Math.round(uploadevent.loaded/uploadevent.total *100)
          }
        })
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
     this.custom_axios.post('/backend', formData)
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
