<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
class crud
{
     /*--------------------------------------會員相關----------------------------------------------*/
     /*---------確認信箱是否已經註冊-------*/
      public function check_account($db,$email,$password,$name,$phone)
     {
         $result = $db->query("SELECT * FROM `user` WHERE `email` = '$email'");
         //如果筆數<1 表示信箱尚未註冊過
         if($result->rowCount() < 1){
          /*---------這個信箱可以註冊，並丟給create_user建立會員資料-------*/
           $this->create_user($db,$email,$password,$name,$phone);
         }else{
           return "此信箱已註冊過";
         }
         
     }
     /*--------------註冊----------------*/
     public function create_user($db,$email,$password,$name,$phone)
     {
      //echo $email;
        $result = $db->query("INSERT INTO `user`(`email`, `password`, `name`, `phone`) VALUES ('$email','$password','$name','$phone')");
        echo "帳號已成功註冊";
     }
     /*-------------登入-----------------*/
     public function login($db,$email,$password)
     {
         $result = $db->query("SELECT * FROM `user` WHERE `email` = '$email' and `password`='$password'");
         //如果筆數<1 表示帳密錯誤
         if ( $result->rowCount() < 1) {
           $db = null;
            return "帳號或密碼輸入錯誤";
         }else{
            $row = $result->fetch();
            $uId =  $row['uId'];  
            $_SESSION['uId'] = $uId;
            return "成功登入";
           
         }
      
     }
     /*--------------顯示用戶資料(修改個人資料及寵物走失登入用)----------------*/
     public function showUser($db,$uId)
     {
          $result = $db->query("SELECT * FROM `user` WHERE `uId` = '$uId'");
          $row=$result->fetchAll(PDO::FETCH_ASSOC);
          return $row;
          
     }
     /*--------------修改個人資料(有變更密碼)----------------*/
     public function updateUser_pwd($db,$password,$name,$phone,$uId)
     {
          $result = $db->query("UPDATE `user` SET `password`='$password',`name`='$name',`phone`='$phone' WHERE `uId` ='$uId'");
          return "資料已修改";
        //   return "../Home";
     } 
     /*--------------修改個人資料(沒變更密碼)----------------*/
     public function updateUser($db,$name,$phone,$uId)
     {
          $result = $db->query("UPDATE `user` SET `name`='$name',`phone`='$phone' WHERE `uId` ='$uId'");
          return "資料已修改";
        //   return "../Home";
     }
     
     /*--------------------------------------協尋相關----------------------------------------------*/
     /*----------秀出所有縣市-----------*/
      public function city($db)
     {
         $result = $db->query("SELECT * FROM `city`");
       
         while ($row = $result->fetch()){
           $data[]= $row["city"];
         }
        return $data;
       
     }
     /*----------依縣市尋找_寵物-----------*/
      public function cityChange_pet($db,$city,$type)
     {
         $result = $db->query("select * from pet , user where pet.uId=user.uId and city like '".$city."%' and  type ='".$type."' order by pet.poDate desc");
          $row=$result->fetchAll(PDO::FETCH_ASSOC);
          return $row;
       
     }
     /*----------依關鍵字尋找-----------*/
     public function keyword_pet($db,$keyword,$type)
     {
          $result = $db->query("SELECT * FROM `pet` , `user`   where pet.uId=user.uId and type = '$type' and (`num` like '%$keyword%' or `sex` like '$keyword' or `variety` like  '%$keyword%'  or `weight` like  '$keyword' or `age` like  '$keyword' or `color` like  '%$keyword%' or `orther` like  '%$keyword%' or `city` like  '%$keyword%' or `missingPlace` like  '%$keyword%' or `missingDate` like  binary '%$keyword%')  order by pet.poDate desc");
           $row=$result->fetchAll(PDO::FETCH_ASSOC);
          return $row;
     }
     /*----------依縣市尋找_收容所-----------*/
     public function cityChange_gov($db,$city)
     {
         $result = $db->query("select * from gov where gName like '".$city."%'");
         $row=$result->fetchAll(PDO::FETCH_ASSOC);
         return $row;
     }
     /*----------協尋資料登入-----------*/
     public function createPet($db,$num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$uId)
     {
         $result = $db->query("INSERT INTO `pet`(`num`, `sex`, `variety`, `weight`, `age`, `color`, `orther`, `images`, `type`, `city`, `missingPlace`, `missingDate`, `poDate`, `uId`) VALUES ('$num','$sex','$variety','$weight','$age','$color','$orther','$images','$type','$city','$place','$date',current_date(),'$uId')");
         return "上傳成功";
        //  return "../Home";
     }
     /*----------登入過協尋資料查詢(全部)-----------*/
      public function showPet_all($db,$uId)
     {
          $result = $db->query("select * from pet where uId='$uId' order by pet.poDate desc");
          $row=$result->fetchAll(PDO::FETCH_ASSOC);
          return $row;
     }
     /*----------秀出單筆協尋資料(單筆)-----------*/
      public function showPet($db,$pId)
     {
        $result = $db->query("SELECT * FROM `pet` WHERE `pId` = '$pId'");
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
     }
     /*----------編輯協尋資料(有照片)-----------*/
      public function updatePet_img($db,$num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$pId)
     {
         $result = $db->query("UPDATE `pet` SET `num`='$num',`sex`='$sex',`variety`='$variety',`weight`='$weight',`age`='$age',`color`='$color',`orther`='$orther',`images`='$images',`type`='$type',`city`='$city',`missingPlace`='$place',`missingDate`='$date'WHERE `pId`='$pId'");
         return "修改成功";        
        //  return "../Home/pdm";
     }
     /*----------編輯協尋資料(沒照片)-----------*/
     public function updatePet($db,$num,$sex,$variety,$weight,$age,$color,$orther,$type,$city,$place,$date,$pId)
     {
         $result = $db->query("UPDATE `pet` SET `num`='$num',`sex`='$sex',`variety`='$variety',`weight`='$weight',`age`='$age',`color`='$color',`orther`='$orther',`type`='$type',`city`='$city',`missingPlace`='$place',`missingDate`='$date'WHERE `pId`='$pId'");
         return "修改成功"; 
        //  return "../Home/pdm";
     }
     /*----------刪除協尋資料-----------*/
      public function delect_pet_img($db,$pId)
     {
        $result = $db->query("SELECT * FROM `pet` WHERE `pId`='$pId'");
        $row = $result->fetch();
        $images = $row["images"];
        
	    if($images!="animal-paw-print (1).png"){
	        //echo $_SERVER['PHP_SELF'];
	        unlink("views/Home/images/$images");//將檔案刪除
    	}
    	$this->delect_pet($db,$pId);
    	return "協尋資料已刪除除";
    // 	return "../Home/pdm";
     }
     public function delect_pet($db,$pId)
     {
       	 $result = $db->query("DELETE FROM `pet` WHERE `pId` ='$pId'");
       	 return "協尋資料已刪除";
       	// echo $_SERVER['PHP_SELF'];
     }
 

}
?>
