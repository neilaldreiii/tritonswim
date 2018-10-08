<div class="admin-athletes">
    <div class="add-athletes">
        <div class="form-header">
            <h2>Athletes</h2>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="input-field">
                    <input type="text" name="fullname" placeholder="Fullname" />
                </div>
                <div class="input-field">
                    <input type="text" name="nickname" placeholder="Nickname" />
                </div>
                <div class="input-field">
                    <input type="text" name="school" placeholder="School" />
                </div>
                <div class="input-field" id="introduce">
                    <textarea name="intro" placeholder="Introduction" id="intro" cols="30" rows="10"></textarea>
                </div>
                <div class="input-field">
                    <select name="category" id="category">
                        <option value="" disabled>Category</option>
                        <option value="Competitive">Competitive</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Learn">Learn to Swim</option>
                    </select>
                </div>
                <div class="input-field" id="prime">
                    <label for="">Primary</label>
                    <input type="file" name="primary" />
                </div>
                <div class="input-field">
                    <label for="">Secondary</label>
                    <input type="file" name="secondary" />
                </div>
                <div class="form-action">
                    <input type="submit" value="Add">
                </div>
            </div>
        </form>
    </div>
    <?php 

        if (isset($_POST['fullname'])
         && isset($_POST['intro']) 
         && isset($_POST['category']) 
         && isset($_POST['school']) 
         && isset($_POST['nickname'])) {

            $athlete = $_POST['fullname'];
            $nn = $_POST['nickname'];
            $school = $_POST['school'];
            $intro = $_POST['intro'];
            $category = $_POST['category'];

            if(isset($_FILES['primary']['name'])) {

                $primary = $_FILES['primary']['name'];
                $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

                $new_filename = $imgfile;

                $type = $_FILES['primary']['type'];
                $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

                $size = $_FILES['primary']['size'];
                $max_size = 20971520;

                $tmp_name = $_FILES['primary']['tmp_name'];
                image_fix_orientation($tmp_name);

                if(!empty($athlete) && !empty($intro) && !empty($category) && !empty($primary) && !empty($school) && !empty($nn)) {

                    if (($extension == 'jpg' || $extension == 'jpeg') && $type == 'image/jpeg' || $type=='image/jpg' && $size < $max_size) {

                        $location = 'Assets/Media/Uploads/';

                        if (move_uploaded_file($tmp_name, $location.$new_filename)) {

                            if(isset($_FILES['secondary']['name'])) {

                                $secondary = $_FILES['secondary']['name'];
                                $sec_imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';

                                $new_sec_filename = $sec_imgfile;

                                $sec_type = $_FILES['secondary']['type'];
                                $sec_extension = strtolower(substr($new_sec_filename, strpos($new_sec_filename,'.') + 1));

                                $sec_size = $_FILES['secondary']['size'];
                                $sec_max_size = 100000000;

                                $sec_tmp_name = $_FILES['secondary']['tmp_name'];
                                image_fix_orientation($sec_tmp_name);

                                if(!empty($secondary)) {

                                    if (($sec_extension == 'jpg' || $sec_extension == 'jpeg') && $sec_type == 'image/jpeg' || $sec_type=='image/jpg' && $sec_size < $sec_max_size) {

                                        $sec_location = 'Assets/Media/Uploads/';

                                        if (move_uploaded_file($sec_tmp_name, $sec_location.$new_sec_filename)) {

                                            $add = "INSERT INTO `athletes` VALUES('','".mysqli_real_escape_string($con, $athlete)."', '".mysqli_real_escape_string($con, $nn)."', '".mysqli_real_escape_string($con, $school)."', '".mysqli_real_escape_string($con, $intro)."', '".mysqli_real_escape_string($con, $category)."', '".mysqli_real_escape_string($con, $new_filename)."', '".mysqli_real_escape_string($con, $new_sec_filename)."')";


                                            if($add_query = mysqli_query($con, $add)) {

                                                echo '<meta http-equiv="refresh" content="1">';

                                            } else {
                                                echo '<script>alert("Database Error: 113");</script>';
                                            }
                                        } else {
                                            echo '<script>alert("Upload Error: 116");</script>';
                                        }
                                    } else {
                                        echo '<script>alert("Type Error: 119 (Image too Big or Not in a jpg or jpeg format)");</script>';
                                    }
                                } else {
                                    echo '<script>alert("Image not Found: 122");</script>';
                                }
                            } else {
                                echo '<script>alert("All fields are Required");</script>';
                            }
                        } else {
                            echo '<script>alert("Upload Error: 128");</script>';
                        }
                    } else {
                        echo '<script>alert("Type Error: 131 (Image too Big or Not in a jpg or jpeg format)");</script>';
                    }
                }
            }
        }

    ?>
    <div class="admin-athletes-preview">
    <?php
        $query = "SELECT * FROM `athletes` ORDER BY `category` ASC";
        if($query_run = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($query_run)) {

                $athlete_ID = $row['athlete_ID'];
                $fullname = $row['fullname'];
                $nickname = $row['nickname'];
                $school = $row['school'];
                $intro = $row['introduction'];
                $category = $row['category'];
                $pp = $row['athlete_profile_image'];
                $sp = $row['secondary'];
            ?>
                <div class="athlete-row">
                    <div class="athlete-info">
                        <div class="profile-image">
                            <div class="main-pp">
                                <p>Primary</p>
                                <img src="Assets/Media/Uploads/<?php echo $pp; ?>" alt=""/>
                            </div>
                            <div class="secondary-pp">
                                <p>Secondary</p>
                                <img src="Assets/Media/Uploads/<?php echo $sp; ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="athlete-intro-cat">
                        <div class="athlete-wrap">
                            <p><?php echo $fullname; ?></p>
                            <p><?php echo $nickname; ?></p>
                            <p><?php echo $school; ?></p>
                            <p><?php echo $intro; ?></p>
                            <p><?php echo $category; ?></p>
                        </div>
                    </div>
                    <div class="athlete-row-controls">
                        <button value="<?php echo $athlete_ID; ?>" onclick="deleteAthlete(this);" class="remove">Remove</button>
                    </div>
                </div>
            <?php
            }
        }
    ?>
    </div>
</div>