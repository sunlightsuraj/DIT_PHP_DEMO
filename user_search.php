<?php
require_once('connection.php');
require_once('myfunctions.php');

global $conn;

$searchtext = $conn->real_escape_string(trim(htmlentities($_POST['search_text'])));
$uid = $_SESSION['SESS_USERID'];
$query = "Select *from user where (fname LIKE '%$searchtext%' or mname LIKE '%$searchtext%' or lname LIKE '%$searchtext%' or username LIKE '%$searchtext%' or useremail LIKE '%$searchtext%') and userid <> $uid";
$qry = $conn->query($query);
if($qry){
    if($qry->num_rows){
        ?>
        <div id="user_list">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="list-group">
                            <?php
                            while($row = $qry->fetch_array()){
                                $fid = $row['userid'];
                                $fname = $row['fname'];
                                $mname = $row['mname'];
                                $lname = $row['lname'];
                                $name = $row['fname'].' '.$row['mname'].' '.$row['lname'];
                                $address = $row['useraddress'];
                                $phone = $row['userphone'];
                                $email = $row['useremail'];
                                $gender = $row['gender'];
                                $dob = $row['dob'];
                                $p_photo = $row['p_photo'];
                                $c_photo = $row['c_photo'];
                                $bgroup = $row['bloodgroup'];
                                $username = $row['username'];
                                ?>
                                <div class='list-group-item'>
                                    <div class='row'>
                                        <div class='col-sm-3 col-md-3'>
                                            <div style='width: 80px;height: 80px;border: 1px solid pink;padding: 2px'>
                                                <img src='<?php echo $p_photo?>' class='img-responsive' alt='<?php echo $fname?>'>
                                            </div>
                                        </div>
                                        <div class='col-sm-9 col-md-9'>
                                            <div class='row'>
                                                <div class='col-sm-12 col-md-12'>
                                                    <a href='#' onclick='userinfo("user_info.php",{uid: "<?php echo $username?>"},"#user_list",event)'>
                                                        <b><?php echo $name?> (<?php echo $username?>)</b>
                                                    </a>
                                                </div>
                                            </div><br>
                                            <div class='row-fluid'>
                                                <?php echo $address?>
                                            </div>
                                            <div class='row-fluid'>
                                                <?php
                                                $sql1 = "select *from friendship where (userid = $uid and friendid = $fid) or (userid = $fid and friendid = $uid)";
                                                $qry1 = $conn->query($sql1);
                                                if($qry1){
                                                    if($qry1->num_rows){
                                                        ?>
                                                        <div id="user_<?php echo $username?>">
                                                            <a href='#' class='btn btn-primary btn-xs un-frn' data-value='<?php echo $username?>'>
                                                                Unfriend
                                                            </a>
                                                        </div>
                                                    <?php
                                                    }else{
                                                        $sql1 = "select *from friendrequest where (fromid = $uid and toid = $fid) or (fromid = $fid and toid = $uid)";
                                                        $qry1 = $conn->query($sql1);
                                                        if($qry1){
                                                            if($qry1->num_rows()){
                                                                $row = $qry1->fetch_array();
                                                                if($row['fromid'] === $uid and $row['toid'] === $fid){
                                                                    ?>
                                                                    <div id="user_<?php echo $username?>">
                                                                        <a href='#' class='btn btn-primary btn-xs can-frn' data-value='<?php echo $username?>'>
                                                                            Cancel Request
                                                                        </a>
                                                                    </div>
                                                                <?php
                                                                }elseif($row['fromid'] === $fid and $row['toid'] === $uid){
                                                                    ?>
                                                                    <!--<a href='#' class='btn btn-primary btn-xs add-frn' data-value='<?php /*echo $username*/?>' id="user_<?php /*echo $username*/?>">
                                                                        Accept Request
                                                                    </a>-->
                                                                    <div id="user_<?php echo $username?>">
                                                                        <div class="btn-group">
                                                                            <a type="button" class="btn btn-primary btn-xs acp-frn" data-value='<?php echo $username?>'>
                                                                                Accept Request
                                                                            </a>
                                                                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                                <span class="caret"></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu" role="menu">
                                                                                <li>
                                                                                    <a href="#" class="small del-frn rej-frn" data-value='<?php echo $username?>'>Reject Request</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            }else{
                                                                ?>
                                                                <div id="user_<?php echo $username?>">
                                                                    <a href='#' class='btn btn-primary btn-xs add-frn' data-value='<?php echo $username?>'>
                                                                        Add Friend
                                                                    </a>
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".add-frn").click(function(event){
                    event.preventDefault();
                    var frn = $(this).attr("data-value");
                    $.post('friend_request_send.php',{'frn': frn}, function (data) {
                        $("#user_"+frn).html(data);
                    });

                });

                $(".un-frn").click(function (event) {
                    event.preventDefault();
                    var frn = $(this).attr("data-value");
                    $.post('friend_request_send.php',{'frn': frn}, function (data) {
                        $("#user_"+frn).html(data);
                    });
                });

                $(".can-frn").click(function (event) {
                    event.preventDefault();
                    var frn = $(this).attr("data-value");
                    $.post('friend_request_send.php',{'frn': frn,'type':'cancel'}, function (data) {
                        $("#user_"+frn).html(data);
                    });
                });

                $(".acp-frn").click(function (event) {
                    event.preventDefault();
                    var frn = $(this).attr("data-value");
                    $.post('friend_request_send.php',{'frn':frn,'type':'accept'}, function (data) {
                        $("#user_"+frn).html(data);
                    });
                });

                $(".rej-frn").click(function (event) {
                    event.preventDefault();
                    var frn = $(this).attr("data-value");
                    $.post('friend_request_send.php',{'frn':frn,'type':'reject'}, function (data) {
                        $("#user_"+frn).html(data);
                    });
                });
            });
        </script>
    <?php
    }
}else{
    echo mysql_error();
}

