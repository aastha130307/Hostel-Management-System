<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] !== 'POST') { echo 'POST only'; exit; }
$roll = $_POST['rollno'] ?? '';
$desc = $_POST['description'] ?? '';
$cat = $_POST['category'] ?? 'Other';
if(!$roll || !$desc) { echo 'Invalid'; exit; }
$stmt = $pdo->prepare('INSERT INTO Complaint (rollno, description, category, date_submitted, status) VALUES (?, ?, ?, CURDATE(), "Pending")');
$stmt->execute([$roll, $desc, $cat]);
echo 'Complaint submitted';
?>