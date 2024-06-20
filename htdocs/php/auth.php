<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	$password = md5($password."rqeojiqr5713");

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	
	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
	$user = $result->fetch_assoc();
	$mysql->close(); 
	if (count($user) == 0) {
		echo "User not found";
		exit();
	}

	setcookie('user', $user['login'], time() + 3600, "/");
	if($user["type"] == "0") {
		header("Location: /lk_student.php");
	} else {
		header("Location: /lk_teacher.php");
	}
	$mysql->close(); 
	
?>