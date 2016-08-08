<?php

class HomeController extends Controller {
   
    function db(){
        /* 指定丟給哪個 models */
        $config = $this->model("config");
        
        return $config->getDB();
   }
    /* 跳轉首頁(走失資訊) */
    function index() {
       /* 指定丟給哪個 models */
      $result = $this->model("city");
      $db = $this->db();
      /* 要執行哪個 function 並且給值 */
      $row = $result->select_city($db);
      $this->view("Home/index",$row);
  
       
    }
    /* 跳轉 登入 頁面 */
    function login() {
       $this->view("Home/login");
    }
     /* 跳轉 註冊 頁面 */
    function signup() {
       $this->view("Home/signup");
    }
    /* 跳轉 協尋資料管理 頁面 */
    function pdm() {
       $uId = $_SESSION['uId'];
       /* 指定丟給哪個 models */
       $result = $this->model("pet");
       $db = $this->db();
       /* 要執行哪個 function 並且給值 */
       $row = $result->showPet_all($db,$uId);
       
       $this->view("Home/pdm",$row);
       
    }
    /* 跳轉 修改個人資料 頁面 */
    function mdm() {
       $uId = $_SESSION['uId'];
       /* 指定丟給哪個 models */
       $result = $this->model("user");
       $db = $this->db();
       /* 要執行哪個 function 並且給值 */
       $row = $result->showUser($db,$uId);
       $this->view("Home/mdm",$row);
    }
    /* 跳轉 拾獲資訊 頁面 */
    function pickup() {
        /* 指定丟給哪個 models */
       $result = $this->model("city");
       $db = $this->db();
       /* 要執行哪個 function 並且給值 */
       $row = $result->select_city($db);
       $this->view("Home/pickup",$row);
    }
    /* 跳轉 走失&拾獲資料登入 頁面 */
    function forms() {
        $uId = $_SESSION['uId'];
       /* 指定丟給哪個 models */
       $user = $this->model("user");
       $city = $this->model("city");
       $db = $this->db();
       /* 要執行哪個 function 並且給值 */
       $row = $user->showUser($db,$uId);
       $row2 = $city->select_city($db);
       $this->view("Home/forms",$row,$row2);
    }
    /* 跳轉 寵物走失怎麼辦？ 頁面 */
    function blank() {
       $this->view("Home/blank");
    }
    /* 跳轉 全台寵物收容所 頁面 */
    function gov() {
        /* 指定丟給哪個 models */
       $result = $this->model("city");
       $db = $this->db();
       /* 要執行哪個 function 並且給值 */
       $row = $result->select_city($db);
       $this->view("Home/gov",$row);
    }
  
}

?>