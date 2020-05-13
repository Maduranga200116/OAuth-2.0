<?php 
//Import vender autoloard.php file

require_once 'vendor/autoload.php';

//define new client class and assign to variable

$google_auth_client = new Google_Client();

//set client ID to client variable using below method

$google_auth_client->setClientId('898854167902-tfffjoje4p6mtrsrjpa14mmiaro2tsei.apps.googleusercontent.com');

// set client secret key to client variable using below method

$google_auth_client->setClientSecret('nhztIT2hG6hEDpz6e9hu51OM');

//redirect to home page using below method

$google_auth_client->setRedirectUri('http://localhost/login/login.php');

//define scope for access google API

$google_auth_client->addScope('email');

$google_auth_client->addScope('profile');

//start session

session_start();

?>