<?php 

/**
* Класс парсинга
*/
class Parse
{
	public $news;
	function Parsing($sel_from,$sel_as,$url,$how_many_news)
{
$html=file_get_html($url);
$i='0';
foreach ($html->find($sel_from) as $article) { 
	$this->news=$article->find($sel_as,0)->innertext;
	$i++;
	if ($i == $how_many_news) break; // прерывание цикла
	}
return $this->news;
}
	function __construct()
	{
		require_once 'simple_html_dom.php';//Подключаем библиотеку
	}
}
/*
$sel_from_title='h1.title';
$sel_as_title='a.post_title';
$url='https://habrahabr.ru/hub/infosecurity/all/';
$for_example='5';
$a= new Parse();
$a->Parsing($sel_from_title,$sel_as_title,$url,$for_example);
*/
 ?>