<?php 
    require 'Assets/Include/connect.inc.php';
    require 'Assets/Include/core.inc.php';
    if(isset($_POST['reg_username']) 
    && isset($_POST['reg_password'])
    && isset($_POST['reg_code'])
    && isset($_POST['reg_fname'])
    && isset($_POST['reg_lname'])) {

        $username = $_POST['reg_username'];
        $password =$_POST['reg_password'];
        $code = $_POST['reg_code'];
        $fname = $_POST['reg_fname'];
        $lname = $_POST['reg_lname'];

        $password_hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

        if(!empty($username)
        && !empty($password)
        && !empty($code)
        && !empty($fname)
        && !empty($lname)) {

            $use_code = "SELECT * FROM `verify` WHERE `veri_code`='$code'";
            if($use_code_query = mysqli_query($con, $use_code)) {

                $code_row = mysqli_fetch_array($use_code_query);
                $code_id = $code_row['id'];
                $update_code = "UPDATE `verify` SET `status`='in-use' WHERE `verify`.`id` = '$code_id'";

                if($update_code_query = mysqli_query($con, $update_code)) {
                    
                    $availability = "SELECT * FROM `admin` WHERE `username`='$username'";
                    if($availability_query = mysqli_query($con, $availability)) {

                        $num_rows = mysqli_num_rows($availability_query);

                        if($num_rows == 1) {

                            echo '<p class="error">Username is already in use.</p>';

                        } elseif($num_rows == 0) {
                            
                            $add = "INSERT INTO `admin` VALUES('','".mysqli_real_escape_string($con, $username)."', '".mysqli_real_escape_string($con, $password_hash)."', '".mysqli_real_escape_string($con, $fname)."', '".mysqli_real_escape_string($con, $lname)."',
                            'avatar_null')";

                            if($add_query = mysqli_query($con, $add)) {
                                echo '<h1>Registration Successfull. <a href="triton.php">Sign In</a></h1>';
                            }
                        }
                    }
                }
            }
        }
    }

?>