<?php
require_once 'include.php';

header("Content-Type:text/html;charset=utf-8"); 

@mysql_connect('localhost','root','');



mysql_select_db('mynote');

mysql_query("SET NAMES UTF8");
