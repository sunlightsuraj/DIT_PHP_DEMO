<?php
include('myfunctions.php');
require_once('connection.php');

$userid = $_SESSION['SESS_USERID'];
$sql = "update user set online = 0 where userid = $userid";
$qry = mysql_query($sql);

session_destroy();
returnheader('index.php');
