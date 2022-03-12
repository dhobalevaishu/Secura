<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">  
    <input type="text" placeholder="Update file name" name="updateFileName" class="input" id ='input'>
    <input type="submit" value="Update" name="submit" id="btn">
  </form>
  <?php
    include 'connection.php';
    if(isset($_POST['submit'])){
      $updateFileName=$_POST['updateFileName'];
      $updateId=$_GET['id'];

      $updateQuery="UPDATE filedata SET name='$updateFileName'where id='$updateId'";

      $checkUpdateQuery=mysqli_query($con,$updateQuery);
      if($checkUpdateQuery){
        ?>
          <script>
            alert("File name updated successfully..")
            location.replace('checkform.php');
          </script>
        <?php
      }
    }
  ?>
</body>
</html>