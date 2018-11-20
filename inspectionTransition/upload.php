<?php
$path = "uploads/";
$extArr = array("jpg", "png", "gif");
$x=1;
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_FILES['photoimg']['name'];
    $size = $_FILES['photoimg']['size'];

    if(empty($name)){
        echo 'please select the picture you want to upload';
        exit;
    }

    $ext = extend($name);
    if(!in_array($ext,$extArr)){
        echo 'Wrong format picture！';
        exit;
    }

    $image_name = time().rand(100,999).".".$ext;
    $tmp = $_FILES['photoimg']['tmp_name'];

    if(move_uploaded_file($tmp, $path.$image_name)){

        echo '<p><img src="'.$path.$image_name.'"  class="preview"></p>';
        echo '<input value="'.$path.$image_name.'" type="hidden"  name="pic[]" >';
    }else{
        echo 'Upload error ！';
    }
    exit;
}
exit;




function extend($file_name){
	$extend = pathinfo($file_name);
	$extend = strtolower($extend["extension"]);
	return $extend;
}

?>