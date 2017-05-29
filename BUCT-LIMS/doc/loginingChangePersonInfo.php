<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>实验室管理系统</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../bootstrap/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="../bootstrap/js/myscript.js"></script>
</head>
<body>
<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
require_once "../model/User_tb_serv.class.php";
if (empty($_SESSION['login_userId'])){
    echo "<script>alert('非法用户，不具备操作权限，立即去登录！');parent.location.href='../doc/loginOrSign.php';</script>";
}
else{
//    echo "<script type='text/javascript'>alert(".$_SESSION['login_userId'].")</script>";
    $user_tb_serv=new User_tb_serv();
    $row=$user_tb_serv->getUserInfoById($_SESSION['login_userId']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">个人中心</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="loginingChangePersonInfo.php" class="menu-top-active">修改个人资料</a></li>
                            <li><a href="loginingChangePersonPw.php">修改密码</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-info">
                    <div class="panel-heading">修改个人资料</div>
                    <div class="panel-body">
                        <form role="form" method="post" action="../control/loginingChangePersonProcess.php?type=info" onsubmit="return isEmpty_loginingChangePersonInfoForm();">
                            <div class="form-group">
                                <label>学号/工号</label>
                                <input class="form-control" type="text" name="loginingChangePersonInfo_userId" readonly value="<?php echo $_SESSION['login_userId']; ?>"/>
                            </div>

                            <div class="form-group">
                                <label>姓名</label>
                                <input class="form-control" type="text" name="loginingChangePersonInfo_name" value="<?php echo $row->getUserName(); ?>" />
                            </div>

                            <div class="form-group">
                                <label>电话</label>
                                <input class="form-control" type="text" name="loginingChangePersonInfo_phone" value="<?php echo $row->getUserPhone() ?>" />
                            </div>

                            <div class="form-group">
                                <label>邮箱</label>
                                <input class="form-control" type="text" name="loginingChangePersonInfo_mail" value="<?php echo $row->getUserMail(); ?>" />
                            </div>

                            <input type="submit" class="btn btn-info" value="确认提交" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "../frame/footer.php"; ?>
<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>

<script src="../bootstrap/js/dataTables/jquery.dataTables.js"></script>
<script src="../bootstrap/js/dataTables/dataTables.bootstrap.js"></script>

</body>
</html>
