<?php
require 'Assets/Include/connect.inc.php';

if(isset($_POST['maximize'])) {
    
    $galleryImg = $_POST['maximize'];
    if(!empty($galleryImg)) {
        
        $maximize = "SELECT * FROM `gallery` WHERE `id`='$galleryImg'";
        if($max_run = mysqli_query($con, $maximize)) {
            
            $img_row = mysqli_fetch_array($max_run);
            
            $image = $img_row['image'];
        ?>
            <style>
                .image-container .maximized-img {
                    height: 100%;
                    width: 100%;
                    background-image: url(Assets/Media/Uploads/<?php echo $image; ?>);
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: contain;
                    border-radius: 4px;
                    overflow: hidden;
                }
            </style>
            <div class="maximized-img"></div>
        
        <?php
        }
    }
}
if(isset($_POST['athlete'])) {
    $athlete_id = $_POST['athlete'];
    
    if(!empty($athlete_id)) {
        
        $retrieve_athlete = "SELECT * FROM `athletes` WHERE `id` ='$athlete_id'";
        if($ra_query = mysqli_query($con, $retrieve_athlete)) {
            
            while($ra_row = mysqli_fetch_array($ra_query)){
                
                $fullname = ucwords($ra_row['fullname']);
                $school = ucwords($ra_row['school']);
                $intro = ucfirst($ra_row['introduction']);
                $cat = ucwords($ra_row['category']);
                $athlete_dp = $ra_row['athlete_profile_image'];
                $secondary = $ra_row['secondary'];
                
            ?>
                <style>
                    .athlete-max-view .athlete-max-dp {
                        background-image: url(Assets/Media/Uploads/<?php echo $secondary; ?>);
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: contain;
                        border-radius: 3px;
                    }
                </style>
                <div class="athlete-max-view">
                    <header class="header"> 
                        <div class="athlete-max-dp"></div>
                    </header>
                    <div class="athlete-max-info">
                        <header class="sub-header">
                            <h1><?php echo $fullname; ?></h1>
                            <div class="athlete-add-info">
                                <h2><?php echo $school; ?></h2>
                                <h2><?php echo $cat; ?></h2>
                                <h2><?php echo $intro; ?></h2>
                            </div>
                        </header>
                    </div>
                </div>
                <header class="header">
                    <h1>Triton Swim Club</h1>
                </header>
            <?php
            }
        }
    }
}
?>
<?php 

    // if(isset($_POST['reg_username']) 
    // && isset($_POST['reg_password'])
    // && isset($_POST['reg_code'])
    // && isset($_POST['reg_fname'])
    // && isset($_POST['reg_lname'])) {

    //     $username = $_POST['reg_username'];
    //     $password =$_POST['reg_password'];
    //     $code = $_POST['reg_code'];
    //     $fname = $_POST['reg_fname'];
    //     $lname = $_POST['reg_lname'];

    //     $password_hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

    //     if(!empty($username)
    //     && !empty($password)
    //     && !empty($code)
    //     && !empty($fname)
    //     && !empty($lname)) {

    //         $use_code = "SELECT * FROM `verify` WHERE `veri_code`='$code'";
    //         if($use_code_query = mysqli_query($con, $use_code)) {

    //             $code_row = mysqli_fetch_array($use_code_query);
    //             $code_id = $code_row['id'];
    //             $update_code = "UPDATE `verify` SET `status`='in-use' WHERE `verify`.`id` = '$code_id'";

    //             if($update_code_query = mysqli_query($con, $update_code)) {
                    
    //                 $availability = "SELECT * FROM `admin` WHERE `username`='$username'";
    //                 if($availability_query = mysqli_query($con, $availability)) {

    //                     $num_rows = mysqli_num_rows($availability_query);

    //                     if($num_rows == 1) {

    //                         echo '<p class="error">Username is already in use.</p>';

    //                     } elseif($num_rows == 0) {
                            
    //                         $add = "INSERT INTO `admin` VALUES('','".mysqli_real_escape_string($con, $username)."', '".mysqli_real_escape_string($con, $password_hash)."', '".mysqli_real_escape_string($con, $fname)."', '".mysqli_real_escape_string($con, $lname)."',
    //                         'avatar_null')";

    //                         if($add_query = mysqli_query($con, $add)) {
    //                             echo '<p>Registration Successfull. <a href="triton.php">Sign In</a></p>';
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }

?>

<?php

if(isset($_POST['generate'])) {

    require 'Assets/Include/core.inc.php';
    $key = $_POST['generate'];

    if(!empty($key)) {

        $generated = date("mdy").'-'.imagefilename(6);
        $add = "INSERT INTO `verify` VALUES('', '".mysqli_real_escape_string($con, $generated)."', 'new')";
        if($add_query = mysqli_query($con, $add)) {
            echo '<p class="keyCodes"><b>Verification Code:</b> '.$generated.'</p>';
        }
    }
}

if(isset($_POST['id']) && isset($_POST['field'])) {
    $id = $_POST['id'];
    $field = $_POST['field'];

    if(!empty($id)) {

        $query = "DELETE FROM `$field` WHERE `$field`.`id` = $id";
        if($query = mysqli_query($con, $query)) {
            
            echo '<meta http-equiv="refresh" content="1">';
        }

    } else {
        echo 'Empty Bananas';
    }
}


?>

<?php 

    if(isset($_POST['pro_fname']) 
    && isset($_POST['pro_add']) 
    && isset($_POST['pro_size']) 
    && isset($_POST['productID'])
    && isset($_POST['pro_number'])) {

        $or_fname = $_POST['pro_fname'];
        $or_add = $_POST['pro_add'];
        $or_size = $_POST['pro_size'];
        $or_id = $_POST['productID'];
        $or_number = $_POST['pro_number'];

        if(!empty($or_fname)
        && !empty($or_add)
        && !empty($or_size)
        && !empty($or_id)
        && !empty($or_number)) {
            
            $products = "SELECT * FROM `products` WHERE `id`='$or_id'";
            $product_query = mysqli_query($con, $products);
            $product = mysqli_fetch_assoc($product_query);
            
            $product_name = mysqli_real_escape_string($con, $product['product_title']);
            $product_img = $product['product_image'];
            $product_price = $product['product_price'];

            $add_order = "INSERT INTO `users_order` VALUES ('', '$or_fname', '$or_add', '$or_size', '$or_number', '$or_id', '$product_name', '$product_price', Now())";

            if($add_order_query = mysqli_query($con, $add_order)) {

                echo '<div class="order-success"> Order Sent </div>';

            } else {
               
            }
        }
    }
?>

<?php 

if(isset($_POST['message'])) {

    $message = mysqli_real_escape_string($con, $_POST['message']);

    if(!empty($message)) {

        require_once 'Assets/Include/core.inc.php';
        $sender = getuserfield('id');
        $add_message = "INSERT INTO `messages` VALUES('', '$message', '$sender', Now())";

        if($add_message_query = mysqli_query($con, $add_message)) {
        } else {

            echo '<p>Connection Failed</p>';

        }
    } else {

        echo '<p>Cannot send an empty message</p>';

    }
}
?>