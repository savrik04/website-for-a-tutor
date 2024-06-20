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
	mkdir("../teachers/");
	mkdir("../teachers/$login");
	mkdir("../teachers/$login/diplo");
	mkdir("../teachers/$login/cert");
	mkdir("../teachers/$login/students");

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

	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
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
    echo $math . $phys . $it . $eng . $rus;
	$mysql->query("INSERT INTO `teachers` (`login`, `name`, `email`, `tel`, `tg`, `birth`, `exp`, `service`, `price`, `math`, `phys`, `it`, `eng`, `rus`) VALUES('$login', '$name', '$email', '$telephone', '$tg', '$birth', '$exp', '$service', '$price', '$math', '$phys', '$it', '$eng', '$rus')");

	$mysql->close(); 

	header('Location: /lk_teacher.php');
?>