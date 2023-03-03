<?php
$domain_name = $_GET['domain'];
error_log($log . $domain_name);

try {
    $sql = 'SELECT * FROM v_domains WHERE domain_name = :domain_name';
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':domain_name', $domain_name, PDO::PARAM_STR);
    $stmh->execute();
    $count = $stmh->rowCount();
    error_log($log . $count);
} catch (Exception $exception) {
    error_log($log . 'エラー:' . $exception->getMessage());
}

if ($count > 0) {
    $value_array = ['DomainName' => true];
    $jsonstr = json_encode($value_array);
    echo $jsonstr;
} else {
    $value_array = ['DomainName' => false];
    $jsonstr = json_encode($value_array);
    echo $jsonstr;
}