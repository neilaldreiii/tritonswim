<?php
require_once 'core.inc.php';
require_once 'connect.inc.php';

if (isset($_POST['bm_name']) && isset($_POST['position'])) {

    $bm = $_POST['bm_name'];
    $pos = $_POST['position'];

    if(isset($_FILES['bm_image']['name'])) {

        $bm_image = $_FILES['bm_image']['name'];
        $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

        $new_filename = $imgfile;

        $type = $_FILES['bm_image']['type'];
        $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

        $size = $_FILES['bm_image']['size'];
        $max_size = 20971520;

        $tmp_name = $_FILES['bm_image']['tmp_name'];
        image_fix_orientation($tmp_name);

        if(!empty($bm) && !empty($pos) && !empty($bm_image)) {

            if (($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg' || $type=='image/jpg' && $size < $max_size) {

                $location = 'Assets/Media/Uploads/';

                if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                    $addbm = "INSERT INTO `board` VALUES('','".mysqli_real_escape_string($con, $bm)."', '".mysqli_real_escape_string($con, $pos)."','$new_filename')";

                    if($add_query = mysqli_query($con, $addbm)) {

                        echo '<meta http-equiv="refresh" content="1">';

                    } else {
                        echo '<script>alert("Error Uploading");</script>';
                    }

                } else {

                    echo '<script>alert("Cannot be moved");</script>';

                }
            } else {
                echo '<script>alert("Image Not Compatible");</script>';
            }
        }
    }
}
?>
<div class="binder">
    <div class="bm-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <div class="bm-name">
                <input type="text" placeholder="Board Member Full Name" name="bm_name">
            </div>
            <div class="bm-pos">
                <input type="text" placeholder="Position" name="position">
            </div>
            <div class="bm-img">
                <label for="bmimg">Choose Photo</label>
                <input type="file" id="bmimg" name="bm_image" onchange="bmPreview(this);">
            </div>
            <div class="submit">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</div>
<div class="preview">
    <img src="http://via.placeholder.com/575x125" id="bmPrev">
</div>