<?php
class News extends SiteData {
	public $file_type = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/bmp", "application/pdf"); 
	
	function getTotalPages() {
		$sql = "SELECT count(*) as total_pages from ".NEWS_EVENTS;
		$res = $this->getData($sql);
		return $res['oDATA'][0]['total_pages'];
	}
	function getAllNews($page=0, $orderby="id", $order="desc") {
		$sql = "SELECT * from ".NEWS_EVENTS." order by $orderby $order limit $page,".PAGE_LIMIT;	
		$res = $this->getData($sql);
		return $res;
	}
	function getTotalAllActNews() {
		$sql = "SELECT count(*) as total_pages from ".NEWS_EVENTS." where status = '1'";;
		$res = $this->getData($sql);
		return $res['oDATA'][0]['total_pages'];
	}
	function getAllActNews($start, $limit) {
			$sql = "SELECT *, str_to_date(publish_date,'%d-%m-%Y') as p_date from ".NEWS_EVENTS." where status = '1'  ORDER BY p_date desc,sort_order ASC LIMIT $start, $limit";
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsLimit() {
		$sql = "SELECT *, str_to_date(publish_date,'%d-%m-%Y') as p_date from ".NEWS_EVENTS." where status = '1' order by p_date desc LIMIT 0,4";
		//$sql = "SELECT * from ".NEWS_EVENTS." where status = '1' order by publish_date desc LIMIT 0,4";	
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsById($id) {
		$sql = "SELECT * from ".NEWS_EVENTS." where md5(id) = '$id'";
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsByCategory($category) {
		$category = inText($category);
		if($category =="Events"){
			$sql = "SELECT * from ".NEWS_EVENTS." where category = '$category' and  category != '' LIMIT 0,5";
		}else{
			$sql = "SELECT * from ".NEWS_EVENTS." where category = '$category' and  category != '' LIMIT 0,4";
		}
		$res = $this->getData($sql);
		return $res;
	}
	function getNewsByEvents() {
		$category = "Events";
		$sql = "SELECT * from ".NEWS_EVENTS." where category = '$category' and  category != '' ";
		$res = $this->getData($sql);
		return $res;
	}
	
	function getNewsByArticle() {
		$category = "Article";
		$sql = "SELECT * from ".NEWS_EVENTS." where category = '$category' and  category != '' ";
		$res = $this->getData($sql);
		return $res;
	}
	
	function getNewsByURL($url) {
		if($url !="default"){
			$url = inText($url);
			$sql = "SELECT * from ".NEWS_EVENTS." where url = '$url' and  url != ''";
			$res = $this->getData($sql);
			return $res;
		}else{
			$sql = "SELECT * from ".NEWS_EVENTS;
			$res = $this->getData($sql);
			return $res;
		}
	}
	function addNews($request){ 
		extract($request); 
		$title = inText($title);
		$publish_date = inText($publish_date);
		$category = inText($_REQUEST['category']);
		$url = inText($_REQUEST['url']);
		$description = inHTML($description);
		
		if($title=="" || $publish_date=="")	{setMessage("Please enter the mandatory fields", "error");}
		
		else {
			/******************Sort Order******************/
			$sql = "SELECT MAX(sort_order) as sort_order from ".NEWS_EVENTS;
			$res = $this->getData($sql);
			$sort_order = ($res['oDATA'][0]['sort_order'])+1;
			/*******************************************/			
			if( isset($_FILES['file_name']['name']) && $_FILES['file_name']['name']!="" ) {
				$pre_fix = "newsevents";
				$file_name = $this->upload($_FILES['file_name'], $pre_fix);
			}
			else {
				$file_name = "";
			}		
			$sql = "INSERT INTO ".NEWS_EVENTS." ( title,  publish_date, description,  file_name, sort_order,category,url) values ('$title',  '$publish_date', '$description',  '$file_name', '$sort_order','$category','$url')";
			$res = $this->inserttoDB($sql);
			$msg = 'Article and Events Added.';
			setMessage($msg, "correct");			
			return $res;
		}	
	}
	
	function updateNews($request) {
		extract($request);
		$id = (int)($_REQUEST['id']);
		$category = inText($_REQUEST['category']);
		$publish_date = inText($_REQUEST['publish_date']);
		$title = inText($_REQUEST['title']);
		$update_date = date('Y-m-d h:i:sa');
		$file_type = $_FILES['file_name']['type'];
		$description = inHTML($description);
		$url = inText($_REQUEST['url']);
		if( isset($_FILES['file_name']['name']) && $_FILES['file_name']['name']!="" ) {
			$pre_fix = "newsevents";
			$file_name = $this->upload($_FILES['file_name'], $pre_fix);
		}
		else {
			$file_name = "";
		}
		
		
			if($file_name) {
				$s = "SELECT * from ".NEWS_EVENTS." WHERE id = $id";
				$res = $this->getData($s);
				$filename = $res['oDATA'][0]['file_name'];
				@unlink("../documents/".$filename);
				
				$sql = "UPDATE ".NEWS_EVENTS." SET  title='$title', publish_date='$publish_date',  file_name='$file_name', description='$description', category='$category',update_date='$update_date', url='$url' where id='$id'";
			} else {
				$sql = "UPDATE ".NEWS_EVENTS." SET  title='$title', publish_date='$publish_date', description='$description', category='$category',update_date='$update_date', url='$url' where id='$id'";
			}
			$res = $this->update($sql);
		
		$msg = 'Article and Events Updated.';
		setMessage($msg, "correct");		
	}
	
	function disableStatus($id) {
		$id = inText($id);		
		$sql = "UPDATE ".NEWS_EVENTS." set status='0' where id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function enableStatus($id) {
		$id = inText($id);
		$sql = "UPDATE ".NEWS_EVENTS." set status='1' where id='$id'";
		$res = $this->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
	}
	function deleteNews($id) {
		$sql = "DELETE from ".NEWS_EVENTS." WHERE id = $id ";
		$s = "SELECT * from ".NEWS_EVENTS." WHERE id = $id";
		$res = $this->getData($s);
		$file_name =$res['oDATA'][0]['file_name'];
		@unlink("../documents/".$file_name);
		$res = $this->deleterecord($sql);
		$msg="Data deleted Successfully.";
		setMessage($msg, "correct");
		return $res;
	}
	
	function upload($files, $t_name) {
		$target_file_name = "";
		$file_type = $this->file_type; // access the public varible
		if( in_array($files["type"], $file_type) )	{
			$photo_name = $files["name"];
			$paths = pathinfo($photo_name);
			$ext = $paths['extension']; $fname = $paths['filename'];
			$tempFile = $files["tmp_name"];
			$time=mktime(date("d:m:Y H:i:s"));
			$target_file_name = $t_name."_".$time.".".$ext;
			$target_file_path = "../documents/".$target_file_name;
			move_uploaded_file($tempFile, $target_file_path);			
		}
		return $target_file_name;
	}
	
}//END OF CLASS
?>
