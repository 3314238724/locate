<?php
header("Content-type:text/html;charset=utf-8");
//=====数据库信息 库名已经改成kkk=====
$host = "localhost";
$user = "root";
$pwd = "root";
$dbname = "kkk";
//=================================

//连接mysql
$conn = mysqli_connect($host,$user,$pwd,$dbname);
if(!$conn){
    die("数据库连接失败：".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8mb4");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mingzi = $_POST['mingzi'];
    $mima = $_POST['mima'];
    $nianling = $_POST['nianling'];
    $xingbie = $_POST['xingbie'];
    $email = $_POST['email'];
    $idcard = $_POST['idcard'];

    $touxiang_path = "";
    //处理图片上传
    if($_FILES['touxiang']['error'] == 0){
        $ext = strtolower(pathinfo($_FILES['touxiang']['name'],PATHINFO_EXTENSION));
        $allow = ["jpg","jpeg","png","gif"];
        if(in_array($ext,$allow)){
            $filename = time().rand(1000,9999).".".$ext;
            $savepath = "upload/".$filename;
            move_uploaded_file($_FILES['touxiang']['tmp_name'],$savepath);
            $touxiang_path = $savepath;
        }
    }

    $sql = "INSERT INTO kkk_tbl(mingzi,mima,nianling,xingbie,email,idcard,touxiang) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssissss",$mingzi,$mima,$nianling,$xingbie,$email,$idcard,$touxiang_path);

    if(mysqli_stmt_execute($stmt)){
        echo "<h3>✅提交成功，数据已经存入kkk_tbl表</h3>";
        if(!empty($touxiang_path)){
            echo "上传头像：<br><img src='$touxiang_path' style='width:150px'>";
        }
        echo "<br><a href='login.php'>前往登录页面</a>";
    }else{
        // ==========注册失败提示 + 返回注册链接==========
        echo "<h3 style='color:red'>❌注册失败：".mysqli_error($conn)."</h3>";
        // 点击跳转注册表单页面（假设你的注册表单页面名字是 register_form.html）
        echo "<br><a href='register_form.html'>点击返回注册页面重新填写</a>";
    }
    mysqli_stmt_close($stmt);
}
?>
