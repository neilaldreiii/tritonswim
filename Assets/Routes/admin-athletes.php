<div class="admin-athletes">
    <div class="add-athletes">
        <form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
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
    <div class="admin-athletes-preview">
    <?php
        $query = "SELECT * FROM `athletes` ORDER BY `category` DESC";
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
                                <img src="../Media/Uploads/<?php echo $pp; ?>" alt=""/>
                            </div>
                            <div class="secondary-pp">
                                <p>Secondary</p>
                                <img src="../Media/Uploads/<?php echo $sp; ?>" alt="" />
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