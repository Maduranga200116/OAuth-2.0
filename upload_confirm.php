<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload to Drive</title><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <!------ Include the above in your HEAD tag ---------->

                <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
                <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
                <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="css/styles.css">
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
        <ul>
      
                            

        <div class="container">
        <div class="row">
         <div class="col-md-5 mx-auto">
         <div id="first">
            <div class="myform form " id="login_form">
                <div class="logo mb-3">
                   <div class="col-md-12 text-center">
                     <h1>Confirm Upload</h1>
                   </div>
               </div>
               <a class="btn btn-primary" href="main.php">  <i class="glyphicon glyphicon-envelope"></i> Go Back</a>
                   <form action="" method="post" name="login">
                        <hr>
                        <div class="col-md-12 mb-3">
                              <p class="text-center">
                                <?php
                               
                                // Below code is used to preview image
                                    $files = glob("images/*.*");

                                    for ($i=0; $i<count($files); $i++) {
                                        $image = $files[$i];
                                        print $image ."<br />";
                                        echo '<img class="img-fluid img-thumbnail rounded" alt="Responsive image" src="'.$image .'" alt="Random image" />'."<br /><br />";
                                    }
                                    if (isset($_SESSION['alert'])) {
     
                                        echo '<div class="alert alert-primary" role="alert">
                                          Your Image Successfully Uploaded !
                                        </div>'; 
                                          }
                                    unset($_SESSION['alert']);
                                ?>
                              </p>
                        </div> 
                        <hr>
                        <div class="col-md-12 mb-3">
                              <p class="text-center">
                                <form id="upload_form" method="post" action="<?php echo $url; ?>">
                                <input class ="btn btn-success mybtn" type="submit" value="Confirm Your Upload" name="submit">
                            </form>
                                
                              </p>
                        </div>                  
                    </form>                 
                </div>
          </div>          
        </div>
    </div>          
   </body>
                   
    </body>
</html>
<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>
