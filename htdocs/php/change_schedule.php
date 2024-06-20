<?php
	$login = $_COOKIE['user'];
	$id = $_GET['value'];
	$date = $_POST['meeting-time'];

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');

	$mysql->query("UPDATE `teacher_schedule` SET `id` = '$id', `login` = '$login', `date` = '$date' WHERE `login` = '$login' AND `id` = '$id'");
	$mysql->close(); 
	header('Location: /schedule_teacher.php');
?>