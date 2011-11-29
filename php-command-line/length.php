#!/usr/bin/php
<?php
echo "Please write a text and press enter.\n";
$line=trim(fgets(STDIN));
echo "Your text has ",strlen($line)," characters (if no multibyte characters involved)\n";
?>
