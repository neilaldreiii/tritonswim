<div class="admin-slides">
    <div class="add-slides">
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="form-container">
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