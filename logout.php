<?php 
// Страница за изход
	session_start ();
	session_destroy(); // закрива се сесията
	header("Location: ."); // Пренасочва към началната страница на сайта
	exit;
?>