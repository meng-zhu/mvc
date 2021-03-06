<?php 
session_start();
header("Content-Type:text/html; charset=utf-8");

$uId = $_SESSION['uId'];
if($uId==null){
    echo "請登入會員";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="../views/Home/jquery.js"></script>
    <script type="text/javascript">
       

        
        function checkpwd() {
            var pwd = $("#password").val();
            var pwd2= $("#password1").val();
            if(pwd != pwd2){
                $("#checkpwd").text("密碼輸入與前次不同");
                $("#checkbtn").attr("disabled","disabled");
              
            }else{
                $("#checkpwd").text("");
                $("#checkbtn").removeAttr('disabled');

            }
                 
        }
        
        
    </script>
    
    
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">修改個人資料</h1>
                </div>
                 
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                           <form role="form"  action="../User/updateUser" method="post">
                               <?php foreach($data as $key){ ?>
                                <fieldset>
                                    <div class="form-group">
                                        Email：
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus value="<?php echo $key["email"];?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        新密碼：
                                        <input class="form-control" placeholder="密碼" name="password" type="password" id="password" >
                                    </div>
                                    <div class="form-group">
                                        再輸入一次新密碼：
                                        <input class="form-control" placeholder="密碼" name="password1" type="password" id="password1" onblur="checkpwd()">
                                    </div>
                                    <div id="checkpwd"></div>
                                   
                                     <div class="form-group">
                                         名字：
                                        <input class="form-control" placeholder="名字" name="name" type="text" autofocus value="<?php echo $key["name"];?>">
                                    </div>
                                    <div class="form-group">
                                        電話：
                                        <input class="form-control" placeholder="電話" name="phone" type="text" autofocus value="<?php echo $key["phone"];?>">
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-success btn-block" id="checkbtn" name="updateUser">確認送出</button>
                                </fieldset>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>  
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

    <!-- Morris Charts JavaScript -->
    <script src="../views/bower_components/raphael/raphael-min.js"></script>
    <script src="../views/bower_components/morrisjs/morris.min.js"></script>
    <script src="../views/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../views/dist/js/sb-admin-2.js"></script>

</body>

</html>
