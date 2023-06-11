<?php
session_start();

// 檢查使用者是否已登入且為管理員角色
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true || $_SESSION['userRole'] !== 'admin') {
  // 若不符合條件，導向登入頁面
  header("Location: login.php");
  exit();
}

// 管理員首頁的內容
?>

<!DOCTYPE html>
<html>
<head>
  <title>管理員首頁</title>
</head>
<body>
  <h1>管理員首頁</h1>
  <p>歡迎回來，<?php echo $_SESSION['username']; ?>！</p>
  <p>這裡是管理員的首頁內容。</p>

  <!-- 其他管理員首頁的內容和功能 -->

  <a href="admin_an.php">數據分析</a>
  <a href="logout.php">登出</a> <!-- 提供登出功能的連結 -->

</body>
</html>
