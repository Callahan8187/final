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
        $id = (int)($row['c_id']);
        $test = (string)($id+1);
        $SQL = "INSERT INTO customer(c_id, c_name, c_mail, c_password, c_phone, c_area) VALUES('$test', '$name','$email','$password','$phone','$area')";
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
    if($SQL != NULL)
    {
        $_SESSION["signup"]="No";
        $_SESSION['msg'] = '2帳號與他人重複!!';
        header("Location:signup_main.php");
    }
    else
    {
        $id = "SELECT MAX(*) FROM babysit B GROUP BY B.b_id";
        $SQL="INSERT INTO babysit(b_id, b_name, b_mail, b_password, b_phone, b_area) VALUES('($id+1)', '$name','$email','$password','$phone','$area')";
        header("Location:enrollSuccess.php");
    }
}
else
{
    header("Location:testtesttest.php");
}
?>