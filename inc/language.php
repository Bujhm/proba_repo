<?php
/**
* устанавливаем язык
*/
if (!empty($lang))
    {
   //$lang = $defaultlang;
   if (file_exists("./lang/{$lang}.php")) require_once("./lang/{$lang}.php");
   }
else
   {
   $lang = ((isset($_GET['lang'])&&!is_numeric($_GET['lang']))&&(($_GET['lang']=='en')||($_GET['lang']=='ru'))) ? $_GET['lang'] : $defaultlang;
   if (file_exists("./lang/{$lang}.php")) require_once("./lang/{$lang}.php");
   }
?>
