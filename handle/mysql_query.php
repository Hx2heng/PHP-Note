<?php

require_once 'include.php';
//查询所有
function hxzselect($field,$table,$condition=null){
	if($condition){
		$query=mysql_query("select {$field} from {$table} where {$condition}");	
	}
	else 
	{
		$query=mysql_query("select {$field} from {$table}");
	};
	while(@$row = mysql_fetch_array($query))
	{
		$rows[]=$row;
	};
	return @$rows;
};
//查询一条
function hxzselect2($field, $table,$condition=null){
	if($condition){
		$query=mysql_query("select {$field} from {$table} where {$condition}");
	}
	else
	{
		$query=mysql_query("select {$field} from {$table}");
	};
	$row = mysql_fetch_array($query);
	return @$row;
}
//插入数据
function hxzinsert($table,$fields,$array){
	$fields2 = '';
	for($i=0;$i<count($array);$i++)
	{
	    $fields2=$fields2."'$array[$i]',";		
	};
	$fields3=substr($fields2,0,-1);
	$query="insert into {$table}({$fields}) values($fields3)";
	return mysql_query($query);
}


//删除数据
function hxzdelete($table,$condition){
	$sql="delete from {$table} where {$condition}";
	return mysql_query($sql);
}
//更新数据
function hxzupdata($table,$fields,$value,$condition=null){
	for($i=0;$i<count($fields);$i++){
	$sql="UPDATE {$table} SET {$fields[$i]} = {$value[$i]} WHERE {$condition} ";
	 mysql_query($sql);
	}
	
}