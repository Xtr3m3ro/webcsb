<?php
echo "<h1>Exemplu de folosire a superglobalei \$_GET</h1>";

// Cand scriem ceva cu echo "" trebuie sa punem \ inaintea $ ca sa nu scriem valoarea variabilei.
// La echo '' nu este necesar backslash-ul (\).
/* Exemplu:
$ion = 3;
echo "$ion"; // va scrie 3
echo '$ion'; // va scrie $ion
echo "\$ion"; // va scrie $ion
*/

if (isset($_GET['page'])) {
	echo "Page ",intval($_GET['page']); // http://php.net/intval
} else {
	echo "Incearcati sa intrati pe aceasta pagina astfel:<br /> get.php?page=#<br />Inlocuiti # nu un numar intreg.";
}

echo "Dumping \$_GET: (executing var_dump(\$_GET))<br />";
var_dump($_GET);
?>
