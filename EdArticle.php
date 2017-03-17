<?php
require_once 'handle/include.php';
session_start();
if(!isset($_SESSION['username'])){echo "<script>alert('请先登录！');window.location='Login.php';</script>";};

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
<form action="./handle/updataatc.php?articlenum=<?php echo $_GET['articlenum']?>" method="post">
<div id="articalmaintop">

<?php  $atcarray=hxzselect2('*','article',"id='{$_GET['articlenum']}'");
?>
<input class="inputxt" type="text" name="atc_title" value="<?php echo $atcarray['atc_title'];?>"/><br/>
</div>
<div class="articalcontent">
<textarea class="inputxt" name="atc_content" ><?php echo $atcarray['atc_content'];?></textarea><br/>
<input type="submit" class="btn" value="提交" />	
		</div>
</form>
</div>


</div>

<div id="Edborad" class="liststyle">
<ul class="">
<li><a href="./handle/deleteatc.php?user=<?php echo $atcarray['atc_author'];?>&id=<?php echo $atcarray['id'];?>">删除</a></li>
<li><a href="Article.php?articlenum=<?php echo $atcarray['id']?>">返回</a></li>
</ul>
</div>
<div id="footer"></div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
</body>
</html>