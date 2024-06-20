<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
	$type = filter_var(trim($_POST['types']), FILTER_SANITIZE_STRING);

	if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
		echo "Err len of login";
		exit();
	}
	else if (mb_strlen($password) < 5 || mb_strlen($password) > 90) {
		echo "Err len of pass";
		exit();
	}

	$password = md5($password."rqeojiqr5713");

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$mysql->query("INSERT INTO `users` (`login`, `pass`, `type`) VALUES('$login', '$password', '$type')");

	setcookie('user', $login, time() + 3600, "/");

	$mysql->close(); 
	if ($type == 0) {
		header('Location: /reg_data_student.php');
	}
	else {
		header('Location: /reg_data_teacher.php');
	}
?>