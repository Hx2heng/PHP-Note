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
<li><a href="Login.php?action=outlogin">退出</a></li>
</ul>
</div>
</div>
</div>
</div>
<div id="banner">
<div class="wrap"></div>
</div>
<div id="container">

<div id="main">
<div class="timeline"></div>
<div id="maintop">
<div id="maintopleft">
<div class="circle size20"></div>
</div>
<div id="maintopright">
<a href="WritePage.php" class="btn">写点什么</a>
</div>
</div>
<div id="mainlist">
<?php 
$i=5;
if(@$_GET['keyword']){
	$rows = hxzselect('id,atc_author,atc_title,atc_content,atc_time','article',"atc_author='{$_SESSION['username']}' and atc_title like '%{$_GET['keyword']}%'");
}
else{
  	@$rows = hxzselect('id,atc_author,atc_title,atc_content,atc_time','article',"atc_author='{$_SESSION['username']}' order by atc_time desc limit 0,{$i}");
};
	if($rows){
 		 foreach ($rows as $key=>$value)
  	{
  		
?>
<div class="omainlist">
<h3 class="title"><?php echo ChangeTxt($value['atc_title']);?></h3>
<span class="time"><?php echo $value['atc_time'];?></span>
<p class="stext"><?php echo substr(ChangeTxt($value['atc_content']),0,300);?></p>
<span class="dot circle size10"></span>
<span class="fenlei">所属分类:php</span>
<script type="text/javascript">
function del(id,user){
 $.get("./handle/deleteatc.php?id="+id+"&user="+user);
 
  	}
</script>
<span class="delbtn hide"><a href="javascript:del(<?php echo $value['id']?>,'<?php echo $value['atc_author']?>');">X</a></span>
<a class="cheakmore" href="Article.php?articlenum=<?php echo $value['id']?>">查看全部内容</a>
</div>
<?php }; };?>
<div class="loading"><img src="images/loading.gif"/></div>
</div>
</div>

<div id="side">
<div id="sidetop">
<form id="sform" method="get">
<span class="sidetoptxt">搜索</span>
<input class="inputxt" type="text" placeholder="输入搜索关键字" name="keyword" value="<?php if(@$_GET['keyword']){echo @$_GET['keyword'];}?>"/>
<input type="submit" class="inpubtn btn" value="搜索 " />
</form>
</div>
<div id="sideslide"></div>
</div>
</div>

<div id="footer"></div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
</body>
</html>