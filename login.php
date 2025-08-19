<?php
include 'db.php';
session_start();
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    echo "<div class='booking-box'>✅ Logged in as " . $user['username'] . "!</div>";
  } else {
    echo "<div class='booking-box'>❌ Invalid email or password.</div>";
  }
}
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Login - Midnight BnB</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>Login to Your Account 🌙</header>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</body>
</html>
 
 
