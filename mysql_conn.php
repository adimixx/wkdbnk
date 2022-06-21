<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $host = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $dbname = $_ENV['DB_NAME'];
    $port = (int)$_ENV['DB_PORT'];

    $ismatConn = mysqli_connect($host, $username, $password, $dbname, $port) or die("CANNOT CONNECT WITH SERVER !");
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
