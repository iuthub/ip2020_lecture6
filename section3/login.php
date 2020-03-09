<?php 
	session_start();
	error_reporting(E_ERROR);
	
	$isPost = $_SERVER["REQUEST_METHOD"] == "POST";

	//processing button clicks
	if($isPost) {
		//which button is clicked
		switch($_REQUEST["action"]) {
			case "login":
				$_SESSION["name"] = $_REQUEST["name"];
				$_SESSION["email"] = $_REQUEST["email"];
				$_SESSION["pwd"] = $_REQUEST["pwd"];
				$_SESSION["isAuth"] = TRUE;
				break;
			case "logout":
				$_SESSION["isAuth"] = FALSE;
				session_destroy();
				break;
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Sign Up Form</title>
</head>
<body>
	<?php if(!$_SESSION["isAuth"]) { ?>
	
	<h1>Sign Up Form</h1>
	<form action="login.php?action=login" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td>
				<input type="text" name="name"/>
			</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<input type="text" name="email" />
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="pwd" />

				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="Login" />
				</td>
			</tr>
		</table>
	</form>
	
	<?php } else { ?>

	<h1>Log out</h1>
	<table>
		<tr>
			<td>Name: </td>
			<td><?= $_SESSION["name"] ?></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><?= $_SESSION["email"]  ?></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><?= $_SESSION["pwd"]  ?></td>
		</tr>
	</table>

	<form action="login.php?action=logout" method="post">
		<input type="submit" value="Logout" />
	</form>

	<?php } ?>
</body>
</html>