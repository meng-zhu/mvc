<?php
    header("Content-Type:text/html; charset=utf-8");
    include_once 'class.crud.php';
    $crud = new CRUD();
    
    $result = "";
    if (!isset($_GET["city"])) {
    	die("no city found.");
    }
    $city = $_GET["city"];

   
    if($city != "請選擇縣市"){
    }else{
        $city="%";
    }
       $result = $crud->cityChange_gov($city);



    
?>
    <TABLE BORDER="1"  WIDTH="100%"> 
        <TR align="center"><TD>收容所名稱</TD><TD>地址</TD><TD>聯絡電話</TD><TD>服務時間</TD>
        <?php while ($row = mysql_fetch_assoc($result)){ ?>
        <TR align="center"><TD>
        <?php echo $row['gName']?>
        </TD><TD>  <?php echo $row['gPlace']?></TD><TD>  <?php echo $row['gPhone']?></TD><TD>  <?php echo $row['gService']?></TD></TR>
        <?php } ?>
    </TABLE>
 