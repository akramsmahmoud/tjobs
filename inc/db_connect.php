<?php
if (isset($_SERVER['RDS_HOSTNAME'])) {
    $mysql_hostname = $_SERVER['RDS_HOSTNAME'];
    $mysql_user = $_SERVER['RDS_USERNAME'];
    $mysql_password = $_SERVER['RDS_PASSWORD'];
    $mysql_database = $_SERVER['RDS_DB_NAME'];
    $mysql_port = $_SERVER['RDS_PORT'];

    echo $mysql_hostname + $mysql_user + $mysql_password + $mysql_database + $mysql_port;
} else {
    $mysql_hostname = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '';
    $mysql_database = 'palmi';
    $mysql_port = null;
}
try {
    $db_connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database, $mysql_port);
    if (!$db_connect) {
        throw new Error("Could not connect database");
    }
} catch (Exception $e) {
    echo 'and the error is: ',  $e->getMessage(), "\n";
}
