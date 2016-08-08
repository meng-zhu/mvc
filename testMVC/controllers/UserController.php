<?php

class UserController extends Controller {
   function db(){
        /* 指定丟給哪個 models */
        $config = $this->model("config");
        
        return $config->getDB();
   }
    /*-----------------------------------登入--------------------------------------*/
    function login() {
        /*  防範隱碼攻擊 */
        $email=addslashes($_POST["email"]);
        $password=addslashes($_POST["password"]);
       
        /* 指定丟給哪個 models */
        $result = $this->model("user");
        $db = $this->db();
        /* 要執行哪個 function 並且給值 */
        $row = $result->login($db,$email,$password);
        if($row){
             header("Location:../Home");
        }else{
          
             header("Location:../Home/login");
        }
       
      
    }
    /*-----------------------------------登出--------------------------------------*/
    function logout() {
        //將session清空
        unset($_SESSION['uId']);
    	header("Location:../Home");
      
    }
    /*-----------------------------------註冊--------------------------------------*/
    function signup() {
        $email=addslashes($_GET["email"]);
        $password=addslashes($_GET["password"]);
        $name=addslashes($_GET["name"]);
        $phone=addslashes($_GET["phone"]);
        
        /* 指定丟給哪個 models */
        $result = $this->model("user");
        $db = $this->db();
        /* 要執行哪個 function 並且給值 */
        /*---------先確認信箱是否已經註冊-------*/
        $row = $result->check_account($db,$email,$password,$name,$phone);
        if($row){
            $show_info = "成功註冊"; 
        }else{
            $show_info = "此信箱已註冊過";
        }
        $this->view("Home/showinformation",$show_info);
    
       
    }
    /*--------------------------改會員資料--------------------------------------*/
    function updateUser() {
        $uId = $_SESSION['uId'];
        $password=addslashes($_POST["password"]);
        $password1=addslashes($_POST["password1"]);
        $name=addslashes($_POST["name"]);
        $phone=addslashes($_POST["phone"]);
        
         /* 指定丟給哪個 models */
        $result = $this->model("user");
        $db = $this->db();
        if($password != null){//如果有改密碼
        
           $row = $result->updateUser_pwd($db,$password,$name,$phone,$uId);
         
        }else{//沒改密碼
        
           $row = $result->updateUser($db,$name,$phone,$uId);
        
        }
        if($row){
            header("Location:../Home");
        }
        
    }
}
    
?>