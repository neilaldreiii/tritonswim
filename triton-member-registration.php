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
    <?php
        if(isset($_GET['verify'])) {
            $code = $_GET['verify'];

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
                                <form action="<?php echo $current_file; ?>" onSubmit="register(); return false;">
                                    <div class="form-container">
                                        <div class="input-field">
                                            <input type="text" name="verificationCode" id="verificationCode" value="<?php echo $db_code; ?>" disabled>
                                        </div>
                                        <div class="input-field">
                                            <input type="text" name="username" placeholder="Username" id="username">
                                        </div>
                                        <div class="input-field">
                                            <input type="password" name="password" placeholder="Password" id="password">
                                        </div>
                                        <div class="input-field">
                                            <input type="text" name="fname" placeholder="First Name" id="firstName">
                                        </div>
                                        <div class="input-field">
                                            <input type="text" name="lname" placeholder="Last Name" id="lastName">
                                        </div>
                                        <div class="form-action">
                                            <a href="triton.php">Sign in Instead</a>
                                            <input type="submit" value="Sign up">
                                        </div>
                                    </div>
                                </form>
                                <div id="register"></div>
                            </div>
                        </div>
                        <?php
                        } elseif($db_stats == 'in-use') {

                            echo '<p class="error">The code you entered has already been used</p>';

                        }

                    } elseif($num_rows == 0) {

                        echo '<p class="error">The code you entered does not exist. </p>';
                        
                    }
                }
            }
        } else {
            echo '<h1 style="margin: auto; padding: 20px; text-align: center;">Error: 404 (Nothing to do here.)</h1>';
        }
    ?>
    <script src="Assets/JS/ajaxfile.js"></script>
</body>
</html>