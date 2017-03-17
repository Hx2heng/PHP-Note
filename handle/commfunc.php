<?php
function AlertMessages($mes,$addr){
	
	echo "<script>alert('{$mes}');window.location='{$addr}';</script>";
	
	
};
function Gotofuck($addr){
	
	echo "<script>window.location='{$addr}';</script>";
}
 
//文本处理
function ChangeTxt($txt){
	
	//$txt= htmlspecialchars($txt);
	$txt=nl2br(htmlentities($txt));
	
	return $txt;
}
//设置文本超链接
function setxtlink($text){
	$search = array('|(http://[^ ]+)|', '|(https://[^ ]+)|', '|(www.[^ ]+)|');
	$replace = array('<a href="$1" target="_blank" style="color:rgb(13, 148, 245)">$1</a>', '<a href="$1" target="_blank" style="color:rgb(13, 148, 245)">$1</a>', '<a href="http://$1" target="_blank" style="color:rgb(13, 148, 245) ">$1</a>');
	$text = preg_replace($search, $replace, $text);
	return $text;
}