<?php
$config = require __DIR__ . '/config.php';
session_start();

$dbCfg = $config['db'];
$dsn = "mysql:host={$dbCfg['host']};dbname={$dbCfg['dbname']};charset={$dbCfg['charset']}";
try {
    $pdo = new PDO($dsn, $dbCfg['user'], $dbCfg['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $e) {
    die('DB Connection failed: ' . $e->getMessage());
}
