<?php 

require_once 'simple_html_dom.php';//Подключаем библиотеку


function Parse($sel_from,$sel_as,$url,$how_many_news)
{
$html=file_get_html($url);
$i='0';
foreach ($html->find($sel_from) as $article) { 
	$news=$article->find($sel_as,0)->innertext;
	$i++;
	if ($i == $how_many_news) break; // прерывание цикла
	}
return $news;
}

$a='h1.title';
$b='a.post_title';
$c='https://habrahabr.ru/hub/infosecurity/all/';
$d='1';

$x=Parse($a,$b,$c,$d);
var_dump($x);

 

 ?>