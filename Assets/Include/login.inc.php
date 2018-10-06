<?php 

require_once "Assets/Include/core.inc.php";
require_once "Assets/Include/connect.inc.php";

?>

<div class="login">
    <form action="<?php echo $current_file; ?>" method="POST">
        <div class="form-container">
            <div class="form-header">
                <h2>Sign in</h2>
            </div>
            <div class="input-field">
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-action">
                <input type="submit" value="Sign in">
            </div>
        </div>
    </form>
    <?php 
    if(isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)) {

            $signin = "SELECT * FROM `admin` WHERE `username`='$username'";
            if($signin_query = mysqli_query($con, $signin)) {

                $num_row = mysqli_num_rows($signin_query);
                if($num_row == 0) {
                    
                    echo '<p class="error">Incorrect Username or Password</p>';

                } elseif($num_row == 1) {

                    $row = mysqli_fetch_array($signin_query);

                    $password_hash = $row['password'];
                    $user_id = $row['id'];

                    if(password_verify($password, $password_hash)) {

                        $_SESSION['user_id'] = $user_id;
                        header("Location: admin.php");

                    } else {

                        echo '<p class="error">Incorrect Username or Password</p>';

                    }
                }
            }
        }
    }
    ?>
</div>