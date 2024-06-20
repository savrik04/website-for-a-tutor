<?php
		$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		$login = $_COOKIE['user'];
		$result = $mysql->query("SELECT * FROM `teachers` WHERE `login` = '$login'");
		$user = $result->fetch_assoc();
		$name = $user["name"];
		$email = $user["email"];
		$telephone = $user["tel"];
		$tg = $user["tg"];
		$birth = $user["birth"];
		$exp = $user["exp"];
		$service = $user["service"];
		$price = $user["price"];
		$math = $user["math"];
		$it = $user["it"];
		$phys = $user["phys"];
		$eng = $user["eng"];
		$rus = $user["rus"];
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
	          <a class="nav-link active" aria-current="page" href="schedule_teacher.php">Расписание</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="lk_teacher.php">Личный кабинет</a>
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

	            <form class="px-md-2" action="php/change_data_1.php" method="post" enctype="multipart/form-data">

	              <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
	              </div>

				  <div data-mdb-input-init class="form-outline mb-4">
	                <input type="text" class="form-control" name="tg" id="tg" value="<?php echo $tg; ?>">
	              </div>

	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $email; ?>">
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $telephone; ?>">
	                  </div>

	                </div>
	              </div>
	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="date" class="form-control" name="birth" id="birth" value="<?php echo $birth; ?>">
	                  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" name="exp" id="exp" value="<?php echo $exp; ?>">
	                  </div>

	                </div>
	              </div>
	              <div class="row">
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline mb-4">
	                  	<input type="text" class="form-control" name="service" id="service" value="<?php echo $service; ?>">
	              	  </div>

	                </div>
	                <div class="col-md-6 mb-4">

	                  <div data-mdb-input-init class="form-outline">
	                    <input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>">
	                  </div>

	                </div>
	              </div>
	              
				  

				  <p>Выберите предметы:</p>
				  <input type="checkbox" id="math" name="options[]" value="math" <?php if($math) echo "checked"?>>
				  <label for="math">Математика</label><br>
				  <input type="checkbox" id="phys" name="options[]" value="phys" <?php if($phys) echo "checked"?>>
				  <label for="phys">Физика</label><br>
				  <input type="checkbox" id="it" name="options[]" value="it" <?php if($it) echo "checked"?>>
				  <label for="it">Информатика</label><br>
				  <input type="checkbox" id="eng" name="options[]" value="eng" <?php if($eng) echo "checked"?>>
				  <label for="eng">Английский</label><br>
				  <input type="checkbox" id="rus" name="options[]" value="rus" <?php if($rus) echo "checked"?>>
				  <label for="rus">Русский</label><br>
	              <div class="row">
	              	<button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-sm mb-4 mx-auto w-50">Обновить данные</button>
	          	  </div>
	            </form>
	            <form action="php/upload_file.php" method="post" enctype="multipart/form-data">
					<label for="diplo">Загрузите дипломы:</label>
				  	<input type="file" class="form-control" name="diplo[]" id="diplo" multiple><br>
				  	<label for="cert">Загрузите сертификаты:</label>
				  	<input type="file" class="form-control" name="cert[]" id="cert" multiple><br>
				  	<div class="row">
				  		<button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-sm mb-4 mx-auto w-50">Обновить файлы</button>
				  	</div>
	            </form>
	            <p>Удалить файлы:</p>
	            <?php
					$dir = 'teachers/' . $login . "/diplo";

					// Получаем массив файлов и подпапок в папке
					$files = scandir($dir);
					// Выводим каждый файл или подпапку
					foreach ($files as $file) {
						if ($file != '.' && $file != '..') {
							echo "<div class='row align-items-center'>";
						    echo "<div class='col-8'>";
						    echo "<a href='php/download_file.php?file=" . '../' . $dir . '/' . urlencode($file) . "'>" . $file . "</a>";
						    echo "</div>";
						    echo "<div class='col-4'>";
						    echo "<form action='php/delete_file.php?file=" . '../' . $dir . '/' . urlencode($file) . "'" . " method='post'>";
						    echo "<button class='btn btn-danger btn-sm' type='submit'>Удалить</button>";
						    echo "</form>";
						    echo "</div>";
						    echo "</div><br>";
						}
					}
				?>
				<?php
					$dir = 'teachers/' . $login . "/cert";

					// Получаем массив файлов и подпапок в папке
					$files = scandir($dir);
					// Выводим каждый файл или подпапку
					foreach ($files as $file) {
						if ($file != '.' && $file != '..') {
					    	echo "<div class='row align-items-center'>";
						    echo "<div class='col-8'>";
						    echo "<a href='php/download_file.php?file=" . '../' . $dir . '/' . urlencode($file) . "'>" . $file . "</a>";
						    echo "</div>";
						    echo "<div class='col-4'>";
						    echo "<form action='php/delete_file.php?file=" . '../' . $dir . '/' . urlencode($file) . "'" . " method='post'>";
						    echo "<button class='btn btn-danger btn-sm' type='submit'>Удалить</button>";
						    echo "</form>";
						    echo "</div>";
						    echo "</div><br>";
						}
					}
				?>
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