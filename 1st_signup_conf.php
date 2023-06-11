<meta charset='utf-8'>
<?php
ob_start();
session_start();

$role = $_POST["role"];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$area = $_POST["area"];

if($role == "user")
{
    $link=@mysqli_connect('localhost','root','','petstore');
    $SQL = "SELECT * FROM customer C WHERE C.c_mail = '$email'";
    $result = mysqli_query($link, $SQL);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 0)
    {
        $SQL = "SELECT C.c_id FROM customer C ORDER BY C.c_id DESC LIMIT 1";
        $result = mysqli_query($link, $SQL);
        $row = mysqli_fetch_assoc($result);
        $temp_id = (int)($row['c_id']);
        $id = (string)($id+1);
        $SQL = "INSERT INTO customer(c_id, c_name, c_mail, c_password, c_phone, c_area) VALUES('$id', '$name','$email','$password','$phone','$area')";
        if(mysqli_query($link,$SQL))
            header("Location:enrollSuccess.php");
    }
    else
    { 
        $_SESSION["signup"]="No";
        $_SESSION['msg'] = '帳號與他人重複!!';
        header("Location:signup_main.php");
    }
}
else if($role == "babysit")
{
    $link=@mysqli_connect('localhost','root','','petstore');
    $SQL = 'SELECT B.b_mail FROM babysit B WHERE B.b_mail == $email';
    $result = mysqli_query($link, $SQL);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 0)
    {
        $SQL = "SELECT B.b_id FROM babsit B ORDER BY B.b_id DESC LIMIT 1";
        $result = mysqli_query($link, $SQL);
        $row = mysqli_fetch_assoc($result);
        $temp_id = (int)($row['b_id']);
        $id = (string)($id+1);
        $SQL = "INSERT INTO babysit(b_id, b_name, b_mail, b_password, b_phone, b_area) VALUES('$id', '$name','$email','$password','$phone','$area')";
        if(mysqli_query($link,$SQL))
            header("Location:enrollSuccess.php");
    }
    else
    {
        $_SESSION["signup"]="No";
        $_SESSION['msg'] = '帳號與他人重複!!';
        header("Location:signup_main.php");
    }
}
else
{
    header("Location:testtesttest.php");
}
?>