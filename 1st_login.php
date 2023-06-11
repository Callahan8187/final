<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>歡迎來到寵物托育系統!</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            font-size: 35px;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        .submit-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link a {
            color: #888;
            text-decoration: none;
        }

        .goback-link {
            text-align: center;
            margin-top: 10px;
        }
        .goback-link a {
            color: #888;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true)
    {
      $role = $_SESSION['login_role'];
      if($role == 'cus')
        header("Location: 2nd_cus_main.php");
      else if($role == 'bab')
        header("Location: babysit.php");
      else
        header("Location: admin.php");
    }
    ?>
    <h2>寵物托育系統</h2>
    <div class="container">
        <h1>會員登入</h1>
        <p>歡迎來到寵物托育系統！請輸入您的帳號密碼！</p>
        <form method="post" action="1st_check.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">您的帳號：</label>
                <input type="text" name="account" placeholder="您的帳號" required>
            </div>
            <div class="form-group">
                <label for="pwd">您的密碼：</label>
                <input type="password" name="pwd" placeholder="您的密碼" required>
            </div>
            <?php
            if(isset($_SESSION['msg'])){
                echo "<p class='error-message'>{$_SESSION['msg']}</p>";
            }
            unset($_SESSION['msg']);
            ?>
            <input type="submit" class="submit-button" value="登入">
        </form>
        <div class="register-link">
            <a href="1st_signup_main.php">點此註冊</a>
        </div>
        <div class="goback-link">
            <a href="index.html">回到首頁</a>
        </div>
    </div>
</body>
</html>
