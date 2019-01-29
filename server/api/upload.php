<?php
// if(!empty($_FILES)){
//     if($_FILES[0]['error']==0){
//         //check file type and size
//         $url = './storage/'. $_FILES[0]['name'];
//         if(move_uploaded_file($_FILES[0]['tmp_name'], $url)){
//             echo true;
//         }else{
//             echo false;
//         }
//     }else{
//         echo false;
//     }
// }else{
//     echo false;
// }

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
?>