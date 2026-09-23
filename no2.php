<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
class text {
  function aaa(){
    echo '盒子'.__CLASS__;
    echo '函数名'.__FUNCTION__;
  }
}
$t=new text();
$t->aaa();
?>
</html>