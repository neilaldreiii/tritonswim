<?php
session_start();
ob_start();

$time_zone = strtotime(date_default_timezone_set('Asia/Manila'));

// Current Location of all posts and for security
$current_file = $_SERVER['SCRIPT_NAME'];

if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
    $http_referer = $_SERVER['HTTP_REFERER'];
}
function loggedin() {
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function getuserfield($field) {
    require 'connect.inc.php';
    
    $query = "SELECT `$field` FROM `admin` WHERE `id`='".$_SESSION['user_id']."'";
    
    if ($query_run = mysqli_query($con , $query)) {
        if ($query_result = mysqli_fetch_array($query_run)) {
            $query_row = $query_result[$field];
            return $query_row;
        }
    }
}

function imagefilename($length) {
    $char = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charlen = strlen($char);
    $randRe = '';
    for ($x = 0; $x < $length; $x++) {
        $randRe .= $char[rand(0, $charlen - 1)];
    }
    return $randRe;
}

function conversationID($len) {
    $cidnum = '1234567890';
    $cidnumlen = strlen($cidnum);
    $randcid = '';
    for ($a = 0; $a < $len; $a++) {
        $randcid .= $cidnum[rand(0, $cidnumlen - 1)];
    }
    return $randcid;
}

function elapse($time) {
    
    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

function avatardata($row, $dataID) {
    require 'connect.inc.php';
    
    $query = "SELECT `$row` FROM `users` WHERE `userID`='$dataID'";
    
    if ($query_run = mysqli_query($con , $query)) {
        while ($query_result = mysqli_fetch_array($query_run)) {
            
            $query_row = $query_result[$row];
            return $query_row;
            
        }
    }
}


function image_fix_orientation($filename)
{
    $exif = exif_read_data($filename);
    if (!empty($exif['Orientation']))
    {
        $image = imagecreatefromjpeg($filename);
        switch ($exif['Orientation'])
        {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, -90, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }

        imagejpeg($image, $filename, 90);
    }
}

ob_flush();

?>