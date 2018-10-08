<?php 
require_once 'Assets/Include/core.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Athletes</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
</head>
<style>
    body {
        background-image: url(Assets/Media/Images/triton-register.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: local;
    }
</style>
<body>
    <?php
    include 'Assets/Include/nav.inc.php';
    ?>
    <div class="container">
        <div class="triton-athletes">
            <?php
            
            $query = "SELECT * FROM `athletes`";
            if($query_run = mysqli_query($con, $query)) {
                
                while($row = mysqli_fetch_array($query_run)) {
                    
                    $athleteID = $row['id'];
                    $nickname = ucwords($row['nickname']);
                    $dp = $row['athlete_profile_image'];
                    $cat = $row['category'];
                ?>
                <button value="<?php echo $athleteID; ?>" onclick="viewAthlete(this);">
                    <div class="athlete">
                        <div class="athlete-profile-image">
                            <img src="Assets/Media/Uploads/<?php echo $dp; ?>" alt="">
                        </div>
                        <div class="athlete-info">
                            <header class="sub-header">
                                <h1><?php echo ucwords($nickname); ?></h1>
                                <h2><?php echo ucwords($cat); ?></h2>
                            </header>
                        </div>
                    </div>
                </button>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <div id="athleteMax" class="view-athlete">
        <button id="closeAthlete"><i class="fas fa-times"></i></button>
        <div id="viewAthlete"></div>
    </div>
    <div class="footer">
        <?php include 'Assets/Include/footer.inc.php'; ?>
    </div>
    <script src="Assets/JS/fontawesome-all.min.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script src="Assets/JS/script.js"></script>
    <script src="Assets/JS/ajaxfile.js"></script>
</body>
</html>