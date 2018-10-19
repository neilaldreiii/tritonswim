<?php 

require_once 'Assets/Include/core.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Triton | Products</title>
    <link rel="icon" type="image/ico" href="Assets/Media/Images/logo.png">
    <link rel="stylesheet" href="Assets/Css/default.css">
    <link rel="stylesheet" href="Assets/Css/layout1.css">
    <link rel="stylesheet" href="Assets/Css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
</head>
<style>
    body {
        background-image: url(Assets/Media/Images/productsBG.jpeg);
        background-position: center;
        background-size: cover;
    }
</style>
<body>
    
    <?php include 'Assets/Include/nav.inc.php'; ?>
    
    <div class="container">
        <div class="product-slide">
        <?php
            require_once 'Assets/Include/connect.inc.php';
            $query = "SELECT * FROM `products` ORDER BY `id` DESC";
            if($query_run = mysqli_query($con, $query)) {
                $i = 0;
                while($row = mysqli_fetch_array($query_run)) {
                    $i++;
                    $product_id = $row['id'];
                    $product_img = $row['product_image'];
                    $product_title = $row['product_title'];
                    $product_price = $row['product_price'];
                ?>
                <div class="product-slide-item">
                    <div class="product-title">
                        <h1><?php echo $product_title; ?></h1>
                        <p><?php echo 'php '.$product_price; ?></p>
                    </div>
                    <img src="Assets/Media/Uploads/<?php echo $product_img; ?>" alt="">
                    <div class="product-order-form">
                        <form action="<?php echo $current_file; ?>" onsubmit="return false;">
                            <div class="product-form-container">
                                <div class="input-field">
                                    <label for="">Fullname</label>
                                    <input type="text" id="fullname<?php echo $i; ?>">
                                </div>
                                <div class="input-field address">
                                    <label for="">Address</label>
                                    <input type="text" id="address<?php echo $i; ?>">
                                </div>
                                <div class="input-field">
                                    <label for="">Size</label>
                                    <input type="text" id="size<?php echo $i; ?>">
                                </div>
                                <div class="form-action">
                                    <button value="<?php echo $product_id; ?>" onclick="order(this, 'fullname<?php echo $i; ?>', 'address<?php echo $i; ?>', 'size<?php echo $i; ?>');">Order now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                }
            } 
        ?>
            <button class="product-preview" onclick="plusDivs(-1)">&#10094;</button>
            <button class="product-next" onclick="plusDivs(1)">&#10095;</button>
            <div id="productOrderPreview"></div>
        </div>
    </div>    
    <div class="footer">
        <?php include 'Assets/Include/footer.inc.php'; ?>
    </div>
    <script src="Assets/JS/fontawesome-all.min.js"></script>
    <script src="Assets/JS/ajaxfile.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script src="Assets/JS/script.js"></script>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
            showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("product-slide-item");
            if (n > x.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
        }
    </script>
</body>
</html>