<?php 
require_once 'handle/include.php';
session_start();
if(!isset($_SESSION['username'])){echo "<script>alert('请先登录！');window.location='Login.php';</script>";}
	

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Zen's Note</title>
<link href="css/mycss.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="js/xheditor_lang/zh-cn.js"></script>
</head>
<body>
<div id="header">
<div class="wrap">
<div id="title">
<p>#Zen's Note。<span>--记录路程点滴</span></p>
</div>
<div id="toplist">
<p class="welcome">欢迎你，<?php  echo @$_SESSION['username'];?></p>
<div id="probtn"><a href="javascript:void(0)">用户</a></div>
<div id="prolist">
<ul id="prolistUl" class="liststyle">
<li><a href="javascript:void(0)">登陆</a></li>
<li><a href="javascript:void(0)">个人设置</a></li>
<li><a href="javascript:void(0)">修改密码</a></li>
<li><a href="javascript:void(0)">退出</a></li>
</ul>
</div>
</div>
</div>
</div>
<div id="banner">
<div class="wrap"></div>
</div>
<div id="container">

<div id="writemain">
<div id="writemaintop">
<p>选择类型:</p>
<ul id="choosemode">
<li><a href="javascript:void(0)"><img alt="学习笔记" src="images/note.png"><span class="typename">学习笔记</span></a></li>
<li><a href="javascript:void(0)"><img alt="" src="images/memo.png"><span class="typename">日常记事</span></a></li>
<li><a href="javascript:void(0)"><img alt="" src="images/todo.png"><span class="typename">事务行程</span></a></li>
</ul>

</div>
<form id="writeform" action=".\handle\addarticle.php" method="post">
<div class="wrap">
<p class="wtitle">学习笔记</p>
<input class="inputxt" type="text" placeholder="输入记事标题"  name="atc_title"/><br/>
<textarea name="abstract "></textarea>
<textarea name="content" class="xheditor {skin:'default'}"></textarea>
<input type="submit" class="btn" value="提交" />
</div>
<div class="wrap">
<p class="wtitle">日常记事</p>
<input class="inputxt" type="text" placeholder="输入记事标题" name="atc_title"/><br/>
<input type="file" value="上传图片" />
<textarea class="inputxt" placeholder="输入内容" name="atc_content"></textarea><br/>
<input type="submit" class="btn" value="提交" />
</div>
<div class="wrap">
<p class="wtitle">事务行程</p>

<input type="submit" class="btn" value="提交" />
</div>
</form>
<div id="pleaselect"><img alt="" src="images/please_select.png"></div>
</div>


</div>

<div id="Edborad" class="liststyle">
<ul class="">
<li><a href="indexsss.php">首页</a></li>
</ul>
</div>
<div id="footer"></div>

</body>
</html>