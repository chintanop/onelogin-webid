<?php

class OntowikiSysCreateUserWebID {

	function create_user($webid, $settings){
		$ontowiki_root = $settings["ONTOWIKI_ROOT"];
		$fname 	    = $settings["fname"]; //TODO: pull this from foaf
		$email 	    = $settings["email"];
		$role       = $settings["role"];

		//Load OntoWiki
		require_once $ontowiki_root.'/index.php';

		$users = Erfurt_App::getInstance()->getUsers();

		foreach($users as $user){
			echo $user;
			echo "<br>";
			echo $user->username;
		}


		//$webId="http://id.myopenlink.net/dataspace/person/shahiddd#this";
		echo "In Ontowiki".$webid;
		$auth = new Erfurt_Auth_Adapter_FoafSsl();

		echo "after auth";

		$success = $auth->addUser($webid);

		echo "done";

		if($success){
			echo "Created!!";
		}else{
			echo "NO ";
		}

	}

}

?>
