 
<TABLE BORDER='1'  WIDTH='100%'>
    <TR align='center'>
        <TD>收容所名稱</TD>
        <TD>地址</TD>
        <TD>聯絡電話</TD>
        <TD>服務時間</TD>
    <?php foreach ($data as $key){ ?>
    <TR align='center'>
        <TD><?php echo $key['gName']?></TD>
        <TD><?php echo $key['gPlace']?></TD>
        <TD><?php echo $key['gPhone']?></TD>
        <TD><?php echo $key['gService']?></TD>
    </TR>
    <?php } ?>
</table>