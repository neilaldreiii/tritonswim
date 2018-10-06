<?php
require_once 'core.inc.php';
require_once 'connect.inc.php';

if (isset($_POST['athlete_name']) && isset($_POST['intro']) && isset($_POST['category']) && isset($_POST['school']) && isset($_POST['nick_name'])) {

    $athlete = $_POST['athlete_name'];
    $nn = $_POST['nick_name'];
    $school = $_POST['school'];
    $intro = $_POST['intro'];
    $category = $_POST['category'];

    if(isset($_FILES['athlete_image']['name'])) {

        $athlete_image = $_FILES['athlete_image']['name'];
        $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

        $new_filename = $imgfile;

        $type = $_FILES['athlete_image']['type'];
        $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

        $size = $_FILES['athlete_image']['size'];
        $max_size = 20971520;

        $tmp_name = $_FILES['athlete_image']['tmp_name'];
        image_fix_orientation($tmp_name);

        if(!empty($athlete) && !empty($intro) && !empty($category) && !empty($athlete_image) && !empty($school) && !empty($nn)) {

            if (($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg' || $type=='image/jpg' && $size < $max_size) {

                $location = 'Assets/Media/Uploads/';

                if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                    if(isset($_FILES['second_dp']['name'])) {

                        $secondary = $_FILES['second_dp']['name'];
                        $sec_imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

                        $new_sec_filename = $sec_imgfile;

                        $sec_type = $_FILES['second_dp']['type'];
                        $sec_extension = strtolower(substr($new_sec_filename, strpos($new_sec_filename,'.') + 1));

                        $sec_size = $_FILES['second_dp']['size'];
                        $sec_max_size = 100000000;

                        $sec_tmp_name = $_FILES['second_dp']['tmp_name'];
                        image_fix_orientation($sec_tmp_name);

                        if(!empty($secondary)) {

                            if (($sec_extension == 'jpg' || $sec_extension == 'jpeg') && $sec_type == 'image/jpeg' || $sec_type=='image/jpg' && $sec_size < $sec_max_size) {

                                $sec_location = 'Assets/Media/Uploads/';

                                if (move_uploaded_file($sec_tmp_name, $sec_location.$new_sec_filename)) {

                                    $add = "INSERT INTO `athletes` VALUES('','".mysqli_real_escape_string($con, $athlete)."', '".mysqli_real_escape_string($con, $nn)."', '".mysqli_real_escape_string($con, $school)."', '".mysqli_real_escape_string($con, $intro)."', '".mysqli_real_escape_string($con, $category)."', '".mysqli_real_escape_string($con, $new_filename)."', '".mysqli_real_escape_string($con, $new_sec_filename)."')";


                                    if($add_query = mysqli_query($con, $add)) {

                                        echo '<meta http-equiv="refresh" content="1">';

                                    } else {
                                        echo '<p> Connection Error </p>';
                                    }
                                }
                            }
                        }
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
    <div class="athlete-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <div class="fullname">
                <input type="text" placeholder="Full Name" name="athlete_name">
            </div>
            <div class="nickname">
                <input type="text" placeholder="Nick Name" name="nick_name">
            </div>
            <div class="school">
                <input type="text" placeholder="School" name="school">
            </div>
            
            <div class="introduction">
                <textarea name="intro" placeholder="Introduction" id="" cols="30" rows="3"></textarea>
            </div>
            
            <div class="category">
                <select name="category" id="">
                    <option value="" disabled selected>Category</option>
                    <option value="Competitive">Competitive</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Learn">Learn to Swim</option>
                </select>
            </div>
            <div class="athlete-dp">
                <label for="athleteimg">Select Profile Picture</label>
                <input type="file" id="athleteimg" name="athlete_image" onchange="imgPreview(this);">
            </div>
            <div class="second-dp">
                <label for="seconddp">Select Secondary Picture</label>
                <input type="file" id="seconddp" name="second_dp">
            </div>
            <div class="submit">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
    <div class="preview">
        <img src="http://via.placeholder.com/200x220" id="athletePrev">
    </div>
</div>