<?php
$isImageUploadDone = false;

if(isset($_POST['data'])) {
	//print_r($_POST['data']);
	list($name, $ext) = explode(".", $_POST['name']);
	
	$base_path = "C:\\xampp\\htdocs\\texteditor";
	$base_url = "http://localhost/texteditor";
	
	$path = $base_path."/uploads/";
	$actual_image_name = "myimage-".time().".".$ext;
	
	//save image
	$pos = strpos($_POST['data'], ",");
	$data = substr($_POST['data'], $pos+1);
	$decoded = base64_decode($data);
	file_put_contents($path.$actual_image_name, $decoded);
	$isImageUploadDone = true;
}

if($isImageUploadDone) {
	echo $actual_image_name;
} else {
	echo "Error: ".$isImageUploadMsg;
}
?>