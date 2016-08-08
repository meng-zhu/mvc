<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
class user
{
     /*--------------------------------------會員相關----------------------------------------------*/
     /*---------確認信箱是否已經註冊-------*/
      public function check_account($db,$email,$password,$name,$phone)
     {
         $result = $db->query("SELECT * FROM `user` WHERE `email` = '$email'");
         //如果筆數<1 表示信箱尚未註冊過
         if($result->rowCount() < 1){
          /*---------這個信箱可以註冊，並丟給create_user建立會員資料-------*/
           $info = $this->create_user($db,$email,$password,$name,$phone);
           return true;
         }else{
           return false;
         }
         
     }
     /*--------------註冊----------------*/
     public function create_user($db,$email,$password,$name,$phone)
     {
      //echo $email;
        $result = $db->query("INSERT INTO `user`(`email`, `password`, `name`, `phone`) VALUES ('$email','$password','$name','$phone')");
        return true;
     }
     /*-------------登入-----------------*/
     public function login($db,$email,$password)
     {
         $result = $db->query("SELECT * FROM `user` WHERE `email` = '$email' AND `password`='$password'");
         //如果筆數<1 表示帳密錯誤
         if ( $result->rowCount() < 1) {
           $db = null;
            return false;
         }else{
            $row = $result->fetch();
            $uId =  $row['uId'];  
            $_SESSION['uId'] = $uId;
            return true;
           
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
          return true;
        //   return "../Home";
     } 
     /*--------------修改個人資料(沒變更密碼)----------------*/
     public function updateUser($db,$name,$phone,$uId)
     {
          $result = $db->query("UPDATE `user` SET `name`='$name',`phone`='$phone' WHERE `uId` ='$uId'");
          return true;
        //   return "../Home";
     }
     
  
}
?>
