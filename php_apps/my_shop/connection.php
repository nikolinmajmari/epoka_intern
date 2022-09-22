<?php
$conn = mysqli_connect('localhost', 'root', '', 'my_shop');

if(!$conn){
    echo "Error occurred!<br>".mysqli_error();
}

?>