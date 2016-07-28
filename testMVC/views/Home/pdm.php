<?php 
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    
    $uId = $_SESSION['uId'];
    
    if($uId==null){
        echo "請登入會員";
        header("Location:../Home/login");
        exit();
    }
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
    <link href="../views/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../views/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../views/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../views/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../views/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../views/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="../Home">寵物協尋</a>
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
                                <li><a href="../Home/pdm">協尋資料管理</a>
                                    </li>
                                    <li><a href="../Home/mdm">修改個人資料</a>
                                    </li>
                                    <li><a href="../User/logout">登出</a>
                                    </li>
                                <?php }else{ ?> 
                                    <li><a href="../Home/login">登入</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="../Home"><i class="fa fa-dashboard fa-fw"></i> 走失資訊</a>
                        </li>
                         <li>
                            <a href="../Home/pickup"><i class="fa fa-dashboard fa-fw"></i> 拾獲資訊</a>
                        </li>
                        <li>
                            <a href="../Home/forms"><i class="fa fa-edit fa-fw"></i>走失&拾獲資料登入</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>寵物走失其他辦法<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Home/blank">寵物走失怎麼辦？</a>
                                </li>
                                <li>
                                    <a href="../Home/gov">全台寵物收容所</a>
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
                             <?php foreach($data as $key) {?>
                            <tr>
                                <td align="center">
                                    <img src="../views/Home/images/<?php echo $key['images']?>"  width="250" height="250"> 
                                </td>
                               
                                <td>
                                    <h6><?php 
                    			    echo "晶片編號： " . $key['num'] . "<br><br>品種： " . $key['variety']	. "<br><br>性別： " . $key['sex'] . "  體重： " . $key['weight'] . "  年齡： " . $key['age']	. "  顏色： " . $key['color'] . "<br><br>其他特徵： " . $key['orther'] .  "<br><br>失蹤日期： " . $key['missingDate'] . "<br><br>失蹤地點： " . $key['missingPlace'] . "<br><br>發佈日期： " . $key['poDate'];
                        		       ?>
                        		   </h6>
                        		    <a href="../Data/showPet?id=<?php echo $key['pId'] ?>" class="btn btn-info">編輯</a>
                        		    <a href="../Data/deletePet?id=<?php echo $key['pId'] ?>" class="btn btn-info">刪除</a>
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
    <script src="../views/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../views/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../views/dist/js/sb-admin-2.js"></script>

</body>

</html>
