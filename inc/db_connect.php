<?php
$mysql_hostname = "localhosts";
$mysql_user = "roots";
$mysql_password = "";
$mysql_database = "palmis";

$db_connect = mysqli_connect($mysql_hostname, $mysql_user,$mysql_password, $mysql_database) or ("Could not connect database");
