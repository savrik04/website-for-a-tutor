<?php
	$login = $_GET['teacher'];
	$id = $_GET['id'];
	$oid = $_GET['oid'];
	$login_s = $_COOKIE['user'];

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$result = $mysql->query("SELECT * FROM `teacher_schedule` WHERE `login` = '$login' AND `id` = '$oid'");
	$ext_arr = $result->fetch_assoc();
	var_dump($ext_arr);
	
	$extra = $ext_arr["extra"];
	$mysql->query("UPDATE `teacher_schedule` SET `busy` = '0', `login_s` = 'NULL', `extra` = 'NULL' WHERE `login` = '$login' AND `id` = '$oid'");
	$mysql->query("UPDATE `teacher_schedule` SET `busy` = '1', `login_s` = '$login_s', `extra` = '$extra' WHERE `login` = '$login' AND `id` = '$id'");
	$mysql->close(); 

	$old_name = "../teachers/$login/students/$login_s/$oid";
	$new_name = "../teachers/$login/students/$login_s/$id";
	if (!rename($old_name, $new_name)) {
		exit();
	}

	header('Location: /schedule_student.php');
?>