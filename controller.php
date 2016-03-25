<?php 

require 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';

$a='h1.title';
$b='a.post_title';
$c='https://habrahabr.ru/hub/infosecurity/all/';
$d='4';
$n='1';

$old_news=Parse($a,$b,$c,$d);
//var_dump($old_news);

$new_news=Parse($a,$b,$c,$n);
//Рабочая функция выведения всех новых заголовков
do {
	$NEWS[]=$new_news;
	$n++;
	$new_news=Parse($a,$b,$c,$n);
} while ($old_news!=$new_news);
InserNews($NEWS[0]);
	var_dump($NEWS);


 ?>