<?php 
$login_host="localhost";
$login_name="root";
$login_password="";
$bdname="webform";
global $bdname;
mysql_connect($login_host,$login_name,$login_password) or die ("������ ������������ � ���� ������, ���������� ���������� �����!
 (Could not connect to database, try it later!)");
mysql_select_db($bdname) or die ("������ ������� ���� ������, ���������� ���������� �����!
 (Could not select database,try it later!)")?>