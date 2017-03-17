<?php
session_start();
require_once 'include.php';
$username = $_POST['username'];
$password = $_POST['password'];
$res=mysql_query("select username,password from admin where username = '{$username}'");
$res2=mysql_query("select username,password from admin where username = '{$username}' and password='{$password}'");
$row=mysql_fetch_row($res);
$row2=mysql_fetch_row($res2);

if(empty($username)){
	echo "<script>alert('请输入用户名');window.location='../Login.php';</script>";
}
else if(!$row)
{ echo "<script>alert('用户名不不存在');window.location='../Login.php';</script>";  }
else if(!$row2)
{ echo "<script>alert('密码不正确！');window.location='../Login.php';</script>";  }
else
{
 
   $_SESSION['username']=$username;
	
	echo "<script>window.location='../indexsss.php';</script>";  }

	
