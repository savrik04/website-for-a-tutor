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
	    <a class="navbar-brand" href="#">Личный кабинет</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="main_page.php">Главная страница</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="schedule_student.php">Расписание</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="change_data_student.php">Изменить данные</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="php/logout.php">Выход</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container mt-4">
		<h1 class="mb-4">Личный кабинет студента</h1>
		<h4>Основные данные</h4>
		<?php
			$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
			$login = $_COOKIE['user'];
			$result = $mysql->query("SELECT * FROM `students` WHERE `login` = '$login'");
			$mysql->close(); 
			// var_dump($result);
			// echo $result->field_count;
			if ($result->num_rows > 0) {
				$user = $result->fetch_assoc();
				echo "<b>Фамилия Имя Отчество:</b> " . $user["name"] . "<br>". "<b>Email:</b> " . $user["email"] . "<br>". "<b>Номер телефона:</b> " . $user["tel"] . "<br>". "<b>Возраст:</b> " . $user["age"] . "<br>". "<b>Школа:</b> " . $user["school"] . "<br>". "<b>Класс:</b> " . $user["grade"] . "<br>". "<b>Telegram:</b> " . $user["tg"] . "<br>";
			}
		?>
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