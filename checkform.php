<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <title>File Explorer</title>
</head>

<body>
  <div class="outer">
    <div class="inner">
      <a href="index.php"><button class="button">Upload file</button></a>
      <a href="finallyRecycleData.php"><button class="button-next">RecycleBin</button></a>
      <table>
        <div class="header">
        <p class="heading">File Explorer</p>
        </div>
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
          include 'connection.php';
          include 'checkformcss.php';
          $selectQuery = "select * from filedata";
          $checkSelectQuery = mysqli_query($con, $selectQuery);
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
              <td><a href="updateName.php?id=<?php echo $res['id'] ?>"><i class="icon-edit"></i></a>
              <td><a href="recycleBin.php?id=<?php echo $res['id'] ?>"><i class="icon-trash"></i> </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>