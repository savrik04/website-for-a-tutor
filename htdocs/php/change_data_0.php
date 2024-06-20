<?php
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
	$telephone = filter_var(trim($_POST['telephone']), FILTER_SANITIZE_STRING);
	$age = filter_var(trim($_POST['age']), FILTER_SANITIZE_STRING);
	$school = filter_var(trim($_POST['school']), FILTER_SANITIZE_STRING);
	$grade = filter_var(trim($_POST['grade']), FILTER_SANITIZE_STRING);
	$tg = filter_var(trim($_POST['tg']), FILTER_SANITIZE_STRING);

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$login = $_COOKIE['user'];

	$mysql->query("UPDATE `students` SET `name` = '$name', `email` = '$email', `tel` = '$telephone', `age` = '$age', `school` = '$school', `grade` = '$grade', `tg` = '$tg' WHERE `login` = '$login'");

	$mysql->close(); 
	if ($_COOKIE['user'] != '') {
		header('Location: /lk_student.php');
	}
?>