<?php
if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'en';
include("lang/{$_SESSION['lang']}/add_job.php");
