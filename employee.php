<?php
session_start();
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
echo $_SESSION['lang'];
require($_SERVER['DOCUMENT_ROOT'] . "lang/{$_SESSION['lang']}/employee.php");
