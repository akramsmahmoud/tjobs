<?php
session_start();

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

//include("lang/{$_SESSION['lang']}/employee.php");


echo $_SESSION['lang'];
