<?php
	$meeting_time = $_POST["meeting-time"];
	$login = $_COOKIE['user'];

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$result = $mysql->query("SELECT * FROM `teacher_schedule` WHERE `login` = '$login' ORDER BY `id` DESC");

	if ($result->num_rows == 0) {
		$mysql->query("INSERT INTO `teacher_schedule` (`id`, `login`, `login_s`, `busy`, `date`, `extra`) VALUES('0', '$login', 'NULL', '0', '$meeting_time', 'NULL')");
		echo $login;
	} else {
		$id = $result->fetch_assoc();
		$id = $id['id'] + 1;
		$mysql->query("INSERT INTO `teacher_schedule` (`id`, `login`, `login_s`, `busy`, `date`, `extra`) VALUES('$id', '$login', 'NULL', '0', '$meeting_time', 'NULL')");
	}
	
	$mysql->close(); 
	header('Location: /schedule_teacher.php');
?>