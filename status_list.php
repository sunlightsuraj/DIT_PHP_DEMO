<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 4/1/15
 * Time: 8:24 AM
 */

require_once "connection.php";
global $conn;

require_once('myfunctions.php');
$userid = $_SESSION['SESS_USERID'];

$sql = "SELECT * FROM status
          left join friendship on status.userid = friendship.userid
          or status.userid = friendship.friendid
          join user on status.userid = user.userid
          where friendship.userid = $userid or friendship.friendid = $userid or status.userid = $userid
          group by status.statuscode order by postdate desc";
$qry = $conn->query($sql);
if($qry){
    if($qry->num_rows){
        while($row = $qry->fetch_array()){
            $postedby = $row['userid'];
            $username = $row['fname']." ".$row['mname']." ".$row['lname'];
            $loginname = $row['username'];
            $p_photo = $row['p_photo'];
            $status = $row['status'];
            $statuscode = $row['statuscode'];
            $statusid = $row['statusid'];
            ?>
            <div class="panel panel-default">
                <div class="panel-body" style="word-wrap: break-word;">
                    <div class="pull-right">
                        <div class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="caret"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="#" class="st-e" data-value="<?php echo $statuscode?>">Edit</a>
                                </li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation">
                                    <a role="menuitem" tabindex="-1" href="#" class="st-d" data-value="<?php echo $statuscode?>">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                        <?php
                        $isliked = 0;
                        $totalliked = 0;
                        $sql1 = "select *from statuslike where statusid = $statusid";
                        $qry1 = $conn->query($sql1);
                        if($qry1){
                            if($totalliked = $qry1->num_rows){
                                while($row = $qry1->fetch_array()){
                                    if($row['userid'] == $userid){
                                        $isliked = 1;
                                        break;
                                    }
                                }
                            }
                        }
                        ?>
                        <div class="col-xs-4 col-sm-2 col-md-2">
                            <a href="#" class="status_like" data-value="<?php echo $statuscode?>" id="s_l_<?php echo $statuscode?>">
                                <?php
                                if($isliked){
                                    ?>
                                    <span class="small">Unlike</span>
                                <?php
                                }else{
                                    ?>
                                    <span class="small">Like</span>
                                <?php
                                }
                                ?>
                            </a>
                        </div>
                        <div class="col-xs-5 col-sm-2 col-md-3">
                            <a href="#" data-value="<?php echo $statuscode?>">
                                <span class="small">Comment</span>
                            </a>
                        </div>
                        <!--<div class="col-xs-1 col-sm-1 col-md-1">
                            <a href="#" data-value="<?php /*echo $statuscode*/?>">
                                <span class="small">Share</span>
                            </a>
                        </div>-->
                    </div>

                </div>
                <div class="panel-footer" style="word-wrap: break-word;">
                    <div class="row-fluid">
                        <?php
                        if($isliked){
                            if($totalliked > 1){
                                ?>
                                <i class="glyphicon glyphicon-thumbs-up text-info"></i> <span class="small text-success">You and <?php echo $totalliked?> other likes this</span>
                            <?php
                            }elseif($totalliked == 1){
                                ?>
                                <i class="glyphicon glyphicon-thumbs-up text-info"></i> <span class="small text-success">You likes this</span>
                            <?php
                            }
                        }else{
                            if($totalliked){
                                ?>
                                <i class="glyphicon glyphicon-thumbs-up text-info"></i> <span class="small text-success"><?php echo $totalliked?> people likes this</span>
                            <?php
                            }
                        }
                        ?>
                    </div><br />
                    <div class="row-fluid">
                        <form method="post" action="#" class="comment-form" id="u_c_<?php echo $statuscode?>" data-value="<?php echo $statuscode?>">
                            <div class="input-group input-group-sm">
                            <span class="input-group-btn">
                                <button class="btn btn-default" style="border-radius: 0">
                                    <i class="glyphicon glyphicon-comment"></i>
                                </button>
                            </span>
                                <input type="text" class="form-control" name="comment_msg" id="comment_msg" style="border-radius: 0">
                            </div>
                        </form>
                    </div><br />
                    <div id="comment_list">
                        <?php
                        $totalcomment = 0;
                        $sql1 = "select *from statuscomment join user on statuscomment.userid = user.userid where statusid = $statusid";
                        $qry1 = $conn->query($sql1);
                        if($qry1){
                            if($totalcomment = $qry1->num_rows){
                                while($row = $qry1->fetch_array()){
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                            <img src='<?php echo $row['p_photo']?>' class='img-rounded' style="padding-right: 0; width: 25px">
                                        </div>
                                        <div class="col-xs-11 col-sm-11 col-md-11">
                                            <div class="row-fluid">
                                                <a href="#" data-value="<?php echo $row['username']?>">
                                                    <span class="small"><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']?></span>
                                                </a>
                                            </div>
                                            <div class="row-fluid">
                                                <p class="small">
                                                    <?php echo $row['comment']?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
            $isliked = 0;
            $totalliked = 0;
        }
    }else{
        echo "";
    }
}else{
    echo $conn->error();
}
?>
<div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="st-e-d">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".comment-form").submit(function (event) {
            event.preventDefault();
            var status = $(this).attr("data-value");
            var msg = $(this).find("#comment_msg").val();

            $.post('status_like_comment.php',{'status':status,'comment':msg,'type':'comment'}, function (data) {
                $("#comment_list").append(data);
                $("#u_c_"+status)[0].reset();
            });
        });

        $('.st-e').click(function (event) {
            event.preventDefault();
            var statuscode = $(this).attr('data-value');
            /*$.post('status-edit.php',{'id':statuscode}, function (response) {

            });*/

        });
    });
</script>