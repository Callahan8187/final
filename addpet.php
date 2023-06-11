<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>寵物頁面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            font-size: 35px;
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

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="reset"] {
            background-color: #dc3545;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>新增寵物</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $petName = $_POST["petName"];
        $petAge = $_POST["petAge"];
        $petType = $_POST["petType"];

        echo "<h3>請輸入您的寵物資料：</h3>";
        echo "名稱： " . $petName . "<br>";
        echo "年齡： " . $petAge . "<br>";
        echo "種類： " . $petType . "<br>";
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="petName">寵物名稱：</label>
        <input type="text" id="petName" name="petName" placeholder='請輸入您的寵物暱稱'  required><br><br>

        <label for="petAge">寵物年齡：</label>
        <input type="text" id="petAge" name="petAge" placeholder='請輸入您的寵物年齡(0-100)' pattern="{0,100}" required><br><br>

        <label for="petType">寵物種類：</label>
        <input type="text" id="petType" name="petType" placeholder='請輸入您的寵物種類'  required><br><br>
        <select id="petType" name="petType" required>
            <option value="">請選擇寵物種類</option>
            <option value="大型犬">大型犬</option>
            <option value="中小型犬">中小型犬</option>
            <option value="貓咪">貓咪</option>
        </select><br><br>

        <input type="submit" value="提交">&nbsp&nbsp&nbsp&nbsp<input type="reset" value="重設">
    </form>
    <a href="costomer.php">回去上一頁</a>

</body>
</html>
