<html>
    <head>
        <style>
        body
        {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');

            
        }
        </style>
    </head>
    <body>
        <h1>保母接單頁面</h1>

        <?php
         $link=mysqli_connect('localhost:3307','Shelvea','','petshop');
         mysqli_set_charset($link,"utf8");
     
         $SQL='SELECT * FROM pet';
     
         if(@$result=mysqli_query($link,$SQL))
     {
         
         echo "<table border = '1'>";
         echo "<tr><td>id</td><td>Name</td><td>Gender</td><td>Type</td><td>startTime</td><td>endTime</td><td>location</td><td>note</td></tr>";
         while($row=mysqli_fetch_assoc($result))
         {
             echo "<tr>";
             echo "<td>".$row['id']."</td><td>".$row['Name']."</td><td>".$row['gender']."</td><td>".$row['type']."</td><td>".$row['startTime']."</td><td>".$row['endTime']."</td><td>".$row['location']."</td><td>".$row['note']."</td><td><a href='acceptCheck.php?id=".$row['id']."'>接單</a></td>";
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
        
    </body>
</html>