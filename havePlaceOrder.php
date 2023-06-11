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
            right: 45%
            

        }
    </style>
    </head>
    <body>
        <h1>你已下單的訂單列表</h1>
        <p>請選擇你要取消的訂單</p><br>

        <?php
    $link=mysqli_connect('localhost','root','','petstore');
    mysqli_set_charset($link,"utf8");

    $SQL='SELECT * FROM `order`';

    if(@$result=mysqli_query($link,$SQL))
{
    
    echo "<table border = '1'>";
    echo "<tr><td>o_id</td><td>user_id</td><td>name</td><td>phone</td><td>store</td><td>payment</td><td>notes</td><td>created_at</td></tr>";
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['o_id']."</td><td>".$row['user_id']."</td><td>".$row['name']."</td><td>".$row['phone']."</td><td>".$row['store']."</td><td>".$row['payment']."</td><td>".$row['notes']."</td><td>".$row['created_at']."</td><td><a href='SqlDelete1.php?o_id=".$row['o_id']."'>取消訂單</a></td>";
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
