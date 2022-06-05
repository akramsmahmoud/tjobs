<?php
session_start();
echo $_SERVER['PHP_SELF'];
echo $_SERVER['RDS_HOSTNAME'];
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

include("lang/{$_SESSION['lang']}/employee.php");
