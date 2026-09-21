<html>
   
 <meta charset="UTF-8">
       
   
   
<head>
<?php
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'] ;
    $aihao=$_REQUEST['aihao'];
    $beizhu=$_REQUEST['beizhu'];
    $xingbie=$_REQUEST['xingbie'];
    
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($name)){
            $nameErr= "名字不能为空";
        }elseif(empty($email)){
            $emailErr= "邮箱不能为空";
        }elseif(empty($xingbie)){
            $xingbieErr= "性别不能为空";
        }else{
            $name= "名字(*必填)：" .$name;
            $email= "邮箱（*必填）：" .$email;    
            $beizhu= "</br>备注：" .$beizhu;
            $xingbie= "性别（*必填）：" .$xingbie;
        }
    }

       
        
   
    ?>
   
    <form action="" method="POST">
   姓名：<input type="text" name="name" placeholder="请输入姓名"><?php echo $nameErr ?><br>
   E-mail：<input type="text" name="email" placeholder="请输入邮箱"><?php echo $emailErr ?><br>
   爱好：<input type="checkbox" name="aihao[]" value="足球">足球
   <input type="checkbox" name="aihao[]" value="篮球">篮球
   <input type="checkbox" name="aihao[]" value="羽毛球">羽毛球
   <input type="checkbox" name="aihao[]" value="兵乓球">兵乓球<br>
   备注：<input type="text" name="beizhu" placeholder="请输入备注"><br>
   性别：<input type="radio" name="xingbie" value="男">男
   <input type="radio" name="xingbie" value="女">女<?php echo $xingbieErr ?><br>
   <input type="submit" value="提交">
    </form></br>
    <?php
    echo $name."</br>";
    echo $email."</br>";
    if(empty($aihao)){
    }else{
        echo "爱好：";
    foreach ($aihao as $ah){
        echo $ah=htmlspecialchars($ah)."    ";    
    }}  
    echo $beizhu."</br>";
    echo $xingbie."</br>";
    ?>
</head>
<body>
   

</body>
</html>