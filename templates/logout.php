<?php //session_start();
if (isset($_SESSION['valid_user']))
    {
        $old_user = $_SESSION['valid_user'];  // store  to test if they *were* logged in
        // echo "<h3>вы вошли как :".$_SESSION['valid_user']."</h3>";
        // echo 'Session is still regged';
        unset($_SESSION['valid_user']);
        session_destroy();
        ?>
        <span>&hellip;Вы вышли, перейти <a href="<?=DOMAIN?>">на Главную</a> </span>
        <?
    }
elseif(!empty($old_user))
    {  // they were logged in and could not be logged out
       echo 'Session is not regged';
    }
    else
        {   // if they weren't logged in but came to this page somehow
            echo "You were not logged in, and so have not been logged out.<br>";
            echo "<a href=\"".DOMAIN."\">на главную</a>";
        }
?>
