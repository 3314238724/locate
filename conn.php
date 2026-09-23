<?php
header("Content-type:text/html;charset=utf-8");
//数据库信息
$host = "localhost";
$user = "root";
$pwd = "root";
$dbname = "kkk";

//连接mysql
$conn = mysqli_connect($host,$user,$pwd,$dbname);
if(!$conn){
    die("数据库连接失败：".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8mb4");
?>
<?php
header("Content-type:text/html;charset=utf-8");
//数据库信息
$host = "localhost";
$user = "root";
$pwd = "root";
$dbname = "kkk";

//连接mysql
$conn = mysqli_connect($host,$user,$pwd,$dbname);
if(!$conn){
    die("数据库连接失败：".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8mb4");
?>
