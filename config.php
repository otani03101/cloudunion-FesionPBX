<?php
define("DSN", "pgsql:host=localhost;dbname=fusionpbx");
define('USER', "fusionpbx");
define("password", "XG5XsH5qkpCkJCLeVmQEelc8xo");

try {
    $pdo = new PDO(DSN, USER, password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $exception) {
    error_log($log . 'エラー:' . $exception->getMessage());
    die();
}
