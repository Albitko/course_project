<?php 

require 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';
$x='1';
$old_news=SelectNews();
$new_news=ParseIt($x);
InsertNews($new_news);
//var_dump($old_news);
//var_dump($new_news);
for ($i=1;$old_news!=$new_news; $i++) { //БОЛЬШЕ 6 ОБЪЕКТОВ НЕ ПРЕНИМАЕТ
	//ВЫВОДИТ 6 И ОШИБКИ
	$NEWS[]=$new_news;
	$old_news=$new_news;
	$new_news=ParseIt($i);
}

print_r($NEWS);

 ?>