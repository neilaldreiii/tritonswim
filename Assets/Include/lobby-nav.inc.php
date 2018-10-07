<?php 

if (loggedin()) {
    $username = getuserfield('username');
    $fname = getuserfield('firstname');
    $lname = getuserfield('lastname');
    $avatar = getuserfield('avatar');
}
?>

<nav class="lobby-navigation">
    <div class="lobby-navigation-wrap">
        <div class="lobby-profile">
            <div class="lobby-avatar-container">
                <div class="lobby-main-avatar"></div>
            </div>
            <div class="lobby-profile-name">
                <p style="font-size: 14pt; font-weight: 600;"><?php echo ucwords($fname.' '.$lname); ?></p>
            </div>
        </div>
        <div class="lobby-controls">
            <ul>
                <li><a href="lobby.php">Lobby</a></li>
                <li><a href="lobby.php?admin=Athletes">Athletes</a></li>
                <li><a href="lobby.php?admin=BM">Board Members</a></li>
                <li><a href="lobby.php?admin=Events">Events</a></li>
                <li><a href="lobby.php?admin=Gallery">Gallery</a></li>
                <li><a href="lobby.php?admin=Products">Products</a></li>
                <li><a href="lobby.php?admin=Ads">Advertisements</a></li>
                <li><a href="lobby.php?admin=Slides">Banner Slides</a></li>
                <li><a class="logout" href="logout.inc.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>