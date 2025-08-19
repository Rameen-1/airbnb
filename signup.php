<?php
include 'db.php';
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  try {
    $stmt->execute([$username, $email, $password]);
    echo "<div class='booking-box'>🎉 Signup successful. <a href='login.php'>Login now</a></div>";
  } catch (PDOException $e) {
    echo "<div class='booking-box'>❌ Error: " . $e->getMessage() . "</div>";
  }
}
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Signup - Midnight BnB</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>Create an Account 🚀</header>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Signup</button>
  </form>
</body>
</html>
 
 
