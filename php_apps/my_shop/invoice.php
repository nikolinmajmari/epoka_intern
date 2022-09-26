<?php
$title='';
require "conf.php";
 
$user = $_SESSION['user'];
$title = "Welcome ".$user['name']." ".$user['surname'];
include "template.php";
?>

<!DOCTYPE html>
<html lang="en">
    <?php echo $head; ?>
<body>
<?php echo $nav; ?>
<?php  include "invoice_table.php";
echo $invoices_table;
?>

 
    





</body>
</html>


