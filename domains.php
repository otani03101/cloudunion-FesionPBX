<?php
try {
    $sql = 'SELECT * FROM v_domains';
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
} catch (Exception $exception) {
    error_log($log . 'エラー:' . $exception->getMessage());
}

$row = $stmh->fetch(PDO::FETCH_ASSOC);

echo $row['domain_name'];
error_log($log . $row['domain_name']);