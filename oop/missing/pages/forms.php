<?php 
    session_start();
    header("Content-Type:text/html; charset=utf-8");
    
    $uId = $_SESSION['uId'];
    if($uId==null){
        //echo "請登入會員";
        header("Location:login.php");
        exit();
    }else{
 

    include_once 'class.crud.php';
    $crud = new CRUD();
    $result_city = $crud->city();
    $result =  $crud->showUser($uId)

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
        	s = $("#city option:selected").text();
           	place.value = s;
        
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
                                    <li><a href="user.php?logout=logout">登出</a>
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
                    <h1 class="page-header">走失&拾獲資料登入</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            走失&拾獲資料登入
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"  action="forms_db.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>晶片號碼</label>
                                            <input class="form-control" placeholder="晶片號碼" id="num" name="num">
                                        </div>
                                        <div class="form-group">
                                            <label>犬種</label>
                                            <input class="form-control" placeholder="犬種"  id="variety" name="variety">
                                        </div>
                                        <div class="form-group">
                                            <label>性別</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="sex1" value="公" checked>公
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="sex2" value="母">母
                                                </label>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label>體型</label>
                                            <input class="form-control" placeholder="體型描述" id="weight" name="weight">
                                        </div>
                                        <div class="form-group">
                                            <label>年齡</label>
                                            <input class="form-control" placeholder="年齡" id="age" name="age">
                                        </div>
                                        <div class="form-group">
                                            <label>毛色</label>
                                            <input class="form-control" placeholder="毛色" id="color" name="color">
                                        </div>
                                        <div class="form-group">
                                            <label>其他特徵</label>
                                            <textarea class="form-control" rows="3" id="orther" name="orther"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>照片上傳</label>
                                            <input type="file" name="file" id ="file">
                                           
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>走失&拾獲資訊</h1>
                                   
                                        <div class="form-group">
                                            <label>資料類別</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type" id="type1" value="1" checked>走失                                              </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type" id="type2" value="2">拾獲
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>走失&拾獲日期</label>
                                            <input  type="date" class="form-control" placeholder="走失&拾獲日期" id="date" name="date" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                     
                                        <div class="form-group">
                                            <label>走失&拾獲地點</label>
                                            <select class="form-control" id="city" name="city" onchange="check()">
                                                <?php while ($row_city = mysql_fetch_assoc($result_city)){ ?>
                                                <option><?php echo $row_city["city"]?></option>
                                                <?php } ?>
                                            </select>
                                            <input class="form-control" placeholder="走失&拾獲地點" id="place" name="place">
                                        </div>
                                       
                                    <h1>登記人資料</h1>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                              <?php while ($row= mysql_fetch_assoc($result)){ ?>
                                            <input type="text" class="form-control" placeholder="登記人姓名" id="name" name="name" value="<?php echo $row["name"];?>"  disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>連絡電話</label>
                                            <input type="tel" class="form-control" placeholder="連絡電話" id="phone" name="phone" value="<?php echo $row["phone"];?>"  disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input  type="email" class="form-control" placeholder="Emal" id="email" name="email" value="<?php echo $row["email"];}}?>"  disabled>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" id="checkbtn">確認送出</button>
                                        <button type="reset" class="btn btn-default" id="resetbtn">清除資料</button>
                                    </form>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
