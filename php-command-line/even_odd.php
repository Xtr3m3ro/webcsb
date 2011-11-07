#!/usr/bin/php
<?php
echo "This is a hello-world command line script in PHP.\n";
echo "Please write a number: ";
fscanf(STDIN, "%d\n", $number);
if ($number%2===0) {
	echo $number," is even.\n";
} else {
	echo $number," is odd.\n";
}
die(0);
?>
