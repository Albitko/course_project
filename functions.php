<?php 

require_once 'simple_html_dom.php';//Подключаем библиотеку
require 'db.php';

function ParseIt()
{
	$how_many_news='1';//Количество новостей, для парсинга
	$html=file_get_html('http://rg.ru/tema/mir/');
	$i=0;
foreach ($html->find('.b-news-inner__list-item') as $article) { 
$news=$article->find('a.b-link_title', 0)->innertext;
$i++;
if ($i == $how_many_news) break; // прерывание цикла
}
return $news;
}
$a= ParseIt();
var_dump($a);

InsertNews($a);
$nw=SelectNews();
print_r($nw[0]);//посмотреть ФУНКЦИЮ ФЕТЧАРЕЙ МОЖЕТ МОЖНО ВЫВОДИТЬ НЕ МАССИВ А СТРОКУ






//Вывод сообщений
/*
for ($j = 0; $j < $last_news; $j++) {
  echo '<div class="news_post">';
  echo '<p class="text">' . $news[$j]['text'] . '</p>';
  echo '<p class="about">' . $news[$j]['time'] . '</p>';
  echo '</div>';
}
*/



 //$html->clear(); 
 //unset($html);
 ?>