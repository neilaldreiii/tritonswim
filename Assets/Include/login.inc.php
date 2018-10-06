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

<?php 
if(isset($_POST['username']) && isset($_POST['password'])) {
    
}
?>