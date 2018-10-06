<?php
if(isset($_FILES['ad_image']['name'])) {

    $ad_image = $_FILES['ad_image']['name'];
    $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

    $new_filename = $imgfile;

    $type = $_FILES['ad_image']['type'];
    $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

    $size = $_FILES['ad_image']['size'];
    $max_size = 20971520;

    $tmp_name = $_FILES['ad_image']['tmp_name'];
    image_fix_orientation($tmp_name);

    if(!empty($ad_image)) {


        if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {

            $location = 'Assets/Media/Uploads/';

            if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                $add_product = "INSERT INTO `ads` VALUES ('','".mysqli_real_escape_string($con, $new_filename)."')";

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
}
?>
<div class="binder">
    <div class="ads-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <div class="ads-img">
                <label for="adsimg">Product Image</label>
                <input type="file" id="adsimg" name="ad_image" onchange="adsPreview(this);">
            </div>
            <div class="submit">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</div>
<div class="preview">
    <img src="http://via.placeholder.com/575x125" id="adPrev">
</div>