<?php

if(isset($_FILES['galleryImg']['name'])) {
                
    $gallery_img = $_FILES['galleryImg']['name'];
    $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

    $new_filename = $imgfile;

    $type = $_FILES['galleryImg']['type'];
    $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

    $size = $_FILES['galleryImg']['size'];
    $max_size = 20971520;

    $tmp_name = $_FILES['galleryImg']['tmp_name'];

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
<div class="binder">
    <div class="gallery-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <label for="galleryimg">Select Gallery Image</label>
            <input type="file" id="galleryimg" name="galleryImg" onchange="galleryPrev(this);">
            <input type="submit" value="Upload">
        </form>
    </div>
    <div class="preview">
        <img src="http://via.placeholder.com/200x220" id="galleryPrev">
    </div>
</div>