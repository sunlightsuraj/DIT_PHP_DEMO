<?php
include('connection.php');
require_once('myfunctions.php');

if(isset($_POST)){
    if(isset($_FILES['ProfileImageFile'])){
        if($ImageName = imageupload($_SESSION['SESS_USERNAME']."_profile",$_FILES['ProfileImageFile'],'images/userprofilepics/')){
            if($u_pic = get_pic_user('p_photo')){
                unlink($u_pic);
            }
            $sql = "update user set p_photo = '$ImageName' where userid = ".$_SESSION['SESS_USERID'];
            $qry = mysql_query($sql);
            if($qry){
                echo "<img src='$ImageName' id='profile_p' class='img-responsive' alt='user profile image' style='margin-top: -139px; height: 180px; width: 180px; padding: 2px;border:1px solid pink;background-color: white;'>";
            }else{
                echo 'Failed';
            }
        }else{
            echo 'Upload Failed';
        }
    }else{
        echo 'No Image';
    }

}else{
    echo 'Not Posted';
}