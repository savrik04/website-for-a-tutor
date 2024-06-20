<?php

	$login = $_COOKIE['user'];
	if(!empty($_FILES['diplo']['name'])) {
		
		$fileCount = count($_FILES['diplo']['name']); // Получаем количество загруженных файлов
        // Проходимся по каждому загруженному файлу
        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpPath = $_FILES['diplo']['tmp_name'][$i];
            $fileName = $_FILES['diplo']['name'][$i];
            // Задаем целевой каталог
            $targetDir = '/';
            $targetFilePath = $targetDir . $fileName;

            // Перемещаем файл в целевой каталог
            if(move_uploaded_file($fileTmpPath, "../teachers/$login/diplo/" . $_FILES['diplo']['name'][$i])){
                echo "Файл $fileName успешно загружен.<br>";
            } else{
                echo "Произошла ошибка при загрузке файла $fileName.<br>";
            }
        }
	}
	if(!empty($_FILES['cert']['name'])) {
		
		$fileCount = count($_FILES['cert']['name']); // Получаем количество загруженных файлов
        // Проходимся по каждому загруженному файлу
        for ($i = 0; $i < $fileCount; $i++) {
            $fileTmpPath = $_FILES['cert']['tmp_name'][$i];
            $fileName = $_FILES['cert']['name'][$i];
            // Задаем целевой каталог
            $targetDir = '/';
            $targetFilePath = $targetDir . $fileName;

            // Перемещаем файл в целевой каталог
            if(move_uploaded_file($fileTmpPath, "../teachers/$login/cert/" . $_FILES['cert']['name'][$i])){
                echo "Файл $fileName успешно загружен.<br>";
            } else{
                echo "Произошла ошибка при загрузке файла $fileName.<br>";
            }
        }
	}
	header('Location: /change_data_teacher.php');
?>