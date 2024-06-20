<?php
	$name = $_GET['file'];
	$file = $name;
	if (file_exists($file)) {
	    if(unlink($file)) {
	        echo "Файл '$file' был удален";
	    } else {
	        echo "Произошла ошибка при удалении файла '$file'";
	    }
	} else {
	    echo "Файл '$file' не найден";
	}
	header('Location: /change_data_teacher.php');
?>