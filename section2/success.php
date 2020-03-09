<?php  
	session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Thanks Page</title>
</head>
<body>
	<h1>Thank you for your submission.</h1>

	<p>
		Your city is <?= $_SESSION["city"]  ?>

	</p>
	<p>
		If you want to submit again, please click <a href="index.php">here</a> 
	</p>
</body>
</html>