<?php
$title = "Welcome to Sign In!";
require "connection.php";
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php 
echo $nav;
echo $header; 

if(isset($_POST['signin'])){
    echo "Wow";
}



?>


<div class="m-5 row">
    <div class="col-md-3"></div>
    <form method="POST" class="col-md-6">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
        <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="remember_me">
        <label class="form-check-label" for="remember_me"> Remember me!</label>
    </div>
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary px-4" name="signin">Submit</button>
    </div>
    </form>
</div>
    





</body>
</html>