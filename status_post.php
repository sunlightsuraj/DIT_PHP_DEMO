<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 4/1/15
 * Time: 7:58 AM
 */
require_once "./debug_info.php";
require_once('myfunctions.php');
require_once('connection.php');
global $conn;

if(isset($_POST['status']) && !empty($_POST['status'])){
    if(isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID']!=''){
        $userid = $_SESSION['SESS_USERID'];
        $status = $conn->real_escape_string(stripslashes(htmlentities(trim($_POST['status']))));
        $date = date("Y-m-d");
        $statuscode = 3000;

        $sql = "select max(statuscode) from status";
        $qry = $conn->query($sql);
        if($qry){
            if($qry->num_rows){
                $row = $qry->fetch_array();
                if($row[0] != null){
                    $statuscode = $row[0];
                }
            }
        }

        $statuscode = $statuscode + 1;

        $sql = "insert into status(statuscode,userid,status,postdate) value($statuscode,$userid,'$status','$date')";
        $qry = $conn->query($sql);
        if($qry){
            $newid = $conn->insert_id;
            $username = $_SESSION['SESS_FNAME']." ".$_SESSION['SESS_MNAME']." ".$_SESSION['SESS_LNAME'];
            $p_photo = $_SESSION['SESS_PPHOTO'];
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1" style="padding-right: 0">
                            <img src='<?php echo $p_photo?>' class='img-responsive img-rounded' style="padding-right: 0; width: 40px">
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="/*padding-left: 0*/">
                            <?php
                            echo $username;
                            ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div style="border-top: 1px solid #5e5e5e; margin-top: 10px; margin-bottom: 10px"></div>
                    </div>
                    <div class="row-fluid">
                        <?php
                        echo $status;
                        ?>
                    </div>
                    <div class="row-fluid">
                        <div style="border-top: 1px solid #5e5e5e; margin-top: 10px; margin-bottom: 10px"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <a href="#" data-value="<?php echo $statuscode?>">
                                <span class="show">Like</span>
                            </a>
                        </div>
                        <div class="col-md-1">
                            <a href="#" data-value="<?php echo $statuscode?>">
                                <span class="small">Comment</span>
                            </a>
                        </div>
                        <!--<div class="col-md-1">
                            <a href="#" data-value="<?php /*echo $statuscode*/?>">
                                <span class="Share"
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        <?php
        }
    }
}