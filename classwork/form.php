<?php

if (!isset($_POST['nume'])) {
	die("Nu e setat nici un nume.");
}

$nume = $_POST['nume'];

echo "Hello, ", $nume;
