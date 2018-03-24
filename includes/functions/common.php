<?php
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
   $bytes /= pow(1024, $pow);
   $bytes = ceil($bytes);
   // $bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
}
function formatDate($date) {
	$pieces = explode("-",$date);
	$dt = date("d M Y",strtotime($pieces[0].$pieces[1].$pieces[2]));
	return $dt;
}
function redirect($page="") {
	if($page=="") return false;
	else @header("Location: ".$page);
}
function inText($str) {
	$str = addslashes(strip_tags($str));
	return $str;
}
function inHTML($str) {
	$str = addslashes($str);
	return $str;
}
function outText($str) {
	$str = stripslashes($str);
	return $str;
}
function resizeImage ($image,$w=0,$h=0) {
	if(file_exists($image)) {
		list($width, $height, $type, $attr) = getimagesize($image);
		
		$new_height = 0;	$new_width = 0;
		if($w>0) {
			$new_height = ceil(($w/$width)*$height);
			$new_width = $w;
		}
		elseif($h>0) {
			$new_width = ceil(($h/$height)*$width);
			$new_height = $h;
		}
		$ret = array("width"=>$new_width, "height"=>$new_height);
		return $ret;
	}
	else {
		return false;
	}
}
function showImage($image,$width="",$height="",$alt="",$title="",$parameters="") {
	list($orwidth, $orheight) = getimagesize($image);
	if($orwidth!=0 && $orheight!=0) {		
		$img = "<img src='$image' ";
		if(notNull($alt)) $img .= "alt='$alt' ";
		if(notNull($title)) $img .= "title='$title' ";
		if(notNull($width)) {
			$img .= "width='$width' ";
			if(!notNull($height)) {
				$height = ceil(($width/$orwidth)*$orheight);
				$img .= "height='$height' ";
			}
		}
		if(notNull($height)) {
			$img .= "height='$height' ";
			if(!notNull($width)) {
				$width = ceil(($height/$orheight)*$orwidth);
				$img .= "width='$width' ";
			}
		}
		if(notNull($parameters)) $img .= $parameters;
		
		$img .= " border='0' />";
	}
	else {
		$img = "";
	}
	return $img;
}
function currentPage() {
	$currentpageurl = $_SERVER['PHP_SELF'];
	return $currentpageurl;
}
function getURL($path) {
	/*$last_index=count($page)-1;
	$last_value = $page[$last_index];
	$page1=explode(".",$last_value);
	$last_index1=count($page1)-2;
	$URL = $page1[$last_index1];*/
	$URL = basename($path,".php");
	return $URL;
}
function cleanInput($input) {
	return inText(cleanHex($input));
}
function getMessage() {
	if(isset($_SESSION[SES]['adminmsg'])) {
		echo $_SESSION[SES]['adminmsg'];
		unset($_SESSION[SES]['adminmsg']);
	}			
}
function setMessage($msg,$type='correct') {
	$_SESSION[SES]['adminmsg'] = '<div class="'.$type.'">'.$msg.'</div>';
}
function get_youtube_video_image($url, $imagetype='default', $output_type='url') {
	$get_video_code=explode('v=',$url);	
	$chkcode=strlen($get_video_code[1]);	
	if($chkcode>11) {	
	  $adv_get_code=explode('&list=',$get_video_code[1]);	
	  $get_video_code[1]=$adv_get_code[0];	
	}	
	if($output_type=='url') {
		return $image_url ='http://i1.ytimg.com/vi/'.$get_video_code[1].'/'.$imagetype.'.jpg';
	}
	elseif($output_type=='img') {
		return '<img src="http://i1.ytimg.com/vi/'.$get_video_code[1].'/'.$imagetype.'.jpg" />';
	}
}

function limit_text($text, $limit) {
    $strings = strip_tags(trim($text));
      if (strlen($text) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          if(sizeof($pos) >$limit)
          {
            $text = substr($text, 0, $pos[$limit]) . '...';
          }
          return $text;
      }
      return $text;
    }
	

?>