<?php
header("Content-Type:text/html; charset=utf-8");
class gov
{
      /*----------依縣市尋找_收容所-----------*/
     public function cityChange_gov($db,$city)
     {
         $result = $db->query("SELECT * FROM gov WHERE gName LIKE '".$city."%'");
         $row=$result->fetchAll(PDO::FETCH_ASSOC);
         return $row;
     }

}
?>
