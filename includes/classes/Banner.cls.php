<?php
class Banner extends SiteData {
	function getACTphoto() {
		$sql="SELECT * FROM ".BANNER." where status=1 ORDER BY photo_date DESC,sort_order ASC ";
		$res = $this->getData($sql);
		return $res;
	}
	function getAllphoto() {
		$sql="SELECT * FROM ".BANNER." ORDER BY photo_date DESC,sort_order ASC ";
		$res = $this->getData($sql);
		return $res;
	}
	function getTotalPages() {
		$sql="select COUNT(*) as total from ".BANNER." order by sort_order desc";
		$res = $this->getData($sql);
		return $res['oDATA'][0]['total'];
	}
	function getAllBanners($page=0, $orderby="id", $order="desc") {
		$sql="select * from ".BANNER." order by $orderby $order limit $page,".PAGE_LIMIT;
		$res = $this->getData($sql);
		return $res;
	}
	function getPhotoById($id) {
		$id = inText($id);			
		$sql = "SELECT * from ".BANNER." where md5(photo_id)='$id'";
		$res = $this->getData($sql);
		return $res;
	}
	function uploadImage($files) {
		$target_file_name = "";	
		$photo_type = $files["type"];
		$photo_size = $files["size"];	
		if( ($photo_type == "image/gif") || ($photo_type == "image/jpeg") || ($photo_type == "image/pjpeg") || ($photo_type == "image/png") || ($photo_type == "image/bmp") && ($photo_size <= 51200))	{
			$photo_name = $files["name"];
			$paths = pathinfo($photo_name);
			$ext = $paths['extension']; $fname = $paths['filename'];
			$tempFile = $files["tmp_name"];
			$time=mktime(date("d:m:Y H:i:s"));
			$target_file_name = "banner_".$time.".".$ext;
			$target_file_path = "../photo/".$target_file_name;
			
			move_uploaded_file($tempFile, $target_file_path);			
		}
		return $target_file_name;
	}
	
	function saveImage($request) {
		extract($request);
		$photo_caption = inText(strip_tags($photo_caption));
		$photodate=date('d-m-Y');
		/******************Sort Order******************/
		$sql = "SELECT MAX(sort_order) as sort_order from ".BANNER;
		$res = $this->getData($sql);
		$sort_order = ($res['oDATA'][0]['sort_order'])+1;
		/*******************************************/
		list($width,$height)=getimagesize($_FILES['photo_file']['tmp_name']);
		if(($width>=450 && $width<=550)&& ($height>=450 && $height<=550)){
		
		if($_FILES['photo_file']['name']) {
			$cur_name = $this->uploadImage($_FILES['photo_file']);
		}
		else {
			$cur_name = "";
		}
		if($photo_caption){
			$sql = "INSERT into ".BANNER." (photo_caption,photo_file,photo_date,sort_order) values('$photo_caption','$cur_name','$photodate','$sort_order')";
			$res = $this->inserttoDB($sql);
			$msg = 'Photo added.';setMessage($msg, "correct");
			$ret = 1;
		}
		else{
			$msg = 'Data Can\'t be inserted.';setMessage($msg, "error");
			$ret = 0;
		}
		}else{
			$msg = 'Image Dimensions should be 500 &times; 500.Data Can\'t be inserted.';setMessage($msg, "error");
			$ret = 0;
		}
		return $ret;
	}
	function editImage($request) {
		extract($request);
		$photo_caption = inText(strip_tags($photo_caption));
		$photodate=date('d-m-Y');
		list($width,$height)=getimagesize($_FILES['photo_file']['tmp_name']);
		
		
		if($_FILES['photo_file']['name'] && (($width>=450 && $width<=550)&& ($height>=450 && $height<=550))) {	
			$cur_name = $this->uploadImage($_FILES['photo_file']);
			$sql = "UPDATE ".BANNER." set photo_caption='$photo_caption', photo_file='$cur_name',photo_date='$photodate' where photo_id='$photo_id'";
			$sql1="select * from ".BANNER." where photo_id='$photo_id'";	
			$res1 = $this->getData($sql1);
			$photo_data = $res1['oDATA'][0]['photo_file'];
			$myFile = "../photo/$photo_data";
			@unlink($myFile);
			
		}
		else {
			$sql = "UPDATE ".BANNER." set photo_caption='$photo_caption',photo_date='$photodate' where photo_id='$photo_id'";
		}
		$res = $this->update($sql);
		$msg = "Photo updated sucessfully.";
		setMessage($msg, "correct");
		return 1;
		}
	
}
	function deleteImage($id) {
		$id = ($id);
		$sql="select * from ".BANNER." where photo_id='$id'";	
		$res = $this->getData($sql);
		$photo_data = $res['oDATA'][0]['photo_file'];
		$myFile = "../photo/$photo_data";
		$sql = "DELETE from ".BANNER." where photo_id='$id'";
		$res = $this->deleterecord($sql);
		@unlink($myFile);
		$msg = "<div class=correct>Photo Deleted .</div>";
		setMessage($msg);
		return $res;
	}
	function disableStatus($id) {
		$id = inText($id);		
		$sql = "UPDATE ".BANNER." set status='0' where photo_id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function enableStatus($id) {
		$id = inText($id);
		$sql = "UPDATE ".BANNER." set status='1' where photo_id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	
	function sortOrder($request){
	extract($request);
	if(isset($request['sortorder'])) {			
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$photo_id = (int)$x;
					$sql = "UPDATE ".BANNER." set sort_order=$v where photo_id=$photo_id";	
					$res= $this->update($sql);
				}				
			}
	}


?>