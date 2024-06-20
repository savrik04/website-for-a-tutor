<?php
	$login = $_COOKIE['user'];
	
	$login_s = $_GET['stud'];
	$id = $_GET['value'];
	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$mysql->query("DELETE FROM `teacher_schedule` WHERE `login` = '$login' AND `id` = '$id'");
	$mysql->close();

	$dir = "../teachers/$login/students/$login_s/$id";
	array_map('unlink', glob("$dir/*.*"));
	rmdir($dir);

	header('Location: /schedule_teacher.php');
?>