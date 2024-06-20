<?php
	include '../send_to_tg/action.php';
	$id = $_GET['id'];
	$login_t = $_GET['teacher'];
	$login_s = $_COOKIE['user'];
	$extra = $_POST['extra'] ?? null;
	$extra = is_string($extra) ? htmlspecialchars(trim($extra)) : null;

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$login = $_COOKIE['user'];
	$result = $mysql->query("SELECT * FROM `students` WHERE `login` = '$login'");
	$user = $result->fetch_assoc();
	$tg_st = $user["tg"];
	$mysql->close();

	$msg1 = "у тебя занятие, ровно через день";
	$msg2 = "у тебя занятие, ровно через час";
	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	$result = $mysql->query("SELECT * FROM `teacher_schedule` WHERE `login` = '$login_t' AND `id` = '$id'");
	$date_class = $result->fetch_assoc()['date'];
	$mysql->close();
	$id_msg_hour = NULL;
	$id_msg_day = NULL;
	if (time() < strtotime($date_class) - 86400) {
		$id_msg_day = send_msg($tg_st, $msg1, strtotime($date_class) - 86400); // 1 день
	}
	if (time() < strtotime($date_class) - 3600) {
		$id_msg_hour = send_msg($tg_st, $msg2, strtotime($date_class) - 3600); // 1 час
	}
	else {
		$msg3 = "У тебя занятие ".date('d.m.Y H:i', strtotime($date_class));
		$id_msg_hour = send_msg($tg_st, $msg3, time() + 10); // меньше часа
	}
	
	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
	// $mysql->query("UPDATE `teacher_schedule` SET `id` = '$id', `login` = '$login_t', `login_s` = '$login_s', `tg_st` = '$tg_st', `busy` = '1', `date` = '$date_class', `extra` = '$extra', `id_msg_day` = '$id_msg_day', `id_msg_hour` = '$id_msg_hour' WHERE `login` = '$login_t' AND `id` = '$id'");
	$mysql->query("UPDATE `teacher_schedule` SET `login_s` = '$login_s', `tg_st` = '$tg_st', `busy` = '1', `extra` = '$extra', `id_msg_day` = '$id_msg_day', `id_msg_hour` = '$id_msg_hour' WHERE `login` = '$login_t' AND `id` = '$id'");
	print_r("aaa");
	$mysql->close(); 
	mkdir("../teachers/$login_t/students/$login_s");
	mkdir("../teachers/$login_t/students/$login_s/$id");
	mkdir("../teachers/$login_t/students/$login_s/$id/hw");
	header("Location: /schedule_of_teacher.php?value=" . $login_t);
?>