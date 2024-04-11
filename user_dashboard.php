<?php
require_once "connection.php";
global $conn;

if(isset($_SESSION['SESS_USERID'])&&$_SESSION['SESS_USERID']!=''){
    ?>

    <div id="top-nav" role="navigation" class="navbar navbar-default navbar-static-top navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <div class="row">
                        <div class="col-sm-5 col-md-4">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-toggle"></span>
                                </button>
                                <a href="index.php" class="navbar-brand">FrenZone</a>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-8" style="padding: 10px 0 0 0;">
                            <form method="post" action="#" id="h_s" onsubmit="submit_form(this,event,'#m_w')" class="form-horizontal">
                                <input type="hidden" name="bugard" value="1">
                                <input type="hidden" name="frmn" value="h_s">
                                <div class="form-group has-feedback">
                                    <label class="control-label" for="inputSuccess2"></label>
                                    <div class="col-sm-9 col-md-12">
                                        <input type="text" class="form-control input-sm" name="search_text" placeholder="Search Friends(Name,Username,Email)">
                                        <span class="glyphicon glyphicon-search glyp-point form-control-feedback" onclick="$('#h_s').submit()"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.navbar-header -->
                </div>
                <div class="col-sm-5 col-md-5">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="index.php">
                                    Home
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle" aria-expanded="false">
                                    <i class="glyphicon glyphicon-user"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    /**
                                     * list friend requests
                                     */
                                    $uid = $_SESSION['SESS_USERID'];
                                    $sql = "select *from friendrequest join user on friendrequest.fromid = user.userid where toid = $uid";
                                    $qry = $conn->query($sql);
                                    if($qry){
                                        if($qry->num_rows){
                                        while($row = $qry->fetch_array()){
                                            $photo = $row['p_photo'];
                                            $name = $row['fname'].' '.$row['mname'].' '.$row['lname'];
                                            $username = $row['username'];
                                            ?>
                                            <li id="u_r_<?php echo $username?>">
                                                <a href="#">
                                                    <div>
                                                        <img src="<?=$_SESSION['SESS_PPHOTO']?>" class="img-rounded" style="width: 25px;"> <?=$name?>
                                                        <i class="glyphicon glyphicon-ok btn btn-xs acp-frn" data-value="<?php echo $username?>"></i>
                                                        <i class="glyphicon glyphicon-trash btn btn-xs rej-frn" data-value="<?php echo $username?>"></i>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                            <script type="text/javascript">
                                                $(document).ready(function () {
                                                    $(".acp-frn").click(function (event) {
                                                        event.preventDefault();
                                                        var frn = $(this).attr("data-value");
                                                        $.post('friend_request_send.php',{'frn':frn,'type':'accept'}, function () {
                                                            $("#u_r_"+frn).html(" ").addClass("hidden");
                                                        });
                                                    });

                                                    $(".rej-frn").click(function (event) {
                                                        event.preventDefault();
                                                        var frn = $(this).attr("data-value");
                                                        $.post('friend_request_send.php',{'frn':frn,'type':'reject'}, function () {
                                                            $("#u_r_"+frn).html(" ").addClass("hidden");
                                                        });
                                                    });
                                                });
                                            </script>
                                        <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle" aria-expanded="false">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>John Smith</strong>
                                                <span class="pull-right text-muted">
                                                    <em>Yesterday</em>
                                                </span>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                                            </div>
                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" class="text-center">
                                            <strong>Read All Messages</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                                    <i class="glyphicon glyphicon-globe"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="glyphicon glyphicon-comment"></i> New Comment
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="glyphicon glyphicon-thumbs-up fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <i class="glyphicon glyphicon-tasks"></i> New Task
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" class="text-center">
                                            <strong>See All Alerts</strong>
                                            <i class="glyphicon glyphicon-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-alerts -->
                            </li>
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                                    <img src="<?=$_SESSION['SESS_PPHOTO']?>" class="img-rounded" style="width: 25px; margin-top: -3px;">  <?=$_SESSION['SESS_FNAME'];?><i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="?tab=up">
                                            <img src="<?=$_SESSION['SESS_PPHOTO']?>" class="img-rounded" style="width: 25px;"> User Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?tab=set"><i class="glyphicon glyphicon-cog"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>
                            <!-- /.dropdown -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="body-wrapper" id="m_w" style="margin-top: 70px">
            <?php
            if(isset($_GET['tab']) && $_GET['tab'] == 'up'){
                include('user_profile.php');
            }else if(isset($_GET['tab']) && $_GET['tab'] == 'set'){
                include('user_profile_setting.php');
            }else{
                require_once('main.php');
            }
            ?>
        </div>
    </div>
<?php
}else{
    require_once('myfunctions.php');
    returnheader('index.php');
}