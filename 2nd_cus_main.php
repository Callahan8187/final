<?php
    ob_start();
    session_start();


    $conn = new mysqli("localhost", "root", "", "petstore");

    // 檢查連接是否成功
    if ($conn->connect_error) {
        die("連接資料庫失敗: " . $conn->connect_error);
    }

    // 查詢保母資料
    $sql = "SELECT * FROM babysit";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>顧客頁面</title>
    <style>
        body {
            background-image: url('background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-color: transparent;
            color: #00008B;
        }

        #header {
            position: fixed;
            top: 10px;
            right: 10px;
        }

        #header a {
            margin-right: 100px;
            color: #00008B;
            text-decoration: none;
            background-color: transparent;
            font-size: 35px;
        }

        #logout-button {
            position: fixed;
            bottom: 40px;
            left: 360px;
            border: 2px solid #00BFFF;
            border-radius: 30px;
            padding: 20px 40px;
            background-color: #87CEFA;
            color: #00008B;
            font-size: 35px; 
        }

        #cus {
            position: fixed;
            border: 1px solid #00BFFF;
            border-radius: 23px;
            padding: 17px 34px;
            background-color: #87CEFA;
            font-size: 40px;
            color: #00008B;
        }
        table {
            border-collapse: collapse; /* 合併邊框 */
            width: 50%; /* 設置表格寬度為100% */
            height: 50%;
            margin: 0 auto; 
        }

        th, td {
            border: 1px solid #000; /* 格線粗細為1像素，顏色為黑色 */
        }
    </style>
</head>

<body>
    <div id="header">
    <a href="index.html">回到首頁</a>
    <a href="2nd_cus_babprof.php">保姆列表</a>
    <!--<a href="2nd_cus_o_created.php">下單紀錄</a>-->
    <a href="2nd_cus_o_created.php">下單紀錄</a>
    <a href="2nd_cus_o_finished.php">托育紀錄</a>
    <a href="addpet.php">新增寵物</a>
    <a href="all_product.php">購物網站</a>
    </div>

    <a id="logout-button" href="logout.php">登出</a>
</body>
</html>
<?php
    $conn->close();

?>
