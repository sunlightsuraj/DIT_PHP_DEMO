<?php
include('connection.php');
require_once('myfunctions.php');

if(isset($_POST)){
    if(isset($_FILES['CoverImageFile'])){
        if($ImageName = imageupload($_SESSION['SESS_USERNAME']."_cover",$_FILES['CoverImageFile'],'images/userprofilepics/')){
            if($u_cover = get_pic_user('c_photo')){
                unlink($u_cover);
            }
            $sql = "update user set c_photo = '$ImageName' where userid = ".$_SESSION['SESS_USERID'];
            $qry = mysql_query($sql);
            if($qry){
                echo "<img src='$ImageName' class='img-responsive' alt='cover image' id='profile_c' style='width: 100%; height: 350px; border-bottom: 1px solid pink;'>";
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