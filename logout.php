<?php

//This is the logout.php page
//import configuration data

include('config.php');

//OAuth access token brfore logout
$google_auth_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to login page
header('location:login.php');

?>