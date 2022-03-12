<?php
  session_start();
  include 'connection.php';
  $recycleId=$_GET['id'];
  $deleteFileQuery="SELECT * FROM filedata WHERE id=$recycleId";
  $checkDeletedFileQuery=mysqli_query($con,$deleteFileQuery);

  if($checkDeletedFileQuery){

  $fetchDeleteFileData=mysqli_fetch_assoc($checkDeletedFileQuery);
  echo "<pre>";
  print_r($fetchDeleteFileData);
  $fileName=$fetchDeleteFileData['name'];
 echo $filePath=$fetchDeleteFileData['path'];
  $fileSize=$fetchDeleteFileData['size'];
  $fileType=$fetchDeleteFileData['type'];
  // echo $fileError=$fetchDeleteFileData['error'];
  echo "<pre>";
  $changePath='allFileData/'.$fileName;
  echo $changePath;

  move_uploaded_file($filePath,$changePath);
  
  include 'connection2.php';
  $insertQuery="INSERT INTO recycledata(name, path, size, type)VALUES('$fileName', '$changePath', '$fileSize', '$fileType')";
  $checkInsertQuery=mysqli_query($con,$insertQuery);

  if($checkInsertQuery){
    echo "insert";
    header('location:recycleCheckFormData.php?id='.$recycleId);

  }else{
    echo "no insert";
  }
          
}  