<?php
require_once 'include.php';
$id=$_GET['articlenum'];
$atc_title=mysql_real_escape_string($_POST['atc_title']);
$atc_content=mysql_real_escape_string($_POST['atc_content']);

hxzupdata('article', array('atc_title','atc_content'), array("'$atc_title'","'$atc_content'"), "id={$id}");
AlertMessages('修改成功！', "../Article.php?articlenum={$id}");