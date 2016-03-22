<?php
	$db=mysql_connect('localhost','alex','123456');
	mysql_select_db("test",$db);


function InsertNews($value)
{
	global $db;
	$request="INSERT INTO news_send (title_news) VALUES ('$value')";
	$result= mysql_query($request,$db);
}

function SelectNews()
{

	$max_id='SELECT  MAX(id) FROM news_send';
	$request='SELECT title_news FROM news_send WHERE id = ('.$max_id.')';
	$result = mysql_fetch_array(mysql_query($request));
	return $result;	
}





?>
