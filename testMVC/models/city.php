<?php
header("Content-Type:text/html; charset=utf-8");
class city
{
     /*----------秀出所有縣市-----------*/
      public function select_city($db)
     {
         $result = $db->query("SELECT * FROM `city`");
       
        while ($row = $result->fetch()){
           $data[]= $row['city'];
           // echo $row['city'];
         }
        return $data;
       
     }
}
?>
