<?php
session_start();

class UserController extends Controller {
   function db(){
        /* 指定丟給哪個 models */
        $config = $this->model("config");
        
        return $config->getDB();
   }
   /*-----------------------------------登入--------------------------------------*/
    function login() {
        $email=$_POST["email"];
        $password=$_POST["password"];
        
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        /* 要執行哪個 function 並且給值 */
        $row = $result->login($db,$email,$password);
        header("Location:".$row);
      
    }
    /*-----------------------------------登出--------------------------------------*/
    function logout() {
        //將session清空
        unset($_SESSION['uId']);
    	header("Location:../Home");
      
    }
   /*-----------------------------------註冊--------------------------------------*/
    function signup() {
        $email=$_GET["email"];
        $password=$_GET["password"];
        $name=$_GET["name"];
        $phone=$_GET["phone"];
        
        // echo "123";
        // echo $email;
        
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        /* 要執行哪個 function 並且給值 */
        /*---------先確認信箱是否已經註冊-------*/
        $row = $result->check_account($db,$email,$password,$name,$phone);
        echo $row;
    }
     /*--------------------------改會員資料--------------------------------------*/
    function updateUser() {
        $uId = $_SESSION['uId'];
        $password=$_POST["password"];
        $password1=$_POST["password1"];
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        
         /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        if($password != null){//如果有改密碼
        
           $row = $result->updateUser_pwd($db,$password,$name,$phone,$uId);
         
        }else{//沒改密碼
        
           $row = $result->updateUser($db,$name,$phone,$uId);
        
        }
        header("Location:".$row);
    }
}
    
?>