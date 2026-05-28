<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] !== 'POST') { echo 'POST only'; exit; }
if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { http_response_code(403); echo 'Admin only'; exit; }
$roll = $_POST['rollno'] ?? '';
$viol = $_POST['violation'] ?? '';
$amt = floatval($_POST['amount'] ?? 0);
if(!$roll || !$viol || $amt<=0) { echo 'Invalid'; exit; }
$stmt = $pdo->prepare('INSERT INTO Fine (rollno, violation, amount, status, imposed_on) VALUES (?, ?, ?, "Pending", CURDATE())');
$stmt->execute([$roll, $viol, $amt]);
echo 'Fine added';
?>