<?php
function register_user($user)
	{
		$_SESSION["valid_user"] = $user;
    }

function check_session()
	{
  	if ( isset($_SESSION['valid_user']) && (!empty($_SESSION['valid_user'])))
    	  {
        	echo "<p>Вы вошли в систему как: ".$_SESSION['valid_user'].BR;
        	echo "<a href=\"?file=logout\">Выйти из системы</a></p>";
        	$_GET['file']='member';
      	}
  	else
  		{
    	// visitor's name and password combination are not correct
    	echo "<H2>Идентификация неудачна!</H2>";
    	echo "<p>Вам не разрешен просмотр данной страницы.</p>";
    	$_GET['file']='';
  	}
}