<?php

require_once "../settings.php";

require_once "../lib/drupal_wrapper.php";
require_once "../lib/virtuoso_wrapper.php";
require_once "../lib/ontowiki_wrapper.php";
require_once "../lib/tomcat_wrapper.php";

$webid 		= $_REQUEST["webid"];
$settings 	= array("fname"=>$_REQUEST["fname"],
                         "email"=>$_REQUEST["email"],);	
$drupal_role 	= $_REQUEST["drupal_role"];
$virt_role 	= $_REQUEST["virt_role"];
$ontowiki_role 	= $_REQUEST["ontowiki_role"];
$tomcat_role 	= $_REQUEST["tomcat_role"];
	 
//for Drupal
if ($_REQUEST["drupal"]==1){
	$settings["DRUPAL_ROOT"] = $DRUPAL_ROOT;
	$settings["role"] = $drupal_role;
	if($DRUPAL_LOCAL){
		$dys = new DrupalSysCreateUserWebID();
		$dys->create_user($webid, $settings);		
	}else{
		$r = new HttpRequest($DRUPAL_REMOTE_CONTROLLER_URL, HttpRequest::METH_POST);
		$r->addPostFields($settings);

		try {
		    echo $r->send()->getBody();
		} 
		catch (HttpException $ex) 
		{
		    echo $ex;
		}
	}
}

//for Virtuoso
if ($_REQUEST["virt"]==2){
	$settings["VIRTUOSO_BIN"] = $VIRTUOSO_BIN;
	$settings["role"] = $virtuoso_role;
	if($VIRTUOSO_LOCAL){
		$dys = new VirtuosoSysCreateUserWebID();
		$dys->create_user($webid, $settings);		
	}else{
		$r = new HttpRequest($VIRTUOSO_REMOTE_CONTROLLER_URL, HttpRequest::METH_POST);
		$r->addPostFields($settings);

		try {
		    echo $r->send()->getBody();
		} 
		catch (HttpException $ex) 
		{
		    echo $ex;
		}
	}
}

//Ontowiki
//for Ontowiki
if ($_REQUEST["onto"]==3){
        $settings["ONTOWIKI_ROOT"] = $ONTOWIKI_ROOT;
        $settings["role"] = $ontowiki_role;
        if($ONTOWIKI_LOCAL){
                $dys = new OntowikiSysCreateUserWebID();
                $dys->create_user($webid, $settings);
        }else{
                $r = new HttpRequest($ONTOWIKI_REMOTE_CONTROLLER_URL, HttpRequest::METH_POST);
                $r->addPostFields($settings);

                try {
                    echo $r->send()->getBody();
                }
                catch (HttpException $ex)
                {
                    echo $ex;
                }
        }
}

//for Tomcat
if ($_REQUEST["tomcat"]==4)
        $settings["TOMCAT_ROOT"] = $TOMCAT_ROOT;
        $settings["role"] = $tomcat_role;
        if($TOMCAT_LOCAL){
                $dys = new TomcatSysCreateUserWebID();
                $dys->create_user($webid, $settings);
        }else{
                $r = new HttpRequest($TOMCAT_REMOTE_CONTROLLER_URL, HttpRequest::METH_POST);
                $r->addPostFields($settings);

                try {
                    echo $r->send()->getBody();
                }
                catch (HttpException $ex)
                {
                    echo $ex;
                }
        }
}

?>
