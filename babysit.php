<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>保母頁面</title>
	<style>
		body {
			background-image:url('background2.png');
            background-size:cover;
            background-repeat:no-repeat;
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

        #cus{
            position: fixed;
			border: 1px solid #00BFFF;
			border-radius: 23px;
			padding: 17px 34px;
			background-color: #87CEFA;
            font-size: 40px;
            color: #00008B;
        }

        .order-item {
            border: 1px solid #00008B;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .order-item h4 {
            margin-bottom: 10px;
        }

        .order-item button {
            background-color: #87CEFA;
            border: none;
            color: #00008B;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
	</style>
</head>


<body>
	<div id="header">
		<a href="">訂單資料</a>
		<a href="#">托育紀錄</a>

	</div>

	<a id="logout-button" href="logout.php">登出</a>

	<?php
	// 假設您已經建立了資料庫連接
	$conn = new mysqli("localhost", "root", "", "petstore");

	// 檢查連接是否成功
	if ($conn->connect_error) {
		die("連接資料庫失敗：" . $conn->connect_error);
	}

	// 執行 SQL 查詢，擷取 care_order 資料表的訂單
	$sqlCareOrder = "SELECT * FROM care_order";
	$resultCareOrder = $conn->query($sqlCareOrder);

	// 檢查是否有資料
	if ($resultCareOrder->num_rows > 0) {
		echo "<h3>訂單資料</h3>";

		// 列印 care_order 資料表的訂單
		while ($row = $resultCareOrder->fetch_assoc()) {
			echo "<div class='order-item'>";
			echo "<h4>訂單編號：" . $row["o_id"] . "</h4>";
			echo "<p>使用者編號：" . $row["user_id"] . "</p>";
			echo "<p>姓名：" . $row["name"] . "</p>";
			echo "<p>電話：" . $row["phone"] . "</p>";
			echo "<p>商店：" . $row["store"] . "</p>";
			echo "<p>備註：" . $row["notes"] . "</p>";
			echo "<p>建立時間：" . $row["created_at"] . "</p>";
			echo "<button onclick=\"window.location.href='care_order_detail?order_id=" . $row["o_id"] . "'\">詳情</button>";

			echo "</div>";
		}
	} else {
		echo "<h3>目前沒有訂單</h3>";
	}

	// 關閉資料庫連接
	$conn->close();
	?>
</body>
</html>

<script>
	function redirectToOrderDetails(orderId) {
		// 根據訂單編號導向到相應的訂單詳情頁面
		window.location.href = "order_details.php?order_id=" + orderId;
	}
</script>
