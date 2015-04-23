<?php
class db_func extends tools{
/**
 * Фукция запроса к базе
 * @param string $query Строка запроса
 * @return array
 * @var array $array_qwr Массив с данными
 * @var mixed $row Строка с данными
 */
 /*public function dbGetArr($query, $obj_name){
    	$result = mysql_query($query) or die(mysql_error());

    //while ($row = mysql_fetch_assoc($result)) {
    while ($row = mysql_fetch_object($result, $obj_name)) {
              $array_qwr[] = $row;}
    return $array_qwr;
        }
*/

	/**
	* метод для определения имени таблицы
	* @return string
	*/
	function table_name()
	{
		return get_class($this); // возвращяет имя тикущего класса, которое будет выступать именем для таблицы БД
	}

	// метод для добавления-редактирования
	function save()
	{
    // создаём запрос на вставку по полям из объекта
	$query_fields=""; // часть запроса которая отвечает за "название_поля = значение_поля..."

		foreach($this as $property_name => $property_value)
		{

			if ($property_name!='password' && $property_name!='id' && !is_array($property_value)) // если поле НЕ id и значение НЕ массив
			{
				if($query_fields) // если первая итерация  цикла, при которой $query_fields ещё пуст - запятую не ставим , иначе ставим.
				{
					$query_fields.=", ";
				}
				$query_fields .= "$property_name = '".db::real_escape_string($property_value)."'";
			}
		}

		$query = "INSERT INTO ".$this->table_name()." SET ".$query_fields .", regdate = NOW(), password = password('".$this->password."')";

		//db::db->query($query); // ошибка т.к. query это стат. метод.
        #$lastinsertid='';

		db::query($query);

		//$a = db::insert_id; // переписать на обертку стат.свойства
		#$lastinsertid = db::lastInsertID();// используем обертку из класса db стат.метод
		//$a = db::query("SELECT LAST_INSERT_ID()"); // ничего не даст, т.к. это ссылка на ресурс
		//$a = db::select("SELECT LAST_INSERT_ID()"); // даст array() вывести можно через $a[last_insert_id]
		//$a = $db->mysql_insert_id();  // ошибка синтаксиса т.к. класс db не объявлен и в нём нет метода mysql_inser_id()

        #echo($lastinsertid);
	}
	function lastID()
	{
		return db::lastInsID();
	}

	// метод для получения данных об, одной записи
	function get($id=NULL) // значение по умолчанию NULL - значение не определено (обозначает, что БД делает автоинкремент)
	{
		$id = ($id != NULL)? $id: $this->id ;
		$rows = db::select("SELECT * FROM ".$this->table_name()." WHERE `id`=$id");
		//$this->getFromArrayToObject($rows[0]);
		return $rows;
	}

	function login($user = NULL, $password = NULL)
	{
		$user = ($user != NULL) ? db::real_escape_string($user): $this->$user ;
		$password = ($password != NULL) ? db::real_escape_string($password): $this->$password ;
		$query= "SELECT * FROM ".$this->table_name()." WHERE `nic`='".$user."' AND `password`= password('".$password."')";
		//echo $query;
		$rows = db::select($query);
		return $rows;
	}
}
?>