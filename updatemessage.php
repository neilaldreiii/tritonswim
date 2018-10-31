<?php
    require 'Assets/Include/core.inc.php';
    require 'Assets/Include/connect.inc.php';

    $currentUser = getuserfield('id');

    $query = "SELECT * FROM `messages` ORDER BY `timestamp` ASC";
    if($query_run = mysqli_query($con, $query)) {
        
        while($row = mysqli_fetch_array($query_run)) {

            $message = $row['message'];
            $senderID = $row['sender'];
            $timestamp = strtotime($row['timestamp']);

            $sender_details = "SELECT * FROM `admin` WHERE `id`='$senderID'";
            if($sender_run = mysqli_query($con, $sender_details)) {

                $sender_row = mysqli_fetch_array($sender_run);
                $sender_username = $sender_row['username'];
                $sender = ucwords($sender_row['firstname']);
                $sender_avatar = $sender_row['avatar'];

                if($senderID == $currentUser) {
                ?>
                    <div class="sender-row current-user">
                        <div class="sender-info">
                            <div class="sender-name">
                                <p><?php echo $sender; ?></p>
                            </div>
                            <div class="sender-avatar"><img src="Assets/Media/Uploads/<?php echo $sender_avatar; ?>" alt=""></div>
                        </div>
                        <div class="message-info">
                            <div class="message">
                                <p><?php echo $message; ?></p>
                                <span><?php echo elapse($timestamp).' ago'; ?></span>
                            </div>
                        </div>
                    </div>

                <?php

                } elseif($senderID !== $currentUser) {

                ?>
                    <div class="sender-row other-user">
                        <div class="sender-info">
                            <div class="sender-name">
                                <p><?php echo $sender; ?></p>
                            </div>
                            <div class="sender-avatar"><img src="Assets/Media/Uploads/<?php echo $sender_avatar; ?>" alt=""></div>
                        </div>
                        <div class="message-info">
                            <div class="message">
                                <p><?php echo $message; ?></p>
                                <span><?php echo elapse($timestamp).' ago'; ?></span>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
        }
    }
?>