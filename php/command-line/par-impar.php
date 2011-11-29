#!/usr/bin/php
<?php
echo "x="; $x = fgets(STDIN);
while ($x!=0) {
	if ($x%2==0) {
		echo "x e par\n";
	} else {
		echo "x e impar\n";
	}
	$x = fgets(STDIN);
}

?>
