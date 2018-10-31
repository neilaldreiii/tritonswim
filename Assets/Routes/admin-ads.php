<div class="admin-ads">
    <div class="add-ads">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="form-header">
                    <h2>Advertisements</h2>
                </div>
                <div class="input-field">
                    <label for="">Advertisement Image: </label>
                    <input type="file" name="ads" />
                </div>
                <div class="form-action">
                    <input type="submit" value="Add" />
                </div>
            </div>
        </form>
    </div>

    <?php
        if(isset($_FILES['ads']['name'])) {

            $ads = $_FILES['ads']['name'];
            $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';
        
            $new_filename = $imgfile;
        
            $type = $_FILES['ads']['type'];
            $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));
        
            $size = $_FILES['ads']['size'];
            $max_size = 20971520;
        
            $tmp_name = $_FILES['ads']['tmp_name'];
            image_fix_orientation($tmp_name);
        
            if(!empty($ads)) {
        
                if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {
        
                    $location = 'Assets/Media/Uploads/';
        
                    if (move_uploaded_file($tmp_name, $location.$new_filename)) {
        
                        $add_product = "INSERT INTO `ads` VALUES ('','".mysqli_real_escape_string($con, $new_filename)."')";
        
                        if($add_query = mysqli_query($con, $add_product)) {
        
                            echo '<meta http-equiv="refresh" content="1">';
        
                        } else {
                            echo '<script>alert("Database Error: 051");</script>';
                        }
        
                    } else {
        
                        echo '<script>alert("Upload Error: 056");</script>';
        
                    }
                } else {
        
                    echo '<script>alert("Image not Compatible(size too big or not in a JPG or JPEG format): 061");</script>';
        
                }
            } else {
                echo '<script>Alert("Image not found");</script>';
            }
        }
        ?>
    <div class="admin-ads-preview">
    <div id="adStatus"></div>
    <?php 
        $query = "SELECT * FROM `ads` ORDER BY `id` DESC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {

                $ads_ID = $row['id'];
                $ad = $row['ad'];
            ?>
                <div class="ads-row">
                    <div class="ads-info">
                        <div class="ads-image">
                            <img src="Assets/Media/Uploads/<?php echo $ad; ?>" alt="" />
                        </div>
                    </div>
                    <div class="ads-row-controls">
                        <button class="remove" value="<?php echo $ads_ID; ?>" onclick="deleteField(this, 'ads', 'adStatus');">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
</div>