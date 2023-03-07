<?php
function getDomainsExist()
{
    global $pdo;
    $domain_name = $_GET['domain'];

    try {
        $sql = 'SELECT * FROM v_domains WHERE domain_name = :domain_name';
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':domain_name', $domain_name, PDO::PARAM_STR);
        $stmh->execute();
        $count = $stmh->rowCount();
        syslog(LOG_DEBUG, $count);
    } catch (Exception $exception) {
        syslog(LOG_ERR, 'エラー:' . $exception->getMessage());
    }

    $row = $stmh->fetch(PDO::FETCH_ASSOC);
    $enabled = $row['domain_enabled'];

    if ($count > 0) {
        switch ($enabled) {
            case true:
                $value_array = ['DomainName' => true, 'Enabled' => true];
                $jsonstr = json_encode($value_array);
                echo $jsonstr;
                break;
            case false:
                $value_array = ['DomainName' => true, 'Enabled' => false];
                $jsonstr = json_encode($value_array);
                echo $jsonstr;
                break;
        }
    } else {
        $value_array = ['DomainName' => false, 'Enabled' => false];
        $jsonstr = json_encode($value_array);
        echo $jsonstr;
    }
}

function createDomains()
{
    require_once("uuid.php");

    global $pdo;

    $post_data = file_get_contents("php://input", true);

    $damain_name = $post_data['CreateDomain'];
    syslog(LOG_DEBUG, $damain_name);

    $v4uuid = UUID::v4();

    try {
        $sql = 'INSERT INTO v_domains (domain_uuid,domain_parent_uuid,domain_name,domain_enabled,domain_description,insert_date,insert_user,update_date,update_user) VALUES (:domain_uuid,:domain_parent_uuid,:domain_name,:domain_enabled,:domain_description,:insert_date,:insert_user,:update_date,:update_user)';
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':domain_uuid', $v4uuid, PDO::PARAM_INT);
        $stmh->bindValue(':domain_parent_uuid', null, PDO::PARAM_STR);
        $stmh->bindValue(':domain_name', $damain_name, PDO::PARAM_STR);
        $stmh->bindValue(':domain_enabled', true, PDO::PARAM_STR);
        $stmh->bindValue(':domain_description', null, PDO::PARAM_STR);
        $stmh->bindValue(':insert_date', '', PDO::PARAM_INT);
        $stmh->bindValue(':insert_user', null);
        $stmh->bindValue(':update_date', null);
        $stmh->bindValue(':update_user', null, PDO::PARAM_STR);
        $stmh->execute();
    } catch (Exception $exception) {
        syslog(LOG_ERR, 'エラー:' . $exception->getMessage());
    }
}