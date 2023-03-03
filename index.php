<?php
ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);
ini_set("log_errors", "on");
ini_set("error_log", "/var/log/php/php_error.log");
ini_set("date.timezone", "Asia/Tokyo");

$log = '[' . $_SERVER['SCRIPT_NAME'] . ']';

require("config.php");
require("domains.php");