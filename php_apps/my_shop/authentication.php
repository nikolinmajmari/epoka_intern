<?php

function adminAccess(){
    if(!isset($_SESSION['user'])){
        header("Location: signin.php");
    }
}


?>