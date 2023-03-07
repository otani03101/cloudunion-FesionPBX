<?php
define("DSN", "pgsql:host=localhost;dbname=fusionpbx");
define('USER', "fusionpbx");
define("PASSWORD", "XG5XsH5qkpCkJCLeVmQEelc8xo");

try {
    $pdo = new PDO(DSN, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $exception) {
    syslog(LOG_ERR, 'エラー:' . $exception->getMessage());
    die();
}