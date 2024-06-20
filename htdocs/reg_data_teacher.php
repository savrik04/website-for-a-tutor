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
	<section class="h-100 h-custom mb-4" style="background-color: #8fc4b7;">
	  <div class="container py-5 h-100">
	    <div class="row d-flex justify-content-center align-items-center h-100">
	      <div class="col-lg-8 col-xl-6">
	        <div class="card rounded-3">
	          <div class="card-body p-4 p-md-5">
	            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Данные</h3>

	            <form class="px-md-2" action="php/reg_data_1.php" method="post" enctype="multipart/form-data">

	              <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" class="form-control" placeholder="Фамилия Имя Отчество" name="name" id="name"/>
	              </div>
				  <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" class="form-control" placeholder="Telegram @nikname" name="tg" id="tg"/>
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
	                    <input type="date" class="form-control" placeholder="Дата рождения" name="birth" id="birth"/>
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" placeholder="Опыт работы" name="exp" id="exp"/>
	                  </div>

	                </div>
	              </div>
	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline mb-4">
	                  	<input type="text" class="form-control" placeholder="Услуги" name="service" id="service"/>
	              	  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" placeholder="Цены" name="price" id="price"/>
	                  </div>

	                </div>
	              </div>
	              <label for="diplo">Загрузите дипломы:</label>
				  <input type="file" class="form-control" name="diplo[]" id="diplo" multiple><br>
				  <label for="cert">Загрузите сертификаты:</label>
				  <input type="file" class="form-control" name="cert[]" id="cert" multiple><br>
				  <p>Выберите предметы:</p>
				  <input type="checkbox" id="math" name="options[]" value="math">
				  <label for="math">Математика</label><br>
				  <input type="checkbox" id="phys" name="options[]" value="phys">
				  <label for="phys">Физика</label><br>
				  <input type="checkbox" id="it" name="options[]" value="it">
				  <label for="it">Информатика</label><br>
				  <input type="checkbox" id="eng" name="options[]" value="eng">
				  <label for="eng">Английский</label><br>
				  <input type="checkbox" id="rus" name="options[]" value="rus">
				  <label for="rus">Русский</label><br>
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
			<h1>FORM DATA TEACHER</h1>
			<form action="php/reg_data_1.php" method="post" enctype="multipart/form-data">
				<input type="text" class="form-control" name="name" id="name" placeholder="ФИО"><br>
				<input type="email" class="form-control" name="mail" id="mail" placeholder="Email"><br>
				<input type="text" class="form-control" name="telephone" id="telephone" placeholder="+7..."><br>
				<input type="date" class="form-control" name="birth" id="birth"><br>
				<input type="text" class="form-control" name="exp" id="exp" placeholder="Experience"><br>
				<input type="text" class="form-control" name="service" id="service" placeholder="Service"><br>
				<input type="text" class="form-control" name="price" id="price" placeholder="Tell about your price..."><br>
				<label for="diplo">Select a diplo-file:</label>
				<input type="file" class="form-control" name="diplo[]" id="diplo" multiple><br>
				<label for="cert">Select a cert-file:</label>
				<input type="file" class="form-control" name="cert[]" id="cert" multiple><br>

				<input type="checkbox" id="math" name="options[]" value="math">
				<label for="math">Math</label><br>
				<input type="checkbox" id="phys" name="options[]" value="phys">
				<label for="phys">Phys</label><br>
				<input type="checkbox" id="it" name="options[]" value="it">
				<label for="it">IT</label><br>
				<input type="checkbox" id="eng" name="options[]" value="eng">
				<label for="eng">Eng</label><br>
				<input type="checkbox" id="rus" name="options[]" value="rus">
				<label for="rus">Rus</label><br>
				<button class="btn btn-success" type="submit">UpdDataTeacher</button>
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