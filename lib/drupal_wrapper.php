<?php

class DrupalSysCreateUserWebID {

	function create_user($webid, $settings){
		$drupal_root = $settings["DRUPAL_ROOT"];
		$fname 	    = $settings["fname"]; //TODO: pull this from foaf
		$email 	    = $settings["email"];
		$role       = $settings["role"];
		define('DRUPAL_ROOT', $drupal_root);

		//Load Drupal
		require_once './includes/bootstrap.inc';
		drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
		echo 'loaded';
                $account = new StdClass();
                $account->is_new = TRUE;
                $account->status = TRUE;
                $account->name = $fname;
                //$account->pass = 'some2';
                $account->mail = $email;
                //$account->webidauth_identifier = 'http://id.myopenlink.net/dataspace/person/shahid1#thiddds';
                $account->init = 'email@example.com';

		$account->roles[1] = $role;

   		echo 'try';
                try
                {

                        $userobj = user_save($account);

                        $uri = $webid;//'http://id.myopenlink.net/dataspace/person/shahid1#this';

                        $uid = $userobj->uid;


                    db_insert('webidauth')->fields(array('uri' => $uri, 'uid' =>
                        $uid, ))->execute();
                    $account = user_load($uid);
                    user_set_authmaps($account, array('authname_webidauth' => $account->name));

                        debug("saved");
                        echo 'DRUPAL done';
                }
                catch (Exception $e)
                {
                    echo "\n",'Caught exception: ',  $e->getMessage(), "\n";
                }

	}

}

?>
