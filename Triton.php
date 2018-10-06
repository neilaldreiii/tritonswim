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
    <div class="container">
        <header class="header">
            <h1>Triton Swimclub Members</h1>
        </header>
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