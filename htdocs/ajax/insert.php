<?php
	if (isset($_COOKIE['user'])) {
		if (isset($_POST['message']) && isset($_POST['to_id'])) {
			$message = $_POST['message'];
			$to_id = $_POST['to_id'];
			$from_id = $_COOKIE['user'];

			$mysql = new mysqli('localhost', 'root', 'root', 'reg_db');

			$result = $mysql->query("INSERT INTO `chats` (`from_id`, `to_id`, `message`) VALUES ('$from_id', '$to_id', '$message')");
		
			?>
			<p class="rtext align-self-end border rounded p-2 mb-1"><?=$message?></p>
		<?php
		}
	} else {
		header('Location: ../index.php');
		exit();
	}
?>

