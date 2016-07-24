<?php 
    session_start();
    $uId = $_SESSION['uId'];
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
                        <h1 class="page-header">寵物走失怎麼辦？</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    尋找寵物步驟
                    <ol>
                        <li>
                            走失當天，先在走失地點附近尋找。
                        </li>
                        <li>
                           製作協尋啟示在走失地點附近張貼。<br>
                           &nbsp協尋啟事應有事項：
                           <ul>
                                <li> 寵物照片</li>
                                <li> 性別、體型、年齡、晶片號碼</li>
                                <li> 毛色、品種、體型、特徵、身上配件（項圈、吊牌等）</li>
                                <li> 失蹤地點、失蹤日期、連絡電話</li>
                                <li> 遇見陌生人可能的反應與平日時常做的小動作</li>
                           </ul>
                        </li>
                        <li>
                            請附近商家調閱住家或走失地點附近的監視器。
                        </li>
                        <li>
                            在各大流動率高的協尋網站或FB上貼出協尋啟示，並且不定時在該網站的拾獲區中查看是否有人拾獲寵物。
                        </li>
                        <li>
                            經常性關注各縣市的收容中心公告出的收容情形，以防晶片損壞（或設備太舊）掃不出資料。<br>
                            注意！貓狗一旦被送至收容所，12天即有可能被安樂。
                        </li>
                    </ol>
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
