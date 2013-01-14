<?php

class TomcatSysCreateUserWebID 
{

	function create_user($webid, $settings)
	{
		$tomcat_root = $settings["TOMCAT_ROOT"];
		$fname 	    = $settings["fname"]; //TODO: pull this from foaf
		$email 	    = $settings["email"];
		$role       = $settings["role"];

		$doc = new DOMDocument('1.0', 'utf-8');

		$command='sh '.$tomcat_root.'/bin/shutdown.sh'; #if running remotely, need to give www-data permission to the tomcat folder TODO: can we just reload one app?
		try {
			$last_line = system($command, $retval);
		    }
		catch (Exception $ex) 
		    {
		    echo $ex;
		    }

		try
		   {

			$doc->load($tomtcat_root.'/conf/tomcat-users.rdf');
			//echo getcwd().'/files/links.xml';
			$doc->formatOutput = true;

			// Get the root element "links"
			$root = $doc->documentElement;
			// Create new link element
			$desc = $doc->createElement("rdf:Description");

			$xmlns_wp = $doc->createAttribute('rdf:about');
			$desc->appendChild($xmlns_wp);

			$webid=$_REQUEST["webid"];
			//$webid="http://id.myopenlink.net/dataspace/person/health#this";

			$value = $doc->createTextNode($webid);
			$xmlns_wp->appendChild($value);
			//<rdf:type rdf:resource="#User"/>
			$type=$doc->createElement("rdf:type");
			$xmlns_wp = $doc->createAttribute('rdf:resource');
			$type->appendChild($xmlns_wp);
			$value = $doc->createTextNode("#User");
			$xmlns_wp->appendChild($value);
			$desc->appendChild($type);
			//<rdfs:label xml:lang="en">Turnguard</rdfs:label>
			$type=$doc->createElement("rdfs:label",'Turnguard');
			$xmlns_wp = $doc->createAttribute('xml:lang');
			$type->appendChild($xmlns_wp);
			$value = $doc->createTextNode("en");
			$xmlns_wp->appendChild($value);
			$desc->appendChild($type);
			//<webid:hasRole rdf:resource="http://data.turnguard.com/gij/1.0.0./Admiral"/>
			$type=$doc->createElement("webid:hasRole");

			$xmlns_wp = $doc->createAttribute('rdf:resource');
			$type->appendChild($xmlns_wp);
			$value = $doc->createTextNode($role); #this should make the one defined in web.xml
			$xmlns_wp->appendChild($value);
			$desc->appendChild($type);

			//<webid:hasRole rdf:resource="http://data.turnguard.com/gij/1.0.0./Colonel"/>
			#TODO: whatif we need more than one Roles?
			$xmlns_wp->appendChild($value);
			$desc->appendChild($type);

			// Append new link to root element
			//$root->appendChild($link);
			$root->appendChild($desc);
			#TODO: save previous version timestampped before overrindg
			$doc->save($tomcat_root.'/conf/tomcat-users.rdf');
			echo $doc->saveXML();
		}

		catch( Exception $ex)
		{
			echo $ex;
		}

		$command='sh '.$tomcat_root.'/bin/startup.sh'; #if running remotely, need to give www-data permission to the tomcat folder TODO: can we just reload one app?
		

		try 
		{
		
			$last_line = system($command, $retval);

		} 
		catch (Exception $ex)
		{
    			echo $ex;
		}


	}

}//for class

?>
