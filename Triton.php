<?php
    require "Assets/Include/core.inc.php";
    require "Assets/Include/connect.inc.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Members</title>
    <link rel="stylesheet" href="Assets/Css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>

<body> 
    <!-- Created new CSS File for members -->
    <div class="container" style="margin-top: 50px;">
        <div class="sub-container">
            <div class="register-container">
                <div class="overlay">
                    <div class="notice">
                        <p>*Please enter verification code given by the triton officials to register as a triton member.</p>
                        <div class="notice-field">
                            <form action="<?php echo $current_file; ?>">
                                <input type="text" name="verify" placeholder="Member Verification Code">
                                <input type="submit" value="Verify">
                            </form>
<<<<<<< HEAD
=======
                            <?php
                                if(isset($_GET['verify'])) {

                                    $code = $_GET['verify'];

                                    if(!empty($code)) {

                                        $verify = "SELECT * FROM `verify` WHERE `veri_code`='$code'";
                                        if($verify_query = mysqli_query($con, $verify)) {

                                            $num_rows = mysqli_num_rows($verify_query);
                                            if($num_rows == 1) {
                                                
                                                $row = mysqli_fetch_array($verify_query);
                                                $db_stats = $row['status'];

                                                if($db_stats == 'new') {

                                                    

                                                } elseif($db_stats == 'in-use') {

                                                    echo '<p class="error">The code you entered has already been used</p>';

                                                }

                                            } elseif($num_rows == 0) {
                                                echo '<p class="error">The code you entered does not exist. </p>';
                                            }
                                        }
                                    }
                                }
                            ?>
>>>>>>> lobby-b
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-container">
                <?php include "Assets/Include/login.inc.php"; ?>
                <h1>Triton Swimclub Members</h1>
                <h2><a href="index.php">Triton Swimclub Main Page</a></h2>
            </div>
        </div>
    </div>
</body>

</html>