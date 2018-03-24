<?php
class Admin extends SiteData {	
	function checkLogin($request) {
		extract($request);	
		$uid = inText($uname);
		$pwd = md5($pass);
		$login_date_time=date("d-m-Y h:i");
		$login_ip=$_SERVER['REMOTE_ADDR'];
		$sql = "SELECT * from ".ADMIN." where admin_user='$uid' and admin_pass='$pwd' and admin_status='1'";
		$res = $this->getData($sql);
		if($res['NO_OF_ITEMS']>0) {		
			$_SESSION[SES]['admin'] = $res['oDATA'][0];
			$login_uid=$res['oDATA'][0]['admin_id'];		
			
			$ret = 1;
			
			//Mail to admin for successful login
			$to = "shimamca@gmail.com";
			$subject = "Admin Login";
			$txt = "Admin Login successful on ".$login_date_time." from IP : ".$login_ip;
			$headers = "From: golokbr@gmail.com" . "\r\n" .
			"CC: golokrai.gbr@gmail.com";

			mail($to,$subject,$txt,$headers);
			
			//Insert login details
			$sql_insert = "INSERT into admin_logs 
			(login_uid, login_date_time, login_ip,login_status,login_user) VALUES ('$login_uid', '$login_date_time', '$login_ip','$ret','$uid')";
			$res_insert = $this->inserttoDB($sql_insert);
			
		}
		else{
			//Mail to admin for login failed
			$to = "shimamca@gmail.com";
			$subject = "Admin Login";
			$txt = "Admin Login successful on ".$login_date_time." from IP : ".$login_ip;
			$headers = "From: golokbr@gmail.com" . "\r\n" .
			"CC: golokrai.gbr@gmail.com";

			mail($to,$subject,$txt,$headers);
			
			$ret = 0;
			$sql_insert = "INSERT into admin_logs 
			(login_uid, login_date_time, login_ip,login_status,login_user) VALUES ('$login_uid', '$login_date_time', '$login_ip','$ret','$uid')";
			$res_insert = $this->inserttoDB($sql_insert);
			$msg = "Invalid User/Password";
			setMessage($msg, 'error');
			
		}
		return $ret;
	}
	function changeAdminPass($request) {
		extract($request);
		$admin_id = inText($admin_id);
		if($newpass){
			$sql = "UPDATE ".ADMIN." set admin_pass='".md5($newpass)."' where admin_id='$admin_id'";
			$res = $this->update($sql);
			$msg="Password Changed Successfully.";
			setMessage($msg,'correct');
		}else{
			$msg="Please try again with Mandatory Fields.";
			setMessage($msg, "error");
		}
	}
	function addAdmin($request) {
		extract($request);
		$uname=($uname);
		$sql = "SELECT * from ".ADMIN." where admin_user='$uname'";
		$res = $this->getData($sql);
		if($res['NO_OF_ITEMS']>0) {
			$msg="User Name already exist.";
			setMessage($msg,'error');
		}
		else{
			$name = inText($name);
			$uname = inText($uname);
			$pass=md5($pass);
			$email = inText($email);
			$phone = inText($phone);
			$admin_type = inText($admin_type);
			$admin_regdate = date("d-m-Y");
			$sql = "INSERT into ".ADMIN." (admin_id, admin_user, admin_pass, admin_name, admin_email, admin_phone, admin_type, admin_status, admin_regdate) VALUES (null, '$uname', '$pass', '$name', '$email', '$phone', '$admin_type', '1', '$admin_regdate')";
			$res = $this->inserttoDB($sql);
			$msg="New Administrator Created Successfully.";
			setMessage($msg, "correct");		
		}
	}
	function updateAdmin($request) {
		extract($request);
		$admin_id = inText($admin_id);
		$admin_name = inText ($name);
		$admin_user = inText ($uname);
		$admin_email = inText ($email);
		$admin_phone = inText ($phone);
		if($admin_name && $admin_user && $admin_email){
			$sql = "SELECT * from ".ADMIN." where admin_user='$admin_user' and  md5(admin_id)!='$admin_id'";
			$res = $this->getData($sql);
			if($res['NO_OF_ITEMS']>0) {
				$msg="User Name already exist.";
				setMessage($msg,'error');
			}else{
				$sql = "UPDATE ".ADMIN." set admin_name='$admin_name', admin_user='$admin_user', admin_email='$admin_email', admin_phone='$admin_phone' where md5(admin_id)='$admin_id'";
				$res = $this->update($sql);
				$msg="Administrator Updated Successfully.";
				setMessage($msg, "correct");
			}
		}else{
			$msg="Please try again with Mandatory Fields.";
			setMessage($msg, "error");
		}
	}
	function editAdmin($request) {
		extract($request);
		$admin_id = inText($admin_id);
		$admin_name = inText ($admin_name);
		$admin_user = inText ($admin_user);
		$admin_email = inText ($admin_email);
		$admin_phone = inText ($admin_phone);
		if($admin_name && $admin_user && $admin_email){
		$sql = "UPDATE ".ADMIN." set admin_name='$admin_name', admin_user='$admin_user', admin_email='$admin_email', admin_phone='$admin_phone' where admin_id='$admin_id'";
		$res = $this->update($sql);
		$msg="Administrator Updated Successfully.";
		setMessage($msg, "correct");
		}else{
			$msg="Please try again with Mandatory Fields.";
			setMessage($msg, "error");
		}
	}
	function getAdminUser() {
		$sql = "SELECT * from ".ADMIN." where admin_type='2' order by admin_id desc";
		$res = $this->getData($sql); 
		return $res;
	}
	function disableStatus($id) {
		$id = inText($id);		
		$sql = "UPDATE ".ADMIN." set admin_status='0' where admin_id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function enableStatus($id) {
		$id = inText($id);
		$sql = "UPDATE ".ADMIN." set admin_status='1' where admin_id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
		
	function deleteAdmin($id) {
		$id = inText($id);
		$sql = "DELETE from ".ADMIN." where admin_id='$id' and admin_user!='1'";
		$res = $this->deleterecord($sql);
		if($res['oDATA']==1) {		
			$msg="Administrator Account Deleted Successfully.";
			setMessage($msg,'correct');
		}
	}
	function getAdminUserById($id) {
		$id = inText($id);
		$sql = "SELECT * from ".ADMIN." where md5(admin_id)='$id'";
		$res = $this->getData($sql);
		return $res;
	}
}
?>
