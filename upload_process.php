<?php
//This move selected image file into image folder
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $array = explode('.', $_FILES['image']['name']);
      $file_ext = end($array);
      
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      // if($file_size > 20097152){
      //    $errors[]='File size must be excately 2 MB';
      // }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         //echo "Success";
      }else{
         //print_r($errors);
      }
   }

// Below code is use to handle file upload procedd in google drive API
session_start();
$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';
$client = new Google_Client();
$client->setClientId('898854167902-j88icbfunst5kqc3vvo30if1gdf2rmrk.apps.googleusercontent.com');
$client->setClientSecret('y-vKkvf372HiU9VjtH6sH2-0');
$client->setRedirectUri($url);
$client->setScopes(array('https://www.googleapis.com/auth/drive'));
if (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:'.$url);exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate();
}
$files= array();
$dir = dir('images');
while ($file = $dir->read()) {
    if ($file != '.' && $file != '..') {
        $files[] = $file;
    }
}
$dir->close();
if (!empty($_POST)) {
    $client->setAccessToken($_SESSION['accessToken']);
    $service = new Google_DriveService($client);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file = new Google_DriveFile();
    foreach ($files as $file_name) {
        $file_path = 'images/'.$file_name;
        $mime_type = finfo_file($finfo, $file_path);
        $file->setTitle($file_name);
        $file->setDescription('This is a '.$mime_type.' document');
        $file->setMimeType($mime_type);
        $service->files->insert(
            $file,
            array(
                'data' => file_get_contents($file_path),
                'mimeType' => $mime_type
            )
        );
    }
    $_SESSION['alert']='1';
    finfo_close($finfo);
    //below code is use to delete uploaded filef in the local folder
      $files = glob('images/*'); // get all file names
         foreach($files as $file){ // iterate files
            if(is_file($file))
               unlink($file); // delete file
                } 
               
   
  
  header('location:'.$url);exit;
   // Redirect page into upload page after upload file
   //header("Location: http://localhost/login/main.php");
   //$_SESSION['upload'] = "1";
    exit;
    
               
}
include 'upload_confirm.php';
