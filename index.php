<?php 
//链接数据库属性文件和函数文件
require './common/init.php';
require './common/function.php';
/*$sql = 'SELECT `id`,`name`,`content`,`time`,`color` FROM `wish`';*/
//确定当前页数和需要显示的内容
$page = max(input('get','page','d'),1);
$size = 4;
$sql = 'SELECT `id`,`name`,`content`,`time`,`color` FROM `wish`
ORDER BY `id` DESC LIMIT '.page_sql($page,$size); 
//将所选四个内容进行循环输出
$res = mysqli_query($link,$sql);
$data = mysqli_fetch_all($res,MYSQLI_ASSOC);
//当该页码没有内容时，自动跳转回第一页
if (empty($data)&&$page>1) {
	header('Location:index.php?page=1');
	exit;
}
//确定总页数
$sql = 'SELECT count(*) FROM `wish`';
$res = mysqli_query($link,$sql);
$total = (int)mysqli_fetch_row($res)[0];
//用GET方式从URL获取ID值
$id = max(input('get','id','d'),0);
$action = input('get','action','s');
//核对对应ID的密码
if ($id) {
	$password = input('post','password','s');
	$sql="SELECT `name`,`color`,`content`,`password` FROM `wish` WHERE `id`=".$id;
	$res=mysqli_query($link,$sql);
	if (!$edit = mysqli_fetch_assoc($res)) {
	 	exit("该内容不存在");
	 } 
	 mysqli_free_result($res);
	 $checked = isset($_POST['password']);
	 //如果收到delete动作，验证密码执行删除
	 if ($checked&&$action=='delete') {
	 	if ($checked && $password!==$edit['password']) {
	 	$tips = "密码错误！";
	 	$checked = false;
	 }else{
	 	$sql = 'DELETE FROM `wish` WHERE `id`='.$id;
	 	$res = mysqli_query($link,$sql);
	 	$page = max(input('get','page','d'),1);
	 	header("Location:index.php?page=$page");
	 	exit;}
	 }
	 //没有动作，执行修改，验证密码后打开编辑界面
	 if ($checked && $password!==$edit['password']) {
	 	$tips = "密码错误！";
	 	$checked = false;
	 }

}
require './view/index.html';




?>

