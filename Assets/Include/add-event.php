
<?php
if(isset($_POST['title']) && isset($_POST['eventdsc'])) {
    
    $title = $_POST['title'];
    $event = $_POST['eventdsc'];
        
    if(isset($_FILES['event_img']['name'])) {

        $event_image = $_FILES['event_img']['name'];
        $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

        $new_filename = $imgfile;

        $type = $_FILES['event_img']['type'];
        $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

        $size = $_FILES['event_img']['size'];
        $max_size = 20971520;

        $tmp_name = $_FILES['event_img']['tmp_name'];
        image_fix_orientation($tmp_name);

        if(!empty($title) && !empty($event) && !empty($event_image)) {


            if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {

                $location = 'Assets/Media/Uploads/';

                if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                    $add_event = "INSERT INTO `events` VALUES ('','".mysqli_real_escape_string($con, $title)."', '".mysqli_real_escape_string($con, $event)."', '".mysqli_real_escape_string($con, $new_filename)."', Now())";

                    if($add_query = mysqli_query($con, $add_event)) {

                        echo '<meta http-equiv="refresh" content="1">';

                    } else {
                        echo '<p> Failed to add event. </p>';
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
    } else {
        echo 'not set';
    }
    
}

?>
   

<div class="binder">
    <div class="events-form">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
            <div class="in-title">
                <input type="text" placeholder="Title" name="title">
            </div>
            <div class="in-event">
                <textarea name="eventdsc" id="" cols="30" rows="10" placeholder="Event Description"></textarea>
            </div>
            <div class="event-image">
                <label for="eventimg">
                    Select Image for event
                </label>
                <input type="file" id="eventimg" name="event_img" onchange="eventPrev(this);">
            </div>
            <div class="submit">
                <input type="submit" value="Post">
            </div>
        </form>
    </div>
    <div class="preview">
        <img src="http://via.placeholder.com/1920x1080" alt="" id="eventPrev">
    </div>
</div>