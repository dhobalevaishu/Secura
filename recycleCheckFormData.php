<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>recycleBin</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <?php include "recycleFormDataCss.php" ?>
</head>
<body>
<div class="outer">
    <div class="inner">
      <a href="checkform.php"><button>check form</button></a>
      <a href="secureForm.php"><button>secureData</button></a>
      <table>
        <p>store data securely</p>
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>path</th>
            <th>size</th>
            <th>type</th>
            <th colspan="2">oprations</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'connection2.php';
            echo $deleteId=$_GET['id'];
            $selectQuery="SELECT * FROM recycledata";
            $checkSelectQuery=mysqli_query($con,$selectQuery);
            if($checkSelectQuery){
              // var_dump($res);
              while($res=mysqli_fetch_array($checkSelectQuery)){
              ?>
                 <tr>
                  <td><?php echo $res['id'];?></td>
                  <td><?php echo $res['name'];?></td>
                  <td><a href="<?php echo $res['path'];?>"><?php echo $res['path'];?></a></td>
                  <td><?php echo $res['size'];?></td>
                  <td><?php echo $res['type'];?></td>
                  <td><a href="securaBin.php?id=<?php echo $res['id'] ?>"><i class="icon-trash"></i> </a>
                </tr>
              <?php
                header('location:delete.php?id='.$deleteId);
              }
            }
          ?>
        </tbody>
      </table>
</body>
</html>