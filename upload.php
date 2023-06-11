<!DOCTYPE html>
<html>

<head>
<style>
        body
        {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: chocolate;
            font-weight: bold;
        }
        form
        {
            text-align: center;
        }
        h1{
            font-size: 40px;
            color: brown;
            
        }
        .button{
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
          color:chocolate;
          background-color: white;
          font-weight: bold;
        }
      
    </style>
</head>

<body>
<h1>訂單資訊</h1>
<?php

$PetName = $PetGender = $PetType = $CommissionStartTime = $CommissionFinishTime = $Location = $Comment = "";

$target_dir = "C:\Users\ASUS\OneDrive\Documents\sponge";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  
  // if everything is ok, try to upload file

  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "照片 ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " 已經上傳.<br>";
    $ImageSize = getimagesize($target_file);
    $displayImage = "data:".$ImageSize["mime"] .";base64," .base64_encode(file_get_contents($target_file));

  } else {
    echo "抱歉，上傳您的文件時出錯.";
  }
    //PetName
  
        $PetName = test_input($_POST["PetName"]);
       
      
      //PetGender
    
        $PetGender = test_input($_POST["PetGender"]);
     
         //PetType
     
        $PetType = test_input($_POST["PetType"]);
      
      //commissionTime
      
        $CommissionStartTime = test_input($_POST["CommissionTime1"]);
        $CommissionFinishTime = test_input($_POST["CommissionTime2"]);
      //location
      
        $Location = test_input($_POST["Location"]);
      
      //comment
      
        $Comment = test_input($_POST["comment"]);
    
    
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
?>



<?php
 echo '<img src="'.$displayImage.'" width="180" height="180" alt="My image" />';
 echo "<br><br>";
 echo "寵物名字: ".$PetName;
 echo "<br>";
 echo "寵物性別: ".$PetGender;
 echo "<br>";
 echo "寵物種類: ".$PetType;
 echo "<br>";
 echo "委託開始時間: ".$CommissionStartTime;
 echo "<br>";
 echo "委託結束時間: ".$CommissionFinishTime;
 echo "<br>";
 echo "面交地點: ".$Location;
 echo "<br>";
 echo "其他備註: ".$Comment;
?>

<p><input type="submit" value="接單" name="submit" id="bold" class="button"/> 
<button style="background-color:white; color: chocolate;font-weight: bold;" onclick="history.go(-1);">返回</button></p>

</body>
</html>