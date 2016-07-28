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
    
       
         echo "<TABLE BORDER='1'  WIDTH='100%'><TR align='center'><TD>收容所名稱</TD><TD>地址</TD><TD>聯絡電話</TD><TD>服務時間</TD>";
        
         foreach ($row as $key){
           echo "<TR align='center'><TD>".$key['gName']."</TD><TD>".$key['gPlace']."</TD><TD> ".$key['gPhone']."</TD><TD>".$key['gService']."</TD></TR>";
         }
       echo "</table>";
       
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
       
        echo "<ul data-role='listview' data-filter='true'><table width='80%'>";
        
        foreach ($row as $key){
            if ($type =="1"){
                echo "<tr>
                <td align='center'>
                <img src='/testMVC/views/Home/images/".$key['images']."' width='250' height='250'> 
                </td>
                <td>
                     <h6>晶片編號： " . $key['num'] . "<br><br>品種： " . $key['variety']	. "<br><br>性別： " . $key['sex'] . "  體重： " . $key['weight'] . "  年齡： " . $key['age']	. "  顏色： " . $key['color'] . "<br><br>其他特徵： " . $key['orther'] .  "<br><br>走失日期： " . $key['missingDate'] . "<br><br>走失地點： " . $key['missingPlace'] . "<br><br>聯絡人： " . $key['name'] . "<br><br>聯絡電話： " . $key['phone'] . "<br><br>Email： " . $key['email'] . "<br><br>發佈日期： " . $key['poDate']."</h6><hr></td> </tr>";
            }else{
                echo "<tr>
                <td align='center'>
                     <img src='/testMVC/views/Home/images/".$key['images']."' width='250' height='250'> 
                </td>
                <td>
                     <h6>晶片編號： " . $key['num'] . "<br><br>品種： " . $key['variety']	. "<br><br>性別： " . $key['sex'] . "  體重： " . $key['weight'] . "  年齡： " . $key['age']	. "  顏色： " . $key['color'] . "<br><br>其他特徵： " . $key['orther'] .  "<br><br>拾獲日期： " . $key['missingDate'] . "<br><br>拾獲地點： " . $key['missingPlace'] . "<br><br>聯絡人： " . $key['name'] . "<br><br>聯絡電話： " . $key['phone'] . "<br><br>Email： " . $key['email'] . "<br><br>發佈日期： " . $key['poDate']."</h6><hr></td> </tr>";
         
          }
        }
       echo "</table></ul>";
       
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
       
        echo "<ul data-role='listview' data-filter='true'><table width='80%'>";
        
         foreach ($row as $key){
             if ($type =="1"){
            echo "<tr>
                <td align='center'>
                    <img src='/testMVC/views/Home/images/".$key['images']."' width='250' height='250'> 
                </td>
                <td>
                    <h6>晶片編號： " . $key['num'] . "<br><br>品種： " . $key['variety']	. "<br><br>性別： " . $key['sex'] . "  體重： " . $key['weight'] . "  年齡： " . $key['age']	. "  顏色： " . $key['color'] . "<br><br>其他特徵： " . $key['orther'] .  "<br><br>走失日期： " . $key['missingDate'] . "<br><br>走失地點： " . $key['missingPlace'] . "<br><br>聯絡人： " . $key['name'] . "<br><br>聯絡電話： " . $key['phone'] . "<br><br>Email： " . $key['email'] . "<br><br>發佈日期： " . $key['poDate']."</h6><hr></td> </tr>";
         }else{
             echo "<tr>
                <td align='center'>
                    <img src='/testMVC/views/Home/images/".$key['images']."' width='250' height='250'> 
                </td>
                <td>
                    <h6>晶片編號： " . $key['num'] . "<br><br>品種： " . $key['variety']	. "<br><br>性別： " . $key['sex'] . "  體重： " . $key['weight'] . "  年齡： " . $key['age']	. "  顏色： " . $key['color'] . "<br><br>其他特徵： " . $key['orther'] .  "<br><br>拾獲日期： " . $key['missingDate'] . "<br><br>拾獲地點： " . $key['missingPlace'] . "<br><br>聯絡人： " . $key['name'] . "<br><br>聯絡電話： " . $key['phone'] . "<br><br>Email： " . $key['email'] . "<br><br>發佈日期： " . $key['poDate']."</h6><hr></td> </tr>";
         
         }
         }
       echo "</table></ul>";
       
    }
    /*-----------------------------------協尋資料登入--------------------------------------*/
    function createPet(){
        
        $uId = $_SESSION['uId'];
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