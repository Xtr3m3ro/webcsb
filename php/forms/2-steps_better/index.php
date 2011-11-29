<?php
// nu includem header.html aici pentru ca uneori trebuie sa trimite headere (pentru cookie)

// evitam hardcodarea constantelor
'nume' = "nume";

if ($_GET==2 && isset($_POST['nume'])) {
	setcookie('nume',$_POST['nume'],0); // cookie-ul expira odata cu sesiunea (cand user-ul inchide browser-ul)
	
	include "header.html";
	$nume = $_POST['nume'];
	include "form2.php";
} elseif ($_GET==3 && isset($_COOKIE['nume']) && isset($_POST['varsta'])) {
	$nume = $_COOKIE['nume'];
	$varsta = intval($_POST['varsta']); // varsta e un numar
	include 'header.html';
	include 'body.php';
} else {
	// daca exista un cookie vechi cu numele, il stergem
	if (isset($_COOKIE['nume']))
		setcookie('nume', null, 1);

	// html-ul, din fisiere externe - e mai elegant si mai curat asa
	include "header.html";
	include "form1.html";
}

include "footer.html"; // every page has HTML closing tags
?>
