<?php
require_once("config.php");
require_once("domains.php");

syslog(LOG_DEBUG,$_GET['rewrite_uri']);

switch ($_GET['rewrite_uri']) {
    case 'domains.php';
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                getDomainsExist();
                break;
            case 'POST':
                createDomains();
                break;
        }
        break;
    case 'extensions.php':
        break;
    case 'ring_groups.php':
        break;
}