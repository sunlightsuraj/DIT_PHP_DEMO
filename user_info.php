<?php
require_once('connection.php');


if(isset($_POST['uid']) && $_POST['uid']!=''){
    $uid = mysql_real_escape_string(trim(htmlentities($_POST['uid'])));
    $sql="select *from user where username = '$uid'";
    $qry=mysql_query($sql);
    if($qry){
        $rw=mysql_num_rows($qry);
        if($rw!=0){
            while($rs=mysql_fetch_array($qry)){
                //$frm='
                ?>
                <div class="panel panel-default" style="margin-bottom: 50px">
                    <div style="width: 100%; padding: 0" class="panel-body">
                        <div style="height: 50%; width: 100%;" id="cover" class="row-fluid">
                            <img style="width: 100%; height: 350px; border-bottom: 1px solid pink;" alt="cover image" class="img-responsive" id="profile_c" src="<?=$rs['c_photo']?>">
                        </div>
                    </div>
                    <div style="height: auto;" class="row-fluid pull-right">
                        <div style="width: auto; padding-right: 7px; padding-left: 0;" id="profile" class="col-sm-4 col-md-4">
                            <img style="margin-top: -139px; height: 180px; width: 180px; padding: 2px;border:1px solid pink;background-color: white;" alt="user profile image" class="img-responsive" id="profile_p" src="<?=$rs['p_photo']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1 col-md-1"></div>
                    <div class="col-sm-5 col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <label>Name:</label>
                                    </div>
                                    <div class="col-sm-8 col-md-8">
                                        <?=$rs['fname']." ".$rs['mname']." ".$rs['lname']?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <label>Address:</label>
                                    </div>
                                    <div class="col-sm-8 col-md-8">
                                        <?=$rs['useraddress']?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Contact:</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <?=$rs['userphone']?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <label>Email:</label>
                                    </div>
                                    <div class="col-sm-8 col-md-8">
                                        <?=$rs['useremail']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>Gender:</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <?=$rs['gender']?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>BirthDate:</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <?=$rs['dob']?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        <label>BloodGroup:</label>
                                    </div>
                                    <div class="col-sm-7 col-md-7">
                                        <?=$rs['bloodgroup']?>
                                    </div>
                                </div>
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1"></div>
                </div>
                <!--/row-->
            <?php
            }
        }
    }else{
        echo mysql_error();
    }
}
?>