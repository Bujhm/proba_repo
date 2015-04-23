<?php
class db
{
	public static $db; // статическая переменная

	static function connect()
	{
		// создаём объект соединения с БД
		// для обращения к статическому свойству self::имя_свойства
		self::$db = new mysqli("localhost","root","","webform"); //server,login,password,db_name
		// если ошибка
		if(self::$db->connect_errno)
			{
			return false;
			}
		else
			{
			return true;
			//self::$db->set_charset("cp1251"); // устанавливаем кодировку для обмена сообщениями с БД  (PHP v5.2)
			self::$db->query("SET NAMES cp1251");
			}
	}

	// метод для выполнения запроса
	static function query($query)
	{
		self::$db->query($query);
	}

    /**
     * метод для получения данных из базы в массив
     * @param  string
     * @return array
     */
    static function select($query)
	{
		$records = array();

		$data_address = self::$db->query($query); // выполняем запрос

		if(!self::$db->errno)
		{
			while($record = $data_address->fetch_assoc())
			{
			$records[] = $record;
			}
		}
		else
		{
			print 'MySQL error:'.self::$db->errno.' '.self::$db->error;
		}
		return $records;
	}

	/**
	 * Обертка для mysql_last_insert_id()
	 * @return int
	 */
	static function lastInsID()
	{
		return self::$db->insert_id;
	}

	/**
	 * Обертка для mysqli_real_escape_string()
	 * @param  string
	 * @return string
	 */
	static function real_escape_string($var)
	{
		return self::$db->real_escape_string($var);
	}
}