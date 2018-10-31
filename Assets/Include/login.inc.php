<div class="login">
    <form action="<?php echo $current_file; ?>">
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
</div>

<<<<<<< HEAD
<?php 
if(isset($_POST['username']) && isset($_POST['password'])) {
    
}
?>
=======
                } elseif($num_row == 1) {

                    $row = mysqli_fetch_array($signin_query);

                    $password_hash = $row['password'];
                    $user_id = $row['id'];

                    if(password_verify($password, $password_hash)) {

                        $_SESSION['user_id'] = $user_id;
                        header("Location: lobby.php");

                    } else {

                        echo '<p class="error">Incorrect Username or Password</p>';

                    }
                }
            }
        }
    }
    ?>
</div>
>>>>>>> lobby-b
