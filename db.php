<?php
	$db=mysql_connect('localhost','alex','123456');
	mysql_select_db("test",$db);
	mysql_query('set names utf8');
//Поместить новость в БД экспериментирую с вере
function InsertNews($value,$where)
{
	global $db;
	$request="INSERT INTO news_send ($where) VALUES ('$value')";
	$result= mysql_query($request,$db);
}
////доработать!
function InsertAllNews($where_text,$where_title,
	$title,$text)
{
	global $db;
	$request="INSERT INTO news_send ($where_title,$where_text)
	VALUES ('$title','$text')";
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
{//Надо расширить тайтл невс и текстневс
	$request=mysql_query("SELECT title_news, text_news FROM news_send ORDER BY id  LIMIT ".$how_many);
	while ($result = mysql_fetch_array($request,MYSQL_ASSOC)) {
		$NEWS[]=$result;
	}
	return $NEWS;	
}


?>
