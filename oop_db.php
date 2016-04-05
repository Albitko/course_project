<?php 

/**
* Создаем родительский класс с подключением к БД
*/
class BD
{

public $db_connect;

function __construct()
	{
		$this->db_connect=mysql_connect('localhost','alex','123456');
		mysql_select_db("test",$this->db_connect);
		mysql_query('set names utf8');
	}

}

#Создали класс наследник который 
#при создании подключается к нашей бд
class InsertNews extends BD
{
public $result; #В эту перменную записываем 
#результат почти всех функций

#Добавть одну новость
function InsertOneNews($value,$where)
{

	$request="INSERT INTO news_send ($where) VALUES ('$value')";
	$this->result= mysql_query($request,$this->db_connect);
}

#Добавить новость целиком [заголовок]->[текст]
function InsertAllNews($where_text,$where_title,$title,$text)
{
	$request="INSERT INTO news_send ($where_title,$where_text)
	VALUES ('$title','$text')";
	$this->result= mysql_query($request,$this->db_connect);
}
}

class SelectNews extends BD
{
public $result; #В эту перменную записываем 
#результат почти всех функций

#Забрать заголовок последней новости
function SelectLastNews()
{
	$max_id='SELECT  MAX(id) FROM news_send';
	$request='SELECT title_news FROM news_send WHERE id = ('.$max_id.')';
	$this->result = mysql_fetch_array(mysql_query($request));
	return $this->result[0];
}

//Забрать из БД N последних записей
function SelectManyNews($how_many)
{
	$request=mysql_query("SELECT title_news, text_news FROM news_send ORDER BY id  LIMIT ".$how_many);
	while ($result = mysql_fetch_array($request,MYSQL_ASSOC)) {
		$NEWS[]=$result;
	}
	return $NEWS;	
}

}
	

//Пример вызова функции
//$Dase=new News();
//print_r( $Dase->SelectManyNews('3'));


 ?>