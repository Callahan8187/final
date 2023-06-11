<?php
session_start();

// 处理用户提交的注册表单
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取用户输入的数据
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $user_email = $_POST['email']; // 修改变量名为 user_email
    $address = $_POST['address'];
    $join_date = date("Y-m-d"); // 获取当前日期

    // 在此处添加对用户输入的验证和安全性措施

    // 连接到数据库
    $conn = new mysqli("localhost", "root", "", "petstore");
    if ($conn->connect_error) {
        die("数据库连接失败: " . $conn->connect_error);
    }

    // 检查账号是否已经存在
    $checkmail = "SELECT * FROM customer WHERE c_mail = '$mail'";
    $result = $conn->query($checkmail);
    if ($result->num_rows > 0) {
        echo "注册失败：账号已经存在";
        $conn->close();
        exit();
    }

    // 插入用户信息到数据库表
    $sql = "INSERT INTO customer (c_mail, c_password, c_name, c_phone, c_mail, c_address, c_join_date) VALUES ('$mail', '$password', '$name', '$phone_number', '$user_email', '$address', '$join_date')";
    if ($conn->query($sql) === TRUE) {
        echo "注册成功";
    } else {
        echo "注册失败: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>用户注册</title>
</head>
<body>
    <h1>用户注册</h1>
    <form method="POST" action="">
        <label for="mail">账号:</label>
        <input type="text" id="mail" name="mail" required><br>

        <label for="password">密码:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="name">姓名:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="phone_number">电话号码:</label>
        <input type="text" id="phone_number" name="phone_number" required><br>

        <label for="mail">电子邮件:</label>
        <input type="mail" id="mail" name="mail" required><br>

        <label for="address">地址:</label>
        <input type="text" id="address" name="address" required><br>

        <button type="submit">注册</button>
    </form>
</body>
</html>
