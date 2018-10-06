<?php 

require_once 'Assets/Include/core.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Board Members</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
</head>
<style>
    body {
        padding: 0;
        margin: 0;
        background-image: url(Assets/Media/Images/tritonBg2.jpeg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<body>
    <?php include 'Assets/Include/nav.inc.php'; ?>
   
    <div class="container"> 
        <!-- Triton Board Members -->
        <div class="triton-board-members">
            <header class="header">
                <h1>Board Members</h1>
                <h2>The parent board and coaches want swimming to be fun, exciting, challenging and memorable. We want all swimmers to swim to the best of their ability and to feel good about what they are accomplishing. Please feel free to contact any of us with comments, questions, or concerns</h2>
            </header>
            <div class="content">
                <?php
                    $query = "SELECT * FROM `board` ORDER BY `member_id` DESC";
                    if($query_run = mysqli_query($con, $query)) {
                        
                        while($row = mysqli_fetch_array($query_run)) {
                            
                            $member_id = $row['member_id'];
                            $bm = $row['member_name'];
                            $pos = $row['position'];
                            $mem_img = $row['member_img'];
                        ?>
                            <div class="triton-member">
                                <div class="triton-member-dp">
                                    <img src="Assets/Media/Uploads/<?php echo $mem_img; ?>" alt="">
                                </div>
                                <header class="sub-header">
                                    <h1><?php echo $bm; ?></h1>
                                    <h2><?php echo $pos; ?></h2>
                                </header>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
            <footer class="sub-footer">
                <p>You may contact any board member or coach thru FB chat or SMS.</p>
            </footer>
        </div>
    </div>
    
    <div class="footer">
        <?php include 'Assets/Include/footer.inc.php'; ?>
    </div>
    <script src="Assets/JS/fontawesome-all.min.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script src="Assets/JS/script.js"></script>
</body>
</html>