<div class="admin-bm">
    <div class="add-bm">
        <form action="<?php echo $current_file; ?>" method="POST">
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
    <div class="admin-bm-preview">
        <?php
            $query = "SELECT * FROM `board` ORDER BY `position` ASC";
            if($query_run = mysqli_query($con, $query)) {

                while($row = mysqli_fetch_array($query_run)) {

                    $member_ID = $row['member_id'];
                    $fullname = $row['member_name'];
                    $position = $row['position'];
                    $pp = $row['member_img'];
                ?>

                    <div class="board-row">
                        <div class="board-info">
                            <div class="board-pp">
                                <img src="../Media/Uploads/<?php echo $pp; ?>" alt="">
                            </div>
                        </div>
                        <div class="board-intro">
                            <div class="board-wrap">
                                <p><?php echo $fullname; ?></p>
                                <p><?php echo $position; ?></p>
                            </div>
                        </div>
                        <div class="board-row-controls">
                            <button value="<?php echo $member_ID; ?>" onclick="deleteBM(this);" class="remove">Remove</button>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
</div>