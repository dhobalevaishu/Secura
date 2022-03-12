<?php
//     session_start();
    include 'connection2.php';
    $deleteId=$_GET['id'];
    echo $deleteId;
//     $recycleIdVariable=$_SESSION['id']=$deleteId;
//     echo $recycleIdVariable;
//     header('location:recycleBin.php');
// exit();
$deleteQuery="DELETE FROM recycledata WHERE id=$deleteId";
$checkDeleteQuery=mysqli_query($con,$deleteQuery);
if($checkDeleteQuery){
  ?>
  <script>
    alert("File deleted successfully");
  </script>
  <?php
  header('location:finallyRecycleData.php');
}else{
  ?>
  <script>
    alert("Something went wrong file can't be deleted.");
  </script>
  <?php
}
?>