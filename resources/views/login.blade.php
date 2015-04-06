<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- TODO: Add a favicon -->
    <link rel="shortcut icon" href="http://localhost/StockBAE/public/images/ico/fab.ico">

    <title>StockBae - Login</title>

    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="http://localhost/StockBAE/public/css/plugins/pace.css">
    <script src="http://localhost/StockBAE/public/js/pace.min.js"></script>
    <!--Page loading plugin End   -->

    <!-- Plugin Css Put Here -->
    <link href="http://localhost/StockBAE/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/StockBAE/public/css/plugins/bootstrap-switch.min.css">
    <link rel="stylesheet" href="http://localhost/StockBAE/public/css/plugins/ladda-themeless.min.css">

    <link href="http://localhost/StockBAE/public/css/plugins/humane_themes/bigbox.css" rel="stylesheet">
    <link href="http://localhost/StockBAE/public/css/plugins/humane_themes/libnotify.css" rel="stylesheet">
    <link href="http://localhost/StockBAE/public/css/plugins/humane_themes/jackedup.css" rel="stylesheet">

    <!-- Plugin Css End -->
    <!-- Custom styles Style -->
    <link href="http://localhost/StockBAE/public/css/style.css" rel="stylesheet">
    <!-- Custom styles Style End-->

    <!-- Responsive Style For-->
    <link href="http://localhost/StockBAE/public/css/responsive.css" rel="stylesheet">
    <!-- Responsive Style For-->

    <!-- Custom styles for this template -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-screen">
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-content">
                        <div class="login-user-icon">
                            <i class="glyphicon glyphicon-user"></i>

                        </div>
                        <h3>StockBae</h3>
            
                    </div>

                    <div class="login-form">
                        <form id="form-login" action="#" class="form-horizontal ls_form">
                            <div class="input-group ls-group-input">
                                <input class="form-control" type="text" placeholder="Username">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>


                            <div class="input-group ls-group-input">

                                <input type="password" placeholder="Password" name="password"
                                       class="form-control" value="">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>

                            <div class="input-group ls-group-input login-btn-box">
                                <a href="profile">
									<div class="btn ls-dark-btn  col-md-12 col-sm-12 col-xs-12">
										<span class="ladda-label">Login</span>
									</div>
								</a>

                                <a class="forgot-password">Forgot password</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <p class="copy-right big-screen hidden-xs hidden-sm">
        <span>&#169;</span>StockBae <span class="footer-year">2015</span>
    </p>
</section>

</body>
<script src="http://localhost/StockBAE/public/js/lib/jquery-2.1.1.min.js"></script>
<script src="http://localhost/StockBAE/public/js/lib/jquery.easing.js"></script>
<script src="http://localhost/StockBAE/public/js/bootstrap-switch.min.js"></script>
<!--Script for notification start-->
<script src="http://localhost/StockBAE/public/js/loader/spin.js"></script>
<script src="http://localhost/StockBAE/public/js/loader/ladda.js"></script>
<script src="http://localhost/StockBAE/public/js/humane.min.js"></script>
<!--Script for notification end-->

<script src="http://localhost/StockBAE/public/js/pages/login.js"></script>

</html>