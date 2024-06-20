

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Главная</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="main_page.php">Главная страница</a>
	        </li>
	        <li class="nav-item">
	          <?php 
	          	if (!isset($_COOKIE['user'])):
	          ?>
	          <a class="nav-link active" aria-current="page" href="index.php">Регистрация</a>
	      	  <?php endif;?>
	      	  <?php 
	          	if (isset($_COOKIE['user'])):
	          ?>
	          <a class="nav-link active" aria-current="page" href="php/lk.php">Личный кабинет</a>
	      	  <?php endif;?>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container mt-4">
		<h1 class="mb-4">Карточка учителя</h1>
		<h4>Основная информация</h4>
		<?php
			$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
			$login = $_GET['id'];
			$result = $mysql->query("SELECT * FROM `teachers` WHERE `login` = '$login'");
			$mysql->close(); 
			if ($result->num_rows > 0) {
				$user = $result->fetch_assoc();
				echo "<b>Фамилия Имя Отчество:</b> " . $user["name"] . "<br>". "<b>Email:</b> " . $user["email"] . "<br>". "<b>Номер телефона:</b> " . $user["tel"] . "<br>". "<b>Дата рождения:</b> " . $user["birth"] . "<br>". "<b>Предоставляемые услуги:</b> " . $user["service"] . "<br>". "<b>Цены:</b> " . $user["price"] . "<br>";
				echo "<b>Преподаваемые предметы:</b>";
				if ($user["math"] == 1) echo "	Математика;";
				if ($user["phys"] == 1) echo "	Физика;";
				if ($user["it"] == 1) echo "	Информатика;";
				if ($user["eng"] == 1) echo "	Английский;";
				if ($user["rus"] == 1) echo "	Русский;";
			}
			echo "<br/><br/>";
			$dir = 'teachers/' . $login . "/diplo";
			$dir2 = 'teachers/' . $login . "/cert";
			// Получаем массив файлов и подпапок в папке
			$files = scandir($dir);
			// Выводим каждый файл или подпапку
			echo "<h4>Дипломы преподавателя</h4>";
			foreach ($files as $file) {
				if ($file != '.' && $file != '..') {
			    	echo "<a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='php/download_file.php?file=" . '../' . $dir . '/' . urlencode($file) . "'>" . $file . "</a>" . "<br>";
			    }
			}
			$files = scandir($dir2);
			echo "<br/>";
			echo "<h4>Сертификаты преподавателя</h4>";
			foreach ($files as $file) {
				if ($file != '.' && $file != '..') {
				    echo "<a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='php/download_file.php?file=" . '../' . $dir2 . '/' . urlencode($file) . "'>" . $file . "</a>" . "<br>";
				}
			}
			echo "<br/>";
			
		?>
		<?php if (isset($_COOKIE['user'])):?>
			<form action="schedule_of_teacher.php?value=<?php echo $login;?>" method="post">
					<button class="btn btn-secondary btn-sm" type="submit">Записаться на занятие</button>
			</form> <br>
		<?php endif;?>
	</div>
	<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
	  <!-- Copyright -->
	  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2024 Copyright
	  </div>
	  <!-- Copyright -->
	</footer>
</body>
</html>