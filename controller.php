<?php 

	require 'simple_html_dom.php';//Подключаем библиотеку
	require 'oop_db.php';
	require 'oop_funktions.php';

//Записать в БД новые записи с момента последней статьи
/**
* Итоговый класс
*/

class ParsingWhatNeed extends Parse
{
	
	function InsertParsingNews($sel_from_title,$sel_from_text,$sel_as_title,
	$sel_as_text, $url,$number, $old_news,$new_news,$where_title,$where_text){
	while ($old_news!=$new_news){
		$all=new InsertNews;
		$text_news=parent::Parsing($sel_from_text,$sel_as_text,$url,$number);
		//InsertNews($new_news,$where_title);
		$all->InsertAllNews($where_text,$where_title,$new_news,$text_news);
		$number++;
		$new_news=parent::Parsing($sel_from_title,$sel_as_title,$url,$number);
	} 
	return true;
}


}

$newses=new Parse();
$final=new ParsingWhatNeed();
$database=new SelectNews();

$sel_from_title='h1.title';
$sel_as_title='a.post_title';
$url='https://habrahabr.ru/hub/infosecurity/all/';
$number='1';
$for_example='5';
//$old_news=SelectLastNews();
$old_news=$newses->Parsing($sel_from_title,$sel_as_title,$url,$for_example);
$new_news=$newses->Parsing($sel_from_title,$sel_as_title,$url,$number);
$where_title='title_news';
$sel_from_text='.shortcuts_item';
$sel_as_text='.html_format';
$where_text='text_news';


if ($final->InsertParsingNews	($sel_from_title,$sel_from_text,$sel_as_title,
$sel_as_text, $url,$number, $old_news,$new_news,$where_title,$where_text)=="true") {
	echo "Свежие новости уже в БД";
} else {
	echo "Упссс....";
}
//$final->InsertParsingNews	($sel_from_title,$sel_from_text,$sel_as_title,
//$sel_as_text, $url,$number, $old_news,$new_news,$where_title,$where_text);
//$XT=$database->SelectManyNews(4);
//var_dump($XT);


 ?>