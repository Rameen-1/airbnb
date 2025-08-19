<!DOCTYPE html>
<html>
<head>
  <title>Midnight BnB 🌌</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>Midnight BnB 🌌🚘</header>
 
  <div class="search-bar">
    <form action="listings.php" method="GET">
      <input type="text" name="location" placeholder="Where are you going?" required>
      <input type="date" name="checkin" required>
      <input type="date" name="checkout" required>
      <button type="submit">Search Stays</button>
    </form>
  </div>
 
  <div class="filters">
    <h3>Featured Stays 🔥</h3>
    <p>Top-rated properties hand-picked for you.</p>
    <!-- Add static examples or use PHP when DB ready -->
  </div>
</body>
</html>
 
