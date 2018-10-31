<?php
    require "Assets/Include/core.inc.php";
    require "Assets/Include/connect.inc.php";

    $username = getuserfield('username');

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top: 50px;">
    <?php
        if(isset($_GET['admin'])) {

            $format = $_GET['admin'];

            if(!empty($format)) {

                if($format == 'Athletes') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-athletes.php';

                } elseif($format == 'BM') {
                    
                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-BM.php';

                } elseif($format == 'Events') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-events.php';

                } elseif($format == 'Gallery') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-gallery.php';

                } elseif($format == 'Products') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-products.php';

                } elseif($format == 'Ads') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-ads.php';

                } elseif($format == 'Slides') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-slides.php';

                } elseif($format == 'Register') {

                    echo '<a href="lobby.php" class="back-btn">Back</a>';
                    include 'Assets/Routes/admin-registrations.php';

                }
            } else {

                echo '<p class="error" style="font-size: 50pt;">Error 6345(Power Surge)::Your device is receiving too much power. Please turn off your device and let it cool for a moment.</p>';
            }

        } else {
        ?>
        <div class="lobby">
            <div class="message-board" id="messageBoard">
                <div class="message-container">
                    <div class="message-preview" id="messagePreview" onmouseover="scrollToBottom();"></div>
                    <div class="message-actions">
                        <form action="<?php echo $current_file; ?>" methods="POST" onsubmit="sendMessage();return false;">
                            <div class="message-form-container">
                                <div class="message-field">
                                    <input type="text" name="message" id="message" onfocus="scrollToBottom();" />
                                </div>
                                <div class="message-form-action">
                                    <input type="submit" value="Send" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="closer">
                        <button id="closeMessagesBtn">Close <i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="admin-controls">
                <?php
                    include 'Assets/Include/lobby-nav.inc.php';
                ?>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
    <script src="Assets/JS/ajaxfile.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script>
        $('document').ready(function() {
            $('#closeMessagesBtn').click(function () {
                $('#messageBoard').fadeOut('fast');
            });

            $('#openMessaging').click(function() {
                $('#messageBoard').fadeIn('fast');
            })
        });
    </script>
</body>
</html>