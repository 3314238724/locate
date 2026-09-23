<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="1.php" method="POST" enctype="multipart/form-data">
    姓名：<input type="text" name="mingzi" placeholder="请输入姓名"><br><br>
    密码：<input type="password" name="mima" placeholder="请输入密码"><br><br>
    上传头像：<input type="file" name="touxiang" id="avatar" accept="image/*" required>
    <p>仅支持jpg/png/gif图片</p>
    <img id="previewImg" style="width:120px;display:none;"><br><br>
    年龄：
    <select name="nianling" >
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
    </select><br><br>
    性别：
    <input type="radio" name="xingbie" value="男" checked>男
    <input type="radio" name="xingbie" value="女">女<br><br>
    Email：<input type="text" name="email" placeholder="请输入邮箱"><br><br>
    身份证号：<input type="text" name="idcard" placeholder="18位身份证" maxlength="18"><br><br>

    <button type="submit">提交保存</button>
</form>

<script>
// 本地头像预览
document.getElementById('avatar').onchange = function(){
    const file = this.files[0];
    const preview = document.getElementById('previewImg');
    if(file){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(file);
    }
}
</script>
</form>


</body>
</html>