<?php
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
require("lang/{$_SESSION['lang']}/employee.php");
