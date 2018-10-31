<?php 

require_once 'Assets/Include/core.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Gallery</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
</head>
<style>
    body {
        background-image: url(Assets/Media/Images/triton-guidelines.jpg);
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
        <div class="triton-gallery">
            <?php
            
            $query = "SELECT * FROM `gallery` ORDER BY `id` DESC";
            if($query_run = mysqli_query($con, $query)) {
                
                while($row = mysqli_fetch_array($query_run)) {
                    
                    $imgID = $row['id'];
                    $img = $row['image'];
                ?>
                <div class="image">
                    <button value="<?php echo $imgID; ?>" onclick="maximizeImg(this);">
                        <img src="Assets/Media/Uploads/<?php echo $img; ?>" alt="">
                    </button>
                </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="maximize" id="maximizeView">
        <button class="minimize" id="closeimg"><i class="fas fa-times"></i></button>
        <div class="image-container" id="imgView"></div>
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