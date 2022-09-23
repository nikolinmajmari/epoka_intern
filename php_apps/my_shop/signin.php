<?php
$title = "Welcome to Sign In!";
require "conf.php";
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php 
echo $nav;
echo $header; 
$formValues = [];

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "select * from user where username = '".$username."'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    $errors = [];
    $formValues['username'] = $username;

    if(!$user){
        $errors['username'] = true;
    }
    else{
        // check if password is OK
        if($password != $user['password']){
            $errors['password'] = true;
        }else{
            unset($user['password']);
            $_SESSION['user'] = $user;
            header("Location: admin_homepage.php");
        }
    }
}



?>


<div class="m-5 row">
    <div class="col-md-3"></div>
    <form method="POST" class="col-md-6">
    <div class="form-group">
        <label for="username">Username</label>
        <input 
            type="text" 
            class="form-control <?php print (isset($errors['username'])) ? 'is-invalid' : '' ?>" 
            name="username" 
            aria-describedby="username_validation" 
            placeholder="Enter username"
            value="<?php print (isset($formValues['username'])) ? $formValues['username'] : '' ?>"
        >
        <div id="username_validation" class="invalid-feedback">Username not found!</div>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input 
            type="password" 
            class="form-control  <?php print (isset($errors['password'])) ? 'is-invalid' : '' ?>" 
            name="password" 
            placeholder="Password" 
            area_describedby="password_validation"
        >
        <div id="password_validation" class="invalid-feedback">Password does not match!</div>
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