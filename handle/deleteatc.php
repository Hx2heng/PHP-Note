<?php
require_once 'include.php';
$id=$_GET['id'];
$user=$_GET['user'];
if(hxzdelete('article', "id='$id' and atc_author='$user'"))
{echo "<script>window.location='../indexsss.php';</script>"; }
else{AlertMessages('删除失败！', '../indexsss.php');};