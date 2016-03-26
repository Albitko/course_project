<?php 

require 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';

$sel_from='h1.title';
$sel_as='a.post_title';
$url='https://habrahabr.ru/hub/infosecurity/all/';
$number='1';
$for_example='5';
//$old_news=SelectLastNews();
$old_news=Parse($sel_from,$sel_as,$url,$for_example);
$new_news=Parse($sel_from,$sel_as,$url,$number);

//Рабочая функция выведения всех новых заголовков
while ($old_news!=$new_news){
	InsertNews($new_news);
	$number++;
	$new_news=Parse($sel_from,$sel_as,$url,$number);
} 

$NEWS=SelectManyNews($number);
print_r($NEWS);
/*
do {
	$NEWS[]=$new_news;
	$n++;
	$new_news=Parse($a,$b,$c,$n);
} while ($old_news!=$new_news);

InserNews($NEWS[0]);
	var_dump($NEWS);

*/

 ?>