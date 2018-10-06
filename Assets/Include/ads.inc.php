<div class="slideshow">
<?php

$ads = "SELECT * FROM `ads` ORDER BY `ads_id` DESC";
if($ads_query = mysqli_query($con, $ads)) {
    while($ads_row = mysqli_fetch_array($ads_query)) {

        $ads_id = $ads_row['ads_id'];
        $ad = $ads_row['ad'];
    ?>
        <div class="slide fade">
            <img src="Assets/Media/Uploads/<?php echo $ad; ?>" alt="" class="slide-image">
        </div>
    <?php
    }
}
?>
</div>