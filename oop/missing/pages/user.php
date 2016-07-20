<?php
    session_start();
        
    header("Content-Type:text/html; charset=utf-8");
    include_once 'class.crud.php';
    $crud = new CRUD();
    
    if(isset($_GET["createUser"])){//註冊
        $email=$_GET["email"];
        $password=$_GET["password"];
        $name=$_GET["name"];
        $phone=$_GET["phone"];
        
        $result = $crud->check_account($email);
        if (mysql_num_rows($result) < 1){ //此信箱可以註冊
            
            $crud-> create_user($email,$password,$name,$phone);
            echo "已成功註冊.<BR>\n<a href='login.html'>不想等待請按此</a>"; ;
        	header("Location:login.php");
            exit;
        }else{
            echo "此信箱已註冊過";
        // 	header("Location:signup.php");
        }
    } 
    if(isset($_POST["login"])){//登入
        $email=$_POST["email"];
        $password=$_POST["password"];
       
        $result = $crud->login($email,$password);
        if (mysql_num_rows($result) < 1){
            echo "帳號或密碼輸入錯誤";
            header("Location:login.php");
        }else{
            $row = mysql_fetch_assoc($result);
            $uId =  $row['uId'];  
            $_SESSION['uId'] = $uId;
            //echo "成功登入";
            header("Location:index.php");
        }
       
    } if(isset($_GET["logout"])){//登出
        //將session清空
        unset($_SESSION['uId']);
        echo '登出中';
    	header("Location:index.php");
       
    }if(isset($_POST["updateUser"])){//修改個人資料
        $uId = $_SESSION['uId'];
        $password=$_POST["password"];
        $password1=$_POST["password1"];
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        
        if($password != null){//如果有改密碼
        
            $result = $crud->updateUser_pwd($password,$name,$phone,$uId);
         
        }else{//沒改密碼
        
             $result = $crud->updateUser($name,$phone,$uId);
        
        }
        
            echo "會員資料已變更";
            header("Location:index.php");
       
    }
    
    
    
    
?>