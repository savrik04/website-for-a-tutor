<?php
	$name = filter_var(trim($_POST['subj']), FILTER_SANITIZE_STRING);
	

	header('Location: /main_page.php?value=' . urlencode($name));
?>