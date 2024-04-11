<?php
require_once "connection.php";
global $conn;

$query = "select *from user where userid = ".$_SESSION['SESS_USERID'];
$qry = $conn->query($query);
if($qry){
    if($qry->num_rows && $row = $qry->fetch_array()){
        $ns = '<span class="text-muted">Not Set</span>';
        $name  = $row['fname']." ".$row['mname']." ".$row['lname'];
        $address = empty($row['useraddress'])?$ns:$row['useraddress'];
        $phone = empty($row['userphone'])?$ns:$row['userphone'];
        $email = empty($row['useremail'])?$ns:$row['useremail'];
        $gender = empty($row['gender'])?$ns:$row['gender'];
        $dob = empty($row['dob'])?$ns:$row['dob'];
        $p_photo = empty($row['p_photo'])?'':$row['p_photo'];
        $c_photo = empty($row['c_photo'])?'':$row['c_photo'];
        $b_group = empty($row['bloodgroup'])?$ns:$row['bloodgroup'];
        $username = empty($row['username'])?$ns:$row['username'];
        $dor = empty($row['dor'])?$ns:$row['dor'];
        ?>
        <div class="panel panel-default" style="margin-bottom: 50px">
            <div style="width: 100%; padding: 0" class="panel-body">
                <div style="height: 50%; width: 100%;" id="cover" class="row-fluid">
                    <img style="width: 100%; height: 350px; border-bottom: 1px solid pink;" alt="cover image" class="img-responsive" id="profile_c" src="<?php echo $c_photo?>">
                </div>
                <form onsubmit="submit_form(this,event,'#cover');" action="user_cover_pic_change.php" method="post" id="c_form" name="c_form">
                    <input type="file" class="hidden" id="cover_change" name="CoverImageFile">
                </form>
            </div>
            <div style="height: auto;" class="row-fluid pull-right">
                <div style="width: auto; padding-right: 7px; padding-left: 0;" id="profile" class="col-sm-4 col-md-4">
                    <img style="margin-top: -139px; height: 180px; width: 180px; padding: 2px;border:1px solid pink;background-color: white;" alt="user profile image" class="img-responsive" id="profile_p" src="<?php echo $p_photo?>">
                </div>
                <form onsubmit="submit_form(this,event,'#profile');" action="user_profile_pic_change.php" method="post" id="p_form" name="p_form">
                    <input type="file" class="hidden" id="profile_change" name="ProfileImageFile">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="?tab=set"><span class="glyphicon glyphicon-edit glyp-point pull-right"></span></a>

                        <h4 class="panel-title">Profile Info</h4>
                    </div>
                    <div class="panel-body">
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Name</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $name?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Address</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $address?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Phone</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $phone?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Email</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $email?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Gender</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $gender?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Date of Birth</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $dob?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Blood Group</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $b_group?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>User Name</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $username?>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5 col-md-5'>
                                <label>Date of Register</label>
                            </div>
                            <div class='col-sm-7 col-md-7'>
                                <?php echo $dor?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).ready(function(){
                $("#profile").click(function(){
                    document.getElementById('profile_change').click();
                });

                $("#profile_change").change(function(){
                    $("#p_form").submit();
                });

                $("#cover").click(function(){
                    document.getElementById("cover_change").click();
                });

                $("#cover_change").change(function(){
                    $("#c_form").submit();
                });
            });
        </script>
    <?php
    }
}
?>