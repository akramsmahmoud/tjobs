<?php
$mysql_hostname = $_SERVER['RDS_HOSTNAME'];
$mysql_user = $_SERVER['RDS_USERNAME'];
$mysql_password = $_SERVER['RDS_PASSWORD'];
$mysql_database = $_SERVER['RDS_DB_NAME'];
$mysql_port = $_SERVER['RDS_PORT'];


$db_connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database, $mysql_port);
if (!$db_connect) {
    throw new Error("Could not connect database");
}
