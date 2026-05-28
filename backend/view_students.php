<?php
require 'db.php';
if(!isset($_SESSION['user_id'])) { http_response_code(403); echo 'Login required'; exit; }
$role = $_SESSION['role'];
// only admin can view all students; students can view only themselves
if($role === 'admin') {
    $stmt = $pdo->query('SELECT s.*, a.room_no, a.date_of_allocation FROM Student s LEFT JOIN Allocation a ON s.rollno = a.rollno ORDER BY s.rollno LIMIT 500');
    $students = $stmt->fetchAll();
} else {
    $roll = null;
    // if student logged in, try to resolve roll from Users table
    $stmt = $pdo->prepare('SELECT rollno FROM Users WHERE user_id = ? LIMIT 1');
    $stmt->execute([$_SESSION['user_id']]);
    $r = $stmt->fetch();
    if(!$r || !$r['rollno']) { echo 'No roll linked'; exit; }
    $roll = $r['rollno'];
    $stmt = $pdo->prepare('SELECT s.*, a.room_no, a.date_of_allocation FROM Student s LEFT JOIN Allocation a ON s.rollno = a.rollno WHERE s.rollno = ? LIMIT 1');
    $stmt->execute([$roll]);
    $students = $stmt->fetchAll();
}
header('Content-Type: application/json');
echo json_encode($students, JSON_PRETTY_PRINT);
?>