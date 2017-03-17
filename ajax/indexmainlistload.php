<?php 
 require_once '../handle/include.php';
 session_start();
 $i=$_GET['i'];
 @$rows = hxzselect('id,atc_author,atc_title,atc_content,atc_time','article',"atc_author='{$_SESSION['username']}' order by atc_time desc limit {$i},5");

	if($rows){
 		 foreach ($rows as $key=>$value)
  	{
  		
?>
<div class="omainlist">
<h3 class="title"><?php echo ChangeTxt($value['atc_title']);?></h3>
<span class="time"><?php echo $value['atc_time'];?></span>
<p class="stext"><?php echo ChangeTxt($value['atc_content']);?></p>
<span class="dot circle size10"></span>
<span class="fenlei">所属分类:php</span>
<span class="delbtn hide"><a href="javascript:del(<?php echo $value['id']?>,'<?php echo $value['atc_author']?>');">X</a></span>
<a class="cheakmore" href="Article.php?articlenum=<?php echo $value['id']?>">查看全部内容</a>
</div>

<?php }; };?>