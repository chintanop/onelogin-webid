onelogin-webid
==============

A set of wrappers to programmatically create user accounts on Drupal, Virtuoso, Ontowiki, Tomcat and associating WebID for the user.

INSTALLATION

Configure the settings.php file with appropriate location of the systems, whether remote or local machines

$DRUPAL_LOCAL = true

$DRUPAL_ROOT  = "/var/www/durpal" //Set this variable if running on local or add the remote url below if Drupal installed remotely

//$DRUPAL_REMOTE_CONTROLLER_URL = "http://remote-site/secure/drupal_wrapper.php?remote=1"

$VIRTUOSO_LOCAL = true

$VIRTUOSO_BIN   = "/usr/share/virutoso/bin" //path to where isql-vt is located

//$VIRTUOSO_REMOTE_CONTROLLER_URL = "http://remote-site/secure/virtuoso_wrapper.php?remote=1"

$ONTOWIKI_LOCAL = true

$ONTOWIKI_ROOT  = "/var/www/ontowiki" //path to where ontowiki is located

//$ONTOWIKI_REMOTE_CONTROLLER_URL = "http://remote-site/secure/ontowiki_wrapper.php?remote=1"

$TOMCAT_LOCAL = true

$TOMCAT_ROOT  = "/var/lib/tomcat6032/" //path to where isql-vt is located

//$TOMCAT_REMOTE_CONTROLLER_URL = "http://remote-site/secure/onelogin-webid/lib/tomcat_wrapper.php?remote=1"





A link to public Amazon AMI will be posted here to setup these systems with onelogin configurator 
