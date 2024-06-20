<?php
	if (isset($_COOKIE['user'])) {
		$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		$login = $_COOKIE['user'];
		$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
		$user = $result->fetch_assoc();
		if($user["type"] == "0") {
			header("Location: /lk_student.php");
		} else {
			header("Location: /lk_teacher.php");
		}
	}
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
	    <a class="navbar-brand" href="#">Вход</a>
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
	          <a class="nav-link active" aria-current="page" href="index.php">Личный кабинет</a>
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
	<section class="h-100 h-custom" style="background-color: #8fc4b7;">
	  <div class="container py-5 h-100">
	    <div class="row d-flex justify-content-center align-items-center h-100">
	      <div class="col-lg-8 col-xl-6">
	        <div class="card rounded-3">
	          <div class="card-body p-4 p-md-5">
	            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Вход</h3>

	            <form class="px-md-2" action="php/auth.php" method="post">

	              <div data-mdb-input-init class="form-outline mb-4 w-50">
	                <input type="text" class="form-control" placeholder="Логин" name="login" id="login"/>
	              </div>

	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline datepicker">
	                    <input type="password" class="form-control" placeholder="Пароль" name="pass" id="pass"/>
	                  </div>

	                </div>
	              <div class="mb-1 d-flex justify-content-center">
	              
	              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-sm mb-1 mx-auto w-50">Войти</button>
	              </div>
	            </form>
	            <a href="index.php" class="text-center">Нет аккаунта</a>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
	<!--<div class="container mt-4">
		
		<div class="container">
			<h1>FORM REG</h1>
			<form action="php/reg.php" method="post">
				<input type="text" class="form-control" name="login" id="login" placeholder="Login"><br>
				<input type="password" class="form-control" name="pass" id="pass" placeholder="Password"><br>
				<label for="types">Type:</label>
				<select id="types" name="types">
					<option value="0">Student</option>
					<option value="1">Teacher</option>
				</select> <br> <br>
				<button class="btn btn-success" type="submit">Register</button>
			</form> <br>
		</div>
		
		<div class="container2">
			<h1>FORM LOG</h1>
			<form action="php/auth.php" method="post">
				<input type="text" class="form-control" name="login" id="login" placeholder="Login"><br>
				<input type="password" class="form-control" name="pass" id="pass" placeholder="Password"><br>
				<button class="btn btn-success" type="submit">Login</button>
			</form>
		</div><br>
		<div class="container3">
			<form action="main_page.php" method="post">
				<button class="btn btn-success" type="submit">MainPage</button>
			</form>
		</div>
	</div>
	-->
	<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
	  <!-- Copyright -->
	  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2024 Copyright
	  </div>
	  <!-- Copyright -->
	</footer>
</body>
</html>