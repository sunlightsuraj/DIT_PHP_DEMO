<?php
require_once('myfunctions.php');
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>-->
    <?php
    //include('head.php');
    ?>
    <!--<link href="css/full-slider.css" rel="stylesheet">-->
    <!--<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Fullscreen Background Image Slideshow with CSS3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
    <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
    <meta name="author" content="Codrops" />-->
    <!--<link rel="shortcut icon" href="../favicon.ico">-->
    <!--<link rel="stylesheet" type="text/css" href="css/demo.css" />-->
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <!--<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>-->

<style type="text/css">
    ul>li {
        list-style: none;
    }
</style>
<!--</head>
<body>-->
<?php
if(isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID']!=''){
    echo 'Already Logged In';
}else{
    ?>
<!--<body id="page">-->
<ul class="cb-slideshow">
    <li><span>Image 01</span><div><h3>Connect</h3></div></li>
    <li><span>Image 02</span><div><h3> Add Friend</h3></div></li>
    <li><span>Image 03</span><div><h3>FRiend</h3></div></li>
    <li><span>Image 04</span><div><h3>Learn</h3></div></li>
    <li><span>Image 05</span><div><h3>Feel</h3></div></li>

</ul>
<!--<header>-->
    <div class="container">

        <div class="body-wrapper" style="margin: 10% 30% 10% 30%">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Login
                    </h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="">
                        <input type="hidden" name="frmn" value="l_u">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-user"></span>
                                            </div>
                                            <input type="text" class="form-control" name="u_name" placeholder="UserName">
                                        </div>
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </div>
                                            <input type="password" class="form-control" name="u_pass" placeholder="Password">
                                        </div>
                                    </div>
                                </div><br><?=$error?><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12" style="text-align: center">
                                        Not a member?<a href="#" data-toggle="modal" data-target="#myModal" style="color: #ffffff">Sign Up!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="stuff1" class="modal-content">
                        <form method="post" action="user_registration.php" class="stuff">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Create Account</h4>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="f_name" class="form-control">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="l_name" class="form-control">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <select name="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>User Name</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="user_name" class="form-control">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="password" name="pass" class="form-control">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>Confirm Password</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="password" name="c_pass" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Sign Up</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--</header>-->
<?php
}
?>
<!--</body>
</html>-->