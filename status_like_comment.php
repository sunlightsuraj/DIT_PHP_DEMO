<?php
/**
 * Created by PhpStorm.
 * User: suraj
 * Date: 4/14/15
 * Time: 7:45 PM
 */
require_once "debug_info.php";
require_once('myfunctions.php');
require_once('connection.php');

if(isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID'] != ''){
    $userid = $_SESSION['SESS_USERID'];
    if(isset($_POST['status']) && $_POST['status'] != '') {
        $statuscode = $conn->real_escape_string(stripslashes(htmlentities(trim($_POST['status']))));
        $sql = "select statusid from status where statuscode = $statuscode";
        $qry = $conn->query($sql);
        if($qry){
            if($qry->num_rows){
                $row = $qry->fetch_array();
                $statusid = $row[0];
                if(isset($_POST['type']) && !empty($_POST['type'])){
                    if($_POST['type'] === 'like'){
                        $sql = "select *from statuslike where statusid = $statusid and userid = $userid";
                        $qry = $conn->query($sql);
                        if($qry){
                            if($qry->num_rows){
                                $sql = "delete from statuslike where statusid = $statusid and userid = $userid";
                                $qry = $conn->query($sql);
                                if($qry){
                                    ?>
                                    <span class="small">Like</span>
                                <?php
                                }
                            }else{
                                $sql = "insert into statuslike(statusid,userid) value($statusid,$userid)";
                                $qry = $conn->query($sql);
                                if($qry){
                                    ?>
                                    <span class="small">Unlike</span>
                                <?php
                                }
                            }
                        }
                    }elseif($_POST['type'] === 'comment'){
                        if(isset($_POST['comment']) && !empty($_POST['comment'])){
                            $msg = $conn->real_escape_string(htmlentities(stripslashes(trim($_POST['comment']))));
                            $date = date("Y-m-d");
                            $sql = "insert into statuscomment(statusid,userid,comment,commentdate) value($statusid,$userid,'$msg','$date')";
                            $qry = $conn->query($sql);
                            if($qry){
                                ?>
                                <div class="row">
                                    <div class="col-xs-1 col-sm-1 col-md-1">
                                        <img src='<?php echo $_SESSION['SESS_PPHOTO']?>' class='img-rounded' style="padding-right: 0; width: 25px">
                                    </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11">
                                        <div class="row-fluid">
                                            <span class="pull-right text-muted small"><?php echo $date?></span>
                                            <a href="#" data-value="<?php echo $_SESSION['SESS_USERNAME']?>">
                                                <span class="small"><?php echo $_SESSION["SESS_FNAME"].' '.$_SESSION['SESS_MNAME'].' '.$_SESSION['SESS_LNAME']?></span>
                                            </a>
                                        </div>
                                        <div class="row-fluid">
                                            <p class="small">
                                                <?php echo $msg?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    }
                }
            }
        }
    }

}