<?php

if (!isset($_POST['name'])) {
	die("Nu e setat nici un nume.");
}

$nume = $_POST['name'];

if (!setcookie("name", $nume)) {
	die("saving the cookie has failed.");
}
echo "Hello, ", $nume;

?>

<form method='post' action='form2.php'>
<input type='text' name='age' />
<input type='submit' value='OK' />
</form>
