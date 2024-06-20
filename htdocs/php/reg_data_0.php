<?php
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
	$telephone = filter_var(trim($_POST['telephone']), FILTER_SANITIZE_STRING);
	$age = filter_var(trim($_POST['age']), FILTER_SANITIZE_STRING);
	$school = filter_var(trim($_POST['school']), FILTER_SANITIZE_STRING);
	$grade = filter_var(trim($_POST['grade']), FILTER_SANITIZE_STRING);
	$tg = filter_var(trim($_POST['tg']), FILTER_SANITIZE_STRING);

	if (mb_strlen($email) < 3 || mb_strlen($email) > 90) {
		echo "Err len of email";
		exit();
	}

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$login = $_COOKIE['user'];
	$mysql->query("INSERT INTO `students` (`login`, `name`, `email`, `tel`, `age`, `school`, `grade`, `tg`) VALUES('$login', '$name', '$email', '$telephone', '$age', '$school', '$grade', '$tg')");

	$mysql->close(); 

	header('Location: /lk_student.php');
?>