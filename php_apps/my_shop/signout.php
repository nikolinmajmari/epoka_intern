<?php
$title = "Welcome to Sign In!";
require "conf.php";
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
header("Location: index.php");
?>