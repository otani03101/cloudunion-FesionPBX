<?php
ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);
ini_set("log_errors", "on");
ini_set("error_log", "/var/log/php/php_error.log");
ini_set("date.timezone", "Asia/Tokyo");

$log = '[' . $_SERVER['SCRIPT_NAME'] . ']';

require("config.php");
require("domains.php");

error_log($log . $_GET['rewrite_uri'], 3, "/var/log/php/php_error.log");

if ($_GET['rewrite_uri'] == 'domains.php') {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // GET送信されたリクエストパラメータです
        getDomainsExist();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // POST送信されたリクエストパラメータです
        createDomains();
    }
}