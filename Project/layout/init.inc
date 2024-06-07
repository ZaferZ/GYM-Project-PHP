<?php 
 // Старт на сесия
session_start();

 // Инициализация на Базата данни 
 // създаване на обект от класа mysqli
$mysqli = new mysqli('localhost', 'root', '', 'gymdatabase'); 
 // задаване на кодировка utf8
$mysqli->set_charset('utf8'); 

 // снимките се качват в директорията $animal_pictires_dir
$pictires_dir = 'images/objects/';
?>