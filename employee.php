<?php
session_start();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (isset($_GET['lang'])) {
    $get_lang = $_GET['lang'];
    $whitelist_langs = ['en', 'ar', 'it', 'gr'];

    $lang = in_array($get_lang, $whitelist_langs) ? $get_lang : 'en';
}
$_SESSION['lang'] =  $lang;
require("lang/{$_SESSION['lang']}/employee.php");
