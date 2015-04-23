<?php
/**
* устанавливаем язык
*/
if ((isset($_GET['lang'])&&(!empty($_GET['lang']))&&!is_numeric($_GET['lang']))&&(($_GET['lang']=='en')||($_GET['lang']=='ru')))
    {
    	$lang = $_GET['lang'];
    }
elseif ((isset($_SESSION['lang'])&&(!empty($_SESSION['lang']))&&!is_numeric($_SESSION['lang']))&&(($_SESSION['lang']=='en')||($_SESSION['lang']=='ru')))
	{
   	   $lang = $_SESSION['lang'];
   	}
else { $lang = $defaultlang; }

if(file_exists("./lang/{$lang}.php"))
	{
		$_SESSION['lang'] = $lang;
		require_once("./lang/{$lang}.php");
	} else {die('Отсутствуют файлы языка'); }


?>