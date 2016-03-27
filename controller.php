<?php 

require 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';

//Записать в БД новые записи с момента последней статьи
function InsertNewNews($sel_from,$sel_as,$url,$number,
	$old_news,$new_news,$where){
	while ($old_news!=$new_news){
		InsertNews($new_news,$where);
		$number++;
		$new_news=Parse($sel_from,$sel_as,$url,$number);
	} 
}


$sel_from='h1.title';
$sel_as='a.post_title';
$url='https://habrahabr.ru/hub/infosecurity/all/';
$number='1';
$for_example='5';
//$old_news=SelectLastNews();
$old_news=Parse($sel_from,$sel_as,$url,$for_example);
$new_news=Parse($sel_from,$sel_as,$url,$number);
$where='title_news';
/*
//Рабочая функция выведения всех новых заголовков
while ($old_news!=$new_news){
	InsertNews($new_news);
	$number++;
	$new_news=Parse($sel_from,$sel_as,$url,$number);
} */
InsertNewNews($sel_from,$sel_as,$url,$number,
	$old_news,$new_news,$where);
$NEWS=SelectManyNews(4);
print_r($NEWS);
/*
$a='.shortcuts_item';
$b='.html_format';
$x=Parse($a,$b,$url,$number);
var_dump($x);*/
 ?>