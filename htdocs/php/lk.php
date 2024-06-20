<?php
	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$login = $_COOKIE['user'];
	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
	$user = $result->fetch_assoc();
	$mysql->close(); 

	setcookie('user', $user['login'], time() + 3600, "/");
	if($user["type"] == "0") {
		header("Location: /lk_student.php");
	} else {
		header("Location: /lk_teacher.php");
	}
	$mysql->close(); 
	
?>