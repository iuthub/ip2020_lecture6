<?php
	session_start();

	// $city = isset($_COOKIE["city"])?$_COOKIE["city"]:"";
	// $state = isset($_COOKIE["state"])?$_COOKIE["state"]:"";
	// $zip = isset($_COOKIE["zip"])?$_COOKIE["zip"]:"";

	$city = isset($_SESSION["city"])?$_SESSION["city"]:"";
	$state = isset($_SESSION["state"])?$_SESSION["state"]:"";
	$zip = isset($_SESSION["zip"])?$_SESSION["zip"]:"";

	$cityPattern = "/^[A-Z][a-z]+( [A-Z][a-z]+)*$/";
	$statePattern = "/^[A-Z]{2}$/";
	$zipPattern = "/^\d{5}$/";


	$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
	$isValid = TRUE;

	if($isPost) {
		$city = $_REQUEST["city"];
		$state = $_REQUEST["state"];
		$zip = $_REQUEST["zip"];

		// setcookie("city", $city, time()+60*60);
		// setcookie("state", $state, time()+60*60);
		// setcookie("zip", $zip, time()-1);


		$_SESSION["city"] = $city;
		$_SESSION["state"] = $state;
		$_SESSION["zip"] = $zip;
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>My First Validation Form</title>
	<style>
		
		.error {
			color: red;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h2>Address Form</h2>
	<form action="index.php" method="post">
		<table>
			<tr>
				<td>City:</td>
				<td><input type="text" name="city" value="<?= $city  ?>" />
					<?php if($isPost && !preg_match($cityPattern, $city)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide city.</span>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>State:</td>
				<td><input type="text" name="state" value="<?= $state  ?>" maxlength="2" />
					<?php if($isPost && !preg_match($statePattern, $state)) { 
							$isValid = FALSE;
						?>

						<span class="error">Please, provide state with 2 chars.</span>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Zip Code:</td>
				<td><input type="text" name="zip" maxlength="5" value="<?= $zip ?>"  />
					<?php if($isPost && !preg_match($zipPattern, $zip)) { 
							$isValid = FALSE;
						?>
						<span class="error">Please, provide zip with 5 chars.</span>
					<?php } ?>
				</td>
			</tr>		
			<tr>
				<td></td>
				<td>
					<input type="submit" value="Submit" />
				</td>
			</tr>
		</table>
	</form>
	<?php 
		if($isPost && $isValid) {
			header("Location: success.php", TRUE, 301);
		}
	?>


</body>
</html>