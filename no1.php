<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $servername="127.0.0.1";
    $username="root";
    $password="root";
    $no1=mysqli_connect($servername,$username,$password);
    if(!$no1){
      die("connection failed:".mysqli_connect());

    }
    echo "连接成功";
    $sql="CREATE DATABASE kkk ";
    mysqli_query($no1,$sql);
// mysqli_close($no1);
  ?>


</body>
</html>