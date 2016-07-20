<?php 
    session_start();
    
    $uId = $_SESSION['uId'];
    
    include_once '../../models/class.crud.php';
    $crud = new CRUD();
    $result = $crud->city();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
       
        
        $(document).ready(init);
        
        
        function init() {
        	$("#city").change(cityChange);
        	cityChange();
        }
        
        function cityChange() {
        	// var s = $("#letter option:selected").val();
        	var s = $("#city option:selected").text();
        	// type: '1' = 遺失寵物 '2' = 拾獲寵物
        	$.get('../../controllers/pet.php?type=1&city=' + s , cityChangeDataBack)
        }
        
        function cityChangeDataBack(data) {
        	$("#showPet").html(data);
        
        }
        function searchKeyword(){
            var keyword = $("#keyword").val();
            $.get('../../controllers/pet.php?type=1&keyword=' + keyword , cityChangeDataBack)
        }
        
    </script>
    
    
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">走失資訊</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="form-group">
                    <label>依縣市尋找</label>
                    <select class="form-control" id="city" name="city" onchange="check()" >
                        <option value="">請選擇縣市</option>
                        <?php while ($row = mysql_fetch_assoc($result)){ ?>
                        <option><?php echo $row["city"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label> 依關鍵字尋找</label>
                    <input  placeholder="請輸入關鍵字" name="keyword" type="text" id="keyword">
                    <button type="button" class="btn btn-default" id="checkbtn" onclick="searchKeyword()">確認送出</button>
                </div>
                 
                <div data-role="content" id="showPet">
                	查無資料
                </div>
                <div id="changePage">
                    
                </div>
                
              
            </div>
         
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
