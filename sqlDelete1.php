<?php

$No=$_GET['o_id'];


$link=@mysqli_connect('localhost:3307','Shelvea','','petshop');
mysqli_set_charset($link,"utf8");

$SQL="DELETE FROM orders WHERE o_id=$No";

if(mysqli_query($link,$SQL))
{
    header("Location:havePlaceOrder.php");
}

?>