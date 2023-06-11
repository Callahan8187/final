<!DOCTYPE html>
<html>

<head>
<style>
        body
        {
            background-image: url('https://img.freepik.com/free-vector/cat-lover-pattern-background-design_53876-100662.jpg');
        }
        
        .form-center{
            background-image: url("n.jpg");
            background-position: right;
            justify-content: right;
            display: flex;
            width: fit-content;
            height: fit-content;
                        
        }
        h1{
            font-size: 40px;
            color: brown;
            
        }
        p{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: chocolate;
            font-weight: bold;
        }
        #bold{
            font-weight: bold;
            color:chocolate;
        }
        .error
        {
            color:red;
        }
</style>


</head>

<body>

<h1>委託申請</h1>


<p><span class="error">* 必填項目</span></p>

<div class="form-center" >
<form action="upload.php" method="post" enctype="multipart/form-data">

<p><label for="file" style="cursor: pointer;">請上傳寵物照片 :</label><span class="error">* </span></p>
  
  <p><img id="output" width="150" /></p>
<p><input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="loadFile(event)" required></p>
 
  
<script>
    var loadFile = function(event){
        var image = document.getElementById('output');
        image.src=URL.createObjectURL(event.target.files[0]);
    };
 </script>


  
  <p>寵物名字 : <input type="text" name="PetName" id="PetName" required><span class="error">* </span><br></p>
  <p>寵物性別 : <span class="error">* </span><br>
  <input type="radio" name="PetGender" value="男性"><label for="Male"required>男性</label>
  <input type="radio" name="PetGender" value="女性"><label for="Female">女性</label></p>

  <p>寵物種類 : <input type="text" name="PetType" id="PetType"required><span class="error">* </span><br></p>
  <p>委託開始時間 : <input type="datetime-local" name="CommissionTime1" id="CommissionStart" required><span class="error">* </span><br></p>
  <p>委託結束時間 : <input type="datetime-local" name="CommissionTime2" id="CommissionFinish" required><span class="error">* </span><br></p>
  <p>面交地點 : <span class="error">* </span><br>
  <input type="radio" name="Location" value="高雄站" id="Location1"><label for="Location1"required>高雄站</label>
  <input type="radio" name="Location" value="台北站" id="Location2"><label for="Location2">台北站</label>
  <input type="radio" name="Location" value="桃園站" id="Location3"><label for="Location3">桃園站</label>
  <input type="radio" name="Location" value="台南站" id="Location4"><label for="Location4">台南站</label>
  <input type="radio" name="Location" value="屏東站" id="Location5"><label for="Location5">屏東站</label>
  </p>

  <p>其他備註 : </p>
  <textarea name="comment" cols="30" rows="10">
</textarea> 
<br>
<p><input type="submit" value="確認" name="submit" id="bold"> <input type="reset" value="重填" name="reset" id="bold"></p>
</form>
</div>

</body>
</html>