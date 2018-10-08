<div class="admin-bm">
    <div class="add-bm">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="form-header">
                    <h2>Board Members</h2>
                </div>
                <div class="input-field">
                    <input type="text" name="fullName" placeholder="Board Member Full Name">
                </div>
                <div class="input-field">
                    <input type="text" name="position" placeholder="Position">
                </div>
                <div class="input-field">
                    <label for="">Board Member Photo</label>
                    <input type="file" name="bmImage">
                </div>
                <div class="form-action">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </div>
    <?php

    if (isset($_POST['fullName']) && isset($_POST['position'])) {

        $bm = $_POST['fullName'];
        $pos = $_POST['position'];

        if(isset($_FILES['bmImage']['name'])) {

            $bmImage = $_FILES['bmImage']['name'];
            $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

            $new_filename = $imgfile;

            $type = $_FILES['bmImage']['type'];
            $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

            $size = $_FILES['bmImage']['size'];
            $max_size = 20971520;

            $tmp_name = $_FILES['bmImage']['tmp_name'];
            image_fix_orientation($tmp_name);

            if(!empty($bm) && !empty($pos) && !empty($bmImage)) {

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
    <div class="admin-bm-preview">
    <div id="bmStatus"></div>
        <?php
            $query = "SELECT * FROM `board` ORDER BY `position` DESC";
            if($query_run = mysqli_query($con, $query)) {

                while($row = mysqli_fetch_array($query_run)) {

                    $member_ID = $row['id'];
                    $fullname = $row['member_name'];
                    $position = $row['position'];
                    $pp = $row['member_img'];
                ?>

                    <div class="board-row">
                        <div class="board-info">
                            <div class="board-pp">
                                <img src="Assets/Media/Uploads/<?php echo $pp; ?>" alt="">
                            </div>
                        </div>
                        <div class="board-intro">
                            <div class="board-wrap">
                                <p><?php echo $fullname; ?></p>
                                <p><?php echo $position; ?></p>
                            </div>
                        </div>
                        <div class="board-row-controls">
                            <button value="<?php echo $member_ID; ?>" onclick="deleteField(this, 'board', 'bmStatus');" class="remove">Remove</button>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
</div>