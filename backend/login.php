<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare('SELECT * FROM Users WHERE username = ? OR rollno = ? LIMIT 1');
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();
    if($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        echo json_encode(['status'=>'ok','role'=>$user['role']]);
    } else {
        http_response_code(401);
        echo json_encode(['status'=>'error','message'=>'Invalid credentials']);
    }
} else {
    ?>
    <form method="post">
      <input name="username" placeholder="username or rollno" />
      <input name="password" placeholder="password" type="password" />
      <button type="submit">Login</button>
    </form>
    <?php
}
?>