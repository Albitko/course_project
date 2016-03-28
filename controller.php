<?php 

require 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';

//Записать в БД новые записи с момента последней статьи
function InsertNewNews($sel_from_title,$sel_from_text,$sel_as_title,
	$sel_as_text, $url,$number, $old_news,$new_news,$where_title,$where_text){
	while ($old_news!=$new_news){
		$text_news=Parse($sel_from_text,$sel_as_text,$url,$number);
		//InsertNews($new_news,$where_title);
		//InsertTextNews($text_news,$where_text,$new_news);//??????
		InsertAllNews($where_text,$where_title,$new_news,$text_news);
		$number++;
		$new_news=Parse($sel_from_title,$sel_as_title,$url,$number);
	} 
}


$sel_from_title='h1.title';
$sel_as_title='a.post_title';
$url='https://habrahabr.ru/hub/infosecurity/all/';
$number='1';
$for_example='5';
//$old_news=SelectLastNews();
$old_news=Parse($sel_from_title,$sel_as_title,$url,$for_example);
$new_news=Parse($sel_from_title,$sel_as_title,$url,$number);
$where_title='title_news';
$sel_from_text='.shortcuts_item';
$sel_as_text='.html_format';
$where_text='text_news';


InsertNewNews($sel_from_title,$sel_from_text,$sel_as_title,
	$sel_as_text, $url,$number, $old_news,$new_news,$where_title,$where_text);



 ?>