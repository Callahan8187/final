<?php
session_start();

$conn = new mysqli("localhost", "root", "", "petstore");

if ($conn->connect_error) {
  die("連接資料庫失敗: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
  $productId = $_GET['id'];

  $pp_name = '商品名稱';
  $pp_price = 100.0;
  $pp_description = '商品描述';
  $pp_stock = 10; 

  $sql = "UPDATE product SET pp_total_soldnum = pp_total_soldnum + 1 WHERE pp_id = '$productId'";
  $conn->query($sql);

  $sql = "SELECT pp_name, pp_price, pp_description, pp_stock, pp_image FROM product WHERE pp_id = '$productId'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pp_name = $row["pp_name"];
    $pp_price = $row["pp_price"];
    $pp_description = $row["pp_description"];
    $pp_stock = $row["pp_stock"];
    $pp_image = $row["pp_image"];
    
  } else {
    echo "找不到該產品";
  }
} else {
  echo "缺少商品ID";
  exit();
}

$sql = "SELECT pp_name FROM product WHERE pp_total_soldnum > 0 ORDER BY pp_total_soldnum DESC LIMIT 5";
$result = $conn->query($sql);
$hotProducts = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $hotProducts[] = $row;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>商品詳細介紹</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-image: url('background.jpg');
      background-size: cover;
      background-position: center;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    .center {
      text-align: center;
    }
    p {
      margin-bottom: 10px;
    }
    img {
      display: block;
      margin: 20px auto;
      max-width: 100%;
      height: auto;
    }
    .transparent-box {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      margin: 20px auto;
      max-width: 600px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="transparent-box">
    <h1><?php echo $pp_name; ?></h1>
    <img src="images/<?php echo $pp_image; ?>" alt="產品圖片">
    <div class="center">
      <p>價格: <?php echo $pp_price; ?></p>
      <p>庫存: <?php echo $pp_stock; ?></p>
      <p><?php echo $pp_description; ?></p>

      <form method="POST" action="cart.php">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <input type="number" name="quantity" min="1" value="1">
        <button type="submit">加入購物車</button>
      </form>
    </div>
  </div>
  <h2>熱門點擊商品</h2>
  <ul>
    <?php foreach ($hotProducts as $product) : ?>
      <li><?php echo $product['pp_name']; ?></li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
