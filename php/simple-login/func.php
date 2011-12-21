<?php

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
    if (isset($_COOKIE['is_logged_in'], $_COOKIE['is_logged_in_check'])
            && isset($users[$_COOKIE['is_logged_in']])
            && strlen($users[$_COOKIE['is_logged_in']]) == $_COOKIE['is_logged_in_check'])
        return $_COOKIE['is_logged_in'];

    return false;
}

function setUser($username, $password) {
    return setcookie('is_logged_in', $username) && setcookie('is_logged_in_check', strlen($password));
}

function delUser() {
    return setcookie('is_logged_in', null, 1000000000) && setcookie('is_logged_in_check', null, 1000000000);
}
