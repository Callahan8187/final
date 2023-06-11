<html>
<body>    

<style>
body
        {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');

            
        }
    </style>
<?php

$id=$_GET['b_id'];


$link=@mysqli_connect('localhost','root','','petstore');
mysqli_set_charset($link,"utf8");

$SQL="SELECT b_status FROM babysit WHERE b_id=$id";
$result = mysqli_query($link,$SQL);
$row = mysqli_fetch_assoc($result);


if($row['b_status']=="Y")
{
    header("Location:orderFail.php");
}
else if($row['b_status']=="N")
{
    header("Location:orderSuccess.php");
}


?>

</body>
</html>