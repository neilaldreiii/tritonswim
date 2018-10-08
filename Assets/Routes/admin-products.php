<div class="admin-products">
    <div class="add-products">
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="form-container">
                <div class="input-field"><input type="text" name="title" placeholder="Product Title"></div>
                <div class="input-field"><input type="text" name="price" placeholder="Product Price"></div>
                <div class="input-field">
                    <label for="">Product Image: </label>
                    <input type="file" name="image">
                </div>
                <div class="form-action">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </div>
    <div class="admin-products-preview">
    <?php 
        $query = "SELECT * FROM `products` ORDER BY `product_title` ASC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {

                $product_ID = $row['product_id'];
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
                        <button class="remove" value="<?php echo $product_ID; ?>" onclick="deleteProduct(this);">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
</div>