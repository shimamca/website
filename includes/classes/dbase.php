<?php
class dbase{
	public oDb; 
	/* Costructor, connecting to the database & returning a connection object */
	function dbase()	{
	$this->oDb = new WADB(SYSTEM_DBHOST, SYSTEM_DBNAME, SYSTEM_DBUSER, SYSTEM_DBPWD);
	return TRUE;
	}
}
?>