<?php 

require_once 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';
require 'functions.php';

$old_news=SelectNews();
$new_news=ParseIt();

 ?>