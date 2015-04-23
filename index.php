<?php session_start();ob_start();
//require_once('inc/charset.php');
require_once('inc/config.php');
//require_once('classes/db.php');
require_once('inc/language.php');
//require_once('classes/tools.php');
//require_once('classes/db_func.php');
//require_once('classes/user.php');
require_once('inc/session.php');
// Имя файла с классом строго соответствует имени класса
function __autoload($class_name) // автоматическое подключение классов
{
  if(file_exists("classes/$class_name.php"))
  {
  include("classes/$class_name.php");
  }

}
db::connect();

$pagetitle = $lang['main_page'];

if((isset($_GET['file'])&&($_GET['file']=='login'))&&(!isset($_POST['user'])&&!isset($_POST['password'])))
  {  //require_once('loginform.htm');
      $_GET['file']='login';
  }
  elseif((isset($_GET['file'])&&($_GET['file']=='login'))&&(isset($_POST['user'])&&isset($_POST['password'])))
  {
    $user = new user(); // создаём объект для того чтобы дальше им пользоваться и использовать его методы
    $rows = $user -> login($_POST['user'],$_POST['password']) ;

    if (count($rows) >0 )
      { // если в базе присудствует такая запись то регестрируется пременная
       register_user( $_POST['user'] );
       $user->getFromArrayToObject($rows[0]);
     }
       check_session();

 }elseif( isset($_SESSION['valid_user']) && !empty($_SESSION['valid_user']) && (isset($_GET['file'])&&($_GET['file']=='member')))
    {
    $clean_id = strip_tags(trim($_GET['id']));
        if (is_numeric($clean_id)) {
        $id = $clean_id;
        check_session();
        $user = new user();
        $rows= $user->get( $_GET['id'] );
        $user->getFromArrayToObject($rows[0]);
        //$user=unserialize($string_user);
        }else die('Hacking detected...');
    }
    // проверяем введенные данные фомы Регистрация и заносим в базу
     if(isset($_GET['file']) && ($_GET['file'] == 'register') && ($_POST)){

         $user = new user(); // создаём объект для того чтобы дальше им пользоваться и использовать его методы
         $user->checkPost($user,$_POST);
         register_user( $user->getVar('nic'));
         check_session();
       }

$tpl="";
//задаем шаблон страницы и вызываем общий шаблон сайта
$file = (isset($_GET['file'])&&!empty($_GET['file']))?strtolower(strip_tags(trim($_GET['file']))):$file="";

//var_dump($file);

  switch ($file){
  case 'login'; $tpl = 'login.php'; break;
  case 'logout'; $tpl = 'logout.php'; break;
  case 'register'; $tpl = 'register.php'; break;
  case 'member'; $tpl = 'member.php'; break;
  default: $tpl = 'empty.php'; break;
  }


include("templates/base_template.php");
?>