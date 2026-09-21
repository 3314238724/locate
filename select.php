<?php
include('conn.php');

// 先判断连接是否成功
if(!$conn){
    die("数据库连接失败：" . mysqli_connect_error());
}

$chaxun="select * from kkk_tbl;";
$lianjie=mysqli_query($conn,$chaxun);

// 判断SQL执行是否成功
if(!$lianjie){
    die("sql执行失败：" . mysqli_error($conn));
}

// var_dump($lianjie);
while($row=mysqli_fetch_assoc($lianjie)){
    $mingzi=$row['mingzi'];
    $mima=$row['mima'];
    echo "mingzi:".$mingzi."</br>"."mima:".$mima."</br>";


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>查询界面</h1>
    <form action="" method="get">
        <input type="text" name="chaxun">
        <input type="submit">
    </form>
    <?php
    include('conn.php');

    $chaxun=$_GET['chaxun'];
    if(is_numeric($chaxun)){
        $chaxun="id=$chaxun";
    }else{
        $chaxun="mingzi='$chaxun'";
    }
    $chaxun="select * from kkk_tbl where $chaxun;";
    $lianjie=mysqli_query($conn,$chaxun);
    $row=mysqli_fetch_assoc($lianjie);
    $mingzi=$row['mingzi'];
    $id=$row['id'];
    echo $id,"</br>",$mingzi;
    ?>




   
</body>
</html>