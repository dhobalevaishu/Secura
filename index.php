
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload file</title>
  <?php include 'indexcss.php'; ?>
</head>
<body>
  <div class="outer">
    <div class="inner">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" class="input" id="file"><br><br>
        <input type="submit" name="submit" class="input" id="btn">
      </form>
    </div>
  </div>
</body>
</html>
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
  $file = $_FILES['file'];
  print_r($file);
  $fileName = $file['name'];
  $fileType = $file['type'];
  $filePath = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  echo $fileName;
  $file=$_SESSION['file']=$file;
  print_r($file);
  if ($fileError == 0) {
    $descPath = "allFileData/" . $fileName;
    move_uploaded_file($filePath, $descPath);
    $insertQuery = "INSERT INTO `filedata`(`name`, `path`, `size`, `type`) VALUES ('$fileName','$descPath','$fileSize','$fileType')";

    $checkInsertQuery = mysqli_query($con, $insertQuery);
    if ($checkInsertQuery) {
    ?>
      <script>
        location.replace('checkform.php')
      </script>
    <?php
    } else {
    ?>
      <script>
        alert('someting went wrong')
      </script>
<?php
    }
  }
}


?>