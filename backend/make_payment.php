<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] !== 'POST') { echo 'POST only'; exit; }
$roll = $_POST['rollno'] ?? '';
$amt = floatval($_POST['amount'] ?? 0);
$method = $_POST['method'] ?? 'UPI';
$ref = $_POST['reference'] ?? 'REF'.rand(100000,999999);
if(!$roll || $amt<=0) { echo 'Invalid'; exit; }
$stmt = $pdo->prepare('INSERT INTO Payment (rollno, amount, date_of_payment, method, status, reference) VALUES (?, ?, CURDATE(), ?, "Success", ?)');
$stmt->execute([$roll, $amt, $method, $ref]);
echo 'Payment recorded';
?>