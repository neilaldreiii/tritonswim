<?php
require 'Assets/Include/connect.inc.php';

if(isset($_POST['remove'])) {
    $id = $_POST['remove'];
    
    if(!empty($id)) {
        
        $delete = "DELETE FROM `athletes` WHERE `athletes`.`athlete_ID` ='".mysqli_real_escape_string($con, $id)."'";
        if($delete_query = mysqli_query($con, $delete)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}

if(isset($_POST['deleteimg'])) {
    $imgid = $_POST['deleteimg'];
    
    if(!empty($imgid)) {
        
        $deleteimg = "DELETE FROM `gallery` WHERE `gallery`.`image_ID` ='".mysqli_real_escape_string($con, $imgid)."'";
        
        if($deleteimg_query = mysqli_query($con, $deleteimg)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}

if(isset($_POST['maximize'])) {
    
    $galleryImg = $_POST['maximize'];
    if(!empty($galleryImg)) {
        
        $maximize = "SELECT * FROM `gallery` WHERE `image_ID`='$galleryImg'";
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
        
        $retrieve_athlete = "SELECT * FROM `athletes` WHERE `athlete_ID` ='$athlete_id'";
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

if(isset($_POST['removeproduct'])) {
    
    $product_id = $_POST['removeproduct'];
    
    if(!empty($product_id)) {
        
        $dltprod = "DELETE FROM `products` WHERE `products`.`product_id` = $product_id";
        if($dltprod_qry = mysqli_query($con, $dltprod)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}

if(isset($_POST['removebm'])) {
    
    $bm_id = $_POST['removebm'];
    
    if(!empty($bm_id)) {
        
        $dltbm = "DELETE FROM `board` WHERE `board`.`member_id` = $bm_id";
        if($dltbm_qry = mysqli_query($con, $dltbm)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}


if(isset($_POST['removead'])) {
    
    $ad_id = $_POST['removead'];
    
    if(!empty($ad_id)) {
        
        $dltad = "DELETE FROM `ads` WHERE `ads`.`ads_id` = $ad_id";
        if($dltad_qry = mysqli_query($con, $dltad)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}

if(isset($_POST['removeevent'])) {
    
    $event_id = $_POST['removeevent'];
    
    if(!empty($event_id)) {
        
        $dltevent = "DELETE FROM `events` WHERE `events`.`event_ID` = $event_id";
        if($dltevent_qry = mysqli_query($con, $dltevent)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}

if(isset($_POST['removereg'])) {
    
    $reg_id = $_POST['removereg'];
    
    if(!empty($reg_id)) {
        
        $dltreg = "DELETE FROM `registration` WHERE `registration`.`register_id` = $reg_id";
        if($dltreg_qry = mysqli_query($con, $dltreg)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
    }
}

if(isset($_POST['removeslide'])) {
    
    $slide_id = $_POST['removeslide'];
    
    if(!empty($slide_id)) {
        
        $dltslide = "DELETE FROM `slides` WHERE `slides`.`slide_id` ='$slide_id'";
        if($dltslidequery = mysqli_query($con, $dltslide)) {
            
            echo '<meta http-equiv="refresh" content="0.1">';
            
        }
        
    }
    
}

if(isset($_POST['showProduct'])) {
    
    $product_id = $_POST['showProduct'];
    
    if(!empty($product_id)) {
        $product_query = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
        if($pq_run = mysqli_query($con, $product_query)) {
            
            while($pq_row = mysqli_fetch_array($pq_run)) {
                
                $product_img = $pq_row['product_image'];
                $product_title = $pq_row['product_title'];
                $product_price = $pq_row['product_price'];
                ?>
                
                <div class="display-product-container">
                    <div class="product-image"><img src="Assets/Media/Uploads/<?php echo $product_img; ?>" alt=""></div>
                    <div class="product-caption">
                        <h1><?php echo $product_title; ?></h1>
                        <p><?php echo "&#8369; ".$product_price; ?></p>
                        <div class="product-contacts">
                            <h1>For orders and inquiry text/email/call us</h1>
                            <h3><i>Complete name + Product name + size &amp; send to:</i></h3>
                            <p>09055201970 - Jopet Castañeda</p>
                            <p>or</p>
                            <p>tritonclub2017@gmail.com</p>
                            <p>or</p>
                            <p>Facebook: <a href="https://www.facebook.com/tritonswimclub/">Triton Swim Club</a></p>
                        </div>
                    </div>
                </div>
                
                <?php
            }
        }
    }
    
}
?>

<?php 

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
                                echo '<p>Registration Successfull. <a href="triton.php">Sign In</a></p>';
                            }
                        }
                    }
                }
            }
        }
    }

?>