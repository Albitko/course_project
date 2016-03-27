<?php
	$db=mysql_connect('localhost','alex','123456');
	mysql_select_db("test",$db);

//Поместить новость в БД экспериментирую с вере
function InsertNews($value,$where)
{
	global $db;
	$request="INSERT INTO news_send ($where) VALUES ('$value')";
	$result= mysql_query($request,$db);
}
////доработать!
function UpdateNews($value,$where)
{
	global $db;
	$max_id='SELECT  MAX(id) FROM news_send';
	$request="UPDATE news_send SET $where=$value WHERE id = ('.$max_id.')' ";
	$result= mysql_query($request,$db);
}

//Забрать из БД последнюю новость
function SelectLastNews()
{

	$max_id='SELECT  MAX(id) FROM news_send';
	$request='SELECT title_news FROM news_send WHERE id = ('.$max_id.')';
	$result = mysql_fetch_array(mysql_query($request));
	return $result[0];//временно пока не разобрался с фетчареем	
}
//Забрать из БД N последних записей
function SelectManyNews($how_many)
{
	$request=mysql_query("SELECT title_news FROM news_send ORDER BY id  LIMIT ".$how_many);
	while ($result = mysql_fetch_array($request)) {
		$NEWS[]=$result;
	}
	return $NEWS;	
}


?>
