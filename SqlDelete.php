<html>
    <body>

<style>
body
        {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');

            
        }
    </style>
<?php

$id=$_GET['id'];


$link=@mysqli_connect('localhost:3307','Shelvea','','petshop');
mysqli_set_charset($link,"utf8");

$SQL="DELETE FROM order_detail WHERE id=$id";

if(mysqli_query($link,$SQL))
{
    header("Location:haveCreateOrder.php");
}

?>
    </body>
</html>