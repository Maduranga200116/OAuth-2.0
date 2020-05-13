# OAuth-2.0
# OAuth-Authentication
OAuth is an open-standard authorization protocol or framework that describes how unrelated servers and services can safely allow authenticated access to their assets without actually sharing the initial, related, single login credential. In authentication parlance, this is known as secure, third-party, user-agent, delegated authorization.” ( Source:- https://www.csoonline.com/article/3216404/what-is-oauth-how-the-open-authorization-framework-works.html )

OAuth Protocol Roles

1)	Resource Owner: Client-side software

2)	Resource Server:

3)	Client: Application

4)	Authorization Server: The server that authenticates the Resource Owner, and issues Access Tokens after getting proper authorization


First, log on to Google API console. To navigate, used this https://developer.google.com URL.

Then selected create a new project. Added the project name and click on “CREATE” button. 

Then go to the home and select the project from project select box and select the project from that popup window.

select OAuth consent screen from the left-hand menu and define the application name and other related information and click on “OK”

after saving OAuth consent Screen in formation, click on “credentials” from the left-hand menu. In that window select the “Create Credential” button. on that drop-down menu, we have to select “OAuth Client ID”

after select on OAuth client ID, it will redirect to another window to select “Application Type” 

Select the application type as a web application and add the URL of the web application. In our case it is http://localhost/login/login.php


Finally, click on the Save button. Once click on the save button it will provide the Client ID and the client secret key. There need to copy both keys for implementation.


*******Download Google Client Library for PHP*********

After receiving google API credentials, We need to download the Google Client library for PHP. To do that  we have to go command prompt type below composer command.

---composer require google/apiclient:"^2.0"---

the above command will download the Google Client Library for PHP to our defined directory.

We developed the web application using PHP to test the OAuth authentication and apply the knowledge of how to use Google API Client Library for login using Google account with PHP
