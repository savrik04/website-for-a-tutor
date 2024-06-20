<?php
	$name = $_GET['file'];
	$login = $_GET['value'];
	$id = $_GET['id'];
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
	header('Location: /student_card.php?value=' . $login . '&id=' . $id);
?>