<?php
if (isset($_SERVER['RDS_HOSTNAME'])) {
    $mysql_hostname = $_SERVER['RDS_HOSTNAME'];
    $mysql_user = $_SERVER['RDS_USERNAME'];
    $mysql_password = $_SERVER['RDS_PASSWORD'];
    $mysql_database = $_SERVER['RDS_DB_NAME'];
    $mysql_port = $_SERVER['RDS_PORT'];
} else {
    $mysql_hostname = 'mysql';
    $mysql_user = 'dev';
    $mysql_password = 'dev';
    $mysql_database = 'tjobs';
    $mysql_port = null;
}
try {
    $db_connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database, $mysql_port);
    if (!$db_connect) {
        echo mysqli_connect_errno() . ":" . mysqli_connect_error();

        throw new Error("Could not connect databases");
    }
} catch (Exception $e) {
    echo 'and the error is: ',  $e->getMessage(), "\n";
}
