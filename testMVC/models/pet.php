<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
class pet
{
     /*--------------------------------------協尋相關----------------------------------------------*/
     /*----------依縣市尋找_寵物-----------*/
      public function cityChange_pet($db,$city,$type)
     {
         $result = $db->query("SELECT * FROM pet , user WHERE pet.uId=user.uId AND city LIKE '".$city."%' AND  type ='".$type."' ORDER BY pet.poDate DESC");
          $row=$result->fetchAll(PDO::FETCH_ASSOC);
          return $row;
       
     }
     /*----------依關鍵字尋找-----------*/
     public function keyword_pet($db,$keyword,$type)
     {
          $result = $db->query("SELECT * FROM `pet` , `user`   WHERE pet.uId=user.uId AND type = '$type' AND (`num` LIKE '%$keyword%' OR `sex` LIKE '$keyword' OR `variety` LIKE  '%$keyword%'  OR `weight` LIKE  '$keyword' OR `age` LIKE  '$keyword' OR `color` LIKE  '%$keyword%' OR `orther` LIKE  '%$keyword%' OR `city` LIKE  '%$keyword%' OR `missingPlace` LIKE  '%$keyword%' OR `missingDate` LIKE  binary '%$keyword%')  ORDER BY pet.poDate DESC");
           $row=$result->fetchAll(PDO::FETCH_ASSOC);
          return $row;
     }
     /*----------協尋資料登入-----------*/
     public function createPet($db,$num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$uId)
     {
         $result = $db->query("INSERT INTO `pet`(`num`, `sex`, `variety`, `weight`, `age`, `color`, `orther`, `images`, `type`, `city`, `missingPlace`, `missingDate`, `poDate`, `uId`) VALUES ('$num','$sex','$variety','$weight','$age','$color','$orther','$images','$type','$city','$place','$date',current_date(),'$uId')");
         return true;
        //  return "../Home";
     }
     /*----------登入過協尋資料查詢(全部)-----------*/
      public function showPet_all($db,$uId)
     {
          $result = $db->query("SELECT * FROM pet WHERE uId='$uId' ORDER BY pet.poDate DESC");
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
         return true;        
        //  return "../Home/pdm";
     }
     /*----------編輯協尋資料(沒照片)-----------*/
     public function updatePet($db,$num,$sex,$variety,$weight,$age,$color,$orther,$type,$city,$place,$date,$pId)
     {
         $result = $db->query("UPDATE `pet` SET `num`='$num',`sex`='$sex',`variety`='$variety',`weight`='$weight',`age`='$age',`color`='$color',`orther`='$orther',`type`='$type',`city`='$city',`missingPlace`='$place',`missingDate`='$date'WHERE `pId`='$pId'");
         return true; 
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
        	return true;
    // 	return "../Home/pdm";
     }
     public function delect_pet($db,$pId)
     {
       	 $result = $db->query("DELETE FROM `pet` WHERE `pId` ='$pId'");
       	 return true;
       	// echo $_SERVER['PHP_SELF'];
     }
 

}
?>
