<?php
if(isset($_GET['id']))
{
    $id= $_GET['id'];
}

$invoice_sql="select * from invoice where id = ".$id;
$res=mysql_query($conn,$invoice_sql);
$invoice

$invoices_sql = "select * from invoice_details where invoice_id = ".$id;
$result = mysqli_query($conn, $invoices_sql);
$invoices_table = '
<table class="table">
<caption>List of Invoice Details</caption>
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Customer</th>
    <th scope="col">Product</th>
    <th scope="col">Quantity</th>
    <th scope="col">Price per unit</th>
    <th scope="col">Date</th>
    <th scope="col">Status</th>
   
  </tr>
</thead>  
<tbody>
';
 
while($invoice = mysqli_fetch_assoc($result)){

    $invoices_table .= '
  
        <tr>
        <th scope="row"></th>
        <td>Mark</td>
        <td>Mark</td>
        <td>Mark</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
       
    ';
}
$invoices_table .= '
</tbody>
    </table>';
 
?>