<?php 
require './common/function.php';
require './common/init.php';
//导入数据，去除空格
$name = trim(input('post','name','s'));
$color = input('post','color','s');
$content = trim(input('post','content','s'));
$password = input('post','password','s');
//校对数据
$name = mb_strimwidth($name, 0, 16);
$name = $name ? $name:'匿名';
if(!in_array($color,['green','red','yellow','blue'])){
	$color = 'green';
 }
 $content = mb_strimwidth($content, 0, 100);
 $password = (string)substr($password,0,6);
 $time = time();
 //空留言不记录，返回主页
 if (empty($content)) {
    header('Location: index.php');
 	exit;
 	
 }
 //如果接受到ID则进行修改操作
 $id = max(input('get','id','d'),0);
 if ($id) {
 	$sql = 'SELECT `password` FROM `wish` WHERE `id` = '.$id;
 	$res = mysqli_query($link,$sql);
 	$data = mysqli_fetch_assoc($res);
 	if ($data['password']!==$password) {
 		exit('密码错误');
 	}
    $sql = 'UPDATE `wish` SET `name`=?,`color`=?,`content`=? WHERE `id`= ?';
    $stmt = mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt,'sssi',$name,$color,$content,$id);
    mysqli_stmt_execute($stmt);
    $page = max(input('get','page','d'),1);
    header("Location:index.php?page=$page");
    exit;
 }
 //数据预处理，绑定和执行添加数据（添加数据）
 $sql = 'INSERT INTO `wish` (`name`,`color`,`content`,`password`,`time`) VALUE (?,?,?,?,?)';
 $stmt = mysqli_prepare($link,$sql);
 mysqli_stmt_bind_param($stmt,'ssssi',$name,$color,$content,$password,$time);
 mysqli_stmt_execute($stmt);
 header('Location: index.php');
 ?>
