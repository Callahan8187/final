<meta charset='utf-8'>
<html>
    <head>
    <style>
        body
        {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');
            
        }
        h1{
            text-align: center;
            color: olivedrab;
            font-size: 40px;
        }
        p{
            color: red;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }
        .button{
            text-align: center;
            position: absolute;
            bottom: 10%;
            right: 45%;
            
            

        }
    </style>
    </head>



    <body>
        <h1>你已成單的訂單列表</h1>
        <p>請選擇你要取消的訂單</p><br>
            
        <?php
    $link=mysqli_connect('localhost','root','','petstore');
    mysqli_set_charset($link,"utf8");

    $SQL='SELECT * FROM care_order_detail';

    if(@$result=mysqli_query($link,$SQL))
    {
    
        echo "<table border = '1'>";
        echo "<tr><td>id</td><td>o_id</td><td>user_id</td><td>SKU</td><td>quantity</td></tr>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$row['id']."</td><td>".$row['o_id']."</td><td>".$row['user_id']."</td><td>".$row['SKU']."</td><td>".$row['quantity']."</td><td><a href='SqlDelete.php?id=".$row['id']."'>取消訂單</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    else
    {
        echo "database check fail";
    }
    mysqli_close($link);
    ?>
    <div class="button">
        <input style="border-radius: 10px;font-size:100%;background-color:white; color: olivedrab;font-weight: bold;" type="submit" onclick="history.go(-1)" value="點此返回">   
    </div>      
    </body>
</html>
