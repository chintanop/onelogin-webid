<?php

/**
*
* A common settings.php to be used where the create account controller  
* is installed or at the local machines where respective systems are installed
*
*/

$DRUPAL_LOCAL = true;
$DRUPAL_ROOT  = "/var/www/drupal"; //Set this variable if running on local or add the remote url below if Drupal installed remotely
//$DRUPAL_REMOTE_CONTROLLER_URL = "http://remote-site/secure/drupal_wrapper.php?remote=1";

$VIRTUOSO_LOCAL = true;
$VIRTUOSO_BIN   = "/usr/bin"; //share/virutoso/bin"; //path to where isql-vt is located
//$VIRTUOSO_REMOTE_CONTROLLER_URL = "http://remote-site/secure/virtuoso_wrapper.php?remote=1";

$ONTOWIKI_LOCAL = true;
$ONTOWIKI_ROOT  = "/usr/share/ontowiki";//path to where ontowiki is located
//$ONTOWIKI_REMOTE_CONTROLLER_URL = "http://remote-site/secure/ontowiki_wrapper.php?remote=1";

$TOMCAT_LOCAL = true;
$TOMCAT_ROOT  = "/var/lib/tomcat6032/"; //path to where isql-vt is located
//$TOMCAT_REMOTE_CONTROLLER_URL = "http://remote-site/secure/onelogin-webid/lib/tomcat_wrapper.php?remote=1";

?>
