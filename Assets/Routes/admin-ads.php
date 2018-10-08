<div class="admin-ads">
    <div class="add-ads">
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="form-container">
                <div class="form-header">
                    <h2>Advertisements</h2>
                </div>
                <div class="input-field">
                    <input type="file" name="ads">
                </div>
                <div class="form-action">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </div>
    <div class="admin-ads-preview">
    <?php 
        $query = "SELECT * FROM `ads` ORDER BY `ads_id` ASC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {

                $ads_ID = $row['ads_id'];
                $ad = $row['ad'];
            ?>
                <div class="ads-row">
                    <div class="ads-info">
                        <div class="ads-image">
                            <img src="Assets/Media/Uploads/<?php echo $ad; ?>" alt="" />
                        </div>
                    </div>
                    <div class="ads-row-controls">
                        <button class="remove" value="<?php echo $ads_ID; ?>" onclick="deleteAds(this);">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
</div>