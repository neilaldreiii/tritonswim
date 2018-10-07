<?php
    require "Assets/Include/core.inc.php";
    require "Assets/Include/connect.inc.php";

    if(!loggedIn()) {
        header("Location: Triton.php");
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/Css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>
<body>
    <?php 
        include 'Assets/Include/lobby-nav.inc.php';
    ?>
    <div class="container" style="margin-top: 130px;">
    <?php
        if(isset($_GET['admin'])) {

            $format = $_GET['admin'];

            if(!empty($format)) {

                if($format == 'Athletes') {

                    include 'Assets/Routes/admin-athletes.php';

                } elseif($format == 'BM') {

                    include 'Assets/Routes/admin-BM.php';

                } elseif($format == 'Events') {

                    include 'Assets/Routes/admin-events.php';

                } elseif($format == 'Gallery') {

                    include 'Assets/Routes/admin-gallery.php';

                } elseif($format == 'Products') {

                    include 'Assets/Routes/admin-products.php';

                } elseif($format == 'Ads') {
                    
                    include 'Assets/Routes/admin-ads.php';

                } elseif($format == 'Slides') {

                    include 'Assets/Routes/admin-slides.php';

                }
            } else {

                echo '<p class="error" style="font-size: 50pt;">Error 6345(Power Surge)::Your device is receiving too much power. Please turn off your device and let it cool for a moment.</p>';
            }

        } else {
        ?>
        <div class="lobby">
            <div class="message-board">
                <div class="message-preview">
                    
                </div>
                <div class="message-actions">
                    <form methods="POST" onsubmit="sendMessage();return false;">
                        <div class="message-form-container">
                            <div class="message-field">
                                <input type="text" name="message" id="message" />
                            </div>
                            <div class="message-form-action">
                                <input type="submit" value="Send" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="admin-controls">
                <div class="verification-codes-generator">
                <?php
                    if($username == 'neilaldrei' || $username == 'banana7') {
                    ?>
                        <button value="codes" id="codeignite" onclick="getVerification(this);">Generate Verification</button>
                        <div id="keyDisplay"></div>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
    <script src="Assets/JS/ajaxfile.js"></script>
</body>
</html>