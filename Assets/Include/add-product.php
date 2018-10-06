<?php
if(isset($_POST['pro_title']) && isset($_POST['price'])) {
    
    $pro_title = $_POST['pro_title'];
    $price = $_POST['price'];
        
    if(isset($_FILES['product_image']['name'])) {

        $product_image = $_FILES['product_image']['name'];
        $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

        $new_filename = $imgfile;

        $type = $_FILES['product_image']['type'];
        $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

        $size = $_FILES['product_image']['size'];
        $max_size = 20971520;

        $tmp_name = $_FILES['product_image']['tmp_name'];
        image_fix_orientation($tmp_name);

        if(!empty($pro_title) && !empty($price) && !empty($product_image)) {


            if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {

                $location = 'Assets/Media/Uploads/';

                if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                    $add_product = "INSERT INTO `products` VALUES ('','".mysqli_real_escape_string($con, $new_filename)."', '".mysqli_real_escape_string($con, $pro_title)."', '".mysqli_real_escape_string($con, $price)."')";
                    
                    if($add_query = mysqli_query($con, $add_product)) {

                        echo '<meta http-equiv="refresh" content="1">';

                    } else {
                        echo '<p> Failed to add product. </p>';
                    }

                } else {

                    echo '<script>alert("Cannot be moved");</script>';

                }
            } else {

                echo '<script>alert("Image Not Compatible");</script>';

            }
        } else {
            echo 'empty';
        }
    } else {
        echo 'not set';
    }
    
}
?>
<div class="binder">
    <div class="prod-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <div class="product-title">
                <input type="text" name="pro_title" placeholder="Product Name">
            </div>
            <div class="product-price">
                <input type="text" placeholder="Price" name="price">
            </div>
            <div class="product-img">
                <label for="productimg">Product Image</label>
                <input type="file" id="productimg" name="product_image" onchange="productPreview(this);">
            </div>
            <div class="submit">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
    <div class="preview">
        <img src="http://via.placeholder.com/200x220" id="prodPrev">
    </div>
</div>