<?php
ob_start();
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>已建立的委托</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        
        .button {
            margin-top: 20px;
        }
        
        .button input {
            border-radius: 10px;
            font-size: 16px;
            background-color: white;
            color: olivedrab;
            font-weight: bold;
            padding: 10px 20px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            height: 100px;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
     $link = new mysqli("localhost", "root", "", "petstore");
     $sql = "SELECT B.b_name,B.b_mail,B.b_area FROM babysit B";
     $result = $link->query($sql);
    ?>
    <div class="container">
    <table>
        <tr>
        <th>名字</th>
        <th>信箱</th>
        <th>地區</th>
        </tr>
        <?php
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["b_name"] . "</td>";
                    echo "<td>" . $row["b_mail"] . "</td>";
                    echo "<td>" . $row["b_area"] . "</td>";
                    echo "</tr>";
                }
            } else
                echo "<tr><td colspan='5'>沒有保母資料</td></tr>";
        ?>
    </table>
    </div>
</body>
</html>