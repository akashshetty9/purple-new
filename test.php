<?php
$host = 'webhosting.chl5i1ohnieu.us-west-2.rds.amazonaws.com';
$port = '5432';
$dbname = 'PURPLETEAMING' ;
$user = 'webadmin';
$password= 'webadminpassword';
// require_once 'config.php';

try {
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if ($pdo) {
echo "Connected to the $dbname database successfully!";
}
} catch (PDOException $e) {
die($e->getMessage());
} finally {
if ($pdo) {
$pdo = null;
}
}
?>