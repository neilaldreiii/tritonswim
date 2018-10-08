<div class="admin-slides">
    <div class="add-slides">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="form-header">
                    <h2>Banner Slides</h2>
                </div>
                <div class="input-field">
                    <input type="file" name="slide">
                </div>
                <div class="input-field">
                    <input type="text" name="caption" placeholder="Slide Caption">
                </div>
                <div class="form-action">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </div>
    <?php 
    if (isset($_FILES['slide']['name'])) {
        
        $slide = $_FILES['slide']['name'];
        $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

        $new_filename = $imgfile;

        $type = $_FILES['slide']['type'];
        $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

        $size = $_FILES['slide']['size'];
        $max_size = 20971520;

        $tmp_name = $_FILES['slide']['tmp_name'];
        
        image_fix_orientation($tmp_name);
        
        if(!empty($slide)) {
            if (($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg' || $type=='image/jpg' && $size < $max_size) {

                $location = 'Assets/Media/Uploads/';

                if (move_uploaded_file($tmp_name, $location.$new_filename)) {
                    
                    if(isset($_POST['caption'])) {
                        
                        echo $caption = $_POST['caption'];
                        
                        if(!empty($caption)) {
                            $add = "INSERT INTO `slides` VALUES('', '$new_filename', '$caption')";
                    
                            if($add_query = mysqli_query($con, $add)) {

                                echo '<meta http-equiv="refresh" content="1">';

                            } else {
                                echo '<script>alert("Database Error: 59");</script>';
                            }
                        } else {
                            echo '<script>alert("Empty: 064");</script>';
                        }
                    }
                } else {
                    echo '<script>alert("Upload Error: 064");</script>';
                }
            } else {
                echo '<script>alert("Type Error: 068");</script>';
            }
        } else {
            echo '<script>alert("Image Not Found: 068");</script>';
        }
    }

    ?>
    <div class="admin-slides-preview">
    <?php 
        $query = "SELECT * FROM `slides` ORDER BY `slide_id` ASC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {

                $slide_ID = $row['slide_id'];
                $slide = $row['slide'];
                $caption = $row['slide_caption'];
            ?>
                <div class="slide-row">
                    <div class="slide-info">
                        <div class="slide-image">
                            <img src="Assets/Media/Uploads/<?php echo $slide; ?>" alt="" />
                        </div>
                    </div>
                    <div class="slide-intro">
                        <p class="title"><?php echo $caption; ?></p>
                    </div>
                    <div class="slide-row-controls">
                        <button class="remove" value="<?php echo $slide_ID; ?>" onclick="deleteSlide(this);">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
</div>