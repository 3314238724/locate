<?php
include("conn.php");
$msg = "";

// 判断是否是POST提交（点击登录按钮）
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $mingzi = $_POST['mingzi'];
    $mima = $_POST['mima'];
    // $_SESSION['login']="false";
    // 预处理语句，防止SQL注入
    $sql = "SELECT mingzi,mima FROM kkk_tbl WHERE mingzi=? AND mima=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $mingzi, $mima);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (@mysqli_num_rows($result) > 0) {
        $msg = "<span style='color:green'>✅登录成功！</span>";
        // 登录成功跳转示例，可打开下面注释
        header("location:youxi.php");
        // session_start();
        // $_SESSION['login']="true";
        // exit;
    } else {
        // $login="登陆失败";
        // $_SESSION['login']="false";
       // 登录失败提示 + 注册跳转链接
       $msg = "<span style='color:red'>❌账号或密码错误，登录失败</span>
       <br><br>
       <a href='3.php' style='color:blue;text-decoration:none;border:1px solid blue;padding:5px 10px;border-radius:4px'>没有账号？点击去注册</a>";
   }
    
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>用户登录</title>
    <style>
        .box{
            width:320px;
            margin:80px auto;
            padding:20px;
            border:1px solid #ccc;
            border-radius:8px;
        }
        input{
            width:100%;
            box-sizing:border-box;
            margin:8px 0;
            padding:8px;
            font-size:16px;
        }
    </style>
</head>
<body>
<div class="box">
    <h2 align="center">用户登录</h2>
    <form action="" method="post">
        姓名：<input type="text" name="mingzi" placeholder="请输入姓名" required>
        密码：<input type="password" name="mima" placeholder="请输入密码" required>
        <input type="submit" value="登录">
    </form>
    <div style="text-align:center;margin-top:15px">
        <?php echo $msg; ?>
    </div>
</div>
</body>
</html>
