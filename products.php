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
        <div class="triton-products">
        <?php
            $query = "SELECT * FROM `products` ORDER BY `product_id` DESC";
            if($query_run = mysqli_query($con, $query)) {
                while($row = mysqli_fetch_array($query_run)) {

                    $product_id = $row['product_id'];
                    $product_img = $row['product_image'];
                    $product_title = $row['product_title'];
                    $product_price = $row['product_price'];
                    
                ?>
                    <div class="product" id="productbtn">
                        <button value="<?php echo $product_id; ?>"  id="viewProduct" onClick="showProduct(this); return false;">
                            <img src="Assets/Media/Uploads/<?php echo $product_img; ?>" alt="">
                            <p><?php echo $product_title; ?> <span><?php echo 'Php'.$product_price; ?></span></p>
                        </button>
                    </div>
                <?php
                }
            }
        ?>
        </div>
    </div>    
    
    <div id="productsDisplay">
        <button id="closeproducts">&times;</button>
        <div id="mainproduct"></div>
    </div>
    <div class="footer">
        <?php include 'Assets/Include/footer.inc.php'; ?>
    </div>
    <script src="Assets/JS/fontawesome-all.min.js"></script>
    <script src="Assets/JS/ajaxfile.js"></script>
    <script src="Assets/JS/jquery.js"></script>
    <script src="Assets/JS/script.js"></script>
</body>
</html>