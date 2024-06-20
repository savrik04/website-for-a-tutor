<?php

	$login = $_COOKIE['user'];
    $stud = $_GET['value'];
    $id = $_GET['id'];
	if(!empty($_FILES['hw']['name'])) {
		
		$fileCount = count($_FILES['hw']['name']); // Получаем количество загруженных файлов
        // Проходимся по каждому загруженному файлу
        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpPath = $_FILES['hw']['tmp_name'][$i];
            $fileName = $_FILES['hw']['name'][$i];
            // Задаем целевой каталог
            $targetDir = '/';
            $targetFilePath = $targetDir . $fileName;
            var_dump($fileTmpPath);
            // Перемещаем файл в целевой каталог
            if(move_uploaded_file($fileTmpPath, "../teachers/$login/students/$stud/$id/hw/" . $_FILES['hw']['name'][$i])){
                echo "Файл $fileName успешно загружен.<br>";
            } else{
                echo "Произошла ошибка при загрузке файла $fileName.<br>";
                exit();
            }
        }
	}
	header('Location: /student_card.php?value=' . $stud . '&id=' . $id);
?>