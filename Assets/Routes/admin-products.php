<div class="admin-products">
    <div class="add-products">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="form-header">
                    <h2>Products</h2>
                </div>
                <div class="input-field"><input type="text" name="title" placeholder="Product Title"></div>
                <div class="input-field"><input type="text" name="price" placeholder="Product Price"></div>
                <div class="input-field">
                    <label for="">Product Image: </label>
                    <input type="file" name="productImg">
                </div>
                <div class="form-action">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </div>
    <?php

    if(isset($_POST['title']) && isset($_POST['price'])) {
        
        $title = $_POST['title'];
        $price = $_POST['price'];
            
        if(isset($_FILES['productImg']['name'])) {

            $productImg = $_FILES['productImg']['name'];
            $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

            $new_filename = $imgfile;

            $type = $_FILES['productImg']['type'];
            $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

            $size = $_FILES['productImg']['size'];
            $max_size = 20971520;

            $tmp_name = $_FILES['productImg']['tmp_name'];
            image_fix_orientation($tmp_name);

            if(!empty($title) && !empty($price) && !empty($productImg)) {


                if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {

                    $location = 'Assets/Media/Uploads/';

                    if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                        $add_product = "INSERT INTO `products` VALUES ('','".mysqli_real_escape_string($con, $new_filename)."', '".mysqli_real_escape_string($con, $title)."', '".mysqli_real_escape_string($con, $price)."')";
                        
                        if($add_query = mysqli_query($con, $add_product)) {

                            echo '<meta http-equiv="refresh" content="1">';

                        } else {
                            echo '<script>alert("Database Error: 59");</script>';
                        }

                    } else {

                        echo '<script>alert("Upload Error: 064");</script>';

                    }
                } else {
                    echo '<script>alert("Type Error: 068");</script>';

                }
            } else {
                echo 'empty';
            }
        } else {
            echo 'not set';
        }
        
    }
    ?>
    <div class="admin-products-preview">
        <div id="productStatus"></div>
        <header class="header">
            <h1>Products</h1>
        </header>
    <?php 
        $query = "SELECT * FROM `products` ORDER BY `id` DESC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {

                $product_ID = $row['id'];
                $image = $row['product_image'];
                $title = $row['product_title'];
                $price = $row['product_price'];
            ?>
                <div class="product-row">
                    <div class="product-info">
                        <div class="product-image">
                            <img src="Assets/Media/Uploads/<?php echo $image; ?>" alt="" />
                        </div>
                    </div>
                    <div class="product-intro">
                        <p class="title"><?php echo $title; ?></p>
                        <p class="price"><?php echo $price; ?></p>
                    </div>
                    <div class="product-row-controls">
                        <button class="remove" value="<?php echo $product_ID; ?>" onclick="deleteField(this, 'products', 'productStatus');">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
    <div class="admin-orders">
        <div id="orderStatus"></div>
        <header class="header">
            <h1>Orders</h1>
        </header>
        <?php 
            $orders = "SELECT * FROM `users_order` ORDER BY `id` DESC";
            if($order_query = mysqli_query($con, $orders)) {
                while($order_row = mysqli_fetch_array($order_query)) {
                    
                    $orderID = $order_row['id'];
                    $fname = $order_row['fullname'];
                    $address = $order_row['address'];
                    $size = $order_row['size'];
                    $productID = $order_row['productID'];
                    $product = $order_row['product'];
                    $pro_price = $order_row['price'];
                    $order_stamp = strtotime($order_row['stamp']);
                    $timestamp  = date("M / d D / Y H:i A", $order_stamp);

                    $product_img = "SELECT `product_image` from `products` WHERE `id`='$productID'";
                    if($pimg_query = mysqli_query($con, $product_img)) {
                        $pi_row = mysqli_fetch_array($pimg_query);
                        $primg = $pi_row['product_image'];
                    }
                ?>
                    <div class="order-row">
                        <div class="order-info">
                            <div class="order-image">
                                <img src="Assets/Media/Uploads/<?php echo $primg; ?>" alt="" />
                            </div>
                        </div>
                        <div class="order-intro">
                            <p class="title"><?php echo $product; ?></p>
                            <p class="price"><?php echo $pro_price; ?></p>
                            <p><?php echo $fname; ?></p>
                            <p><?php echo $address; ?></p>
                            <p><?php echo $size; ?></p>
                            <p class="timestamp"><?php echo $timestamp; ?></p>
                        </div>
                        <div class="order-row-controls">
                            <button class="remove" value="<?php echo $orderID; ?>" onclick="deleteField(this, 'users_order', 'orderStatus');">Remove</button>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
</div>