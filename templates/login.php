<a href="<?=DOMAIN?>?lang=<?=@$_GET['lang']?>"><?=$lang['main_page']?></a>
  <div class="txt-center">

  <form action="" method="post" enctype="application/x-www-form-urlencoded" name="login">
    <div class="clear-both txt-right">
      <label for="user" class="float-left login-label">Имя</label>
        <input name="user" id="user" type="text" id="user" size="20" maxlength="20" required class="login-input" title="Ваш логин (латиница,от 2 до 20 символов)">
    </div>
    <div class="clear-both txt-right">
      <label for="password" class="float-left login-label">Пароль</label>
      <input name="password" type="password" id="password" size="20" maxlength="20" required class="login-input" title="Ваш пароль (от 6 до 20 стмволов)">
    </div>

    <input name="submit" type="submit" value="отправить" class="login-submit">

  </form>
  </div>