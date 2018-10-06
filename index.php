<?php 
require_once 'Assets/Include/core.inc.php';
require_once 'Assets/Include/connect.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/bg-images.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<style>
    body {
    }
    .header h1,  .article p, .header h2, .article span{
        color: #444!important;
    }
    .triton-intro .header h1, .triton-intro .article p {
        color: #fafafa!important;
    }
    .container {
        margin: 50px auto;
    }
</style>
<body>
    <?php include 'Assets/Include/nav.inc.php'; ?>
    
    <div class="triton-banner">
        <div class="triton-slideshow">
            
            <?php
            $query = "SELECT * FROM `slides` ORDER BY `slide_id`";
            if($query_run = mysqli_query($con, $query)) {

                while($row = mysqli_fetch_array($query_run)) {

                    $img = $row['slide'];
                    $caption = $row['slide_caption'];
            ?>
                <div class="triton-slide-img">
                    <div class="triton-slide fade">
                        <img src="Assets/Media/Uploads/<?php echo $img; ?>" alt="">
                        <div class="triton-slide-caption">
                            <p><?php echo $caption; ?></p>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>
            
        </div>
        <div class="triton-intro">
            <header class="header">
                <h1>Welcome to the Naga Triton Swimming Club</h1>
            </header>
            <article class="article">
                <p>
                    By joining Naga City swimming team and TRITON you are becoming a member of the city’s organized youth sport. Your child is getting involved in what can truly be a “lifetime sport,” and hopefully, will make lifetime friends.
                </p>
                <p>
                    TRITON is a private swimming team in Naga City which started in May 2017.
                </p>
                <p>
                    A board of parent volunteers runs the team. Board members are selected in May or June for the following swim year.
                </p>
                <div class="slide-action">
                    <a href="register.php">Join Triton Swimclub now</a>
                </div>
            </article>
        </div>
    </div>
    <div class="container"> <!-- container set to 80% on desktop -->
        <div class="triton-mission">
            <header class="header">
                <h1>TRITON’s Mission</h1>
            </header>
            <article class="article">
                <p>
                    The Naga Triton Swimming Club is a competitive swim team emphasizing both individual and club excellence in a positive, family oriented atmosphere with the goal of producing lifelong HAPPY swimmers.
                </p>
            </article>
        </div>
        <div class="triton-code">
            <header class="header">
                <h1>TRITON Code of Conduct</h1>
                <h2>As a swimmer, I understand that I must follow these rules to stay in good standing</h2>
            </header>
            <article class="article">
                <ul>
                    <li>
                        <p>
                            <span class="up">R - </span> <span class="low">RESPECT -</span> Respect the coaches, the sport, teammates and yourself. I will respect the coaches’ direction and authority. I will respect the rules and regulations of the sport. I will respect my teammates. I will show self-respect and not use abusive language.
                        </p>
                    </li>
                    <li>
                        <p>
                            <span class="up">A -</span> <span class="low">ATTITUDE -</span> I will try to keep a positive attitude. I will think positively and approach even the most difficult tasks with a good and forward thinking attitude.
                        </p>
                    </li>
                    <li>
                        <p>
                            <span class="up">C - </span> <span class="low">CONDUCT - </span> I will demonstrate good sportsmanship before, during and after practice and swim meets. I will be courteous to any official, coach or swimmer from another team. I will be modest when successful and be gracious in defeat. I will refrain from the use of drugs, tobacco, alcohol and abusive language.
                        </p>
                    </li>
                    <li>
                        <p>
                            <span class="up">E -</span> <span class="low"> ENCOURAGING - </span> I will encourage my teammates and promote good sportsmanship. By displaying encouraging actions, I will be helping myself and my teammates achieve our goal of excellence.
                        </p>
                    </li>
                    <li>
                        <p>
                            <span class="up">D - </span> <span class="low">DISCIPLINE -</span> I will be responsible for my behavior. In ensuring a positive learning environment at practice and at swim meets, I understand the levels of discipline.
                        </p>
                    </li>
                </ul>
            </article>
        </div>
    </div>
    
    <div class="footer">
        <?php include 'Assets/Include/footer.inc.php'; ?>
    </div>
    <script src="Assets/JS/fontawesome-all.min.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script src="Assets/JS/script.js"></script>
<script>
var trslideIndex = 0;
trshowSlides();

function trshowSlides() {
    
    var x;
    
    
    var trslides = document.getElementsByClassName("triton-slide");
    
    for (x = 0; x < trslides.length; x++) {
        trslides[x].style.display = "none";
    }
    
    trslideIndex++;
    
    if (trslideIndex > trslides.length) {trslideIndex = 1}
    
    trslides[trslideIndex-1].style.display = "block";
    
    setTimeout(trshowSlides, 3000);
}
</script>
</body>
</html>