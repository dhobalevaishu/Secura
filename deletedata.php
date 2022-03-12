<?php
//     session_start();
    include 'connectionsecura.php';
    $deleteId=$_GET['id'];
    echo $deleteId;
//     $recycleIdVariable=$_SESSION['id']=$deleteId;
//     echo $recycleIdVariable;
//     header('location:recycleBin.php');
// exit();
$deleteQuery="DELETE FROM securedata WHERE id=$deleteId";
$checkDeleteQuery=mysqli_query($condb,$deleteQuery);
if($checkDeleteQuery){
  ?>
  <script>
    alert("File deleted successfully");
  </script>
  <?php
  header('location:finallySecureForm.php');
}else{
  ?>
  <script>
    alert("Something went wrong file can't be deleted.");
  </script>
  <?php
}
?>