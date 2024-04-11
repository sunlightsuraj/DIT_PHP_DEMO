<?php
require_once 'connection.php';
global $conn;

if(isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID']!=''){
    $query = "select *from user where userid = ".$_SESSION['SESS_USERID'];
    $qry = $conn->query($query);
    if($qry){
        if($qry->num_rows && $row = $qry->fetch_array()){
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $address = empty($row['useraddress'])?'Not Set':$row['useraddress'];
            $phone = empty($row['userphone'])?'Not Set':$row['userphone'];
            $email = empty($row['useremail'])?'Not Set':$row['useremail'];
            $gender = empty($row['gender'])?'Not Set':$row['gender'];
            $dob = empty($row['dob'])?'Not Set':$row['dob'];
            $p_photo = empty($row['p_photo'])?'Not Set':$row['p_photo'];
            $c_photo = empty($row['c_photo'])?'Not Set':$row['c_photo'];
            $b_group = empty($row['bloodgroup'])?'Not Set':$row['bloodgroup'];
            $username = empty($row['username'])?'Not Set':$row['username'];
            $dor = empty($row['dor'])?'Not Set':$row['dor'];
            ?>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Profile Setting
                </h4>
            </div>
            <ul class="list-group">
            <li class="list-group-item">
                <div class="row upd" id="dd1">
                    <div class="col-sm-4 col-md-4">
                        <label>Name</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv1" class="xsd"><?php echo $fname.' '.$mname.' '.$lname?></span>
                        <div class="hidden xdd" id="xd1">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv1','#xd1')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="1">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 input-group-sm">
                                        <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $fname?>">
                                    </div>
                                    <div class="col-sm-3 col-md-3 input-group-sm">
                                        <input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo $mname?>">
                                    </div>
                                    <div class="col-sm-4 col-md-4 input-group-sm">
                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lname?>">
                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd2">
                    <div class="col-sm-4 col-md-4">
                        <label>Address</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv2" class="xsd"><?php echo $address?></span>
                        <div class="hidden xdd" id="xd2">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv2','#xd2')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="2">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <input type="text" name="u_address" class="form-control" placeholder="Address" value="<?php echo $address?>">
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd3">
                    <div class="col-sm-4 col-md-4">
                        <label>Phone</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv3" class="xsd"><?php echo $phone?></span>
                        <div class="hidden xdd" id="xd3">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv3','#xd3')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="3">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <input type="text" name="u_phone" class="form-control" placeholder="Phone" value="<?php echo $phone?>">
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd4">
                    <div class="col-sm-4 col-md-4">
                        <label>Email</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv4" class="xsd"><?php echo $email?></span>
                        <div class="hidden xdd" id="xd4">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv4','xd4')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="4">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <input type="text" name="u_email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd5">
                    <div class="col-sm-4 col-md-4">
                        <label>Gender</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv5" class="xsd"><?php echo $gender?></span>
                        <div class="hidden xdd" id="xd5">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv5','xd5')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="5">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <select name="u_gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd6">
                    <div class="col-sm-4 col-md-4">
                        <label>Date of Birth</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv6" class="xsd"><?php echo $dob?></span>
                        <div class="hidden xdd" id="xd6">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv6','xd6')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="6">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <input type="text" name="u_dob" class="form-control" placeholder="Date of Birth">
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd7">
                    <div class="col-sm-4 col-md-4">
                        <label>Blood Group</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv7" class="xsd"><?php echo $b_group?></span>
                        <div class="hidden xdd" id="xd7">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv7','#xd7')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="7">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <input type="text" name="u_bgroup" class="form-control" placeholder="Blood Group">
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd8">
                    <div class="col-sm-4 col-md-4">
                        <label>User Name</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv8" class="xsd"><?php echo $username?></span>
                        <div class="hidden xdd" id="xd8">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv8','#xd8')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="8">
                                <div class="row">
                                    <div class="col-sm-5 col-md-5 input-group-sm">
                                        <input type="text" name="username" class="form-control" placeholder="User Name">
                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row upd" id="dd9">
                    <div class="col-sm-4 col-md-4">
                        <label>Password</label>
                    </div>
                    <div class="col-sm-7 col-md-7">
                        <span id="xsv9" class="xsd">************</span>
                        <div class="hidden xdd" id="xd9">
                            <form method="post" action="user_profile_edit.php" onsubmit="sub_form(this,event,'#xsv9','#xd9')">
                                <input type="hidden" name="bugar" value="1">
                                <input type="hidden" name="frm" value="9">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 input-group-sm">
                                        <input type="password" name="o_pass" class="form-control" placeholder="Old Password">
                                    </div>
                                    <div class="col-sm-4 col-md-4 input-group-sm">
                                        <input type="password" name="n_pass" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="col-sm-4 col-md-4 input-group-sm">
                                        <input type="password" name="c_pass" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Done</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 text-center">
                        <span class="glyphicon glyphicon-pencil glyp-point hidden"></span>
                    </div>
                </div>
            </li>
            </ul>
            </div>

            <script>
                var id1 = '';
                var id2 = '';
                var i = 0;
                $(document).ready(function(){

                    $(".upd").hover(function(){
                        id2 = $(this).attr("id");
                        $("#"+id2+" .glyphicon").removeClass("hidden");

                    },function(){
                        $(this).find(".glyphicon").addClass("hidden");
                    });

                    $(".upd .glyphicon").click(function(){
                        if(id1!=''){
                            if(id1!=id2){
                                if(i==1){
                                    $("#"+id1).find(".glyphicon").toggleClass("glyphicon-remove glyphicon-pencil");
                                    $("#"+id1).find(".xdd").addClass("hidden");
                                    $("#"+id1).find(".xsd").removeClass("hidden");
                                }

                                id1 = id2;

                                $("#"+id2).find(".xdd").removeClass("hidden");
                                $("#"+id2).find(".xsd").addClass("hidden");
                            }else{
                                if(i==1){
                                    $("#"+id1).find(".xdd").addClass("hidden");
                                    $("#"+id1).find(".xsd").removeClass("hidden");
                                    i = 0;
                                }else if(i==0){
                                    $("#"+id1).find(".xdd").removeClass("hidden");
                                    $("#"+id1).find(".xsd").addClass("hidden");
                                    i = 1;
                                }

                            }
                            $(this).toggleClass("glyphicon-remove glyphicon-pencil");
                        }else{
                            $(this).toggleClass("glyphicon-remove glyphicon-pencil");
                            $("#"+id2).find(".xdd").removeClass("hidden");
                            $("#"+id2).find(".xsd").addClass("hidden");
                            id1 = id2;
                            i = 1;
                        }
                    });

                });

                function sub_form(frm,event,target,f){
                    submit_form(frm,event,target);
                    $(target).removeClass("hidden");
                    $("#"+id2).find(".xdd").addClass("hidden");
                    $("#"+id2).find(".glyphicon").toggleClass("glyphicon-remove glyphicon-pencil");
                    i = 0;
                }
            </script>
        <?php
        }
    }else{
        echo $conn->error();
    }
}