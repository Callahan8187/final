<?php
ob_start();
session_start();

/*if($_SESSION["babysitLogin"]=="Yes"){

}else{
   
}*/
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單詳情</title>
    <style>
        body {
            background-color: #f1f1f1;
            color: #00008B;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .order-details {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-details h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .order-details p {
            margin: 0;
        }

        .confirm-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #87CEFA;
            border: none;
            border-radius: 4px;
            color: #00008B;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>訂單詳情</h1>

        <?php
        // 假設您已經建立了資料庫連接
        $conn = new mysqli("localhost", "root", "", "petstore");

        // 檢查連接是否成功
        if ($conn->connect_error) {
            die("連接資料庫失敗：" . $conn->connect_error);
        }

        // 取得 URL 中的訂單編號
        $orderId = $_GET["order_id"];

        // 執行 SQL 查詢，擷取指定訂單編號的訂單詳情
        $sql = "SELECT * FROM care_order WHERE o_id = $orderId";
        $result = $conn->query($sql);

        // 檢查是否有資料
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='order-details'>";
                echo "<h2>訂單編號：" . $row["o_id"] . "</h2>";
                echo "<p>使用者編號：" . $row["user_id"] . "</p>";
                echo "<p>姓名：" . $row["name"] . "</p>";
                echo "<p>電話：" . $row["phone"] . "</p>";
                echo "<p>商店：" . $row["store"] . "</p>";
                echo "<p>支付方式：" . $row["payment"] . "</p>";
                echo "<p>備註：" . $row["notes"] . "</p>";
                echo "<p>建立時間：" . $row["created_at"] . "</p>";
                echo "</div>";
           
            }
        } else {
            echo "<p>找不到該訂單的詳情。</p>";
        }

        // 關閉資料庫連接
        $conn->close();

        // 檢查是否已經接單
        $isAccepted = false;  // 假設未接單

        // 確認接單按鈕處理邏輯
        if (isset($_POST["confirm_order"])) {
            // 執行確認接單的相關邏輯
            // ...
            // 如果成功接單，設定 $isAccepted 為 true
            $isAccepted = true;
        }

        // 顯示確認接單按鈕
        if (!$isAccepted) {
            echo "<form method='post'>";
            echo "<input type='submit' name='confirm_order' value='確認接單' class='confirm-button'>";
            echo "</form>";
        } else {
            // 如果已接單，進行頁面跳轉
            header("Location: fail_page.php");
            exit;
        }
        ?>

        <a href="babysit.php">返回</a>
    </div>
</body>
</html>
