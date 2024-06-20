<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	      	  
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="php/logout.php">Выход</a>
	        </li>
	        <?php endif;?>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container mt-4">
		<h2 class="mb-4">Выберите учителя</h2>
		<form action="php/show_subjects.php" method="post" class="d-flex align-items-start">
			<label for="subj" class="me-2">Фильтр:</label>
			<select id="subj" name="subj" class="form-control w-25 form-select-sm me-2" aria-label="Default select example">
				<option value="all">Все</option>
				<option value="math">Математика</option>
				<option value="phys">Физика</option>
				<option value="it">Информатика</option>
				<option value="eng">Английский</option>
				<option value="rus">Русский</option>
			</select>
			<button class="btn btn-secondary btn-sm pd-2" type="submit">Show</button> <br>
		</form> <br>
		<?php
			if (!isset($_GET['value']) || $_GET['value'] == "all"):
		?>
		<table class="table mb-5">
			<tr id="math">
		    	<th style="border: 1px solid black;" class="table-secondary">Математика</th>
		    </tr>
		    <?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `math` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		    <tr id="phys">
		    	<th style="border: 1px solid black;" class="table-secondary">Физика</th>
		    </tr>
		    <?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `phys` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		    <tr id="it">
		    	<th style="border: 1px solid black;" class="table-secondary">Информационные технологии</th>
		    </tr>
		    <?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `it` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		    <tr id="eng">
		   		<th style="border: 1px solid black;" class="table-secondary">Английский</th>
		    </tr>
		    <?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `eng` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		    <tr id="rus">
		    	<th style="border: 1px solid black;" class="table-secondary">Русский</th>
		    </tr>
		    <?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `rus` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		</table>
		<?php endif; ?>
		
		<table class="table mb-5">
			<?php
				if (isset($_GET['value']) && $_GET['value'] == "math" ):
			?>
		  <tr id="math">
		    <th style="border: 1px solid black;" class="table-secondary">Математика</th>
		  </tr>
		  	<?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `math` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		 	<?php endif; ?>
		 	<?php
				if (isset($_GET['value']) && $_GET['value'] == "phys"):
			?>
		  <tr id="phys">
		    <th style="border: 1px solid black;" class="table-secondary">Физика</th>
		  </tr>
		  	<?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `phys` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>

		  	<?php endif; ?>
		  	<?php
				if (isset($_GET['value']) && $_GET['value'] == "it"):
			?>
		  <tr id="it">
		    <th style="border: 1px solid black;" class="table-secondary">Информационные технологии</th>
		  </tr>
		  	<?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `it` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		  	<?php endif; ?>
		  	<?php
				if (isset($_GET['value']) && $_GET['value'] == "eng"):
			?>
		  <tr id="eng">
		    <th style="border: 1px solid black;" class="table-secondary">Английский</th>
		  </tr>
		  	<?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `eng` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		  	<?php endif; ?>
		  	<?php
				if (isset($_GET['value']) && $_GET['value'] == "rus"):
			?>
		  <tr id="rus">
		    <th style="border: 1px solid black;" class="table-secondary">Русский</th>
		  </tr>
		  	<?php
		    	$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
		    	$result = $mysql->query("SELECT * FROM `teachers` WHERE `rus` = '1'");
		    	if ($result->num_rows > 0) {
				    // выводим данные каждой строки
				    while($row = $result->fetch_assoc()) {
				    	$log = $row["login"];
				        echo "<tr> 
				        			<td id=$log><a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='teacher_card.php?id=" . $log . "'>Teacher: " . $row["name"]."</a></td>
				        	  </tr>";
				    }
				} else {
				    echo "<tr> 
				        		<td>NoTeachers</td>
				       	  </tr>";
				}
		    ?>
		  	<?php endif; ?>
		</table> <br>
	</div>
	<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
	  <!-- Copyright -->
	  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2024 Copyright
	  </div>
	  <!-- Copyright -->
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>  
</body>
</html>