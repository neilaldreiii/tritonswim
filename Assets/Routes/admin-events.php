<div class="admin-events">
    <div class="add-events">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="form-header">
                    <h2>Events</h2>
                </div>
                <div class="input-field">
                    <input type="text" name="title" placeholder="Event Title" />
                </div>
                <div class="input-field">
                    <input type="text" name="description" placeholder="Event Description" />
                </div>
                <div class="input-field">
                    <label for="">Event Banner: </label>
                    <input type="file" name="eventsImage" />
                </div>
                <div class="form-action">
                    <input type="submit" value="Add" />
                </div>
            </div>
        </form>
    </div>
    <?php

    if(isset($_POST['title']) && isset($_POST['description'])) {
        
        $title = $_POST['title'];
        $event = $_POST['description'];
            
        if(isset($_FILES['eventsImage']['name'])) {

            $event_image = $_FILES['eventsImage']['name'];
            $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

            $new_filename = $imgfile;

            $type = $_FILES['eventsImage']['type'];
            $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

            $size = $_FILES['eventsImage']['size'];
            $max_size = 20971520;

            $tmp_name = $_FILES['eventsImage']['tmp_name'];
            image_fix_orientation($tmp_name);

            if(!empty($title) && !empty($event) && !empty($event_image)) {


                if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {

                    $location = 'Assets/Media/Uploads/';

                    if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                        $add_event = "INSERT INTO `events` VALUES ('','".mysqli_real_escape_string($con, $title)."', '".mysqli_real_escape_string($con, $event)."', '".mysqli_real_escape_string($con, $new_filename)."', Now())";

                        if($add_query = mysqli_query($con, $add_event)) {

                            echo '<meta http-equiv="refresh" content="1">';

                        } else {
                            echo '<script>alert("Database Error: 062");</script>';
                        }

                    } else {

                        echo '<script>alert("Upload Error: 067);</script>';

                    }
                } else {

                    echo '<script>alert("Type Error: 072");</script>';

                }
            } else {
                echo '<script>alert("All fields are required");</script>';
            }
        }
    }

    ?>
    <div class="admin-events-preview">
    <div id="eventStatus"></div>
    <?php
        $query = "SELECT * FROM `events` ORDER BY `postdate` DESC";
        if($query_run = mysqli_query($con, $query)) {
            
            while($row = mysqli_fetch_array($query_run)) {
                $event_ID = $row['id'];
                $title = $row['event_title'];
                $descr = $row['event_description'];
                $img = $row['event_image'];
                $db_stamp = strtotime($row['postdate']);
                $timestamp = date("M d Y  H:iA ", $db_stamp);

                ?>
                <div class="events-row">
                    <div class="event-info">
                        <img src="Assets/Media/Uploads/<?php echo $img; ?>" alt="" />
                    </div>
                    <div class="event-intro">
                        <p class="title"><?php echo ucwords($title); ?></p>
                        <p class="description"><?php echo $descr; ?></p>
                        <p class="timestamp"><?php echo $timestamp;  ?></p>
                    </div>
                    <div class="events-row-controls">
                        <button value="<?php echo $event_ID; ?>" onclick="deleteField(this, 'events', 'eventStatus');" class="remove">Delete</button>
                    </div>
                </div>
            <?php

            }
        }
    ?>
    </div>
</div>