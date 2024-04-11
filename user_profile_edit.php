<?php
include('connection.php');
require_once('myfunctions.php');

if(isset($_SESSION['SESS_USERID']) && $_SESSION['SESS_USERID']!=''){
    $uid = $_SESSION['SESS_USERID'];
    if(isset($_POST['bugar']) && $_POST['bugar']!='' && $_POST['bugar'] == 1){
        if(isset($_POST['frm']) && $_POST['frm']!=''){
            $su = '';
            if($_POST['frm']==1){
                if(isset($_POST['fname']) && $_POST['fname']!='' && isset($_POST['lname']) && $_POST['lname']!=''){
                    $fname =  mysql_real_escape_string(trim(htmlentities($_POST['fname'])));
                    $mname = mysql_real_escape_string(trim(htmlentities($_POST['mname'])));
                    $lname = mysql_real_escape_string(trim(htmlentities($_POST['lname'])));
                    $query = "update user set fname = '$fname', mname = '$mname', lname = '$lname' where userid = $uid";
                    $su = "$fname $mname $lname";
                }
            }else if($_POST['frm']==2){
                if(isset($_POST['u_address']) && $_POST['u_address']!=''){
                    $address = mysql_real_escape_string(trim(htmlentities($_POST['u_address'])));
                    $query = "update user set useraddress = '$address' where userid = $uid";
                    $su = $address;
                }
            }else if($_POST['frm']==3){
                if(isset($_POST['u_phone']) && $_POST['u_phone']!=''){
                    $phone = mysql_real_escape_string(trim(htmlentities($_POST['u_phone'])));
                    $query = "update user set userphone = '$phone' where userid = $uid";
                    $su = $phone;
                }
            }else if($_POST['frm']==4){
                if(isset($_POST['u_email']) && $_POST['u_email']!=''){
                    $email = mysql_real_escape_string(trim(htmlentities($_POST['u_email'])));
                    $query = "update user set useremail = '$email' where userid = $uid";
                    $su = $email;
                }
            }else if($_POST['frm']==5){
                if(isset($_POST['u_gender']) && $_POST['u_gender']!=''){
                    $gender = mysql_real_escape_string(trim(htmlentities($_POST['u_gender'])));
                    if($gender === 'male')
                        $gender = 'Male';
                    else if($gender === 'female')
                        $gender = 'Female';
                    $query = "update user set gender = '$gender' where userid = $uid";
                    $su = $gender;
                }
            }else if($_POST['frm']==6){
                if(isset($_POST['u_dob']) && $_POST['u_dob']!=''){
                    $dob = mysql_real_escape_string(trim(htmlentities($_POST['u_dob'])));
                    $query = "update user set dob = '$dob' where userid = $uid";
                    $su = $dob;
                }
            }else if($_POST['frm']==7){
                if(isset($_POST['u_bgroup']) && $_POST['u_bgroup']!=''){
                    $bgroup = mysql_real_escape_string(trim(htmlentities($_POST['u_bgroup'])));
                    $query = "update user set bloodgroup = '$bgroup' where userid = $uid";
                    $su = $bgroup;
                }
            }else if($_POST['frm']==8){
                if(isset($_POST['username']) && $_POST['username']!=''){
                    $username = mysql_real_escape_string(trim(htmlentities($_POST['username'])));
                    $query = "update user set username = '$username' where userid = $uid";
                    $su = $username;
                }
            }else if($_POST['frm']==9){
                if(isset($_POST['o_pass']) && $_POST['o_pass']!='' && isset($_POST['n_pass']) && $_POST['n_pass']!='' && isset($_POST['c_pass']) && $_POST['c_pass']!=''){
                    $o_pass = pass_hashing(mysql_real_escape_string(trim(htmlentities($_POST['o_pass']))));
                    $n_pass = pass_hashing(mysql_real_escape_string(trim(htmlentities($_POST['n_pass']))));
                    $c_pass = pass_hashing(mysql_real_escape_string(trim(htmlentities($_POST['c_pass']))));

                    if($n_pass === $c_pass){
                        $sql = "select password from user where userid = $uid";
                        if($qry = mysql_query($sql)){
                            if(mysql_num_rows($qry) && $row = mysql_fetch_array($qry)){
                                if($o_pass === $row['password']){
                                    $query = "update user set password = '$n_pass' where userid = $uid";
                                }
                            }
                        }
                    }
                    $su = '*************';
                }
            }

            if(isset($query) && $query!=''){
                if(mysql_query($query)){
                    echo $su;
                }else{
                    echo mysql_error();
                }
            }
        }
    }
}else{
    print 'User not logged in';
}
?>