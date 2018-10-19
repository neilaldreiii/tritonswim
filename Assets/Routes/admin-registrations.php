<div class="application-lists">
    <?php
        require_once 'Assets/Include/connect.inc.php';
        require_once 'Assets/Include/core.inc.php';
        $query = "SELECT * FROM `registration` ORDER BY `timestamp` ASC";
        if($query_run = mysqli_query($con, $query)) {

            while($row = mysqli_fetch_array($query_run)) {

                $id = $row['id'];
                $gender = $row['gender'];
                $mo = $row['birthmonth'];
                $day = $row['birthday'];
                $yr = $row['birthyear'];
                $app_fname = $row['firstname'];
                $app_mname = $row['midname'];
                $app_lname = $row['lastname'];
                $school = $row['school'];
                $parent = $row['parent_fullname'];
                $contact = $row['contact_number'];
                $db_stamp = strtotime($row['timestamp']);
                $timestamp = date("M d Y H:i A ", $db_stamp);
            ?>
    <div class="app-row">
        <div class="app-info">
            <p> <b>Applicant: </b>
                <?php echo ucwords($app_fname.' '.$app_mname.' '.$app_lname); ?>
            </p>
            <p> <b>Gender: </b>
                <?php echo ucwords($gender); ?>
            </p>
            <p> <b>School: </b>
                <?php echo ucwords($school); ?>
            </p>
            <p> <b>Birth Date: </b>
                <?php echo ucwords($mo.' '.$day.' '.$yr);; ?>
            </p>
            <p> <b>Parent: </b>
                <?php echo ucwords($parent); ?>
            </p>
            <p>
                <?php echo 'Registration Date: <b>'.$timestamp.'</b>'; ?>
            </p>
        </div>
    </div>
    <?php
            }
        } 
    ?>
</div>