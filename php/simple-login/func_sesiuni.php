<?php
session_start();

// All the functionality is implemented in this file
// When needed to change from a static user list to mysql-based authentication I would just change a few functions in this file, not browsing the whole project
$users = array(
    'ion' => 'iLoveMyMom',
    'demo' => 'demo',
    'ghita' => 'veronica',
    'cerni' => 'suntUnBoss',
);

$msg = array(
    'login-success' => 'Autentificat cu succes!',
    'login-failed' => 'Autentificarea a esuat!',
    'logout-success' => 'Deconectarea a reusit!',
    'access-denied' => 'Acces respins.',
    'logout-denied' => 'You cannot logout because you are not logged in.',
);

function parseMessage ($msgCode, $d1="<div class='message'>", $d2="</div>") {
    global $msg;
    if (isset($msg[$msgCode]))
        return $d1.$msg[$msgCode].$d2;
    return false;
}

function validLogin($username, $password) {
    global $users;
    if (isset($users[$username]) && $users[$username] == $password)
        return true;
    return false;
}

function getUser() {
    global $users;
    if (isset($_SESSION['username']) && $_SESSION['username']) return $_SESSION['username'];
    return false;
}

function setUser($username) {
    $_SESSION['username']=$username;
    return true;
}

function delUser() {
	setcookie(session_name(), '', time()-3600);
	session_destroy();
}
