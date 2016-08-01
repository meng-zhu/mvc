<?php
    header("Content-Type:text/html; charset=utf-8");
    $origin = array(
        array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 1, 1, 1, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
        array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
        array(1, 0, 0, 1, 1, 0, 1, 1, 1, 1),
        array(1, 0, 0, 1, 1, 0, 1, 1, 1, 1),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
    );
    echo "原始資料:<br>";
    for($i=0;$i<=9;$i++){
        for($j=0;$j<=9;$j++){
            echo $origin[$i][$j]." ";
              if($j == 9){
                echo "<br>";
            }
        }
    }

    for($i=0;$i<=9;$i++){
        for($j=0;$j<=9;$j++){
            if($origin[$i][$j]==1){
                $data_all[]=$i."".$j;
            }
        }
    }
    echo "<hr>把值為1的位置抓出來<br>";
    foreach($data_all as $key){
        echo $key." ";
    }

   echo "<hr>將資料依序分類成2維陣列<br>";
    $len = count($data_all);//計算陣列長度
    $j=0;
    $array[$j][] =  $data_all[0];//第一筆資料先放進$array[][] 中
    
    for($i=1;$i<$len;$i++){
       
        $x = $data_all[$i];
        foreach($array as $key => $number){
            foreach($number as $value){
                $num = $x-$value;
                if($num==1 || $num==10){
                    if($data_all[$i]!="a"){
                        $array[$key][] =  $x;
                        $data_all[$i] = "a";
                        break;
                    }
                }
            }
        }
        if($data_all[$i]!="a"){
            $j++;
            $array[$j][] =  $data_all[$i];
              
        }
    }
    
    // echo $j."<hr>";
    
    foreach($array as $key){
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }
    echo "<hr>2次分類，確保沒分類錯誤<br>";
    for($re=0;$re<count($array);$re++){
        for($re_data=0;$re_data<count($array[$re]);$re_data++){
            $data = $array[$re][$re_data];//抓出每個值
            
            //與每個陣列進行比對
            for($re2=$re+1;$re2<count($array);$re2++){
                 for($re_data2=0;$re_data2<count($array[$re2]);$re_data2++){
                    $data2 = $array[$re2][$re_data2];//抓出每個值
                    $num = $data - $data2;
                    $num2 = $data2 - $data; 
                    if($num==1 || $num==10 || $num2==1 || $num2==10){
                        $num_r = $data%10;
                        $num2_r = $data2%10;
                        if($num_r!=0 && $num2_r!=9){
                            if($data2!="x"){
                                $array[$re][] = $data2;
                                $array[$re2][$re_data2]="x";
                            }
                        }
                       
                    }
                 }
            }
            
        }
    }

    
    echo count($array)."<br>";
    foreach($array as $key){
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }
    echo "<hr>清空沒有值得陣列<br>";
    for($i=0;$i<=9;$i++){//刪除沒有值得陣列
        for($j=0;$j<=9;$j++){
            if($array[$i][$j]=="x"){
                $array[$i]=array();
            }
        }
    }

    foreach($array as $key){
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }

    echo "<hr>依長短排序<br>";
    for($i=0;$i<count($array);$i++){
        for($j=$i+1;$j<count($array);$j++){
            if(count($array[$i]) < count($array[$j])){
                 $tem = $array[$i];
                 $array[$i] = $array[$j];
                 $array[$j] = $tem;
            }
        }
    }
    foreach($array as $key){
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }
    echo "<hr>印出結果<br>";
    $n = 1;
    for($i = 0 ; $i<count($array);$i++){
        if(count($array[$i])==count($array[$i+1])){
            $n++;
        }else{
            break;
        }
    }
    for($i=0;$i<=9;$i++){
        for($j=0;$j<=9;$j++){
            $origin[$i][$j]=0;
        }
    }
    for($x = 0 ; $x < $n ;$x++){
        for($show_big = 0 ; $show_big<count($array[$x]) ; $show_big++){
            $show = $array[$x][$show_big];
            $r = floor($show/10);//取十位數
            $c = $show%10;//取個位數
            $origin[$r][$c] = 1;
        }
        
    }
   
    for($i=0;$i<=9;$i++){
        for($j=0;$j<=9;$j++){
            echo $origin[$i][$j]." ";
              if($j == 9){
                echo "<br>";
            }
        }
    }
    
    
?>