<?php
//     session_start();
    include 'connection.php';
    $deleteId=$_GET['id'];
    echo $deleteId;
//     $recycleIdVariable=$_SESSION['id']=$deleteId;
//     echo $recycleIdVariable;
//     header('location:recycleBin.php');
// exit();
$deleteQuery="DELETE FROM filedata WHERE id=$deleteId";
$checkDeleteQuery=mysqli_query($con,$deleteQuery);
if($checkDeleteQuery){
  ?>
  <script>
    alert("File deleted successfully");
  </script>
  <?php
  header('location:checkform.php');
}else{
  ?>
  <script>
    alert("Something went wrong file can't be deleted.");
  </script>
  <?php
}
?>