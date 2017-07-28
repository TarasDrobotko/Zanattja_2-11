<?php


$db = array(
  'db_name' => 'm662449k_blog',
  'db_user' => 'm662449k_blog',
  'db_pass' => 'Taras131',
);
try {
    $dsn = "mysql:host=localhost;dbname={$db['db_name']}";
    $conn = new PDO($dsn, $db['db_user'], $db['db_pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    print "DB ERROR: {$e->getMessage()}";
}
//$conn->query("SET NAMES 'utf8';");
//$conn->query("SET CHARACTER SET 'utf8';");
//$conn->query("SET SESSION collation_connection = 'utf8_general_ci';");
