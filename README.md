# vue_axios

### Notes on axios + Vue
In this branch I am learning how to upload images/files with axios

###FormData
**FormData** interface provides a say to easily construct a set of key/value pairs representing form fields and their values. Below when the button is clicked, a formData object is created and the file is appended to the object.  $refs attribute refers elements on our Vue instance, we have access to DOM element.  We are able to do this because we set the ref value to 'file' in the input tag, thus in doing so we can select the DOM object of the input tag with this.$refs.

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
 In the console log you have access to the file object that has been uploaded
 
 
![alt text](https://github.com/nataliegroeneboom/axios-vue-project/blob/axios-upload/console.png)

So within the upload method you append the file to the formData object and send it to the backend file

```javascript
 methods: {
   upload(){
     let formData = new FormData();
     formData.append('image', this.$refs.file.files[0])
     axios.post('/backend/template.php', formData)
   }
 }
 ```

 ###Uploading One Image
 In the backend file upload.php we add validation checks as to whether the image has been uploaded

 ```php
 if(!empty($_FILES)){
    if($_FILES[0]['error']==0){
        //check file type and size
        $url = './storage/'. $_FILES[0]['name'];
        if(move_uploaded_file($_FILES[0]['tmp_name'], $url)){
            echo true;
        }else{
            echo false;
        }
    }else{
        echo false;
    }
}else{
    echo false;
}
 ```

 The response.data is either true or false, as set out by the php if/else statements

 ```javascript
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
   ```

    ###Uploading Multiple images

    ```html
    <button @click="upload_multiple">Upload Multiple Image</button>
    ```

    Difference being that we have to loop through the array

    ```php
    if(!empty($_FILES)){
    foreach($_FILES as $item){
        if($item['error'] ==0){
            $url = './storage/'. $item['name'];
            if(move_uploaded_file($item['tmp_name'], $url)){
                echo $item['name'] . " has been uploaded \n";
            }else{
                echo false;
            }
           
        }else{
            echo false;
        }
    }
}else{
    echo false;
}
```
```javascript
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
   ```