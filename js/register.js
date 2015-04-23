if(document.getElementById('button')){
document.getElementById('button').addEventListener("click", function(e){
	e = e || window.event
document.getElementById('fileupload_form').style.display = "block";
document.getElementById('button').style.display = "none";
e.preventDefault ? e.preventDefault() : (e.returnValue=false);
})
}

function filter($country)
{
	var a = document.getElementById("city");
	a.selectedIndex = -1; // сброс выбора списка
	for (var x = 0; x < a.options.length; x++)
	{
	if ($country == '-not selected-')
		{
			a.disabled = true;
		}
		else{
			if (a.options[x].value != $country)
			{
					a.options[x].style.display = 'none';
				} else {
				a.options[x].style.display = 'block';
			}
		a.disabled = false;
		}
	}
}

function real_city($city)
{
	var a = document.getElementById("city");
	//a.options[a.selectedIndex].value = $city;
	a.options[a.selectedIndex] = new Option($city, $city, false, true);//полная замена элемента на новый
}


function checkit() { // функция проверки ОБЯЗАТЕЛЬНЫХ полей формы
//-----------
	var r_form = document.forms.registration;

	if (r_form.nic.value != "") { // функция проверки поля nic
	} else {
		alert("\nОбласть \"Имя\" в форме. \n\nПожалуйста, введите свое имя."); // выводит сообщение, если поле nic не заполнено
		r_form.nic.focus(); // возврашает курсор на поле nic
		return false;
	}
//-----------
	if (r_form.email.value != "") { // функция проверки поля email

	} else {
		alert("\nОбласть \"E-mail\" в форме. \n\nПожалуйста, введите свой e-mail."); // выводит сообщение, если поле E-mail не заполнено
		r_form.email.focus(); // возврашает курсор на поле email
		return false;
	}
//-----------
	if (r_form.password.value != "") { // функция проверки поля password
	} else {
		alert("\nОбласть \"Пароль\" в форме. \n\nПожалуйста, введите пароль."); // выводит сообщение, если поле password не заполнено
		r_form.password.focus(); // возврашает курсор на поле password
		return false;
	}
//-----------
	if ((r_form.password_confirm.value != "") && (r_form.password_confirm.value===r_form.password.value)) { // функция проверки поля password_confirm
	return true; // ВСЕ ОТЛИЧНО
	} else {
		alert("\nОбласть \"Подтверждение пароля\" в форме. \n\nПожалуйста, проверьте поле пароль."); // выводит сообщение, если поле password не заполнено
		r_form.password_confirm.focus(); // возврашает курсор на поле password_confirm
		return false;
	}
}