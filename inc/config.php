<?php ini_set('display_errors', '1');
define('DOMAIN', 'http://'.$_SERVER['HTTP_HOST']."/".'webform2/',true); //Apache (php 5.2.9, manual vhost conf)
//define('DOMAIN', 'http://'.$_SERVER['HTTP_HOST']."/",true); //Winginx, Denever (php 5.3.4, auto vhost conf)
//error_reporting  (E_ERROR | E_WARNING | E_PARSE);// Сообщать о простых ошибках во время выполнения
//error_reporting(0);
error_reporting (-1);
define ('BR',"<br />\n");
//$lang = NULL;
$defaultlang = 'ru';
?>