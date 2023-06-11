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

$SQL="SELECT status FROM pet WHERE id=$id";
$result = mysqli_query($link,$SQL);
$row = mysqli_fetch_assoc($result);


if($row['status']=="Y")
{
    header("Location:acceptFail.php");
}
else if($row['status']=="N")
{
    
$SQL="UPDATE pet SET status='Y' WHERE id=$id";
if(mysqli_query($link,$SQL))
{
    echo "接單成功<br><br>";
}
}


?>
<button  onclick="window.location.href='nannyMainPage.php';"style="width:70px;height:30px; background-color:chocolate; color: white;font-weight: bold;">點此返回</button>
</body>
</html>