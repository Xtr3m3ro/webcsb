#!/usr/bin/php
<?php
echo "CNP: ";
fscanf(STDIN, "%d\n", $cnp);
// echivalent cu:
// $cnp = intval(fgets(STDIN));

/**
 * In cazul citirii:
 * $cnp = fgets(STDIN);
 * $cnp va fi string de modul "1234567890123\n" daca user-ul scrie "1234567890123"
 * si atunci strlen($cnp) va fi 14 (cu tot cu \n)
 * rezolvare:
 * $cnp = trim(fgets(STDIN));
 * @link http://php.net/trim
**/


// am evitate folosirea strlen(); - merge cum trebuie si cu strlen

// cel mai mic CNP valid (conform regulilor de aici http://valentin.zaraf.ro/diverse/verificare-cnp-online.html)
$cnp_minim = 1000101010014;
// cel mai mare CNP valid (aceleasi reguli)
$cnp_maxim = 9991231529991;


if ($cnp < $cnp_minim || $cnp > $cnp_maxim) {
	echo "CNP invalid. Nu se incadreaza in [max,min]\n";
	die(0);
}

// cifra de control
$check = $cnp%10;
$cnp = intval($cnp/10); // $cnp/10 returneaza FLOAT, am nevoie de INTEGER

$checkNo=279146358279; // numarul de verificare...
$sum = 0;
$x = $cnp;
// $x trebuie sa aiba 12 cifre.
for ($i=0;$i<12;$i++) { // pentru fiecare cifra al lui $x (si al lui $checkNo)
	$sum += ($x%10) * ($checkNo%10); // calculam produsul cifrelor de pe pozitia i (de la dreapta la stanga) si o adaugam la suma
	$x = intval($x/10); // mergem la pozitia urmatoare cu $x
	$checkNo = intval($checkNo/10); // mergem la pozitia urmatoare cu $checkNo
}
$mycheck = $sum % 11; //  cifra de verificare corecta este restul impartirii sumei la 11
if ($mycheck===10) // dar daca restul e 10, atunci cifra de verificare corecta e 1
	$mycheck=1;

if ($mycheck!==$check) { // daca cifra de verificare e incorecta
	echo "CNP invalid. Cifra de verificare incorecta. \n"; //scrie mesajul
	die(0); // opreste executia script-ului
}

// 3 cifre random (NNN-ul)
$rnd = $cnp%1000;

if ($rnd === 0) { // interval 001-999, deci diferit de 000, deci diferit de 0
	echo "CNP invalid. Cod alocat de judet (NNN) invalid.\n";
	die(0);
}
$cnp = intval($cnp/1000);

// cod judet
$jud = $cnp%100;

if ($jud<1 || $jud >52) { // trebuie sa fie in intervalul [1,52]
	echo "CNP invalid. Cod judet invalid.\n";
	die(0);
}
$cnp = intval($cnp/100);

// data nasterii
$zz = $cnp%100; $cnp = intval($cnp/100); // ziua nasterii
$ll = $cnp%100; $cnp = intval($cnp/100); // luna nasterii

if ($ll<1 || $ll > 12) { // luna trebuie sa fie in [1,12]
	echo "CNP invalid. Luna invalida.\n";
	die(0);
}
$aa = $cnp%100; $cnp = intval($cnp/100); // anul trebuie sa fie in [0,99], deci nu validam nimic

// sexul este ce a mai rămas în variabila $cnp
if ($cnp===0) {
	echo "CNP invalid. Sexul nu poate fi 0.\n";
	die(0);
}

// verificarea zilei din luna...
// initializam un array cu numarul de zile ale lunilor (ll=>nr_zile)
$maxDays=array(
	1=>31,
	2=>($aa%4 ? 28 : 29), // daca anul e divizibil cu 4 atunci luna 2 (februarie) are 29 de zile... (conditie ? valoare_daca_conditia_e_true : val_daca_conditia_e_false)
	3=>31,
	4=>30,
	5=>31,
	6=>30,
	7=>31,
	8=>31,
	9=>30,
	10=>31,
	11=>30,
	12=>31,
);

if ($zz > $maxDays[$ll] || $zz < 1) { // daca ziua nasterii este mai mare decat numarul de zile din luna nasterii sau ziua este mai mica decat 1, aceasta este invalida
	echo "CNP invalid. Ziua este incorecta.\n";
	die(0);
}

echo "CNP valid\n"; die(0);

