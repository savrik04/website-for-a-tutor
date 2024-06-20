<?php
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
	$telephone = filter_var(trim($_POST['telephone']), FILTER_SANITIZE_STRING);
	$tg = filter_var(trim($_POST['tg']), FILTER_SANITIZE_STRING);
	$birth = filter_var(trim($_POST['birth']), FILTER_SANITIZE_STRING);
	$exp = filter_var(trim($_POST['exp']), FILTER_SANITIZE_STRING);
	$service = filter_var(trim($_POST['service']), FILTER_SANITIZE_STRING);
	$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
	$subj = $_POST['options'];
	$login = $_COOKIE['user'];

	$math = 0;
	$phys = 0;
	$it = 0;
	$eng = 0;
	$rus = 0;
	foreach ($subj as $option) {
		echo $option;
        if($option == "math") $math = 1;
        if($option == "phys") $phys = 1;
        if($option == "it") $it = 1;
        if($option == "eng") $eng = 1;
        if($option == "rus") $rus = 1;
    }

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');

	$mysql->query("UPDATE `teachers` SET `name` = '$name', `email` = '$email', `tel` = '$telephone', `tg` = '$tg', `birth` = '$birth', `exp` = '$exp', `service` = '$service', `price` = '$price', `math` = '$math', `phys` = '$phys', `it` = '$it', `eng` = '$eng', `rus` = '$rus' WHERE `login` = '$login'");

	$mysql->close(); 
	if ($_COOKIE['user'] != '') {
		header('Location: /lk_teacher.php');
	}
?>