<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 4/3/15
 * Time: 10:05 AM
 */

require_once('myfunctions.php');
require_once('connection.php');

if(isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID'] != '') {
    if(isset($_POST['frn']) && !empty($_POST['frn'])) {
        $frn = $_POST['frn'];
        $frn = mysql_real_escape_string(stripslashes(htmlentities(trim($frn))));

        $sql = "select userid,username from user where username = '$frn'";
        $qry = mysql_query($sql);
        if($qry){
            if(mysql_num_rows($qry)){
                $row = mysql_fetch_array($qry);
                $frnid = $row['userid'];
                $frn_username = $row['username'];
                $userid = $_SESSION['SESS_USERID'];

                $sql = "select *from friendrequest where (fromid = $userid and toid = $frnid) or (fromid = $frnid and toid = $userid)";
                $qry = mysql_query($sql);
                if($qry){
                    if(mysql_num_rows($qry)){
                        $row = mysql_fetch_array($qry);
                        $friendrequestid = $row['friendrequestid'];
                        $fromid = $row['fromid'];
                        $toid = $row['toid'];
                        if(isset($_POST['type']) && $_POST['type'] === 'accept'){
                            if($fromid === $frnid && $toid === $userid){
                                $sql = "insert into friendship(userid,friendid) value($fromid,$toid)";
                                $qry = mysql_query($sql);
                                if($qry){
                                    $sql = "delete from friendrequest where friendrequestid = $friendrequestid";
                                    $qry = mysql_query($sql);
                                    if($qry){
                                        ?>
                                        <a href='#' class='btn btn-primary btn-xs un-frn' data-value='<?php echo $frn_username?>' id="user_<?php echo $frn_username?>">
                                            Unfriend
                                        </a>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $(".un-frn").click(function (event) {
                                                    event.preventDefault();
                                                    var frn = $(this).attr("data-value");
                                                    $.post('friend_request_send.php',{'frn': frn}, function (data) {
                                                        $("#user_"+frn).html(data);
                                                    });
                                                });
                                            });
                                        </script>
                                    <?php
                                    }
                                }
                            }
                        }elseif(isset($_POST['type']) && $_POST['type'] === 'reject' || $_POST['type'] === 'cancel'){
                            $sql = "delete from friendrequest where friendrequestid = $friendrequestid";
                            $qry = mysql_query($sql);
                            if($qry){
                                ?>
                                <a href='#' class='btn btn-primary btn-xs add-frn' data-value='<?php echo $frn_username?>'>
                                    Add Friend
                                </a>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".add-frn").click(function(event){
                                            event.preventDefault();
                                            var frn = $(this).attr("data-value");
                                            $.post('friend_request_send.php',{'frn': frn}, function (data) {
                                                $("#user_"+frn).html(data);
                                            });
                                        });
                                    });
                                </script>
                            <?php
                            }
                        }
                    }else{
                        $sql = "select *from friendship where (userid = $userid and friendid = $frnid) or (userid = $frnid and friendid = $userid)";
                        $qry = mysql_query($sql);
                        if($qry){
                            if(mysql_num_rows($qry)){
                                $row = mysql_fetch_array($qry);
                                $friendshipid = $row['friendshipid'];
                                $sql = "delete from friendship where friendshipid = $friendshipid";
                                $qry = mysql_query($sql);
                                if($qry){
                                    ?>
                                    <a href='#' class='btn btn-primary btn-xs add-frn' data-value='<?php echo $frn_username?>'>
                                        Add Friend
                                    </a>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".add-frn").click(function(event){
                                                event.preventDefault();
                                                var frn = $(this).attr("data-value");
                                                $.post('friend_request_send.php',{'frn': frn}, function (data) {
                                                    $("#user_"+frn).html(data);
                                                });
                                            });
                                        });
                                    </script>
                                <?php
                                }
                            }else{
                                $sql = "insert into friendrequest(fromid,toid) value($userid,$frnid)";
                                $qry = mysql_query($sql);
                                if($qry){
                                    ?>
                                    <a href='#' class='btn btn-primary btn-xs can-frn' data-value='<?php echo $frn_username?>'>
                                        Cancel Request
                                    </a>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".can-frn").click(function (event) {
                                                event.preventDefault();
                                                var frn = $(this).attr("data-value");
                                                $.post('friend_request_send.php',{'frn': frn,'type':'cancel'}, function (data) {
                                                    $("#user_"+frn).html(data);
                                                });
                                            });
                                        });
                                    </script>
                                <?php
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}