<?php ob_start();
      session_start();
 

if($_SESSION["Login"]=="No"){

}

?>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
登入失敗!<br/>
網頁將在十秒後自動跳轉<br/>
<a href="index.php">或點選這裡跳轉</a>
<a href="logout.php">logout</a>
<?php
echo $_SESSION["Login"];
header("Refresh:10 ;url=login.php");
?>
</form>

</body>

</html> 