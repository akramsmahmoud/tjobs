<?php
ob_start();
/*if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'en';
include("lang/{$_SESSION['lang']}/employee.php");
*/
echo implode("\n ", $_SESSION);
