<?php

if (!isset($_COOKIE['name'], $_POST['age'])) {
	die("nu ai setat numele si varsta");
}

echo "Nume :",$_COOKIE['name'],"<br />";
echo "Varsta: ",$_POST['age'], "<br />";
