<div class="admin-gallery">
    <div class="add-gallery">
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="form-container">
                <div class="form-header">
                    <h2>Gallery</h2>
                </div>
                <div class="input-field">
                    <label for="">Image</label>
                    <input type="file" name="image">
                </div>
                <div class="input-field">
                    <input type="text" name="caption" placeholder="caption">
                </div>
                <div class="form-action"><input type="submit" value="Add"></div>
            </div>
        </form>
    </div>
    <div class="admin-gallery-preview">
    <?php
        $query = "SELECT * FROM `gallery` ORDER BY `image_ID` DESC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {
                
                $image_ID = $row['image_ID'];
                $image = $row['image'];
                $caption = $row['image_caption'];
            ?>

                <div class="gallery-row">
                    <div class="gallery-info">
                        <div class="gallery-img">
                            <img src="Assets/Media/Uploads/<?php echo $image; ?>" alt="">
                        </div>
                        <div class="gallery-intro">
                            <p><?php echo $caption; ?></p>
                        </div>
                        <div class="gallery-row-action">
                            <button value="<?php echo $image_ID; ?>" onclick="deleteImg(this);" class="remove">Remove</button>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
    ?>
    </div>
</div>