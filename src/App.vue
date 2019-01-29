<template>
  <div id="app">
<button @click="trigger_get()">Trigger Axios Get</button>
<button @click="trigger_post()">Trigger Axios Post</button>
<button @click="trigger_both()">Trigger Axios Both</button>
  </div>
</template>

<script>

import axios from 'axios';
import qs from 'qs';
export default {
 methods: {
     trigger_both(){
       function send_msg(){
         return axios.post('/backend/template.php',qs.stringify({msg: 'this is my message'}))
       }
       function send_author(){
         return axios.get('/backend/template.php', {params: {author:'Natalie'}})
       }
      axios.all([
        send_msg(), send_author()
      ])
      .then(
       axios.spread(function(msg, author){
         console.log(msg)
         console.log(author)
       }) 
      )
      .catch(function(error){
        console.log(error)
        
      })
    },
    trigger_post(){
      var request_interceptor = axios.interceptors.request.use(
        function(config){
          // operate properties of config
          console.log(config);
          config.timeout = 100;
          // retrieve data
         // console.log(qs.parse(config.data).msg);
         config.data = qs.stringify({msg: 'new data set by request interceptor'})
          return config;
        },
        function(error){
        //  console.log(error);
          return Promise.reject(error);
        }
      );
   // axios.interceptors.request.eject(request_interceptor);
    //  axios.interceptors.response.use(
    //    function(reponse){
    //      console.log(response);
    //      return response;
    //    },
    //    function(error){
    //      return Promise.reject(error); 
    //    }
    //  )


      axios.post('/backend/template.php',qs.stringify({
        msg: 'this is the message from axios POST'
      }),{
        timeout:100
      })
      .then(function(response){
        console.log(response)
      })
      .catch(function(error){
        if(error.response){
          // successful request and response but its not a 200
          console.log('successful request + response ' + error.message);

        }else if(error.request){
          // successfull request but no response from the server received
          console.log('successful request but no response '+ error.message);

        }else{
          // no request has been made
           console.log('no request sent out '+ error.message);

        }
      })
    },
    trigger_get(){
      axios.get('/backend/template.php', {
        params: {msg: 'this is the message from axios GET'}
      })
      .then(function(response){
        console.log(response)
      })
      .catch(function(error){
        console.log(error)
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
