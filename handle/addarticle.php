<?php
require_once 'include.php';
session_start();
if($_POST['atc_title']&&$_POST['atc_content']){
$atc_title=mysql_real_escape_string($_POST['atc_title']);
$atc_content=mysql_real_escape_string($_POST['atc_content']);

if(hxzinsert('article','atc_author,atc_title,atc_content',array("{$_SESSION['username']}","{$atc_title}","{$atc_content}"))){
	AlertMessages("提交成功！", "../indexsss.php");
}
else{
	AlertMessages("提交失败，请重新提交！", "../WritePage.php");
};


}
else{
	AlertMessages("请完善信息！", "../WritePage.php");
};

