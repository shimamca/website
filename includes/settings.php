<?php
date_default_timezone_set('Asia/Kolkata');

/* DB DETAILS */
define('SYSTEM_DBHOST', 'localhost');
define('SYSTEM_DBUSER', 'root');
define('SYSTEM_DBPWD', '');
define('SYSTEM_DBNAME', 'chilika');
/* SITE CONSTANTS */
define("SITE_HOME","http://demo.in.in/");
define("URL_IMG",SITE_HOME."images/");

define("DIR_HOME","/home/content/50/9452150/html/demo.in.in/");
define("DIR_IMAGES",DIR_HOME."images/");

define("ADMIN_EMAIL","shimamca@gmail.com");
define("PAGE_TITLE","Demo ");
define('PAGE_LIMIT', 50);
define('SES', 'chilika'.date('dmy'));
/*********************************/
/*$ip = $_SERVER['REMOTE_ADDR'];
$browse_time = date("d-m-y H:i");
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$referer = $_SERVER['HTTP_REFERER'];
if($_SERVER['QUERY_STRING']) $browse_url = $_SERVER['PHP_SELF']. '?'.$_SERVER['QUERY_STRING'];else $browse_url = $_SERVER['PHP_SELF'];

$_con = mysqli_connect(SYSTEM_DBHOST, SYSTEM_DBUSER, SYSTEM_DBPWD,SYSTEM_DBNAME);
//$_dbcon = mysql_select_db(SYSTEM_DBNAME, $_con);
$_sql = "SELECT * FROM website_logs where ip='$ip' AND browse_time LIKE '$browse_time' AND browse_url LIKE '$browse_url' AND sn=(SELECT MAX(sn) FROM website_logs)";
$_res = mysqli_query($_con,$_sql);
if($_res) $_num_rows = mysql_num_rows($_res);else $_num_rows=0;
if($_num_rows==0) {
	$_sql = "INSERT INTO website_logs (sn, ip, user_agent, referer, browse_time, browse_url) VALUES (NULL, '$ip', '$user_agent', '$referer', '$browse_time', '$browse_url');";
	$_res = mysqli_query($_con,$_sql);
}
mysqli_close($_con);

/*$_restricted_ip = array();
if(in_array($_SERVER['REMOTE_ADDR'],$_restricted_ip)) {
	header("Location: http://www.google.co.in");
}*/
/*
$_res_words = array('where', 'union', '_injection','http://', 'https://');
foreach($_res_words as $_str){
	$pos = strpos(strtolower($browse_url), $_str);
	if($pos) header("Location: http://www.chilika.com");
}*/
?>