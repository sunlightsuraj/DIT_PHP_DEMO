<?php
ob_start();
session_start();
ob_end_clean();

require_once "./connection.php";

function returnheader($location){
    print "<script type=\"text/javascript\">
window.location='$location'</script>";
}

function pass_hashing($password){
    if(isset($password) && $password != ''){
        //function to hash password
        //encrypt the password
        $password = sha1($password);
        $salt = md5("userlogging");
        $pepper = "dedeedededecbtr";

        $passencrypt = $salt . $password . $pepper;
        $password = md5($passencrypt);

        return $password;
    }else{
        return false;
    }
}

function login($uname,$password){
    global $conn;
    
    if($password = pass_hashing($password)){
        //find out if user and password are present
        $query = "SELECT * FROM user WHERE username='". $conn->real_escape_string($uname)."' AND password='". $conn->real_escape_string($password) . "'";
        $result = $conn->query($query) OR die($conn->error);

        $result_num = $result->num_rows;

        if($result_num > 0){

            if($row = $result->fetch_array()){

                $idsess = stripslashes($row["userid"]);
                $firstnamesess = stripslashes($row["fname"]);
                $middlenamesess = stripslashes($row["mname"]);
                $lastnamesess = stripslashes($row["lname"]);
                $username = stripslashes($row["username"]);
                $p_photo = stripslashes($row["p_photo"]);

                $sql = "update user set online = 1 where userid = $idsess";
                $qry = $conn->query($sql);
                if($qry){
                    $_SESSION["SESS_USERID"] = $idsess;
                    $_SESSION["SESS_FNAME"] = $firstnamesess;
                    $_SESSION["SESS_MNAME"] = $middlenamesess;
                    $_SESSION["SESS_LNAME"] = $lastnamesess;
                    $_SESSION["SESS_USERNAME"] = $username;
                    $_SESSION['SESS_PPHOTO'] = $p_photo;

                    return true;
                }
            }
        }else {
            return false;
        }
    }else{
        return false;
    }
    return false;
}


function imageupload($ImageNamePrefix,$ImageFile,$ImagePath){
    ############ Edit settings ##############
    //$ThumbSquareSize 		= 200; //Thumbnail will be 200x200
    $BigImageMaxSize 		= 500; //Image Maximum height or width
    //$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
    //$DestinationDirectory = 'uploads/';
    $DestinationDirectory = $ImagePath;
    $Quality 				= 90; //jpeg quality
    ##########################################

    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        //die();
        return false;
    }

    // check $ImageFile not empty
    if(!isset($ImageFile) || !is_uploaded_file($ImageFile['tmp_name']))
    {
        //die('Something wrong with uploaded file, something missing!'); // output error when above checks fail.
        return false;
    }
    // Random number will be added after image name
    $RandomNumber 	= rand(0, 9999999999);

    $ImageName 		= str_replace(' ','-',strtolower($ImageFile['name'])); //get image name
    //$ImageSize 		= $ImageFile['size']; // get original image size
    $TempSrc	 	= $ImageFile['tmp_name']; // Temp name of image file stored in PHP tmp folder
    $ImageType	 	= $ImageFile['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.

    //Let's check allowed $ImageType, we use PHP SWITCH statement here
    switch(strtolower($ImageType))
    {
        case 'image/png':
            //Create a new image from file
            $CreatedImage =  imagecreatefrompng($ImageFile['tmp_name']);
            break;
        case 'image/gif':
            $CreatedImage =  imagecreatefromgif($ImageFile['tmp_name']);
            break;
        case 'image/JPG':
        case 'image/jpeg':
        case 'image/pjpeg':
            $CreatedImage = imagecreatefromjpeg($ImageFile['tmp_name']);
            break;
        default:
            //die('Unsupported File!'); //output error and exit
            return false;
    }

    //PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
    //Get first two values from image, width and height.
    //list assign svalues to $CurWidth,$CurHeight
    list($CurWidth,$CurHeight)=getimagesize($TempSrc);

    //Get file extension from Image name, this will be added after random name
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);

    //remove extension from filename
    //$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName);

    //Construct a new name with random number and extension.
    //$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
    $NewImageName = $ImageNamePrefix.'-'.$RandomNumber.'.'.$ImageExt;

    //set the Destination Image
    //$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumbnail name with destination directory
    $DestRandImageName 			= $DestinationDirectory.$NewImageName; // Image with destination directory

    //Resize image to Specified Size by calling resizeImage function.
    if(resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
    {
        return $DestRandImageName;

    }else{
        //die('Resize Error'); //output error
        return false;
    }


}

function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{
    // This function will proportionally resize image
    //Check Image size is not 0
    if($CurWidth <= 0 || $CurHeight <= 0)
    {
        return false;
    }

    //Construct a proportional size of new image
    $ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight);
    $NewWidth  			= ceil($ImageScale*$CurWidth);
    $NewHeight 			= ceil($ImageScale*$CurHeight);
    $NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);

    // Resize Image
    if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
    {
        switch(strtolower($ImageType))
        {
            case 'image/png':
                imagepng($NewCanves,$DestFolder);
                break;
            case 'image/gif':
                imagegif($NewCanves,$DestFolder);
                break;
            case 'image/jpeg':
            case 'image/pjpeg':
                imagejpeg($NewCanves,$DestFolder,$Quality);
                break;
            default:
                return false;
        }
        //Destroy image, frees memory
        if(is_resource($NewCanves)) {imagedestroy($NewCanves);}
        return true;
    }else{
        return false;
    }

}

function get_pic_user($attr) {
    if(isset($attr) && $attr != '') {
        $sql = "select ".$attr." from user where userid = ".$_SESSION['SESS_USERID'];
        if($qry = mysql_query($sql)){
            if(mysql_num_rows($qry) && $row = mysql_fetch_array($qry)) {
                if($row[$attr] != 'images/userprofilepics/userphoto.jpg' && $row[$attr] != 'images/userprofilepics/usercover.jpg')
                    return $row[$attr];
            }
        }
    }
    return false;
}
