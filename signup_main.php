<?php
    session_start();
    ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>系統註冊頁面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
        }

        table {
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="radio"] {
            display: inline-block;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="password"],
        input[type="tel"],
        input[type="area"]{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
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

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #888;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="signup_conf.php" method="post" enctype="multipart/form-data">
        <h1>註冊</h1>
        <p>請輸入以下資料~</p>
        <table>
            <tr>
                <td>
                    <label>註冊身分：</label>
                </td>
                <td>
                    <input type="radio" name="role" value="user" id="user-role" checked>
                    <label for="user-role">一般會員</label>
                </td>
                <td>
                    <input type="radio" name="role" value="babysit" id="babysit-role">
                    <label for="babysit-role">寵物保母</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">帳號 (email)：</label>
                </td>
                <td colspan="2">
                    <input type="email" name="email" id="email" placeholder="輸入您要註冊的 email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">密碼：</label>
                </td>
                <td colspan="2">
                    <input type="password" name="password" id="password" pattern="[a-zA-Z0-9]{4,12}" placeholder="請輸入4~12字之英數組合" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tel">行動電話：</label>
                </td>
                <td colspan="2">
                    <input type = 'tel' name = 'phone' pattern = '^09\d{8}$' placeholder = '輸入行動電話號碼' required><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="area">所在地區：</label>
                </td>
                <td colspan="2">
                <select name="area">
                    <option value="Mercucy">水星</option>
                    <option value="Venus">金星</option>
                    <option value="Earth">地球</option>
                    <option value="Mars">火星</option>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="註冊">
                </td>
            </tr>
        </table>
        <div class="login-link">
            <a href="login.php">回到登入頁</a>
        </div>
    </form>
</body>
</html>
