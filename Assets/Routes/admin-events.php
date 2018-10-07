<div class="admin-events">
    <div class="add-events">
        <form action="<?php echo $current_file; ?>" method="POST">
            <div class="form-container">
                <div class="input-field">
                    <input type="text" name="title" placeholder="Event Title" />
                </div>
                <div class="input-field">
                    <input type="text" name="description" placeholder="Event Description" />
                </div>
                <div class="input-field">
                    <input type="file" name="eventsImage" />
                </div>
                <div class="form-action">
                    <input type="submit" value="Add" />
                </div>
            </div>
        </form>
    </div>
    <div class="admin-events-preview">
    <?php
        $query = "SELECT * FROM `events` ORDER BY `postdate` ASC";
        if($query_run = mysqli_query($con, $query)) {
            
            while($row = mysqli_fetch_array($query_run)) {
                $event_ID = $row['event_ID'];
                $title = $row['event_title'];
                $descr = $row['event_description'];
                $img = $row['event_image'];
                $db_stamp = strtotime($row['postdate']);
                $timestamp = date("M d Y  H:iA ", $db_stamp);
            }
            ?>
                <div class="events-row">
                    <div class="event-info">
                        <img src="../Media/Uploads/<?php echo $img; ?>" alt="" />
                    </div>
                    <div class="event-intro">
                        <p class="title"><?php echo ucwords($title); ?></p>
                        <p class="description"><?php echo $descr; ?></p>
                        <p class="timestamp"><?php echo $timestamp;  ?></p>
                    </div>
                    <div class="events-row-controls">
                        <button value="<?php echo $event_ID; ?>" onclick="deleteEvent(this);" class="remove">Delete</button>
                    </div>
                </div>
            <?php
        }
    ?>
    </div>
</div>