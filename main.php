<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_auth_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_auth_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_auth_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_auth_client->createAuthUrl().'"></a>';
}

?>

<!DOCTYPE html>
<html>
<head>
   <title> User Information</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
    <div class="container">
        <div class="row">
         <div class="col-md-5 mx-auto">
         <div id="first">
            <div class="myform form " id="login_form">
                <div class="logo mb-3">
                   <div class="col-md-12 text-center">
                     <h1>User Info</h1>
                   </div>
               </div>
                   <form action="" method="post" name="login">
                           
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 
                                  <?php
                                    if ($login_button == '') 
                                    {
                                      echo '<div class= " tooltip">User Informations</div><div class="panel-body">';
                                      echo '<img src="'.$_SESSION["user_image"].'" class="img-circle img-thumbnail" id="user_img"/>';
                                      echo '<hr>';
                                      echo '<h4><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h4>';
                                      echo '<h5><b>Email :</b> '.$_SESSION['user_email_address'].'</h5>';
                                      echo '<hr>';
                                      echo' <div>
                                    <form  method="post" enctype="multipart/form-data">
                                      <div class="row" >
                                        <div class="col-md-6">
                                           <div class="form-group" style="height:0px;padding: 0;margin: 0">
                                                <div class="image-upload pull-left">
                                                  <label for="image_file">
                                                    <span class="btn btn-primary mybtn" ><i class="fa fa-folder-open"></i>&nbsp Browse</span>

                                                  </label>
                                                  <input type="file" name="file" id="image_file" style="display: none;" />
                                                  <button type="submit" name="upload_button" id="upload_button" class="btn btn-success mybtn"><i class="fa fa-upload"></i>&nbsp Upload</button>
                                                </div>                                                
                                            </div>
                                      </form>                                                                       
                                  </div>' ;                                   
                                  
                                      echo '<h5><button  class="btn btn-danger mybtn"><a href="logout.php" class="text-light">Logout </a></h5></div>';
                                      
                                    }
                                    else
                                       {
                                        echo '<div align="center" >'.$login_button . '</div>';
                                       }
                                  ?>
                                  <hr>
                                 <!--  <button  class="btn btn-danger mybtn"><a href="upload.php" class="text-light">next </a> -->
                              </p>
                           </div>                  
                        </form>                 
                </div>
          </div>          
        </div>
    </div>          
   </body>
</html>



