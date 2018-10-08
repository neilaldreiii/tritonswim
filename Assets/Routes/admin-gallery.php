<div class="admin-gallery">
    <div class="add-gallery">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="form-header">
                    <h2>Gallery</h2>
                </div>
                <div class="input-field">
                    <label for="">Image</label>
                    <input type="file" name="image">
                </div>
                <div class="form-action"><input type="submit" value="Add"></div>
            </div>
        </form>
    </div>
    <?php

    if(isset($_FILES['image']['name'])) {
                    
        $gallery_img = $_FILES['image']['name'];
        $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

        $new_filename = $imgfile;

        $type = $_FILES['image']['type'];
        $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

        $size = $_FILES['image']['size'];
        $max_size = 20971520;

        $tmp_name = $_FILES['image']['tmp_name'];

        image_fix_orientation($tmp_name);

        if(!empty($gallery_img)) {

            if (($extension == 'jpg' || $extension == 'jpeg') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {
                $location = 'Assets/Media/Uploads/';

                if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                    $avatarupdate_query = "INSERT INTO `gallery` VALUES('','$new_filename', 'none')";

                    if ($avatarupdatequery_run = mysqli_query($con, $avatarupdate_query)) {

                        echo '<meta http-equiv="refresh" content="1">';

                    } else {
                        echo '<script>alert("Query Error");</script>';
                    }
                } else {
                    echo '<script>alert("Cannot be moved");</script>';
                }
            } else {
                echo '<script>alert("Image Not Compatible");</script>';
            }
        } else {
            echo '<script>alert("Empty");</script>';
        }
    }
    ?>
    <div class="admin-gallery-preview">
    <div id="galleryStatus"></div>
    <?php
        $query = "SELECT * FROM `gallery` ORDER BY `id` DESC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {
                
                $image_ID = $row['id'];
                $image = $row['image'];
                $caption = $row['image_caption'];
            ?>

                <div class="gallery-row">
                    <div class="gallery-info">
                        <div class="gallery-img">
                            <img src="Assets/Media/Uploads/<?php echo $image; ?>" alt="">
                        </div>
                    </div>
                    <div class="gallery-row-controls">
                        <button value="<?php echo $image_ID; ?>" onclick="deleteField(this, 'gallery', 'galleryStatus');" class="remove">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
</div>