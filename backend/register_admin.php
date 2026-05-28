<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if(!$username || !$password) { echo 'Missing'; exit; }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO Users (username, password_hash, role) VALUES (?, ?, "admin")');
    $stmt->execute([$username, $hash]);
    echo 'Admin created';
} else {
    ?>
    <form method="post">
      <input name="username" placeholder="username" />
      <input name="password" placeholder="password" type="password" />
      <button type="submit">Create Admin</button>
    </form>
    <?php
}
?>