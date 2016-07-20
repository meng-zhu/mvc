<?php 
    session_start();
    include_once '../models/class.crud.php';
    $crud = new CRUD();
    
    $uId = $_SESSION['uId'];
    $pId=$_GET['id'];
    
    header("Content-Type:text/html; charset=utf-8");

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
        
        move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"]);
        $result =  $crud->updatePet_img($num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$pId);
       
    }else{
        $result =  $crud->updatePet($num,$sex,$variety,$weight,$age,$color,$orther,$type,$city,$place,$date,$pId);
      
    }
       
    header("Location:../views/pages/index.php");

?>

