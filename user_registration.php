<?php
require_once('./debug_info.php');
require_once('myfunctions.php');
require_once('connection.php');

global $conn;

if($_POST){
    if(isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['gender']) && isset($_POST['user_name']) && isset($_POST['pass']) && isset($_POST['c_pass'])){
        $fname = $conn->real_escape_string(trim(htmlentities($_POST['f_name'])));
        $lname = $conn->real_escape_string(trim(htmlentities($_POST['l_name'])));
        if($_POST['gender'] == 'female'){
            $gender = 'female';
            //change the image to female icon
            $p_photo = 'images/userprofilepics/userphoto.jpg';
        }else{
            $gender = 'male';
            //change the image to male icon
            $p_photo = 'images/userprofilepics/userphoto.jpg';
        }
        $username = $conn->real_escape_string(trim(htmlentities($_POST['user_name'])));
        $password = $conn->real_escape_string(trim(htmlentities($_POST['pass'])));
        $c_password = $conn->real_escape_string(trim(htmlentities($_POST['c_pass'])));

        $c_photo = 'images/userprofilepics/usercover.jpg';
        $date = date('Y-m-d');
        if(!empty($fname) && !empty($lname) && !empty($gender) && ($gender=='male' or $gender == 'female') && !empty($username) && !empty($password) && !empty($c_password)){
            if($password === $c_password){
                $h_password = pass_hashing($password);
                $query = "select username from user";
                if($qry = $conn->query($query)){
                    if($qry->num_rows){
                        while($row = $qry->fetch_array()){
                            if($row['username'] === $username){
                                echo 'User already exists';
                                goto skip;
                            }
                        }
                    }
                }
                $query = "insert into user(fname,mname, lname,gender,p_photo,c_photo,username,password,dor,useraddress,userphone, useremail, dob, bloodgroup, online) values('$fname', '','$lname','$gender','$p_photo','$c_photo','$username','$h_password','$date', '', '', '', '', '', 0)";
                $conn->query($query) or die($conn->error);
                if(login($username,$password))
                    returnheader('/FrenZone/');
                skip:
            }else{
                echo 'Confirm password doesn\'t match';
            }
        }else{
            echo 'Please fill up required fields';
        }
    }else{
        echo 'Plsease fill up required fielsds';
    }
}else{
    returnheader('/FrenZone/');
}