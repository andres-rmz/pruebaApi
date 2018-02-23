<?php
setlocale(LC_ALL, 'es_MX.UTF-8');
date_default_timezone_set('america/mexico_city');

error_reporting(E_ALL);
ini_set("display_errors",1);

//BBDD
//$sql = new MySQLi("IP","USUARIO","PASSWORD","BBDD");
//$sql->Query("SET names 'utf8'");

define('SERVER','http://'.$_SERVER['SERVER_NAME'].'/pruebaApi');
?>
