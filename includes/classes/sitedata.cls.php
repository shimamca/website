<?php
class SiteData	{
	var $oDb;                  // Database Object
	var $sSql;                 // Contains sql statements		            	
	/* Costructor, connecting to the database & returning a connection object */
	function SiteData()	{
		$this->oDb = new WADB(SYSTEM_DBHOST, SYSTEM_DBNAME, SYSTEM_DBUSER, SYSTEM_DBPWD);
		return TRUE;
	}
	function getData($sSql)	{
		$hData  = $this->oDb->selectRecords($sSql);
		$iNumOfItems = $this->oDb->getNumberOfRecords();			
		$ahomeData = array('NO_OF_ITEMS'=>$iNumOfItems, 'oDATA'=>$hData);			
		return $ahomeData ;
	}
					
	function inserttoDB($sSql)	{
		$iData  = $this->oDb->insertRecords($sSql);		
		$insertArray=array('oDATA'=>$iData);
		return $insertArray;
	}
	function update($sSql)	{
		$hData  = $this->oDb->updateRecords($sSql);
		$insertArray=array('oDATA'=>$hData);
		return $insertArray;
	}
	function deleterecord($sSql) {
		$iData  = $this->oDb->deleteRecords($sSql);		
		$insertArray=array('oDATA'=>$iData);
		return $insertArray;
	}			
}
?>