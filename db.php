<?php
	$db=mysql_connect('localhost','alex','123456');
	mysql_select_db("test",$db);


function InsertNews($value)
{
	global $db;
	$request="INSERT INTO news_send (title_news) VALUES ('$value')";
	$result= mysql_query($request,$db);
}

function SelectNews()//Исправить название на SelectLastNews
{

	$max_id='SELECT  MAX(id) FROM news_send';
	$request='SELECT title_news FROM news_send WHERE id = ('.$max_id.')';
	$result = mysql_fetch_array(mysql_query($request));
	return $result[0];//временно пока не разобрался с фетчареем	
}

function SelectManyNews($how_many)
{
	$request=mysql_query("SELECT title_news FROM news_send ORDER BY id  LIMIT ".$how_many);
	while ($result = mysql_fetch_array($request)) {
		$NEWS[]=$result;
	}
	return $NEWS;	
}


$j=SelectManyNews(2);//????

print_r($j);

?>
