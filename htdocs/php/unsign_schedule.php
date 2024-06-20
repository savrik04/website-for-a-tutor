<?php
	include '../send_to_tg/action.php';
	$login = $_GET['value'];
	$login_s = $_COOKIE['user'];
	$id = $_GET['id'];

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$result = $mysql->query("SELECT * FROM `teacher_schedule` WHERE `login` = '$login' && `id` = '$id'");
	$user = $result->fetch_assoc();
	$date_class = $user['date'];
	$msg1 = "Занятие в ".date('d.m.Y H:i', strtotime($date_class))." отменено";
	$tg_st = $user["tg_st"];
	$id_msg_hour = $user["id_msg_hour"];
	$id_msg_day = $user["id_msg_day"];
	del_msg($tg_st, $id_msg_hour);
	del_msg($tg_st, $id_msg_day);
	$mysql->close();

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$result = $mysql->query("SELECT * FROM `teachers` WHERE `login` = '$login'");
	$user = $result->fetch_assoc();
	$tg_teach = $user["tg"];
	send_msg($tg_st, $msg1, time()+10);
	send_msg($tg_teach, $msg1, time()+10);
	$mysql->close();

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$mysql->query("UPDATE `teacher_schedule` SET `login_s` = 'NULL', `tg_st` = 'NULL', `id_msg_hour` = 'NULL', `busy` = '0', `extra` = 'NULL' WHERE `login` = '$login' AND `id` = '$id'");
	$mysql->close();
	$dir = "../teachers/$login/students/$login_s/$id/hw";
	array_map('unlink', glob("$dir/*.*"));
	rmdir($dir);
	header('Location: /schedule_student.php');
?>