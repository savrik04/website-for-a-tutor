<?php
		$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		$login = $_COOKIE['user'];
		$result = $mysql->query("SELECT * FROM `students` WHERE `login` = '$login'");
		$user = $result->fetch_assoc();
		$name = $user["name"];
		$email = $user["email"];
		$telephone = $user["tel"];
		$age = $user["age"];
		$school = $user["school"];
		$grade = $user["grade"];
		$tg = $user["tg"];
		$mysql->close();
?>

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
<body style="background-color: #8fc4b7;">
	<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Изменение данных</a>
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
	          <a class="nav-link active" aria-current="page" href="lk_student.php">Личный кабинет</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="php/logout.php">Выход</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<section class="h-100 h-custom mb-4" style="background-color: #8fc4b7;">
	  <div class="container py-5 h-100">
	    <div class="row d-flex justify-content-center align-items-center h-100">
	      <div class="col-lg-8 col-xl-6">
	        <div class="card rounded-3">
	          <div class="card-body p-4 p-md-5">
	            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Данные</h3>

	            <form action="php/change_data_0.php" method="post">

	              <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" placeholder="Фамилия Имя Отчество" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
	              </div>

	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="email" placeholder="Email" class="form-control" name="mail" id="mail" value="<?php echo $email; ?>">
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" placeholder="+79..." class="form-control" name="telephone" id="telephone" value="<?php echo $telephone; ?>">
	                  </div>

	                </div>
	              </div>
	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" placeholder="Возраст" class="form-control" name="age" id="age" value="<?php echo $age; ?>">
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" placeholder="Школа" class="form-control" name="school" id="school" value="<?php echo $school; ?>">
	                  </div>

	                </div>
	              </div>

	                <div data-mdb-input-init class="form-outline mb-4">
	                	<input type="text" placeholder="Класс" class="form-control" name="grade" id="grade" value="<?php echo $grade; ?>">
	              	</div>

					  <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" placeholder="Telegram @nikname" class="form-control" name="tg" id="tg" value="<?php echo $tg; ?>">
	              </div>
	              <div class="row">
	              	<button class="btn btn-secondary btn-sm mb-4 mx-auto w-50" type="submit">Обновить данные</button>
	              </div>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
	<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
	  <!-- Copyright -->
	  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2024 Copyright
	  </div>
	  <!-- Copyright -->
	</footer>
</body>
</html>