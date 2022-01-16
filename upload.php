<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
session_start();
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            $fotoad = $_POST['photoname'];
            $fiyat = $_POST['price'];
            $id=$_SESSION['id'];
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (userid,image, created,photoname,price ) VALUES ('$id','$imgContent', NOW(), '$fotoad', '$fiyat')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "Fotoğraf başarıyla yüklendi."; 
            }else{ 
                $statusMsg = "Fotoğraf yüklenemedi, lütfen tekrar deneyin"; 
            }  
        }else{ 
            $statusMsg = 'Sadece JPG, JPEG, PNG, & GIF türündeki dosyalar kabul edilmektedir.'; 
        } 
    }else{ 
        $statusMsg = 'Lütfen yüklemek istediğiniz dosyayı seçin.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>