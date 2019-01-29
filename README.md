# vue_axios

### Notes on axios + Vue
In this branch I am learning how to upload images/files with axios

###FormData
**FormData** interface provides a say to easily construct a set of key/value pairs representing form fields and their values. Below when the button is clicked, a formData object is created and the file is appended to the object.  $refs attribute refers elements on our Vue instance, we have access to DOM element

```html
<input type="file" accept="image/*" ref="file" multiple/>
<button @click="upload">Upload Image</button>
```

```javascript
 methods: {
   upload(){
     let formData = new FormData();
     console.log(this.$refs);
   }
 }
 ```
 In the console log
 
 
![alt text](https://github.com/nataliegroeneboom/axios-vue-project/blob/axios-upload/console.pngs)
