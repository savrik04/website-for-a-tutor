<?php
	include 'chat/chat.php';
	include 'ajax/opened.php';
	$chats = getChats($_COOKIE['user'], $_GET['value']);
	opened($_GET['value'], $chats);
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
<body>
	<style>
		.ltext {
			width: 65%;
			background: #f8f9fa;
			color: #444;
		}
		.rtext {
			width: 65%;
			background: #3289c8;
			color: #fff;
		}
		.chat-box {
			overflow-y: auto;
			overflow-x: hidden;
			max-height: 30vh;
		}
		textarea {
			resize: none;
		}
	</style>
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
	          <a class="nav-link active" aria-current="page" href="schedule_teacher.php">Расписание</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="change_data_teacher.php">Изменить данные</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="php/logout.php">Выход</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container mt-4">
		<h1 class="mb-4">Карточка записанного студента</h1>
		<h4>Основная информация о студенте</h4>
		<?php
			$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');
			$login = $_GET['value'];
			$result = $mysql->query("SELECT * FROM `students` WHERE `login` = '$login'");
			$mysql->close();
			if ($result->num_rows > 0) {
				$user = $result->fetch_assoc();
				echo "<b>Фамилия Имя Отчество:</b> " . $user["name"] . "<br>". "<b>Email:</b> " . $user["email"] . "<br>". "<b>Номер телефона:</b> " . $user["tel"] . "<br>". "<b>Возраст:</b> " . $user["age"] . "<br>". "<b>Школа:</b> " . $user["school"] . "<br>". "<b>Класс:</b> " . $user["grade"] . "<br>";
			}			
		?>
		<br/>
		<h4>Прикрепить домашнюю работу</h4>
		<form action="php/upload_hw.php?value=<?php echo $_GET['value']?>&id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
			<label for="hw">Прикрепить файл:</label>
			<input type="file" class="form-control" name="hw[]" id="hw" multiple><br>
			<button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-sm mb-4 mx-auto w-50">Загрузить файлы</button>
	    </form>
	    <h4>Прикрепленная домашняя работа</h4>
	    <?php
			$login = $_COOKIE['user'];
			$login_s = $_GET['value'];
			$id = $_GET['id'];
			$dir = 'teachers/' . $login . "/students/$login_s/$id/hw";
			// Получаем массив файлов и подпапок в папке
			$files = scandir($dir);
			// Выводим каждый файл или подпапку
			foreach ($files as $file) {
				if ($file != '.' && $file != '..') {
					echo "<div class='row align-items-center'>";
					echo "<div class='col-8'>";
			    	echo "<a class='link-body-emphasis' style='text-decoration: none; font-weight: bold;' href='php/download_file.php?file=" . '../' . $dir . '/' . urlencode($file) . "'>" . $file . "</a>" . "<br>";
			    	echo "</div>";
			    	echo "<div class='col-4'>";
			    	echo "<form action='php/delete_hw.php?file=" . '../' . $dir . '/' . urlencode($file) . "&value=" . $login_s . "&id=" . $id . "'" . " method='post'>";
						    echo "<button class='btn btn-danger btn-sm' type='submit'>Удалить</button>";
						    echo "</form>";
						    echo "</div>";
						    echo "</div><br>";
			    }
			}

		?>
		<br>
		<h4>Чат с преподавателем</h4>
		<div class="w-50 shadow p-4 rounded">
			<div class="shadow p-4 rounded d-flex flex-column mt-2 chat-box" id="chatBox">
				<?php
					if (!empty($chats)) {
					    foreach ($chats as $chat) {

					        if ($chat['from_id'] == $_COOKIE['user'] && $chat['to_id'] == $_GET['value']) {
					        	
					?>
					            <p class="rtext align-self-end border rounded p-2 mb-1"><?=$chat['message']?></p>
					<?php
					        } else if ($chat['from_id'] == $_GET['value'] && $chat['to_id'] == $_COOKIE['user']){ ?>
					        	<p class="ltext border rounded p-2 mb-1"><?=$chat['message']?></p>
					        <?php }
					    }
					} 
					?>

					

					<?php
						if (empty($chats)) {
					?>
						    <div class="alert alert-info text-center" role="alert">
						        No messages
						    </div>
						<?php
						}
					?>
			</div>
			<div class="input-group mb-3">
				<textarea cols="3" class="form-control" id="message"></textarea>
				<button class="btn btn-primary" id="sendBtn">
					<i class="fa fa-paper-plane"></i>
				</button>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
	  <!-- Copyright -->
	  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2024 Copyright
	  </div>
	  <!-- Copyright -->
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<script>
		var scrollDown = function() {
			let chatBox = document.getElementById('chatBox');
			chatBox.scrollTop = chatBox.scrollHeight;
		}
		scrollDown();
		$(document).ready(function() {
			$("#sendBtn").on('click', function() {
				message = $("#message").val();
				var value = "<?php echo isset($_GET['value']) ? $_GET['value'] : ''; ?>";
				if (message == "") return;
				$.post("ajax/insert.php", 
					{
						message: message,
						to_id: value
					},
					function(data, status) {
						$("#message").val("");
						$("#chatBox").append(data);
						scrollDown();
					}
				
				);
			});

			let fechData = function(){
				var value = "<?php echo isset($_GET['value']) ? $_GET['value'] : ''; ?>";
				$.post("ajax/getMessage.php", 
				{
					id_2: value
				},
				function(data, status) {
						$("#chatBox").append(data);
						if (data != "") scrollDown();						
				});
			}
			fechData();
			setInterval(fechData, 500);
		});

	</script>
</body>
</html>