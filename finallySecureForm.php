<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <title>Secure Form</title>
</head>
<a href="finallyRecycleData.php"><button class="button">RecycleBin</button></a>
<body>
  <div class="header">
  <p class="heading">Secura</p>
  </div>
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>path</th>
        <th>size</th>
        <th>type</th>
        <th>opration</th>
      </tr>
    </thead>
    <tbody>
    <?php
          include 'connectionsecura.php';
          include 'checkformcss.php';
          // echo $securaId=$_GET['id'];
          $selectQuery = "select * from securedata";
          $checkSelectQuery = mysqli_query($condb, $selectQuery);
          // echo $selectQuery['name'];
          $numRow = mysqli_num_rows($checkSelectQuery);
          while ($res = mysqli_fetch_array($checkSelectQuery)) {
          ?>
            <tr>
              <td><?php echo $res['id']; ?></td>
              <td><?php echo $fileName=$res['name']; ?></td>
              <td><a href="<?php echo $res['path']; ?>"><?php echo $res['path']; ?></a></td>
              <td><?php echo $res['size'].'KB'; ?></td>
              <td><?php echo $res['type']; ?></td>
              <td><a href="deletedata.php?id=<?php echo $res['id'] ?>"><i class="icon-trash"></i> </a>
              </td>
            </tr>
          <?php
          // header('location:deleterecycledata.php?id='.$securaId);
          }
          ?>
    </tbody>
  </table>
</body>
</html>