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

                            header("Location: admin.php");

                        }
                    }
                }
            }
        }
    }
}

?>

<div class="binder">
    <div class="slides-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <div class="slide">
                <label for="slides">Add Slide</label>
                <input type="file" id="slides" name="slide">
            </div>
            <div class="slide-caption">
                <textarea name="caption" placeholder="Caption" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</div>