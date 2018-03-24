<?php
class WADB
	{
		/* Database Host */
		public $sDbHost;           
		public $sDbName;           // Database Name
		public $sDbUser;           // Database User
		public $sDbPwd;            // Database Password
		public $sDbDetail;         // Database Details
		public $iNoOfRecords;      // Total No of Records
		public $oQueryResult;      // Results of sql query
		public $aSelectRecords;    // Array
		public $bSelectRecords;    // Array
		public $aArrRec;           // Array
		public $bInsertRecords;    // Boolean
		public $iInsertRecId;      // Integer - the primary key for inserted record
		public $bUpdateRecords;    // Boolean
		private $oDbLink;
		
		/* Constructor */
		function WADB ($sDbHost, $sDbName, $sDbUser, $sDbPwd)
		{
			$this->oDbLink = mysqli_connect ($sDbHost, $sDbUser, $sDbPwd,$sDbName) or die ("MySQL DB could not be connected");
			//mysql_select_db ($sDbName, $this->oDbLink)or die ("MySQL DB could not be selected");
		}
		
	    /* Select Records */
		function selectRecords($sSqlQuery)
		{
			//print_r($sSqlQuery);exit;
			//if(isset($this->aSelectRecords)){
			unset($this->bSelectRecords);
			$this->oQueryResult = mysqli_query($this->oDbLink, $sSqlQuery) or die(mysqli_error($this->oDbLink));
			$this->iNoOfRecords = mysqli_num_rows($this->oQueryResult);
			if ($this->iNoOfRecords > 0) {
				while ($oRow = mysqli_fetch_assoc($this->oQueryResult)) {
					$this->bSelectRecords[] = $oRow;
				}
				mysqli_free_result($this->oQueryResult);
			}
			$this->aArrRec = $this->bSelectRecords;
			//}
			return $this->aArrRec;
		}
	
		/*Get Number of Records */
		function getNumberOfRecords () {
			return $this->iNoOfRecords;
		}
	
		/* Get selected data */
		function getSelectedData (){
			return $this->aSelectRecords;
		}
	
		/* Insert Records */
		function insertRecords($sSqlQuery)
		{
			$this->bInsertRecords = mysqli_query ($this->oDbLink, $sSqlQuery) or die (mysqli_error($this->oDbLink));
			$this->iInsertRecId = mysqli_insert_id();
			return $this->iInsertRecId;
		}
	
		/* Find Inserted Id */
		function getIdForInsertedRecord()
		{
			return $this->iInsertRecId;
		}
	
		/* Update Records */
		function updateRecords($sSqlQuery)
		{
			mysqli_query($this->oDbLink, $sSqlQuery) or die(mysqli_error($this->oDbLink));
			return mysqli_affected_rows($this->oDbLink);
		}
		function deleteRecords($sSqlQuery)
		{
			return mysqli_query($this->oDbLink, $sSqlQuery) or die(mysqli_error($this->oDbLink));
		}
	}
?>