<ul data-role='listview' data-filter='true'>
    <table width='80%'>
    <?php foreach ($data as $key){
            if ($key['type'] =="1"){ ?>
                <tr>
                    <td align='center'>
                        <img src='/testMVC/views/Home/images/<?php echo $key['images']?>' width='250' height='250'> 
                    </td>
                    <td>
                         <h6>晶片編號：<?php echo  $key['num'] ?><br><br>品種：<?php echo  $key['variety'] ?><br><br>性別：<?php echo  $key['sex'] ?>體重：<?php echo  $key['weight'] ?>年齡：<?php echo  $key['age'] ?> 顏色：<?php echo  $key['color'] ?><br><br>其他特徵：<?php echo  $key['orther'] ?><br><br>走失日期： <?php echo  $key['missingDate'] ?><br><br>走失地點：<?php echo  $key['missingPlace'] ?><br><br>聯絡人：<?php echo  $key['name'] ?><br><br>聯絡電話：<?php echo  $key['phone'] ?><br><br>Email：<?php echo  $key['email'] ?><br><br>發佈日期：<?php echo  $key['poDate'] ?> </h6><hr>
                    </td>
                </tr>
    <?php  }else{ ?>
                <tr>
                    <td align='center'>
                         <img src='/testMVC/views/Home/images/<?php echo $key['images']?>' width='250' height='250'> 
                    </td>
                    <td>
                         <h6>晶片編號：<?php echo  $key['num'] ?><br><br>品種：<?php echo  $key['variety'] ?><br><br>性別：<?php echo  $key['sex'] ?>體重：<?php echo  $key['weight'] ?>年齡：<?php echo  $key['age'] ?> 顏色：<?php echo  $key['color'] ?><br><br>其他特徵：<?php echo  $key['orther'] ?><br><br>拾獲日期： <?php echo  $key['missingDate'] ?><br><br>拾獲地點：<?php echo  $key['missingPlace'] ?><br><br>聯絡人：<?php echo  $key['name'] ?><br><br>聯絡電話：<?php echo  $key['phone'] ?><br><br>Email：<?php echo  $key['email'] ?><br><br>發佈日期：<?php echo  $key['poDate'] ?> </h6><hr>
                    </td>
                </tr>
    <?php }
    }  ?>
    </table>
</ul>
       