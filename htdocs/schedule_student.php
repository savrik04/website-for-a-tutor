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
	    <a class="navbar-brand" href="#">Расписание</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="main_page.php">Главная страница</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="lk_student.php">Личный кабинет</a>
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
		<h1 class="mb-4">Ваше расписание</h1>
		<table style="border: 1px solid black; border-collapse: collapse;" class="table">
			<tr id="math">
		    	<th class="table-secondary" style="border: 1px solid black;">Дата</th>
		    	<th class="table-secondary" style="border: 1px solid black;">Учитель по записи</th>
		    </tr>
			<?php
				$login = $_COOKIE['user'];
				$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');

				$result = $mysql->query("SELECT * FROM `teacher_schedule` WHERE `login_s` = '$login' ORDER BY `date`");
				while($row = $result->fetch_assoc()) {	
					$log = $row["login"];
				    $formatted_date = date('d.m.Y H:i', strtotime($row['date'])); // Форматирование даты
				    echo "<tr id=" . $row['id'] . ">
				            <td style='border: 1px solid black;'><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='change_date_student_valid.php?value=" . $row['login'] . "&id=" . $row['id'] . "'>" . $formatted_date . "</a></td>";
					if ($row["busy"] != 0) {
					echo "<td style='border: 1px solid black;'><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='student_teacher.php?value=" . $row['login'] . "&id=" . $row["id"] . "'>Карточка учителя</a></td>
						  </tr>";
					}
				}
				
			?>
		</table>

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