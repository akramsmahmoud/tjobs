<?php
session_start();
ini_set('display_errors', 1);
echo "<h1>{$_SESSION['lang']}</h1>";
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (isset($_GET['lang'])) {
    $get_lang = $_GET['lang'];
    $whitelist_langs = ['en', 'ar', 'it', 'gr'];

    $lang = in_array($get_lang, $whitelist_langs) ? $get_lang : 'en';
}
$_SESSION['lang'] =  $lang;
require("lang/{$_SESSION['lang']}/employee.php");
