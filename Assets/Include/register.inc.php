<div class="register">
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
            <div class="input-field">
                <input type="password" name="rePassword" placeholder="Re-type Password">
            </div>
            <div class="input-field">
                <input type="text" name="fname" placeholder="First Name">
            </div>
            <div class="input-field">
                <input type="text" name="lname" placeholder="Last Name">
            </div>
            <div class="form-action">
                <input type="submit" value="Sign up">
            </div>
        </div>
    </form>
</div>

<?php 
if(isset($_POST['username']) && isset($_POST['password'])) {
    
}
?>