<?php
include_once 'config.php';
header("Content-Type:text/html; charset=utf-8");
class CRUD
{
 public function __construct()
 {
  $db = new DB_con();
 }
 //會員相關
  public function check_account($email)
 {
  return mysql_query("SELECT * FROM `user` WHERE `email` = '$email'");
 }
 public function create_user($email,$password,$name,$phone)
 {
  mysql_query("INSERT INTO `user`(`email`, `password`, `name`, `phone`) VALUES ('$email','$password','$name','$phone')");
 }
 
 public function login($email,$password)
 {
  return mysql_query("SELECT * FROM `user` WHERE `email` = '$email' and `password`='$password'");
 }
 public function showUser($uId)
 {
  return mysql_query("SELECT * FROM `user` WHERE `uId` = '$uId'");
 }
 public function updateUser_pwd($password,$name,$phone,$uId)
 {
  return mysql_query("UPDATE `user` SET `password`='$password',`name`='$name',`phone`='$phone' WHERE `uId` ='$uId'");
 } 
 public function updateUser($name,$phone,$uId)
 {
  return mysql_query("UPDATE `user` SET `name`='$name',`phone`='$phone' WHERE `uId` ='$uId'");
 }
 //協尋相關
  public function city()
 {
  return mysql_query("SELECT * FROM `city`");
 }
  public function cityChange_pet($city,$type)
 {
  return mysql_query("select * from pet , user where pet.uId=user.uId and city like '".$city."%' and  type ='".$type."' order by pet.poDate desc");
 }
 public function keyword_pet($keyword,$type)
 {
  return mysql_query("SELECT * FROM `pet` , `user`   where pet.uId=user.uId and type = '$type' and (`num` like '%$keyword%' or `sex` like '%$keyword%' or `variety` like  '%$keyword%'  or `weight` like  '%$keyword%' or `age` like  '%$keyword%' or `color` like  '%$keyword%' or `orther` like  '%$keyword%' or `city` like  '%$keyword%' or `missingPlace` like  '%$keyword%' or `missingDate` like  binary '%$keyword%')  order by pet.poDate desc");
 }
 public function cityChange_gov($city)
 {
  return mysql_query("select * from gov where gName like '".$city."%'");
 }
 public function insert_pet($num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$uId)
 {
  mysql_query("INSERT INTO `pet`(`num`, `sex`, `variety`, `weight`, `age`, `color`, `orther`, `images`, `type`, `city`, `missingPlace`, `missingDate`, `poDate`, `uId`) VALUES ('$num','$sex','$variety','$weight','$age','$color','$orther','$images','$type','$city','$place','$date',current_date(),'$uId')");
 }
  public function showPet_all($uId)
 {
  return mysql_query("select * from pet where uId='$uId' order by pet.poDate desc");
 }
  public function showPet($pId)
 {
  return mysql_query("SELECT * FROM `pet` WHERE `pId` = '$pId'");
 }
  public function updatePet_img($num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$pId)
 {
  mysql_query("UPDATE `pet` SET `num`='$num',`sex`='$sex',`variety`='$variety',`weight`='$weight',`age`='$age',`color`='$color',`orther`='$orther',`images`='$images',`type`='$type',`city`='$city',`missingPlace`='$place',`missingDate`='$date'WHERE `pId`='$pId'");
 }
 public function updatePet($num,$sex,$variety,$weight,$age,$color,$orther,$type,$city,$place,$date,$pId)
 {
  mysql_query("UPDATE `pet` SET `num`='$num',`sex`='$sex',`variety`='$variety',`weight`='$weight',`age`='$age',`color`='$color',`orther`='$orther',`type`='$type',`city`='$city',`missingPlace`='$place',`missingDate`='$date'WHERE `pId`='$pId'");
 }
  public function delect_pet_img($pId)
 {
  return  mysql_query("SELECT * FROM `pet` WHERE `pId`='$pId'");
 }
 public function delect_pet($pId)
 {
	 mysql_query("DELETE FROM `pet` WHERE `pId` ='$pId'");
 }
 

}
?>
