<?php 

require 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';

$old_news=SelectNews();
$new_news=ParseIt();
var_dump($old_news);
var_dump($new_news);

while ($old_news!=$new_news) {
	$old_news=$new_news;
	$new_news=//следующая новост???
}

 ?>