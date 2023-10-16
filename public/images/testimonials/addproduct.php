<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
<table border=1>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Add to Cart</th>
</tr>
<?php
$con=mysqli_connect('localhost','root','','sessiondb');
$sql="select * from products";
$rs=mysqli_query($con,$sql);
while($rw=mysqli_fetch_array($rs))
{
    echo "<tr>";
    echo "<td>".$rw['ID']."</td>";
    echo "<td>".$rw['Name']."</td>";
    echo "<td>".$rw['Price']."</td>";
    echo "<td> <a href='addtocart-session.php?ID=$rw[0]'>Add</a></td>";
    echo "</tr>";
}
?>
</body>
</html>
