<?php
if(!session_id())
  session_start();

require_once "db_connection.php";
require_once "vendor/autoload.php";

$fb = new Facebook\Facebook([
  'app_id' => getenv('FB_App_ID'), // Replace {app-id} with your app id
  'app_secret' => getenv('FB_App_Secret'),
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://web.cs.manchester.ac.uk/j78532kt/Lost_and_Found/fb-callback.php', $permissions);

header('Location: ' . $loginUrl);

?>
