<?php
if (isset($_SERVER['RDS_HOSTNAME'])) {
    $mysql_hostname = $_SERVER['RDS_HOSTNAME'];
    $mysql_user = $_SERVER['RDS_USERNAME'];
    $mysql_password = $_SERVER['RDS_PASSWORD'];
    $mysql_database = $_SERVER['RDS_DB_NAME'];
    $mysql_port = $_SERVER['RDS_PORT'];
    $json = [
        'host' => $mysql_hostname,
        'user' => $mysql_user,
        'pass' =>  $mysql_password,
        'db' => $mysql_database,
        'port' => $mysql_port
    ];
    echo json_encode($json);
} else {
    $mysql_hostname = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '';
    $mysql_database = 'palmi';
    $mysql_port = null;
}
try {
    if ($mysql_password !== 'akrampassword') {
        $mysql_password = 'akrampassword';
    }
    $db_connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database, $mysql_port);
    if (!$db_connect) {
        throw new Error("Could not connect database");
    }
} catch (Exception $e) {
    echo 'and the error is: ',  $e->getMessage(), "\n";
}
