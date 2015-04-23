<ul>
  <?php
  if (isset($_SESSION['valid_user']) && ($_SESSION['valid_user']=='admin'))
    { // просмотр всех пользователей (только для админа)
   $users = db::select('SELECT * FROM user');

    foreach($users as $row) // пример используя массивы
        {?>
        <li><a href="<?=DOMAIN?>?file=member&id=<?=$row['id']?>" target="_blank"><?php echo $row['nic']?></a></li>
        <?php } ?>
</ul>
    <?php }
    elseif (isset($_SESSION['valid_user']) && (!empty($_SESSION['valid_user'])) && ($_SESSION['valid_user']!=='admin'))
      {
        // эта строка нужна только для просмотра одного пользователя, минуя логин и регистрацию.
        // также эта конструкция заполняет объект user

         $id1 = $user->getVar('id');

         $id2 = $user->lastID();

        // ... a little more debugg :-)
         echo 'id='.$id1,' lastId=',$id2;
        # $id = (!empty($id1)) ? $id1 : $id2;

        if (!empty($id1))
            {
                $user->setVar('id', $id1); //unset($id1);
            }
        elseif (!empty($id2))
            {
                $user->setVar('id', $id2); //unset($id2);
            }
        else { $user->setVar('id', NULL); }

        //$users = $user->get( db::lastInsID() );

        //print_r($users)

        include('./templates/profile.php');
        /*<ul>
        <?php foreach($users as $row) { ?><li><a href="<?=DOMAIN?>?id=<?=$row['id']?>" target="_blank"><?php echo $row['nic']?></a></li><?php } ?>
        </ul>

    <?php*/ }
    else
      {
        ?>
        <a href="<?=DOMAIN?>?file=login">Login</a> | <a href="<?=DOMAIN?>?file=register">Register</a>
        <?php
      }
?>