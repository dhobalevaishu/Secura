<?php
  session_start();
  include 'connection2.php';
  $securaId=$_GET['id'];
  echo $securaId;
  $deleteFileQuery="SELECT * FROM recycledata WHERE id=$securaId";
  $checkDeletedFileQuery=mysqli_query($con,$deleteFileQuery);
  if($checkDeletedFileQuery){
    $fetchAllData=mysqli_fetch_assoc($checkDeletedFileQuery);
    echo "<pre>";
    print_r($fetchAllData);
    echo "<pre>";
    $fileName=$fetchAllData['name'];
    $filePath=$fetchAllData['path'];
    $fileSize=$fetchAllData['size'];
    $fileType=$fetchAllData['type'];
    $descPath='allFileData/'.$fileName;
    move_uploaded_file($filePath,$descPath);
    include 'connectionsecura.php';
    $insertQuery="INSERT INTO securedata(name, path, size, type)VALUES('$fileName', '$descPath', '$fileSize', '$fileType')";
    $checkInsertQuery=mysqli_query($condb,$insertQuery);
    if($checkInsertQuery){
      echo "yes";
      header('location:secureForm.php?id='.$securaId);
    }else{
      echo "no";
    }
  }

  