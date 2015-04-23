<?php
/**
 * Класс пользователь
 */
class user extends db_func{
    private $id;
    protected   $nic,
                $gender,
                $age,
                $photo,
                $email,
                $country,
                $city,
                $password;

    public function getVar($name) { return $this->$name; }
    public function setVar($name,$value) { $this->$name = $value; }
}
?>