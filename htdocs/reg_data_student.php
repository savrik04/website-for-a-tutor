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
	    <a class="navbar-brand" href="#">Регистрация</a>
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
	          	if ($_COOKIE['user'] == ''):
	          ?>
	          <a class="nav-link active" aria-current="page" href="index.php">Личный кабинет</a>
	      	  <?php endif;?>
	      	  <?php 
	          	if ($_COOKIE['user'] != ''):
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
	            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Данные</h3>

	            <form class="px-md-2" action="php/reg_data_0.php" method="post">

	              <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" class="form-control" placeholder="Фамилия Имя Отчество" name="name" id="name"/>
	              </div>

	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="email" class="form-control" placeholder="Email" name="mail" id="mail"/>
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" placeholder="Номер телефона +7..." name="telephone" id="telephone"/>
	                  </div>

	                </div>
	              </div>
	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" placeholder="Возраст" name="age" id="age"/>
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" placeholder="Школа" name="school" id="school"/>
	                  </div>

	                </div>
	              </div>
	              <div data-mdb-input-init class="form-outline mb-4">
	                  <input type="text" class="form-control" placeholder="Класс" name="grade" id="grade"/>
	              </div>
				  <div data-mdb-input-init class="form-outline mb-4">
	                  <input type="text" class="form-control" placeholder="Telegram @nikname" name="tg" id="tg"/>
	              </div>
	              <div class="row">
	              	<button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-sm mb-1 mx-auto w-50">Регистрация</button>
	          	  </div>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
	<!--
	<div class="container mt-4">
		<div class="container">
			<h1>FORM DATA STUDENT</h1>
			<form action="php/reg_data_0.php" method="post">
				<input type="text" class="form-control" name="name" id="name" placeholder="ФИО"><br>
				<input type="email" class="form-control" name="mail" id="mail" placeholder="Email"><br>
				<input type="text" class="form-control" name="telephone" id="telephone" placeholder="+7..."><br>
				<input type="text" class="form-control" name="age" id="age" placeholder="Age"><br>
				<input type="text" class="form-control" name="school" id="school" placeholder="School"><br>
				<input type="text" class="form-control" name="grade" id="grade" placeholder="Grade"><br>
				<button class="btn btn-success" type="submit">UpdDataStudent</button>
			</form> <br>
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