<?php
 
$title='';
require "conf.php";
require "authentication.php";
adminAccess();
$user = $_SESSION['user'];
$title = "Welcome ".$user['name']." ".$user['surname'];
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php echo $nav; ?>
<?php echo $invoices ?>

 
    





</body>
</html>






 