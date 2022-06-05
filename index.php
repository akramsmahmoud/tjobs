<?php
session_start();
$_SERVER['cdn'] = 'https://cdn.lavoturismo.com';
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (isset($_GET['lang'])) {
    $get_lang = $_GET['lang'];
    $whitelist_langs = ['en', 'ar', 'it', 'gr'];

    $lang = in_array($get_lang, $whitelist_langs) ? $get_lang : 'en';
}
$_SESSION['lang'] =  $lang;
include("lang/{$_SESSION['lang']}/inc/header.php");
include("lang/{$_SESSION['lang']}/sections/about.php");
//include("lang/{$_SESSION['lang']}/sections/funfacts.php");
include("lang/{$_SESSION['lang']}/sections/services.php");
include("lang/{$_SESSION['lang']}/sections/testmonial.php");
include("lang/{$_SESSION['lang']}/sections/features.php");
include("lang/{$_SESSION['lang']}/sections/contacts.php");
include("lang/{$_SESSION['lang']}/inc/footer.php");
