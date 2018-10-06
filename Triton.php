<?php
    require "Assets/Include/core.inc.php";
    require "Assets/Include/connect.inc.php";

    if(loggedIn()) {
        header("Location: Lobby.php");
    }
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
    <div class="container">
        <header class="header">
            <h1>Triton Swimclub Members</h1>
        </header>
        <div class="sub-container">
            <div class="register-container">
                <div class="overlay">
                    <div class="notice">
                        <p>*Please enter the verification code given by the triton officials to register as a triton member.</p>
                        <div class="notice-field">
                            <form action="triton-member-registration.php" method="GET">
                                <input type="text" name="verify" placeholder="Member Verification Code">
                                <input type="submit" value="Verify">
                            </form>
                            <?php
                                if(isset($_GET['verify'])) {

                                    $code = $_GET['verify'];

                                    if(!empty($code)) {

                                        $verify = "SELECT * FROM `verify` WHERE `veri_code`='".mysqli_real_escape_string($con, $code)."'";
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-container">
                <?php include "Assets/Include/login.inc.php"; ?>
            </div>
        </div>
    </div>
</body>

</html>