<a href="<?=DOMAIN?>">Главная страница</a> | <a href="<?=DOMAIN?>?file=member&amp;id=<?=$user->getVar('id')?>&amp;lang=ru">ru</a> | <a href="<?=DOMAIN?>?file=member&amp;id=<?=$user->getVar('id')?>&amp;lang=en">en</a>

<div class="txt-center">
<form action="<?=DOMAIN?>?file=register" method="post" enctype="multipart/form-data" name="registration" onsubmit="real_city(getElementById('city').options[getElementById('city').selectedIndex].text);this.submit_button.disabled=true">

		<div class="col-left txt-center">
        <fieldset><legend><?=$lang['name']?></legend>
        <input name="nic" value="<?=$user->getVar('nic')?>" placeholder="<?=$lang['name_help_msg']?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" size="20" maxlength="20" required autocomplete="on" title="<?=$lang['name_help_msg']?>" type="text"></fieldset><br />

		<fieldset><legend><?=$lang['gender']?></legend>
		<input name="gender" value="male" type="radio" <?php echo ($user->getVar('gender')=='male')?'checked':''?>><?=$lang['gender_male']?>
		<input name="gender" value="female" type="radio" <?php echo ($user->getVar('gender')=='female')?'checked':''?>><?=$lang['gender_female']?>
		</fieldset>

        <!-- <fieldset class="txt-center"><legend><?php //echo $lang['birthday']?></legend>
		<input name="birthday" type="date" size="10" max="2010-12-01" min="1900-01-01" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" placeholder="31-12-2000" class="center-block"></fieldset><br/>
		-->

		<fieldset><legend><?=$lang['age']?></Legend>
		<input name="age" value="<?=$user->getVar('age')?>" type="number" min="16" max="99" size="2" maxlength="2" placeholder="25" title="<?=$lang['age_title']?>">
		</fieldset>

		<br />

		<fieldset><legend><?=$lang['email']?></legend>
		<input name="email" value="<?=$user->getVar('email')?>" type="email" class="glyphicon glyphicon-envelope ig-block" placeholder="vasia_pupkin@yahoo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required size="30" maxlength="40"></fieldset>

		<br />

		<fieldset><legend><?=$lang['location']?></legend>
		<label><?=$lang['country']?></label>
		<select name="country" id="country" onchange="filter(this.options[selectedIndex].text)">
			<option value="">-not selected-
			<option value="USA" <?php echo ($user->getVar('country')=='USA')?'selected':''?>>USA
			<option value="Ukraine" <?php echo ($user->getVar('country')=='Ukraine')?'selected':''?>>Ukraine
			<option value="Russia" <?php echo ($user->getVar('country')=='Russia')?'selected':''?>>Russia
		</select><br />
		<label><?=$lang['city']?></label>
		<select name="city" id="city" <?php //onchange="console.log(document.getElementById(this).options[document.getElementById(this).selectedIndex].text)"?> <?php echo (!$user->getVar('city'))?"disabled=\"disabled\"":''?> <?php //onFormSubmit="this.options[selectedIndex].text"?>>
		<option value="">-not selected-
			<option value="USA" <?php echo ($user->getVar('city')=='NewYork')?'selected':''?>>NewYork
			<option value="USA" <?php echo ($user->getVar('city')=='Washington')?'selected':''?>>Washington
			<option value="USA" <?php echo ($user->getVar('city')=='LosAngeles')?'selected':''?>>LosAngeles
			<option value="Ukraine" <?php echo ($user->getVar('city')=='Kiev')?'selected':''?>>Kiev
			<option value="Ukraine" <?php echo ($user->getVar('city')=='Donetsk')?'selected':''?>>Donetsk
			<option value="Ukraine" <?php echo ($user->getVar('city')=='Lviv')?'selected':''?>>Lviv
			<option value="Russia" <?php echo ($user->getVar('city')=='Moskow')?'selected':''?>>Moskow
			<option value="Russia" <?php echo ($user->getVar('city')=='Orel')?'selected':''?>>Orel
			<option value="Russia" <?php echo ($user->getVar('city')=='Saint\'s Peterburg')?'selected':''?>>Saint'sPeterburg
		</select></fieldset>

</div>


        <div class="txt-center">
		<fieldset><legend><?=$lang['picture']?></legend>

		<div>

			<img src="./img/members/<?=$user->getVar('photo')?>" alt="Фото:<?=$user->getVar('nic')?>" class="img-rounded img-min" id="image" >

			<!--<img src="holder.js/200x300/social/text:Фото" alt="Тут должно быть фото" class="img-rounded" id="image">-->

		</div>

		<input name="photo" id="image_name" type="hidden" value="">
		<input name="max_file_size" type="hidden" value="1024000">

		<a id="button">сменить картинку</a>
		<div id='fileupload_form' class="fileupload-form">
		<input name="fileupload" id="photo" type="file" size="10" onchange="getElementById('image_name').value = getElementById('photo').value;">
		<p class="help-block"><?=$lang['picture_message']?></p>
		</div>
		</fieldset>
        </div>

        <br clear="right" />

        <div class="col-left txt-center">
		<fieldset><legend><?=$lang['security']?></legend>
		<label><?=$lang['password']?></label><input name="password" value="<?=$user->getVar('password')?>" type="password" placeholder="<?=$lang['password']?>" pattern=".{6,20}" title="<?=$lang['password_help_msg']?>" class="float-right" size="15" required onclick="if (this.value !== ''){this.value = '';}"><br />
		<label><?=$lang['password_confirm']?></label><input name="password_confirm" value="<?=$user->getVar('password')?>" type="password" size="15" placeholder="<?=$lang['password_confirm']?>" pattern=".{6,20}" title="<?=$lang['password_help_msg']?>" class="float-right" required onclick="if (this.value !== ''){this.value = '';}"></fieldset>
		</div>
		<br />

		<div class="txt-center">
		<!--<input type="hidden" name="token" value="<?=$f_token?>">-->
		<input name="submit_button" type="submit" value="<?=$lang['registration']?>" onclick="return checkit()" class="btn btn-default">
        </div>

		</form>
</div>
<script type="text/javascript" src="./js/register.js"></script>