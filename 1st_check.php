<?php
session_start();

$account = $_POST["account"];
$pwd = $_POST["pwd"];
$link=@mysqli_connect('localhost','root','','petstore');

$sql_c = "SELECT * FROM customer WHERE c_mail = '$account' AND c_password = '$pwd'";
$result_c = $link->query($sql_c);
$sql_b = "SELECT * FROM babysit WHERE b_mail = '$username' AND b_password = '$password'";
$result_b = $link->query($sql_b);
$sql_a = "SELECT * FROM admin WHERE a_mail = '$username' AND a_password = '$password'";
$result_a = $link->query($sql_a);

if ($result_c->num_rows > 0)
{
  $_SESSION["login_role"] = "cus";
  $_SESSION['loggedIn'] = true;
  header("Location: 2nd_cus_main.php");
}
else if ($result_b->num_rows > 0)
{
  $_SESSION['login_role'] = 'bab';
  $_SESSION['loggedIn'] = true;
  header("Location: babysit.php");
}
else if ($result_a->num_rows > 0)
{
  $_SESSION['login_role'] = 'adm';
  $_SESSION['loggedIn'] = true;
  header("Location: admin.php");
}
else
{
  $_SESSION['loginError'] = "登入失敗，帳號或密碼有誤!";
  header("Location: 1st_login.php");
}

$link->close();
?>
