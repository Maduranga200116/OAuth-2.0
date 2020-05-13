<!DOCTYPE html>
<html>
<head>
   <title>Upload Files</title>

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
                     <h1>File Upload</h1>
                   </div>
               </div>
               <div>
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
               </div>
               <br>
               <hr>
               <div class="container ">
                    <form action="#" method="post" enctype="multipart/form-data"> 
                        Type Folder Name:<input type="text" name="foldername" /><br/><br/>
                        Select Folder to Upload: <input type="file" name="files[]" id="files" multiple directory=""  moxdirectory="" /><br/><br/> 
                        <input type="Submit" value="Upload" name="upload" />
                    </form>
               </div>
                                  
              </div>
          </div>          
        </div>
    </div>          
   </body>
</html>
 <?php
  if(isset($_POST['upload']))
  {
    if($_POST['foldername'] != "")
    {
      $foldername=$_POST['foldername'];
      if(!is_dir($foldername))
        mkdir($foldername);
      foreach($_FILES['files']['name'] as $i => $name)
    {
        if(!is_dir($name))
        {
          mkdir($foldername."/".$name);
          if(strlen($_FILES['files']['name'][$i]) > 1)
          {
            move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
          }
        }
        else
        {
          if(strlen($_FILES['files']['name'][$i]) > 1)
          {
          move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
          }
        }
      }
      echo "Folder is successfully uploaded";
    }
    else
      echo "Upload folder name is empty";
  }
  ?>
 


