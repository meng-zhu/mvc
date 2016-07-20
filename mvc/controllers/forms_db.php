<?php 
    session_start();
    $uId = $_SESSION['uId'];
    header("Content-Type:text/html; charset=utf-8");
    include_once '../models/class.crud.php';
    $crud = new CRUD();
    
    $num = $_POST["num"];
    $variety = $_POST["variety"];
    $sex = $_POST["sex"];
    $weight = $_POST["weight"];
    $age = $_POST["age"];
    $color = $_POST["color"];
    $orther = $_POST["orther"];
    $type = $_POST["type"];
    $city = $_POST["city"];
    $place = $_POST["place"];
    $date = $_POST["date"];


    $images = $_FILES["file"]["name"];
    if($images!=null){
        move_uploaded_file($_FILES["file"]["tmp_name"],"../views/pages/images/".$_FILES["file"]["name"]);
       
    }else{
        $images = "animal-paw-print (1).png";
    }
    
    $result =  $crud->insert_pet($num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$uId);
  
	header("Location:../views/pages/index.php");
?>

