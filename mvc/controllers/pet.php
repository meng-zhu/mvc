<?php
    header("Content-Type:text/html; charset=utf-8");
    include_once '../models/class.crud.php';
    $crud = new CRUD();
    
    if (isset($_GET["city"])&isset($_GET["type"])) {
    	$type = $_GET["type"];
        $city = $_GET["city"];
        
    
        if($city != "請選擇縣市"){
        }else{
            $city="%";
        }
           $result = $crud->cityChange_pet($city,$type);
    }
    
     if (isset($_GET["keyword"])&isset($_GET["type"])) {
    	$type = $_GET["type"];
        $keyword = $_GET["keyword"];
        
        $result = $crud->keyword_pet($keyword,$type);
       
    }
    
    
?>
    <ul data-role="listview" data-filter="true">
        <table width="80%">
            <?php while ($row = mysql_fetch_assoc($result)){ ?>
                <tr>
                    <td align="center">
                        <img src="images/<?php echo $row['images']?>"  width="250" height="250"> 
                    </td>
                    <td>
                        <h6><?php  if($type!="1"){
                            echo "晶片編號： " . $row['num'] . "<br><br>品種： " . $row['variety']	. "<br><br>性別： " . $row['sex'] . "  體重： " . $row['weight'] . "  年齡： " . $row['age']	. "  顏色： " . $row['color'] . "<br><br>其他特徵： " . $row['orther'] .  "<br><br>拾獲日期： " . $row['missingDate'] . "<br><br>拾獲地點： " . $row['missingPlace'] . "<br><br>聯絡人： " . $row['name'] . "<br><br>聯絡電話： " . $row['phone'] . "<br><br>Email： " . $row['email'] . "<br><br>發佈日期： " . $row['poDate'];
                        }else{
                            echo "晶片編號： " . $row['num'] . "<br><br>品種： " . $row['variety']	. "<br><br>性別： " . $row['sex'] . "  體重： " . $row['weight'] . "  年齡： " . $row['age']	. "  顏色： " . $row['color'] . "<br><br>其他特徵： " . $row['orther'] .  "<br><br>失蹤日期： " . $row['missingDate'] . "<br><br>失蹤地點： " . $row['missingPlace'] . "<br><br>聯絡人： " . $row['name'] . "<br><br>聯絡電話： " . $row['phone'] . "<br><br>Email： " . $row['email'] . "<br><br>發佈日期： " . $row['poDate'];
                        }
        			    
            		       ?>
            		    </h6>
            		    <hr>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </ul>