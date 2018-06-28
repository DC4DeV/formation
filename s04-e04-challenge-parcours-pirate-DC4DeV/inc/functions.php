<?php

session_start();

function random($min, $max) {
  return rand($min, $max);
}


/* Exo 1 */
define('NBTOFIND', random(0, 1000));

function isSecretNumber($_number) {
  return $_number === NBTOFIND;
}

/* Exo 2 */
function generateLogin () {
  $_logins = ['dario', 'lucie', 'god', 'jc', 'maxime', 'philippe', 'julien'];
  return $_logins[array_rand($_logins)] . random(1,100);
}
function generatePassword() {
  $pass = '';
  $_chars = 'abcdefghijklmnopqrstuvwxyz0123456789_';
  $count = strlen($_chars);
  for ($_ind = 0, $result = ''; $_ind < 8; $_ind++) {
    $pass .= substr($_chars, rand(0, $count - 1), 1);
  }
  return $pass;
}
function generateAccounts() {
  $_results = [];
  for ($_ind=0; $_ind<20; $_ind++) {
    array_push($_results, generateLogin().'/'.generatePassword());
  }
  return $_results;
}
function randomAccount() {
  if (!isset($_SESSION['randomized'])) {
    $r = array_rand($_SESSION['accounts']);
    $_account = $_SESSION['accounts'][$r];
    $_login = substr($_account, 0, strpos($_account, '/'));
    $_pass = substr($_account, strpos($_account, '/')+1);
    $_SESSION['randomized'] = sha1($_login.'_'.$_pass);
  }
}

if (!isset($_SESSION['accounts'])) $_SESSION['accounts'] = generateAccounts();
randomAccount();

$_final = false;
$_userFinded = false;
function checkAccount($_login, $_password) {
  return sha1($_login.'_'.$_password) === $_SESSION['randomized'];
}
function saveAccount($_login, $_password) {
  global $_userFinded;
  $_userFinded = checkAccount($_login, $_password);
}

/* Exo 3 */
function etapeFinale($_data) {
  global $_final;
  $_final = checkAccount($_data['username'], $_data['password']);
  if ($_final) $_final = $_data['secret'] === $_SESSION['randomized'];
  return $_final;
}
