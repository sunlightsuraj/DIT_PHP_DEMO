<?php
require_once "./debug_info.php";

if(isset($_POST['bugard']) && $_POST['bugard']==1 && isset($_POST['frmn']) && $_POST['frmn']=='h_s'){
    //post for friend search
    if(isset($_POST['search_text']) && $_POST['search_text']!=''){
        include('user_search.php');
    }else{
        echo 'Nothing to Search';
    }
}else{
    //if not friend search or home
    require_once('connection.php');
    require_once('myfunctions.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>FrenZone</title>
        <?php
        include('head.php');
        ?>

    </head>
    <body>
    <?php
    $error = '';
    if (isset($_POST['frmn']) && $_POST['frmn'] === 'l_u') {
        $username = htmlentities(trim($_POST['u_name']));
        $password = htmlentities(trim($_POST['u_pass']));
        if (!login($username, $password)) {
            $error = 'Your username or password are incorrect';
        }
    }
    if (isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID'] != '') {
        include('user_dashboard.php');
    }else {
        include('login.php');
    }
    require_once('foot.php');
}