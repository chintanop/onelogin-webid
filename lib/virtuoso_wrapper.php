<?php

class VirtuosoSysCreateUserWebID {

	function create_user($webid, $settings){
		$virtuoso_bin = $settings["VIRTUOSO_BIN"];
		$fname 	    = $settings["fname"]; //TODO: pull this from foaf
		$email 	    = $settings["email"];
		$role       = $settings["role"];
		$filename = '/tmp/create_account.sql';

		$command = "USER_CREATE('%s','%s',vector('E-MAIL','%s'));\n";
		$command= sprintf($command, $fname, $email ,$email]);
		//echo $command;$_REQUEST["pwd"]

		$commands="insert into SYS_USER_WEBID (UW_U_NAME, UW_WEBID) values ('%s', '%s');\n";
		$commands=sprintf($commands, $fname, $webid);

		$commands3="USER_GRANT_ROLE('%s','%s');\n";
		$commands3=sprintf($commands3, $fname, $role);
		//echo "cmd2=".$commands;

		try
		{


		    if (!$handle = fopen($filename, 'w'))
		     {
			 echo "Cannot open file ($filename)";
			 exit;
		    }


		    if (fwrite($handle, $command.$commands.$commands3) === FALSE)
		    {
			echo "Cannot write to file ($filename)";
			exit;
		    }



		    fclose($handle);
		    echo "Success file created";
		}
		catch (Exception $ex)
			{
		    echo $ex;
			}


		echo '<pre>';

		$command=$virtuoso_bin.'isql-vt 1111 dba dba < //tmp/create_account.sql;';
		try {
			$last_line = system($command, $retval);
		}
		catch (Exception $ex) {
		    echo $ex;
		}
		// Printing additional info
		echo '
		</pre>
		<hr />Last line of the output: ' . $last_line . '
		<hr />Return value: ' . $retval;
		echo "done"
		
	}

}

?>
