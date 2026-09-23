<?php
session_start();
echo $_SESSION['login'];
if($_SESSION['login']==false){
    echo "你未登录，非法访问";
    echo "<a herf='denglu.php'>点击跳转到登陆页面</a>";
}
include("conn.php");
// 查询全部用户数据
$sql = "SELECT * FROM kkk_tbl";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>游戏主页</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Microsoft Yahei;}
        body{background:#1a1a2e;color:#fff;padding:20px;}
        .game-box{
            width:900px;
            margin:0 auto;
        }
        .header{
            text-align:center;
            padding:30px 0;
            font-size:36px;
            color:#4fc3f7;
        }
        .info-title{
            font-size:22px;
            margin:20px 0;
            color:#ffd54f;
        }
        table{
            width:100%;
            border-collapse: collapse;
            background:#16213e;
            border-radius:8px;
            overflow:hidden;
        }
        th,td{
            border:1px solid #334155;
            padding:12px;
            text-align:center;
        }
        th{
            background:#0f3460;
            color:#4fc3f7;
        }
        img.avatar{
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:50%;
        }
        .btn-group{
            margin:30px 0;
            text-align:center;
        }
        a.btn{
            display:inline-block;
            padding:12px 24px;
            background:#e94560;
            color:white;
            text-decoration:none;
            border-radius:6px;
            margin:0 8px;
        }
        a.btn:hover{
            background:#c5344b;
        }
    </style>
</head>
<body>
<div class="game-box">
    <div class="header">🎮 游戏玩家中心</div>

    <div class="btn-group">
        <a class="btn" href="login.php">返回登录</a>
        <a class="btn" href="select.php">单独查询玩家</a>
    </div>

    <div class="info-title">📋 全部玩家信息（读取 kkk_tbl 数据库）</div>
    <table>
        <tr>
            <th>ID</th>
            <th>玩家姓名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>邮箱</th>
            <th>头像</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['mingzi']; ?></td>
            <td><?php echo $row['nianling']; ?></td>
            <td><?php echo $row['xingbie']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <?php if(!empty($row['touxiang'])){ ?>
                    <img class="avatar" src="<?php echo $row['touxiang']; ?>">
                <?php }else{ ?>
                    无头像
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
