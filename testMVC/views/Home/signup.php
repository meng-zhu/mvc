<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
      
       function checkData(){
           var email = $("#email").val();
           var password = $("#password").val(); 
           var name = $("#name").val(); 
           var phone = $("#phone").val(); 
          if(email!='' && password!='' && name!=''){
              $.get('../User/signup?email='+email+'&password=' + password +'&name='+ name +'&phone='+ phone,signup_res)
          }else{
              alert("資料輸入不完全");
          }
           
      }function signup_res(data) {
        //   alert(data);
          if(data=="此信箱已註冊過"){
                alert(data);
          }else{
              window.location.href='../Home/login';
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

    <!-- Custom CSS -->
    <link href="../views/dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">註冊會員</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"  action="../User/signup" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" id="email"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密碼" name="password" type="password" id="password" value="" >
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="名字" name="name" type="text" id="name"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="電話" name="phone" type="text" id="phone" autofocus>
                                </div>
                                <button type="button" class="btn btn-lg btn-success btn-block" id="checkbtn" name="createUser" onclick="checkData()">註冊</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
