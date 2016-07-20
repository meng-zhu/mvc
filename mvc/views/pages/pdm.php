<?php 
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    
    $uId = $_SESSION['uId'];
    
 

    include_once '../../models/class.crud.php';
    $crud = new CRUD();
   
    $result =  $crud->showPet_all($uId)
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>寵物協尋平台</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">寵物協尋</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>會員中心<span class="fa arrow"></span></i>
                            </a>
                            <ul class="nav nav-second-level">
                                <!-- 處理是否登入 -->
                                <?php if($uId != null){ ?>
                                <li><a href="pdm.php">協尋資料管理</a>
                                    </li>
                                    <li><a href="mdm.php">修改個人資料</a>
                                    </li>
                                    <li><a href="../../controllers/user.php?logout=logout">登出</a>
                                    </li>
                                <?php }else{ ?> 
                                    <li><a href="login.php">登入</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> 走失資訊</a>
                        </li>
                         <li>
                            <a href="pickup.php"><i class="fa fa-dashboard fa-fw"></i> 拾獲資訊</a>
                        </li>
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i>走失&拾獲資料登入</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>寵物走失其他辦法<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.php">寵物走失怎麼辦？</a>
                                </li>
                                <li>
                                    <a href="gov.php">全台寵物收容所</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">協尋資料管理</h1>
                    </div>
                    <!-- /.col-lg-12 -->
<!-- 在這裡打唷~~~ -->
        
                    <ul data-role="listview" data-filter="true">
                        <table width="80%">
                             <?php while ($row = mysql_fetch_assoc($result)){ ?>
                            <tr>
                                <td align="center">
                                    <img src="images/<?php echo $row['images']?>"  width="250" height="250"> 
                                </td>
                               
                                <td>
                                    <h6><?php 
                    			    echo "晶片編號： " . $row['num'] . "<br><br>品種： " . $row['variety']	. "<br><br>性別： " . $row['sex'] . "  體重： " . $row['weight'] . "  年齡： " . $row['age']	. "  顏色： " . $row['color'] . "<br><br>其他特徵： " . $row['orther'] .  "<br><br>失蹤日期： " . $row['missingDate'] . "<br><br>失蹤地點： " . $row['missingPlace'] . "<br><br>發佈日期： " . $row['poDate'];
                        		       ?>
                        		   </h6>
                        		    <a href="pdu.php?id=<?php echo $row['pId'] ?>" class="btn btn-info">編輯</a>
                        		    <a href="../../controllers/dpd.php?id=<?php echo $row['pId'] ?>" class="btn btn-info">刪除</a>
                        		   <hr>
                                </td>
                            </tr>
                            
                            <?php } ?>
                        </table>
                    </ul>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
