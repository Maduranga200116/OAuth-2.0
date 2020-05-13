<?php

//This is the logout.php page
//import configuration data

include('config.php');

//Reset logged in OAuth access token
$google_auth_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to login page
header('location:login.php');

?>