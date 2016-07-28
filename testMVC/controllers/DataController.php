<?php

class DataController extends Controller {
   function db(){
        /* 指定丟給哪個 models */
        $config = $this->model("config");
        return $config->getDB();
   } 
   /*-----------------------------------縣市_收容所--------------------------------------*/
    function cityChange_Gov() {
        
        $city = $_GET["city"];
      
        if($city == "請選擇縣市"){
            $city="%";
        }
      
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        // /* 要執行哪個 function 並且給值 */
        $row = $result->cityChange_gov($db,$city);
        
        $this->view("Home/drawTable_gov",$row);//丟給view : drawTable_gov.php畫表格
    
    }
   /*-----------------------------------縣市_寵物--------------------------------------*/
    function cityChange() {
        
        $type = $_GET["type"];
        $city = $_GET["city"];
       
        if($city == "請選擇縣市"){
           $city="%";
        }
      
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        /* 要執行哪個 function 並且給值 */
        $row = $result->cityChange_pet($db,$city,$type);
        $this->view("Home/drawTable_pet",$row);//丟給view : drawTable_pet.php畫表格
       
    }
    
     /*-----------------------------------關鍵字--------------------------------------*/
    function searchKeyword() {
        
        $type = $_GET["type"];
        $keyword = addslashes($_GET["keyword"]);
       
      
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        // /* 要執行哪個 function 並且給值 */
        $row = $result->keyword_pet($db,$keyword,$type);
        $this->view("Home/drawTable_pet",$row);//丟給view : drawTable_pet.php畫表格
  
    }
    /*-----------------------------------協尋資料登入--------------------------------------*/
    function createPet(){
        
        $uId = $_SESSION['uId'];
        $num = addslashes($_POST["num"]);
        $variety = addslashes($_POST["variety"]);
        $sex = addslashes($_POST["sex"]);
        $weight = addslashes($_POST["weight"]);
        $age = addslashes($_POST["age"]);
        $color = addslashes($_POST["color"]);
        $orther = addslashes($_POST["orther"]);
        $type = addslashes($_POST["type"]);
        $city = addslashes($_POST["city"]);
        $place = addslashes($_POST["place"]);
        $date = addslashes($_POST["date"]);
        $images = $_FILES["file"]["name"];
        
       // echo $_SERVER['PHP_SELF'];
        if($images!=null){
            move_uploaded_file($_FILES["file"]["tmp_name"],"views/Home/images/".$_FILES["file"]["name"]);
           
        }else{
            /* 如果沒有丟照片，則使用預設照片 */
            $images = "animal-paw-print (1).png";
        }
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        /* 要執行哪個 function 並且給值 */
        $row = $result->createPet($db,$num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$uId);
        if($row == "上傳成功"){
            header("Location:../Home");
        }
    	

    } 
    /*----------------------------------刪除協尋資料--------------------------------------*/
    function deletePet() {
        $pId = $_GET["id"];
    	/* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        // /* 要執行哪個 function 並且給值 */
        $row = $result->delect_pet_img($db,$pId);
    	if($row == "協尋資料已刪除"){
            header("Location:../Home/pdm");
        }
    }
    /*----------------------------------顯示單筆協尋資料--------------------------------------*/
    function showPet() {
        $pId = $_GET["id"];
    	/* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        // /* 要執行哪個 function 並且給值 */
        $row2 = $result->city($db);
        $row = $result->showPet($db,$pId);
    	$this->view("Home/pdu",$row,$row2);
    }
    /*----------------------------------編輯協尋資料-----------------------------------------*/
    function updatePet() {
        $pId = $_GET["id"];
        $num = addslashes($_POST["num"]);
        $variety = addslashes($_POST["variety"]);
        $sex = addslashes($_POST["sex"]);
        $weight = addslashes($_POST["weight"]);
        $age = addslashes($_POST["age"]);
        $color = addslashes($_POST["color"]);
        $orther = addslashes($_POST["orther"]);
        $type = addslashes($_POST["type"]);
        $city = addslashes($_POST["city"]);
        $place = addslashes($_POST["place"]);
        $date = addslashes($_POST["date"]);
   
        $images = $_FILES["file"]["name"];
    
        /* 指定丟給哪個 models */
        $result = $this->model("crud");
        $db = $this->db();
        if($images!=null){
            move_uploaded_file($_FILES["file"]["tmp_name"],"views/Home/images/".$_FILES["file"]["name"]);
            $row = $result->updatePet_img($db,$num,$sex,$variety,$weight,$age,$color,$orther,$images,$type,$city,$place,$date,$pId);
        }else{
            $row = $result->updatePet($db,$num,$sex,$variety,$weight,$age,$color,$orther,$type,$city,$place,$date,$pId);
        }
        if($row == "修改成功"){
            header("Location:../Home/pdm");
        }
       	
    }
}
  
    
    
?>   