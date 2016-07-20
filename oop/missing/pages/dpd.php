<?php 
    header("Content-Type:text/html; charset=utf-8");
    $pId=$_GET['id'];
    
	include_once 'class.crud.php';
    $crud = new CRUD();
	$result =  $crud->delect_pet_img($pId);
	
	$row = mysql_fetch_assoc($result);
 	$images = $row["images"];
	if($images!="animal-paw-print (1).png"){
	    unlink("images/$images");//將檔案刪除
	}
	$result =  $crud->delect_pet($pId);

	header("Location:pdm.php");
?>
