<?php
	$name = $_GET['file'];
	$file = $name;
	echo $file;
	if (file_exists($file)) {
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/pdf');
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    if (readfile($file)) echo "OK";
	    exit();
	} else echo "ni";
?>