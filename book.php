<?php
include 'db.php';
session_start();
 
$property_id = $_GET['pid'] ?? null;
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $checkin = $_POST['checkin'];
  $checkout = $_POST['checkout'];
 
  // Insert dummy user if not logged in
  $user_id = $_SESSION['user_id'] ?? null;
  if (!$user_id) {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, 'guest']);
    $user_id = $conn->lastInsertId();
  }
 
  $stmt = $conn->prepare("INSERT INTO bookings (user_id, property_id, checkin, checkout) VALUES (?, ?, ?, ?)");
  $stmt->execute([$user_id, $property_id, $checkin, $checkout]);
  echo "<div class='booking-box'>🎉 Booking confirmed for $name!</div>";
}
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Book Your Stay</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>🛏️ Book Now</header>
 
  <div class="booking-box">
    <form method="POST">
      <label>Your Name</label>
      <input type="text" name="name" required>
 
      <label>Email</label>
      <input type="email" name="email" required>
 
      <label>Check-In Date</label>
      <input type="date" name="checkin" required>
 
      <label>Check-Out Date</label>
      <input type="date" name="checkout" required>
 
      <button type="submit" name="book">Confirm Booking</button>
    </form>
  </div>
</body>
</html>
 
 
