<?php
require_once('connection.php');
require_once('myfunctions.php');
global $conn;
?>

<?php

$per_page = 20;
$page = 1;
$pages_qry = $conn->query("select count(userid) from user");
if($pages_qry){
    $row = $pages_qry->fetch_array();
    if($row[0]>0){
        $pages = ceil($row[0]/$per_page);
        if(isset($_POST['page'])){
            $page = $_POST['page'];
            setcookie('all_page1',$page, time()+300);
        }else if(isset($_COOKIE['all_page1'])){
            $page = $_COOKIE['all_page1'];
        }else{
            $page = 1;
        }
        $start = (($page-1)*$per_page);
        $sql = "select *from user limit $start,$per_page";
        $qry = $conn->query($sql);
        if($qry){

            if($qry->num_rows) {
                print'Total Record ' . mysql_result($pages_qry, 0);
                while ($row = $qry->fetch_array()) {
                    $fname = $row['fname'];
                    $mname = $row['mname'];
                    $lname = $row['lname'];
                    $name = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
                    $address = $row['useraddress'];
                    $phone = $row['userphone'];
                    $email = $row['useremail'];
                    $gender = $row['gender'];
                    $dob = $row['dob'];
                    $p_photo = $row['p_photo'];
                    $c_photo = $row['c_photo'];
                    $bgroup = $row['bloodgroup'];
                    $username = $row['username'];
                    //userinfo(\"userprofile.php\",{ uid: \"$username\"},\"#usr_list\",event);
                    echo "<a href='#' class='list-group-item' onclick='userinfo(\"user_info.php\",{uid: \"$username\"},\"#user_list\",event)'>
                            <div class='row'>
                                <div class='col-sm-3 col-md-3'>
                                    <div style='width: 80px;height: 80px;border: 1px solid pink;padding: 2px'>
                                        <img src='$p_photo' class='img-responsive' alt='$fname'>
                                    </div>
                                </div>
                                <div class='col-sm-9 col-md-9'>
                                    <div class='row'>
                                        <div class='col-sm-12 col-md-12'>
                                            <b>$name ($username)</b>
                                        </div>
                                    </div><br>
                                    <div class='row'>
                                        <div class='col-sm-12 col-md-12'>
                                            $address
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>";
                }




                $url = 'user_all_list.php';
                $target = '#user-tab';

//pagination
                if ($pages > 1) {
                    echo '<div class="panel-body"> <div class="btn-group">';
                    for ($number = 1; $number <= $pages; $number++) {
                        if ($number == $page) {
                            echo "<button class=\"btn btn-default active\" onclick='userinfo(\"" . $url . "\",{ page: \"" . $number . "\"},\"" . $target . "\",\"\");'>" . $number . "</button>";
                        } else {
                            echo "<button class=\"btn btn-default\" onclick='userinfo(\"" . $url . "\",{ page: \"" . $number . "\"},\"" . $target . "\",\"\");'>" . $number . "</button>";
                        }
                    }
                    echo '</div></div>';
                }
//echo "<br>Current Page: $page";
            }
        }else{
            echo $conn->error;
        }
    }else{
        echo 'No data';
    }
}else{
    echo $conn->error;
}

?>
