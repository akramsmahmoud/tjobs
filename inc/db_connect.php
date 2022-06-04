<?php
$mysql_hostname = $_server['RDS_HOSTNAME'];
$mysql_user = $_server['RDS_USERNAME'];
$mysql_password = $_server['RDS_PASSWORD'];
$mysql_database = $_server['RDS_DB_NAME'];


$db_connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or ("Could not connect database");
