<?php class tools {
  // метод для загрузки данных массива в объект
    public function getFromArrayToObject( $arr )
    {
        foreach ($arr as $property_name => $property_value)
        {
            if(property_exists($this, $property_name)) {// проверка существование свойства в классе
                // $this->$property_name = $property_value; } // сохраняем в свойство объекта значения из массива
                $this->setVar($property_name,$property_value); }
                else "error line: __LINE__";
        }
    }


    public function checkPost($obj,$post){
        $error_msg_file ='';
        $error_msg = '';
        $new_post = array();

        include('inc/fileupload_w_check.php');

        if ($post['nic']) { if(preg_match("/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}/", $post['nic'])) {} else { $error_msg .= $post['nic'].', '; }}
        if ($post['age']) { if(preg_match("/^[\d]{2}$/", $post['age'])) {} else { $error_msg .= $post['age'].', '; }}
        //if ($post['photo']) { if(preg_match("/[.](jpg)|(gif)|(png)$/", $post['photo'])) {} else { $error_msg .= $post['photo'].', '; }}
        if ($post['email']) { if(preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/", $post['email'])) {} else { $error_msg .= $post['email'].', '; }}
        if ($post['password']) { if(preg_match("/.{6,20}/", $post['password'])) {} else { $error_msg .= $post['password'].', '; }}
        if ($post['password'] !== $post['password_confirm']) { $error_msg.='пароль и подтверждение пароля не совпадают';}
        if (!empty($error_msg_file)) echo $error_msg_file.BR;
        if (!empty($error_msg)) { echo "ошибка при заполнении пол(я/ей): ".$error_msg." <br/><a href=\"javascript:void()\" onclick=\"javascript:history.back()\">назад</a>";exit; }

        // чистим и пересоздаём массив
        foreach ($post as $post_name => $post_value)
        {
            if(isset($post_name)&&!empty($post_value))
            {
              $post_value = strip_tags(trim($post_value));
            }
            $new_post[$post_name] = $post_value;
        }

        // Заполняем объект obj == user из нового мacсива post
        $obj->getFromArrayToObject($new_post);
        //var_dump($obj);

        // сохраняем в базу
        $obj->save();

        // $lastInsID=db::lastInsID();

        //return $lastInsID;

        // это надо раскоментировать в конце, когда скрипт будет полностью готов
        // скрипт должен пересылать пользователя на его страницу с id пользователя
        //header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);exit;
        }

    public function timeCapsule($num_sec)
        {
            $one_sec_milsec = 1000;
            $mill_sec = $num_sec * $one_sec_milsec;
            for ($i=0; $i <= $mill_sec; $i++)
            {
                $sec = $i % $one_sec_milsec;
                return $sec;
            }
        }
}

?>