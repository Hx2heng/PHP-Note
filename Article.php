<?php 
require_once 'handle/include.php';
session_start();
if(!isset($_SESSION['username'])){echo "<script>alert('请先登录！');window.location='Login.php';</script>";}else{
	if(!isset($_GET['articlenum'])){AlertMessages('文章已经不存在!', './indexsss.php');
	
	
	};}

	
	
	
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Zen's Note</title>
<link href="css/mycss.css" rel="stylesheet" type="text/css" />

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

<div id="articalmain">
<div id="articalmaintop">
<?php  if(!$atcarray=hxzselect2('*','article',"id='{$_GET['articlenum']}'")){AlertMessages('文章已被删除!', './indexsss.php');}else
?>
<h1 style="width:100%;word-wrap: break-word;"><?php echo ChangeTxt($atcarray['atc_title']);?></h1>
<p><?php echo $atcarray['atc_time'];?></p>
</div>
<div class="articalcontent">
<?php echo setxtlink(ChangeTxt($atcarray['atc_content']));?>		
		</div>
</div>


</div>

<div id="Edborad" class="liststyle">
<ul class="">
<li><a href="EdArticle.php?articlenum=<?php echo $_GET['articlenum'];?>">编辑</a></li>
<li><a href="./handle/deleteatc.php?user=<?php echo $atcarray['atc_author'];?>&id=<?php echo $atcarray['id'];?>">删除</a></li>
<li><a href="indexsss.php">首页</a></li>
</ul>
</div>
<div id="footer"></div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
</body>
</html>