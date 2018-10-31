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
    <title>Triton | Member Registration</title>
    <link rel="stylesheet" href="Assets/Css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>
<body>
<div class="container">
    <header class="header">
        <h1>Triton Swimclub Members - Sign Up</h1>
    </header>
    <div class="register">
        <div class="form-header">
            <h2>Sign Up</h2>
        </div>
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="form-container">
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="input-field">
                    <input type="text" name="fname" placeholder="First Name">
                </div>
                <div class="input-field">
                    <input type="text" name="lname" placeholder="Last Name">
                </div>
                <div class="form-action">
                    <a href="triton.php">Sign in Instead</a>
                    <input type="submit" value="Sign up">
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['username'])
        && isset($_POST['password'])
        && isset($_POST['fname'])
        && isset($_POST['lname'])) {

            echo $username = $_POST['usernane'];
            echo $password = $_POST['password'];
            echo $fname = $_POST['fname'];
            echo $lname = $_POST['lname'];

            if(!empty($username) 
            && !empty($password)
            && !empty($fname)
            && !empty($lname)) {

                $update = "UPDATE `verify` SET `status` = 'in-use' WHERE `verify`.`id`='$code_id'";
                if($up_query = mysqli_query($con, $update)) {

                    $add = "INSERT INTO `admin` VALUES('','".mysqli_real_escape_string($con, $username)."', '".mysqli_real_escape_string($con, $password)."','".mysqli_real_escape_string($con, $fname)."', '".mysqli_real_escape_string($con, $lname)."')";
                    if($add_query = mysqli_query($con, $add)) {

                        header("Location: lobby.php");

                    } else {

                        header("Location: events.php");
                        echo '<p class="error">Failed adding member</p>';

<<<<<<< HEAD
                    }
                } else {

                    header("Location: gallery.php");
                    echo '<p class="error">Verification code failed</p>';
=======
            if(!empty($code)) {

                $verify = "SELECT * FROM `verify` WHERE `veri_code`='".mysqli_real_escape_string($con, $code)."'";
                if($verify_query = mysqli_query($con, $verify)) {

                    $num_rows = mysqli_num_rows($verify_query);
                    if($num_rows == 1) {
                        
                        $row = mysqli_fetch_array($verify_query);
                        $code_id = $row['id'];
                        $db_code = $row['veri_code'];
                        $db_stats = $row['status'];

                        if($db_stats == 'new') {

                        ?>

                        <div class="container">
                            <header class="header">
                                <h1>Triton Swimclub Members - Sign Up</h1>
                            </header>
                            <div class="register">
                                <div class="form-header">
                                    <h2>Sign Up</h2>
                                </div>
                                <form action="success.php" method="POST">
                                    <div class="form-container">
                                        <div class="input-field">
                                            <input type="hidden" name="reg_code" id="verificationCode" value="<?php echo $db_code; ?>">
                                        </div>
                                        <div class="input-field">
                                            <input type="text" name="reg_username" placeholder="Username" id="username">
                                        </div>
                                        <div class="input-field">
                                            <input type="password" name="reg_password" placeholder="Password" id="password">
                                        </div>
                                        <div class="input-field">
                                            <input type="text" name="reg_fname" placeholder="First Name" id="firstName">
                                        </div>
                                        <div class="input-field">
                                            <input type="text" name="reg_lname" placeholder="Last Name" id="lastName">
                                        </div>
                                        <div class="form-action">
                                            <a href="triton.php">Sign in Instead</a>
                                            <input type="submit" value="Sign up">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        } elseif($db_stats == 'in-use') {
>>>>>>> lobby-b

                }
            } else {

                header("Location: athletes.php");
                echo '<p class="error">All fields are required.</p>';

<<<<<<< HEAD
=======
                    } elseif($num_rows == 0) {

                        echo '<p class="error">The code you entered does not exist. </p>';
                        
                    }
                }
>>>>>>> lobby-b
            }
        }
<<<<<<< HEAD
        ?>
    </div>
</div>
=======
    ?>
    <script src="Assets/JS/ajaxfile.js"></script>
>>>>>>> lobby-b
</body>
</html>