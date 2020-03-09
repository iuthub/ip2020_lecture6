<?php 
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Thanks for Submission.</title>
</head>
<body>
	<h1>Thanks for submission!</h1>
	<p>Your city is <?= $_SESSION["city"] ?></p>
	<p>You can resubmit this form again <a href="index.php">here</a></p>
</body>
</html>