<?php 
$link = mysqli_connect("localhost","root","","fpc");
if (mysqli_connect_errno())
{
echo "MySQLi Connection was not established: " . mysqli_connect_error();
} 
?>