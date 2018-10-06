<?php
include_once 'Assets/Include/core.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Events</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet"> 
</head>

<style>
    body {
        background-image: url(Assets/Media/Images/triton-event.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: local;
    }
    .container {
        width: 100%;
    }
</style>

<body>
    <?php
    include 'Assets/Include/nav.inc.php';
    ?>
    <div class="container">
        <div class="triton-events">
            <div class="triton-events-wrapper">
        <?php
            
            $query = "SELECT * FROM `events` ORDER BY `event_ID` DESC";
            if($query_run = mysqli_query($con, $query)) {
                
                while($row = mysqli_fetch_array($query_run)) {
                    
                    $eventID = $row['event_ID'];
                    $title = ucfirst($row['event_title']);
                    $info = ucfirst($row['event_description']);
                    $event_img = $row['event_image'];
                    $db_pd = strtotime($row['postdate']);
                    
                    $postdate = elapse($db_pd).' ago';
                ?>
                    <div class="event">
                        <div class="event-image">
                            <img src="Assets/Media/Uploads/<?php echo $event_img; ?>" alt="Triton <?php echo $title; ?>">
                        </div>
                        <div class="content">
                            <header class="sub-header">
                                <h1><?php echo $title; ?></h1>
                                <span>Posted <?php echo $postdate; ?></span>
                            </header>
                            <p><?php echo $info; ?></p>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
            </div>
            <div class="advertisement">
                <header class="sub-header">
                    <h1>Sponsors</h1>
                </header>
                <?php include 'Assets/Include/ads.inc.php'; ?>
            </div>
        
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