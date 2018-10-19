<?php 

if (loggedin()) {
    $userID = getuserfield('id');
    $username = getuserfield('username');
    $fname = getuserfield('firstname');
    $lname = getuserfield('lastname');
    $avatar = getuserfield('avatar');
}
?>

<nav class="lobby-navigation">
    <div class="lobby-navigation-wrap">
        <div class="lobby-profile">
            <?php
                if(isset($_FILES['updateAvatar']['name'])) {

                    $updateAvatar = $_FILES['updateAvatar']['name'];
                    $imgfile = imagefilename(10).'_'.imagefilename(22).'_triton'.'.jpg';
                    //new filename
                    $new_filename = $imgfile;

                    $type = $_FILES['updateAvatar']['type'];
                    $extension = strtolower(substr($new_filename, strpos($new_filename,'.') + 1));

                    $size = $_FILES['updateAvatar']['size'];
                    $max_size = 20971520;

                    $tmp_name = $_FILES['updateAvatar']['tmp_name'];
                    image_fix_orientation($tmp_name);

                    if(!empty($updateAvatar)) {

                        if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'JPEG') && ($type == 'image/jpeg' || $type=='image/jpg') && ($size < $max_size)) {

                            $location = 'Assets/Media/Uploads/';
                            if(move_uploaded_file($tmp_name, $location.$new_filename)) {

                                $db_update = "UPDATE `admin` SET `avatar`='".mysqli_real_escape_string($con, $new_filename)."' WHERE `id`='$userID'";
                                if($update_query = mysqli_query($con, $db_update)) {
                                    header('Location: lobby.php');
                                }
                            }
                        }
                    }
                }
            ?>
            <div class="lobby-avatar-container">
                <div class="lobby-main-avatar">
                    <img src="Assets/Media/Uploads/<?php echo $avatar; ?>" alt="">
                    <div class="update-avatar">
                        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
                            <div class="avatar-update-btn">
                                <label for="avatarBtn">Update</label>
                                <input type="file" name="updateAvatar" id="avatarBtn" onchange="this.form.submit();">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="lobby-profile-name">
                <p style="font-size: 14pt; font-weight: 600; margin= 0;"><?php echo ucwords($fname.' '.$lname); ?></p>
            </div>
            <div class="lobby-messaging">
                <button id="openMessaging" onclick="scrollToBottom();"><i class="far fa-envelope"></i> Messages</button>
            </div>
            <div class="lobby-logout">
                <a class="logout" href="logout.inc.php"><i class="fas fa-power-off"></i> Logout</a>
            </div>
        </div>
        <div class="lobby-controls">
            <?php
                if($username == "neilaldrei" || $username == "banana7") {
                ?>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li><a href="lobby.php">Lobby</a></li>
                        <li><a href="lobby.php?admin=Athletes">Athletes</a></li>
                        <li><a href="lobby.php?admin=BM">Board Members</a></li>
                        <li><a href="lobby.php?admin=Events">Events</a></li>
                        <li><a href="lobby.php?admin=Gallery">Gallery</a></li>
                        <li><a href="lobby.php?admin=Products">Products</a></li>
                        <li><a href="lobby.php?admin=Ads">Advertisements</a></li>
                        <li><a href="lobby.php?admin=Slides">Banner Slides</a></li>
                        <li><a href="lobby.php?admin=Register">Registrations</a></li>
                        <li>
                            <button value="codes" id="codeignite" onclick="getVerification(this);">Generate Verification</button>
                            <div id="keyDisplay"></div>
                        </li>
                    </ul> 
                <?php
                } else {
                ?>
                    <a href="index.php" class="non-admin">Triton Swim Club</a>
                    <a href="lobby.php" class="non-admin">Lobby</a>
                <?php 
                }
            ?>
        </div>
    </div>
</nav>